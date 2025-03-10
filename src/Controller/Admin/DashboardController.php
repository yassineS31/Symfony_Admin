<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Article;
<<<<<<< HEAD
=======
use App\Entity\Account;
use App\Entity\Category;
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e

#[AdminDashboard(routePath: '/enigma', routeName: 'app_admin_dashboard')]
class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator){}

    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(ArticleCrudController::class)
        ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
<<<<<<< HEAD
         yield MenuItem::linkToCrud('Articles', 'fas fa-list', Article::class);
         yield MenuItem::linkToCrud('Comptes', 'fa-solid fa-users', Account::class);
         yield MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class);
=======
        yield MenuItem::linkToCrud('Articles', 'fa-solid fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Comptes', 'fa-solid fa-users', Account::class);
        yield MenuItem::linkToCrud('Categories', 'fa-solid fa-list', Category::class);
>>>>>>> 17354ff9a917947db5ea297c25544468a8e27f0e
    }
}
