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


    public function add($id)
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
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



    /***
     *  Cette fonction permet de connaitre le montant total des achats du client 
     * ( uniquement les produits. Les frais de port ne sont pas encore pris en compte)
     */
    public function getTotalPrice()
    {
        $cart = $this->session->get('cart', []);
        $total_price = 0;
        if ($cart) {

            foreach ($cart as $id => $quantity) {
            }
        }
        return $total_price;
    }
}
