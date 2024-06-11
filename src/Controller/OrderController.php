<?php

namespace App\Controller;

use App\Service\CartManagement\CartManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order', methods: ['POST'])]
    public function index(Request $request, CartManager $cartManager): Response
    {
        dd($request);
        $destination = $request->get('cartSubmitFormSelect');
        $totalItems = $cartManager->getTotalItems();
        $fullCart = $cartManager->getFullCart();
        $totalItemsPrice = $cartManager->getTotalItemsPrice();
        $shippingFees = $cartManager->getShippingCost($destination);
        $totalToPay = $totalItemsPrice + $shippingFees;

        return $this->render('order/index.html.twig', [
            'cart' => $fullCart,
            'totalItemsPrice' => $totalItemsPrice,
            'shippingFees' => $shippingFees,
            'total_to_pay' => $totalToPay
        ]);
    }
}
