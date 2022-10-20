<?php

namespace App\Controller\Admin;

use App\Entity\Build;
use App\Entity\Killer;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Build', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Tous les Builds', 'fas fa-newspaper', Build::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Build::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Categorys', 'fas fa-list', Category::class),
            MenuItem::linkToCrud('Killers', 'fas fa-list', Killer::class),
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
