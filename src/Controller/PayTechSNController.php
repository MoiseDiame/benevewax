<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\Paytech\PayTechResponse;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PayTechSNController extends AbstractController
{
    #[Route('/paytech/{orderRef}', name: 'app_paytech', methods: ['POST'], options: ['expose' => true])]
    public function index(
        Request $request,
        PayTechResponse $payTechResponse,
        #[MapEntity(mapping: ['orderRef' => 'reference'])] Order $order
    ): Response {

        $response = $payTechResponse->getPayTechResponse($order);

        return new JsonResponse();
    }
}
