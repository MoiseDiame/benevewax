<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\CartManagement\CartManager;
use App\Service\CartManagement\OrderManager;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order', methods: ['POST'])]
    public function index(Request $request, CartManager $cartManager, OrderManager $orderManager): Response
    {

        $orderData = $request->get('cart');

        $order = $orderManager->createOrder($orderData);

        $destination = $orderData['destination'];
        $fullCart = $cartManager->getFullCart();
        $totalItemsPrice = $cartManager->getTotalItemsPrice();
        $shippingFees = $cartManager->getShippingCost($destination);
        $totalToPay = $totalItemsPrice + $shippingFees;

        return $this->render('order/index.html.twig', [
            'cart' => $fullCart,
            'totalItemsPrice' => $totalItemsPrice,
            'shippingFees' => $shippingFees,
            'total_to_pay' => $totalToPay,
            'order' => $order
        ]);
    }

    #[Route('/order/success/{orderRef}', name: 'app_order_success')]
    public function successfulOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order
    ) {

        dd($order);
    }

    #[Route('/order/success/{orderRef}', name: 'app_order_notifOwner')]
    public function notifOwner(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order
    ) {

        dd($order);
    }

    #[Route('/order/fail/{orderRef}', name: 'app_order_fail')]
    public function failedOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order
    ) {

        dd($order);
    }
}
