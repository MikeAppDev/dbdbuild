<?php

namespace App\Controller\Admin;

use App\Entity\Build;
use App\Entity\Killer;
use App\Entity\Comment;
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
        yield MenuItem::linkToRoute('Back to Site', 'fa fa-undo', 'app_home');

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Build', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Tous les Builds', 'fas fa-list', Build::class),
            MenuItem::linkToCrud('Add', 'fas fa-plus', Build::class)->setAction(Crud::PAGE_NEW),
            // MenuItem::linkToCrud('Categorys', 'fas fa-list', Category::class),
            // MenuItem::linkToCrud('Killers', 'fas fa-list', Killer::class),
        ]);

        yield MenuItem::subMenu('Categorys', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Toutes les Categorys', 'fas fa-list', Category::class),
            MenuItem::linkToCrud('Add', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Killers', 'fas fa-newspaper', Killer::class)->setSubItems([
            MenuItem::linkToCrud('Tous les Killers', 'fas fa-list', Killer::class),
            MenuItem::linkToCrud('Add', 'fas fa-plus', Killer::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Comment::class);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

    }
}
