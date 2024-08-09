<?php

namespace App\Service\CartManagement;

use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PaypalHandler
{

    private $auth_url;
    private $payment_details_url;
    private $clientId;
    private $clientSecret;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private ParameterBagInterface $parameterBag,
        private HttpClientInterface $httpClient,
        private OrderRepository $orderRepository
    ) {
        if ($_ENV['APP_ENV'] == 'dev') {
            $this->auth_url = $this->parameterBag->get('paypal_auth_sandbox_url');
            $this->payment_details_url = $this->parameterBag->get('paypal_payment_details_sandbox_url');
            $this->clientId = $this->parameterBag->get('paypal_sandbox_client_id');
            $this->clientSecret = $this->parameterBag->get('paypal_sandbox_secretKey');
        } elseif ($_ENV['APP_ENV'] == 'prod') {
            $this->auth_url = $this->parameterBag->get('paypal_auth_prod_url');
            $this->payment_details_url = $this->parameterBag->get('paypal_payment_details_prod_url');
            $this->clientId = $this->parameterBag->get('paypal_prod_client_id');
            $this->clientSecret = $this->parameterBag->get('paypal_prod_secretKey');
        }
    }


    /**
     * Undocumented function
     *
     * @param [string] $paypalOrderId
     * @param [Order] $order
     * @return bool
     */
    public function handlePaypalPayment($paypalOrderId, $order): bool
    {

        $paypalDetails = $this->getPaymentDetails($paypalOrderId);
        $paypalPurchaseDetails = $paypalDetails['purchase_units'][0];
        $orderAmount = $order->getTotalToPay() / 100;

        if (($paypalDetails['status'] == 'COMPLETED' || 'APPROVED') &&
            ($paypalPurchaseDetails['amount']['value'] == $orderAmount) &&
            ($paypalPurchaseDetails['amount']['currency_code'] == 'EUR')
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function getPaypalToken()
    {
        try {
            $response = $this->httpClient->request('POST', $this->auth_url, [
                'auth_basic' => [$this->clientId, $this->clientSecret],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);

            if ($response) {

                $data = $response->toArray();
                $token = $data['access_token'];

                return $token;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return;
        }
    }

    public function getPaymentDetails($paymentId)
    {
        $response = $this->httpClient->request('GET', $this->payment_details_url . $paymentId, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getPaypalToken()
            ]
        ]);

        return $response->toArray();
    }
}
