<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\KidVesteCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(KidVesteCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Benevewax');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::subMenu('Boutique Enfants', 'fas fa-baby')->setSubItems([
            MenuItem::linkToCrud('Chaussures', 'fas fa-shoe-prints', Product::class)
                ->setController(KidShoesCrudController::class),
            MenuItem::linkToCrud('Vestes', 'fas fa-vest', Product::class)
                ->setController(KidVesteCrudController::class),
        ]);

        yield MenuItem::subMenu('Boutique Adultes', 'fas fa-person')->setSubItems([
            MenuItem::linkToCrud('Chaussures', 'fas fa-shoe-prints', Product::class)
                ->setController(AdultShoesCrudController::class),
            MenuItem::linkToCrud('Vestes', 'fas fa-vest', Product::class)
                ->setController(AdultVesteCrudController::class),
        ]);
    }
}
