<?php

namespace App\Service\Paytech;

use App\Service\Paytech\PayTech;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PayTechResponse
{

    public function __construct(
        private ParameterBagInterface $parameterBag,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    /**
     * Undocumented function
     *
     * @param [Order] $order
     * @return [json] $jsonResponse
     */
    public function getPayTechResponse($order)
    {

        $apiKey = $this->parameterBag->get('paytech_apiKey');
        $apiSecret = $this->parameterBag->get('paytech_secretKey');

        $items = [];
        $orderDetails = $order->getOrderDetails();

        foreach ($orderDetails as $detail) {
            $items[] = $detail->getProduct();
        }

        $itemsList = implode(' / ', $items);

        $jsonResponse = (new PayTech($apiKey, $apiSecret))->setQuery([
            'item_name' => $itemsList,
            'item_price' => $order->getTotalToPay() / 100,
            'command_name' => "Paiement commande {$order->getReference()} via PayTech",
        ])->setCustomeField([
            'item_id' => $order->getId(),
            'time_command' => time(),
            'ip_user' => $_SERVER['REMOTE_ADDR'],
            'lang' => $_SERVER['HTTP_ACCEPT_LANGUAGE']
        ])
            ->setTestMode(true)
            ->setCurrency('EUR')
            ->setRefCommand($order->getReference())
            ->setNotificationUrl([
                'ipn_url' =>  $this->urlGenerator->generate('app_order_notifOwner', ['orderRef' => $order->getReference()], UrlGeneratorInterface::ABSOLUTE_URL), //only https
                'success_url' => $this->urlGenerator->generate('app_order_success', ['orderRef' => $order->getReference()], UrlGeneratorInterface::ABSOLUTE_URL),
                'cancel_url' =>  $this->urlGenerator->generate('app_order_fail', ['orderRef' => $order->getReference()], UrlGeneratorInterface::ABSOLUTE_URL)
            ])->send();

        return  $jsonResponse;
    }
}
