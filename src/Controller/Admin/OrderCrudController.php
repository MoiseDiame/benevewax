<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Commande')
            ->setEntityLabelInPlural('Commandes')
            ->setPageTitle('index', ' Commandes')
            ->setPageTitle('detail', 'Détails de la commande')
            ->setPageTitle('new', 'Ajouter manuellement une commande')
            ->setSearchFields(['paid', 'status.status', 'user.firstname'])
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()
                ->hideOnIndex()
                ->hideOnDetail(),
            TextField::new('customer', 'Client'),
            EmailField::new('email', 'email'),
            CollectionField::new('orderDetails', 'Détails de la commande')
                ->hideWhenUpdating(),
            TextField::new('address', 'Adresse de livraison'),
            MoneyField::new('productsPrice', 'Montant des achats')
                ->setCurrency('EUR')
                ->hideWhenUpdating(),
            MoneyField::new('shippingFees', 'Frais de port')
                ->setCurrency('EUR')
                ->hideWhenUpdating(),
            MoneyField::new('totalToPay', 'Total à payer')
                ->setCurrency('EUR')
                ->hideWhenUpdating(),
            BooleanField::new('paid', 'Paiement effectué')
                ->renderAsSwitch(false),
            ChoiceField::new('status', 'Statut '),
            DateField::new('createdAt', 'Date de commande'),
            TextField::new('reference', 'Numéro de commande')
                ->hideOnIndex()
                ->hideWhenUpdating(),
            UrlField::new('tracking', 'Suivi de livraison')
                ->hideOnIndex(),


        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->disable(Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('paid')
            ->add('status')
            ->add('customer');
    }
}
