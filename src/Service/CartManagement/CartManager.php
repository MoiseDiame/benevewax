<?php

namespace App\Service\CartManagement;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CartManager
{
    private $session;
    public function __construct(
        private ProductRepository $productRepository,
        private RequestStack $requestStack
    ) {
        $this->session = $requestStack->getSession();
    }


    public function add($id, $size)
    {

        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id . $size])) {
            $cart[$id . '-' . $size]++;
        } else {

            $cart[$id . '-' .  $size] = 1;
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
                if ($product) {
                    $fullCart[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'price' => $product->getPrice(),
                        'size' => $infos[1],
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
}
