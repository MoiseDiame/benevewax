<?php

namespace App\Form;

use App\Enum\ShippingDestinationEnum;
use Symfony\Component\Form\AbstractType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class CartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('destination', EnumType::class, [
                'class' => ShippingDestinationEnum::class,
                'label' => 'Pays de livraison'
            ])
            ->add('prenom', TextType::class, [
                'label' => "Prénom",
                'attr' => ['placeholder' => 'Prénom']
            ])
            ->add('nom', TextType::class, [
                'attr' => ['placeholder' => 'Nom']
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('adresse', TextType::class, [
                'attr' => ['placeholder' => 'Adresse']
            ])
            ->add('codePostal', TextType::class, [
                'attr' => ['placeholder' => 'Code Postal']
            ])
            ->add('ville', TextType::class, [
                'attr' => ['placeholder' => 'Ville']
            ])
            ->add('pays', TextType::class, [
                'attr' => ['placeholder' => 'Pays']
            ])
            ->add('submit_cart', SubmitType::class, [
                'label' => 'Valider votre panier',
                'attr' => ['class' => 'btn btn-warning rounded-pill my-2']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'POST',
            'csrf_protection' => true
        ]);
    }
}
