<?php

namespace App\Controller\Admin;

use App\Entity\ShippingCost;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ShippingCostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ShippingCost::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex()
                ->hideOnDetail(),
            TextField::new('name', 'Destination'),
            MoneyField::new('price', 'Tarif')->setCurrency('EUR'),
        ];
    }
}
