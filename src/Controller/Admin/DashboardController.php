<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Slider;
use App\Entity\Commande;
use App\Entity\Chambre;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ChambreCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ChambreCrudController::class)->generateUrl();

        return $this->redirect($url);
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

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
            ->setTitle('Hotel');
    }

    public function configureMenuItems(): iterable
    {
        return [ 
                MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
                MenuItem::section('Membres'),
                MenuItem::linkToCrud('utilisateurs', 'fas fa-user', Membre::class),
                MenuItem::section('Commandes'),
                MenuItem::linkToCrud('commandes', 'fas fa-box', Commande::class),
                MenuItem::section('Chambres'),
                MenuItem::linkToCrud('chambres', 'fas fa-box', Chambre::class),
                MenuItem::section('Sliders'),
                MenuItem::linkToCrud('sliders', 'fas fa-clipboard', Slider::class),
                MenuItem::section('Sites général'),
                MenuItem::linkToRoute('Home','fa fa-home','app_app' )
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
