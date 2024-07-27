<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PayPalController extends AbstractController
{
    #[Route('/paypal/{orderRef}', name: 'app_paypal')]
    public function index(): Response
    {
        return $this->render('pay_pal/index.html.twig', [
            'controller_name' => 'PayPalController',
        ]);
    }
}
