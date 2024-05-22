<?php

namespace App\Service\CartManagement;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\ShippingCostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CartManager
{
    private $session;
    public function __construct(
        private ProductRepository $productRepository,
        private RequestStack $requestStack,
        private ShippingCostRepository $shippingCostRepository
    ) {
        $this->session = $requestStack->getSession();
    }


    public function add($id, $size, Request $request)
    {

        $cart = $this->session->get('cart', []);

        if (count($size) > 1) {
            $selectedSize = implode('-', $size);
        } else {
            $selectedSize = $request->get('selectedSize');
        }

        if (!empty($cart[$id . $selectedSize])) {
            $cart[$id . '-' . $selectedSize]++;
        } else {

            $cart[$id . '-' .  $selectedSize] = 1;
        }

        $this->session->set('cart', $cart);
    }

    public function set($cart)
    {
        return $this->session->set('cart', $cart);
    }


    public function get()
    {
        return $this->session->get('cart');
    }

    public function remove()
    {
        return $this->session->remove('cart');
    }

    public function delete($id)
    {
        $cart = $this->session->get('cart', []);

        unset($cart[$id]);

        return $this->session->set('cart', $cart);
    }

    public function decrease($id)
    {
        $cart = $this->session->get('cart', []);

        if ($cart[$id] > 1) {
            $cart[$id]--;
        } else {
            unset($cart[$id]);
        }
        return $this->session->set('cart', $cart);
    }

    public function increase($id)
    {
        $cart = $this->session->get('cart', []);

        if ($cart[$id]) {
            $cart[$id]++;
        } else {
            return;
        }
        return $this->session->set('cart', $cart);
    }




    /***
     *  Cette fonction permet de connaitre le nombre d'articles dans le panier
     */
    public function getTotalItems()
    {
        $cart = $this->session->get('cart', []);
        $totalItems = 0;
        if ($cart) {
            foreach ($cart as $id => $quantity) {

                $totalItems += $quantity;
            }
        }
        return $totalItems;
    }

    public function getFullCart()
    {

        $cart = $this->session->get('cart');
        $fullCart = [];

        if ($cart) {
            foreach ($cart as $id => $quantity) {

                $infos = explode('-', $id);
                $productId = $infos[0];
                $product = $this->productRepository->findOneById($productId);
                if ($product->isAssortiment()) {
                    $size = $infos[1] . '/' . $infos[2];
                } else {
                    $size = $infos[1];
                }

                if ($product) {
                    $fullCart[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'price' => $product->getPrice(),
                        'size' => $size,
                        'sessionId' => $id
                    ];
                } else {
                    $this->delete($id);
                    continue;
                }
            }
        }
        return $fullCart;
    }

    public function getTotalItemsPrice()
    {

        $cart = $this->session->get('cart', []);
        $totalItemsPrice = 0;

        foreach ($cart as $id => $quantity) {

            $infos = explode('-', $id);
            $productId = $infos[0];
            $product = $this->productRepository->findOneById($productId);
            $price = $product->getPrice();

            $totalItemsPrice += $price * $quantity;
        }
        return $totalItemsPrice;
    }

    public function getShippingCost($destination)
    {
        if ($destination == "france") {
            return $this->shippingCostRepository->findOneByName('france')->getPrice();
        } else {
            return $this->shippingCostRepository->findOneByName('other')->getPrice();
        }
    }
}
