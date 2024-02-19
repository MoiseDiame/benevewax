<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ShopCategoryRepository;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KidEnsembleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public const BASE_PATH = 'uploads/ProductPictures';
    public const UPLOAD_DIR = 'public/uploads/ProductPictures';

    public function __construct(
        private ShopCategoryRepository $shopCategoryRepository,
        private EntityRepository $entityRepository
    ) {
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('name'),
            TextEditorField::new('description'),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->hideOnIndex()
                ->hideOnDetail(),
            AssociationField::new('ensemble')
                ->setFormTypeOption('choice_label', 'name')
                ->setFormTypeOption('by_reference', false)
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->where('entity.shopCategory = :category')
                        ->setParameter('category', $this->shopCategoryRepository->findOneByName('kids'));
                }),
            MoneyField::new('price')->setCurrency('EUR')->setRequired(true),
            BooleanField::new('available'),
            ImageField::new('prezPicture')
                ->setBasePath(self::BASE_PATH)
                ->setUploadDir(self::UPLOAD_DIR)
                ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
                ->setRequired(false),

        ];
    }


    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        $shopCategory = $this->shopCategoryRepository->findOneByName('kids');

        $response = $this->entityRepository->createQueryBuilder($searchDto, $entityDto, $fields, $filters)
            ->where('entity.assortiment = :ensemble')
            ->andWhere('entity.shopCategory = :kids')
            ->setParameters(['ensemble' => true, 'kids' => $shopCategory]);

        return $response;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Product) return;
        $shopCategory = $this->shopCategoryRepository->findOneByName('kids');

        $entityInstance->setShopCategory($shopCategory)
            ->setAssortiment(true);
        parent::persistEntity($entityManager, $entityInstance);
    }
}
