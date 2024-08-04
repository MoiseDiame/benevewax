<?php

namespace App\Service\CartManagement;

use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Entity\Product;
use App\Enum\OrderStatusEnum;
use App\Repository\ProductRepository;
use App\Repository\ShippingCostRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class OrderManager
{


    public function __construct(
        private CartManager $cartManager,
        private EntityManagerInterface $entityManager
    ) {
    }
    public function createOrder($data)
    {


        $totalItems = $this->cartManager->getTotalItems();
        $fullCart = $this->cartManager->getFullCart();
        $totalItemsPrice = $this->cartManager->getTotalItemsPrice();
        $shippingFees = $this->cartManager->getShippingCost($data['destination']);
        $totalToPay = $totalItemsPrice + $shippingFees;


        $order = new Order();

        $order->setCreatedAt(new DateTimeImmutable('now'));
        $order->setCustomer($data['prenom'] . ' ' . $data['nom']);
        $order->setEmail($data['email']);
        $order->setAddress($data['adresse'] . ' ' . $data['ville'] . ' ' . $data['codePostal'] . ' ' . $data['pays']);
        $order->setShippingFees($shippingFees);
        $order->setTotalToPay($totalToPay);
        $order->setPaid(false);
        $order->setProductsPrice($totalItemsPrice);
        $order->setReference(uniqid('B&E-Wax-'));
        $order->setStatus(OrderStatusEnum::INACHEVE);

        foreach ($fullCart as $item) {
            $orderDetail = new OrderDetails();

            $orderDetail->setProduct($item['product']->getName());
            $orderDetail->setSize($item['size']);
            $orderDetail->setQuantity($item['quantity']);
            $orderDetail->setPrice($item['price']);
            $orderDetail->setTotal($item['quantity'] * $item['price']);

            $order->addOrderDetail($orderDetail);
        }

        // dd($order);
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        return $order;
    }
}
