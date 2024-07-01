<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ShopCategoryRepository;
use App\Repository\ProductCategoryRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdultEnsembleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public const BASE_PATH = 'uploads/ProductPictures';
    public const UPLOAD_DIR = 'public/uploads/ProductPictures';

    public function __construct(
        private ShopCategoryRepository $shopCategoryRepository,
        private EntityRepository $entityRepository,
        private ProductCategoryRepository $productCategoryRepository
    ) {
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnDetail()
                ->hideOnIndex()
                ->hideOnForm(),

            TextField::new('name', 'Article'),
            TextEditorField::new('description'),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->hideOnIndex()
                ->hideOnDetail(),
            AssociationField::new('ensemble')
                ->onlyOnForms()
                ->setFormTypeOption('choice_label', 'name')
                ->setFormTypeOption('by_reference', false)
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->where('entity.shopCategory = :category')
                        ->andWhere('entity.assortiment = :isAssortiment')
                        ->setParameters([
                            'category' => $this->shopCategoryRepository->findOneByName('adults'),
                            'isAssortiment' => false
                        ]);
                }),
            CollectionField::new('ensemble', 'Ensemble')
                ->hideOnForm(),
            MoneyField::new('price', 'Prix')->setCurrency('EUR')->setRequired(true),
            BooleanField::new('available', 'Disponibilité'),
            ImageField::new('prezPicture', 'Photo de présentation')
                ->setBasePath(self::BASE_PATH)
                ->setUploadDir(self::UPLOAD_DIR)
                ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('otherpic1', 'illustartion 1')
                ->hideOnIndex()
                ->setBasePath(self::BASE_PATH)
                ->setUploadDir(self::UPLOAD_DIR)
                ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('otherpic2', 'illustartion 2')
                ->hideOnIndex()
                ->setBasePath(self::BASE_PATH)
                ->setUploadDir(self::UPLOAD_DIR)
                ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('otherpic3', 'illustartion 3')
                ->hideOnIndex()
                ->setBasePath(self::BASE_PATH)
                ->setUploadDir(self::UPLOAD_DIR)
                ->setUploadedFileNamePattern('[slug].[randomhash].[extension]')
                ->setRequired(false),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Ensemble adulte')
            ->setEntityLabelInPlural('Ensembles adulte')
            ->setPageTitle('index', ' Ensembles Adulte ')
            ->setPageTitle('detail', 'Détails de l\'ensemble')
            ->setPageTitle('new', 'Ajouter un nouvel ensemble adulte')
            ->setSearchFields(['name', 'available']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('name')
            ->add('available');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }


    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        $shopCategory = $this->shopCategoryRepository->findOneByName('adults');

        $response = $this->entityRepository->createQueryBuilder($searchDto, $entityDto, $fields, $filters)
            ->where('entity.assortiment = :ensemble')
            ->andWhere('entity.shopCategory = :adults')
            ->setParameters(['ensemble' => true, 'adults' => $shopCategory]);

        return $response;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Product) return;
        $shopCategory = $this->shopCategoryRepository->findOneByName('adults');
        $productCategory = $this->productCategoryRepository->findOneByName('adultEnsemble');


        $entityInstance->setShopCategory($shopCategory)
            ->setAssortiment(true)
            ->setProductCategory($productCategory);
        parent::persistEntity($entityManager, $entityInstance);
    }
}
