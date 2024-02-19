<?php

namespace App\Controller;

use App\Entity\ShopCategory;
use App\Repository\ProductRepository;
use App\Repository\ShopCategoryRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{

    public function __construct(
        private ShopCategoryRepository $shopCategoryRepository,
        private ProductRepository $productRepository
    ) {
    }

    #[Route('/shop', name: 'app_shop')]
    public function index(): Response
    {

        $shopCategories = $this->shopCategoryRepository->findAll();

        return $this->render('shop/index.html.twig', [
            'shopCategories' => $shopCategories,
        ]);
    }

    #[Route('/shop/kids', name: 'app_shop_kids')]
    public function showKidShop()
    {
        $kidCategory = $this->shopCategoryRepository->findOneByName('kids');
        $articles = $this->productRepository->findByShopCategory($kidCategory);
        // dd($articles[1]->getEnsemble()->getValues());


        return $this->render('shop/kidShop.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/shop/adults', name: 'app_shop_adults')]
    public function showAdultShop()
    {
        $adultCategory = $this->shopCategoryRepository->findOneByName('adults');
        $articles = $this->productRepository->findByShopCategory($adultCategory);

        return $this->render('shop/adultShop.html.twig', [
            'articles' => $articles,
        ]);
    }
}
