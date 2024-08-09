<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Attribute\Cache;

/**
 * Cette classe regroupera l'ensemble des pages accessoires 
 * telles que à propos de nous, les CGV etc.
 */

class AccessoriesPagesController extends AbstractController
{
    private $entityManager;

    public function __construct()
    {
    }


    #[Route('/mentions-legales', name: 'mentions')]
    public function mentions(): Response
    {

        return $this->render('accessories_pages/mentions.html.twig', []);
    }

    #[Route('/politique-de-confidentialite', name: 'policy')]
    #[Cache(public: true, maxage: 3600, mustRevalidate: true)]
    public function policy(): Response
    {

        return $this->render('accessories_pages/privatePolicy.html.twig', []);
    }

    #[Route('/conditions-generales-de-vente', name: 'cgv')]
    #[Cache(public: true, maxage: 3600, mustRevalidate: true)]
    public function CGV(): Response
    {

        return $this->render('accessories_pages/cgv.html.twig', []);
    }
}
