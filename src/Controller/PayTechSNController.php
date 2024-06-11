<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PayTechSNController extends AbstractController
{
    #[Route('/paytech', name: 'app_paytech', methods: ['POST'])]
    public function index(Request $request): Response
    {
        dd($request->getPayload());
        return $this->render('paytech/index.html.twig', [
            'controller_name' => 'PayTechSNController',
        ]);
    }
}
