<?php

namespace App\Controller\Admin;

use App\Entity\ShopCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ShopCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ShopCategory::class;
    }

    public const BASE_PATH = 'uploads/ProductPictures';
    public const UPLOAD_DIR = 'public/uploads/ProductPictures';


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name'),
            // ImageField::new('picture')
            //     ->setBasePath(self::BASE_PATH)
            //     ->setUploadDir(self::UPLOAD_DIR)
            //     ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
            //     ->setRequired(false),,
        ];
    }
}
