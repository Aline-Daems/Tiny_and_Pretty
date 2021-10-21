<?php

namespace App\Controller\Admin;

use App\Entity\Colors;
use App\Entity\baby;
use App\Entity\Kids;
use App\Entity\Carrier;
use App\Entity\House;
use App\Entity\Newsletter;
use App\Entity\Order;
use App\Entity\Products;
use App\Entity\Sizes;
use App\Entity\Toys;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(OrderCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tiny and Pretty');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-shopping-cart', Order::class);
        yield MenuItem::linkToCrud('Bébés', 'fas fa-tshirt', baby::class);
        yield MenuItem::linkToCrud('Enfants', 'fas fa-tshirt', Kids::class);
        yield MenuItem::linkToCrud('A la maison', 'fas fa-home', House::class);
        yield MenuItem::linkToCrud('Jouets', 'fas fa-gamepad', Toys::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-tag', Products::class);
        yield MenuItem::linkToCrud('Taille', 'fas fa-ruler', Sizes::class);
        yield MenuItem::linkToCrud('Couleur', 'fas fa-palette', Colors::class);
        yield MenuItem::linkToCrud('Transport', 'fas fa-truck', Carrier::class);
        yield MenuItem::linkToCrud('Newsletter', 'fas fa-envelope', Newsletter::class);

    }
}
