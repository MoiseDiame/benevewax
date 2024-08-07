<?php

namespace App\Controller;

use App\Form\CartType;
use App\Service\CartManagement\CartManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{

    public function __construct(
        private CartManager $cartManager,
        private RequestStack  $requestStack,
    ) {
    }

    #[Route('/cart', name: 'app_cart', options: ["expose" => true])]
    public function index(
        Request $request,
        SessionInterface $session
    ): Response {

        $destination = $request->get('cart')['destination'] ?? 'france';
        $totalItems = $this->cartManager->getTotalItems();
        $fullCart = $this->cartManager->getFullCart();
        $totalItemsPrice = $this->cartManager->getTotalItemsPrice();
        $shippingFees = $this->cartManager->getShippingCost($destination);

        $submitForm = $this->createForm(CartType::class);
        $submitForm->handleRequest($request);


        if (($submitForm->isSubmitted()) && ($submitForm->isValid())) {
            dd($submitForm->getData());
        }

        return $this->render('cart/index.html.twig', [
            "totalItems" => $totalItems,
            'cart' => $fullCart,
            'totalItemsPrice' => $totalItemsPrice,
            'shippingFees' => $shippingFees,
            'submit_form' => $submitForm,
            'session' => $session->get('cart')

        ]);
    }

    #[Route('/cart/add/{id}/', name: 'add_to_cart', methods: ['GET', 'POST'])]

    public function add(Request $request, $id): Response
    {
        /**
         * Ajout d'un message flash à l'utilisateur et le client reste sur
         * la meme page afin de poursuivre ses achats 
         */
        $selectedSize = $request->request->all();
        $this->cartManager->add($id, $selectedSize, $request);
        $this->addFlash('success', 'Article ajouté au panier');
        $route = $request->headers->get('referer');

        return $this->redirect($route);
    }

    #[Route('/cart/remove', name: 'remove_all_cart')]
    public function remove(): Response
    {
        $this->cartManager->remove();
        return $this->redirectToRoute('shop');
    }

    #[Route('/cart/delete/{id}', name: 'delete_to_cart')]
    public function delete($id): Response
    {
        $this->cartManager->delete($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/decrease/{id}', name: 'decrease_to_cart')]
    public function decrease($id): Response
    {
        $this->cartManager->decrease($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/increase/{id}', name: 'increase_to_cart')]
    public function increase($id): Response
    {
        $this->cartManager->increase($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('cart/updateTotalItems', name: 'app_cart_totalItems', options: ['expose' => true])]
    public function getTotalItems()
    {

        return new JsonResponse($this->cartManager->getTotalItems());
    }
}
