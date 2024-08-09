<?php

namespace App\Controller;

use App\Entity\Order;
use App\Enum\OrderStatusEnum;
use App\Service\CartManagement\CartManager;
use App\Service\CartManagement\OrderManager;
use App\Service\CartManagement\PaypalHandler;
use App\Service\Mailing\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class OrderController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private CartManager $cartManager
    ) {
    }

    #[Route('/order', name: 'app_order', methods: ['POST'])]
    public function index(Request $request, CartManager $cartManager, OrderManager $orderManager, ParameterBagInterface $parameterBag): Response
    {
        $paypalClientId = '';
        if ($_ENV['APP_ENV'] == 'dev') {
            $paypalClientId = $parameterBag->get('paypal_sandbox_client_id');
        } elseif ($_ENV['APP_ENV'] == 'prod') {
            $paypalClientId = $parameterBag->get('paypal_prod_client_id');
        }

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

    #[Route('/order/approve/{orderRef}/{paypalOrderId}', name: 'app_order_approve', options: ['expose' => true])]
    public function handlePaypalOnApprove(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,
        Request $request,
        $paypalOrderId,
        PaypalHandler $paypalHandler,
        UrlGeneratorInterface $urlGenerator
    ) {

        if ($paypalHandler->handlePaypalPayment($paypalOrderId, $order) == true) {
            $order->setPaypalOrderId($paypalOrderId)
                ->setPaid(true)
                ->setStatus(OrderStatusEnum::EN_COURS);

            $this->entityManager->persist($order);
            $this->entityManager->flush();

            return new JsonResponse($urlGenerator->generate('app_order_success', ['orderRef' => $order->getReference()], UrlGenerator::ABSOLUTE_URL));
        } else {

            $order->setStatus(OrderStatusEnum::FRAUDE);
            $this->entityManager->persist($order);
            $this->entityManager->flush();


            return new JsonResponse($urlGenerator->generate('app_order_fail', ['orderRef' => $order->getReference()], UrlGenerator::ABSOLUTE_URL));
        }
    }


    #[Route('/order/success/{orderRef}', name: 'app_order_success', options: ['expose' => true])]
    public function successfulOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,
        Mailer $mailer
    ) {

        if ($order) {
            /**
             * Envoi d'un mail de confirmation de commande au client
             */

            $mailer->sendOrderSuccessEmail($order);

            /**
             * Envoi d'un mail de notification au gestionnaire 
             */

            $mailer->sendOrderNotificationOwner();

            $this->cartManager->remove();

            return $this->render('order/order_success.html.twig', [
                "order" => $order
            ]);
        }
    }


    #[Route('/order/fail/{orderRef}', name: 'app_order_fail', options: ['expose' => true])]
    public function failedOrder(
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order,

    ) {
        $this->addFlash('error', 'Un incident de paiement est survenu');


        return $this->render('order/order_fail.html.twig', [
            "order" => $order
        ]);
    }
}
