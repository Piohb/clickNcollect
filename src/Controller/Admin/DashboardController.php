<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Category;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     * @return Response
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(CategoryCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ClickNcollect');
    }

    public function configureMenuItems(): iterable
    {

        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Shopping'),
            MenuItem::linkToCrud('Products', 'fa fa-list', Product::class),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),


            //MenuItem::section('Users'),
            //MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            //MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
