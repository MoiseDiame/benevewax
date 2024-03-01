<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ShopCategory;
use App\Entity\ProductCategory;
use App\Repository\ProductRepository;
use App\Repository\ShopCategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;

class ShopController extends AbstractController
{

    public function __construct(
        private ShopCategoryRepository $shopCategoryRepository,
        private ProductRepository $productRepository,
        private RequestStack $requestStack
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

    #[Route('/shop/kids/{category}', name: 'app_shop_kids')]
    public function showKidShop(
        #[MapEntity(mapping: ['category' => 'name'])] ProductCategory $category
    ) {
        $articles = $this->productRepository->findByProductCategory($category);


        return $this->render('shop/kidShop.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/shop/adults/{category}', name: 'app_shop_adults')]
    public function showAdultShop(
        #[MapEntity(mapping: ['category' => 'name'])] ProductCategory $category
    ) {
        $articles = $this->productRepository->findByProductCategory($category);

        return $this->render('shop/adultShop.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/shop/{shopCategory}/{slug}/{id}', name: 'app_product_details')]
    public function showProduct(
        #[MapEntity(mapping: ['id' => 'id'])] Product $product
    ) {

        // dd($this->requestStack->getSession());
        return $this->render('shop/productDetails.html.twig', [
            'article' => $product,
        ]);
    }
}
