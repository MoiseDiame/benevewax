<?php

namespace App\Service\Mailing;

use App\Service\Mailing\MailingAddressesConfig;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;


class Mailer
{

    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendEmail($to, $subject, $message)
    {
        $email = (new TemplatedEmail())
            ->from(MailingAddressesConfig::NOREPLY)
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->htmlTemplate('/emails/emailBase.html.twig')
            ->context([
                'message' => $message
            ]);
        try {

            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dd($e);

            dump($e);
        }
    }

    public function sendContactEmail($subject, $message)
    {
        $email = (new TemplatedEmail())
            ->from(MailingAddressesConfig::NOREPLY)
            ->to(MailingAddressesConfig::CONTACT)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->htmlTemplate('/emails/emailBase.html.twig')
            ->context([
                'message' => $message
            ]);
        try {

            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dd($e);

            dump($e);
        }
    }


    public function sendOrderSuccessEmail($order)
    {
        $message = $this->getSuccessfulOrderMail($order);
        $to = $order->getUser()->getEmail();
        $subject = 'Confirmation de votre commande chez BeneveWax';

        $email = (new TemplatedEmail())
            ->from(MailingAddressesConfig::NOREPLY)
            ->to($to)
            ->cc(MailingAddressesConfig::OWNER)
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->htmlTemplate('/emails/emailOrderSuccessful.html.twig')
            ->context([
                'message' => $message,
                'order' => $order,
                'orderDetails' => $order->getOrderDetails()->getValues()
            ]);
        try {

            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dd($e);

            dump($e);
        }
    }

    public function sendOrderNotificationOwner()
    {
        $to = MailingAddressesConfig::OWNER;
        $subject = 'Nouvelle commande sur le site BeneveWax';

        $message = 'Bonjour' . '<br>' . 'Une nouvelle commande a été effectuée via le site internet.' . '<br>';
        $message .= ' Vous pouvez vous rendre dans la console de gestion du site pour en connaître les détails';

        $email = (new TemplatedEmail())
            ->from(MailingAddressesConfig::NOREPLY)
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->htmlTemplate('/emails/emailBase.html.twig')
            ->context([
                'message' => $message
            ]);
        try {

            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dd($e);

            dump($e);
        }
    }

    private function getSuccessfulOrderMail($order)

    {
        $ref = $order->getReference();
        $firstname = $order->getUser()->getFirstName();

        $message = $firstname . ',<br>' . 'Nous vous remercions pour la confiance que vous nous accordez.' . '<br>';
        $message .= 'Votre commande <strong>' . $ref . '</strong> a bien été prise en compte et elle vous sera expédiée très prochainement.' . '<br>';
        $message .= ' Vous recevrez également des informations relatives au statut de votre commande.';
        $message .= ' Retrouvez ci-dessous le récapitulatif de votre commande ';

        return $message;
    }
}
