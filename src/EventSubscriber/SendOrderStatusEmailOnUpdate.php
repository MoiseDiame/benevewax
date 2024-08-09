<?php

namespace App\EventSubscriber;

use App\Entity\Order;
use App\Enum\OrderStatusEnum;
use App\Service\Mailing\Mailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;

class SendOrderStatusEmailOnUpdate implements EventSubscriberInterface
{

    public function __construct(
        private Mailer $mailer
    ) {
    }

    public function sendOrderStatusEmailOnUpdate(AfterEntityUpdatedEvent $event): void
    {
        $order = $event->getEntityInstance();
        if ($order instanceof Order) {
            $recipient = $order->getEmail();

            if ($order->getStatus() == OrderStatusEnum::PRETE) {
                $subject = 'Commande B&E Wax prête';
                $message = $this->getOrderReadyMail($order);
                $this->mailer->sendEmail($recipient, $subject, $message);
            }

            if ($order->getStatus() == OrderStatusEnum::EXPEDIEE) {
                $subject = 'Commande B&E Wax expédiée';
                $tracking_url = '';
                if (strlen($order->getTracking()) > 2) {

                    $tracking_url = $order->getTracking();
                }

                $email = $this->getOrderSentMail($tracking_url);
                $this->mailer->sendEmail($recipient, $subject, $email);
            }
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterEntityUpdatedEvent::class => 'sendOrderStatusEmailOnUpdate',
        ];
    }



    private function getOrderReadyMail($order)
    {
        $message = 'Bonjour ' . $order->getCustomer() . '<br>' . 'Votre commande est désormais prête' . '<br>';
        $message .= 'Elle sera bientôt expédiée';

        return $message;
    }
    private function getOrderSentMail($tracking)
    {
        $message = 'Bonjour' . '<br>' . 'Votre commande a été expédiée' . '<br>';
        $message .= ' Nous vous remercions encore pour votre confiance.' . '<br>';

        if (strlen($tracking) > 2) {
            $message .= 'Vous pouvez suivre votre colis ' . '<a href="' . $tracking . '">en cliquant ici</a>' . '<br>';
        }

        return $message;
    }
}
