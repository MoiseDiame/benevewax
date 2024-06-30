<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\Mailing\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, Mailer $mailer): Response
    {
        $contactForm = $this->createForm(ContactType::class, [
            'action' => $this->generateUrl('app_contact')
        ]);
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();
            $mail = $data['email'];
            $subject = 'Contact client';
            $fullname = $data['prenom'] . ' ' . $data['nom'];
            $message = 'De la part de ' . $fullname . '<br>' . $mail . '<br>' . $data['message'];
            $mailer->sendContactEmail($subject, $message);
            $this->addFlash(
                'success',
                'Votre message a bien été transmis'
            );
            return $this->redirectToRoute('home');
        } else {

            return $this->render('contact/index.html.twig', [
                'form' => $contactForm->createView(),
            ]);
        }
    }
}
