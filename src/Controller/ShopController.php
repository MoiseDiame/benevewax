<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ShopCategory;
use App\Entity\ProductCategory;
use App\Repository\ProductCategoryRepository;
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
        private RequestStack $requestStack,
        private ProductCategoryRepository $productCategoryRepository
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

        $kidShoesCategory = $this->productCategoryRepository->findOneByName('kidShoe');
        $kidVestCategory = $this->productCategoryRepository->findOneByName('kidVeste');
        $kidEnsembleCategory = $this->productCategoryRepository->findOneByName('kidEnsemble');

        $kidShoes = $this->productRepository->findByProductCategory($kidShoesCategory);
        $kidVestes = $this->productRepository->findByProductCategory($kidVestCategory);
        $kidEnsembles = $this->productRepository->findByProductCategory($kidEnsembleCategory);


        return $this->render('shop/kidShop.html.twig', [
            'kidShoes' => $kidShoes,
            'kidVestes' => $kidVestes,
            'kidEnsembles' => $kidEnsembles,

        ]);
    }

    #[Route('/shop/adults', name: 'app_shop_adults')]
    public function showAdultShop()
    {

        $adultShoesCategory = $this->productCategoryRepository->findOneByName('adultShoe');
        $adultVestCategory = $this->productCategoryRepository->findOneByName('adultVeste');
        $adultEnsembleCategory = $this->productCategoryRepository->findOneByName('adultEnsemble');

        $adultShoes = $this->productRepository->findByProductCategory($adultShoesCategory);
        $adultVestes = $this->productRepository->findByProductCategory($adultVestCategory);
        $adultEnsembles = $this->productRepository->findByProductCategory($adultEnsembleCategory);


        return $this->render('shop/adultShop.html.twig', [
            'adultShoes' => $adultShoes,
            'adultVestes' => $adultVestes,
            'adultEnsembles' => $adultEnsembles,

        ]);
    }

    #[Route('/shop/{shopCategory}/{slug}/{id}', name: 'app_product_details')]
    public function showProduct(
        #[MapEntity(mapping: ['id' => 'id'])] Product $product
    ) {

        // dd($product->getEnsemble()->getValues());
        return $this->render('shop/productDetails.html.twig', [
            'article' => $product,
        ]);
    }
}
