<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\CartManagement\CartManager;
use App\Service\CartManagement\OrderManager;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order', methods: ['POST'])]
    public function index(Request $request, CartManager $cartManager, OrderManager $orderManager, ParameterBagInterface $parameterBag): Response
    {

        $orderData = $request->get('cart');

        $order = $orderManager->createOrder($orderData);
        $paypalClientId = $parameterBag->get('paypal_client_id');

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
            'order' => $order,
            'paypalClientId' => $paypalClientId
        ]);
    }

    #[Route('/order/details/{orderRef}', name: 'app_order_details', options: ['expose' => true])]
    public function getOrderDetails(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,
        SerializerInterface $serializer
    ) {

        if ($order) {
            return new JsonResponse($serializer->serialize($order, 'json', [AbstractNormalizer::GROUPS => ['order_infos']]));
        } else {
            return new Response(Response::HTTP_NOT_FOUND);
        }
    }


    #[Route('/order/success/{orderRef}', name: 'app_order_success', options: ['expose' => true])]
    public function successfulOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,
        Request $request
    ) {

        dd($request, $order);
    }

    // #[Route('/order/success/{orderRef}', name: 'app_order_notifOwner',options: ['expose' => true])]
    // public function notifOwner(
    //     #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order
    // ) {

    //     dd($order);
    // }

    #[Route('/order/fail/{orderRef}', name: 'app_order_fail', options: ['expose' => true])]
    public function failedOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,
        Request $request

    ) {

        dd($request, $order);
    }
}
