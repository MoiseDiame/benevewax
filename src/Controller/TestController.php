<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\CartManagement\PaypalHandler;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(PaypalHandler $paypalHandler): Response
    {

        $token = $paypalHandler->getPaypalToken();
        $paymentId = "5PA41605KA774401V";

        dd($paypalHandler->getPaymentDetails($paymentId));
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
