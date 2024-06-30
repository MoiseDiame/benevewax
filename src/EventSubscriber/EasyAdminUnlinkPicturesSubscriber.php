<?php

namespace App\EventSubscriber;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminUnlinkPicturesSubscriber extends AbstractController implements EventSubscriberInterface
{
    /* Cette classe va permettre de supprimer l'ensemble des images liées 
            à un produit au moment de la suppression 
    */
    public function onBeforeEntityDeletedEvent(BeforeEntityDeletedEvent $event): void
    {
        $product = $event->getEntityInstance();
        if ($product instanceof Product) {
            $presentation_pic = $product->getPrezPicture();
            $illustration_pic = $product->getOtherPic1();
            $illustration_pic1 = $product->getOtherPic2();
            $illustration_pic2 = $product->getOtherPic3();
            $pic_directory = $this->getParameter('product_images_directory');

            if ($presentation_pic) {
                unlink($pic_directory . '/' . $presentation_pic);
            }
            if ($illustration_pic) {
                unlink($pic_directory . '/' . $illustration_pic);
            }
            if ($illustration_pic1) {
                unlink($pic_directory . '/' . $illustration_pic1);
            }
            if ($illustration_pic2) {
                unlink($pic_directory . '/' . $illustration_pic2);
            }
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityDeletedEvent::class => 'onBeforeEntityDeletedEvent',
        ];
    }
}
