<?php

namespace App\Controller;


use App\Repository\MembreRepository;
use App\Repository\ChambreRepository;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(): Response
    {
        $hotelName = "Mon Hôtel";
        $description = "Bienvenue à Mon Hôtel, votre destination de choix pour un séjour de luxe.";
        $imageUrl = "/path/to/image.jpg";
        
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'hotelName' => $hotelName,
            'description' => $description,
            'imageUrl' => $imageUrl,
        ]);
    }

  
    #[Route('/page', name: 'app_chambre')]
    public function chambre(ChambreRepository $repo): response
    {
        $chambres = $repo->findAll();
       // dd($chambres);
        return $this->render('app/chambre.html.twig',[
            'chambres' => $chambres,
        ]);
    }

    #[Route('/page/{id}', name: 'app_page')]
    public function page($id,ChambreRepository $repo){
        $chambre = $repo->find($id);
        return $this->render('app/page.html.twig',['chambre'=>$chambre]);
    }

    
    #[Route('/commande', name: 'app_commande')]
    public function commande(CommandeRepository $repo): response
    {
        $commandes = $repo->findAll();
        return $this->render('app/commande.html.twig',[
            'commandes' => $commandes,
        ]);
    }

  /*  #[Route('/chambre', name: 'chambre')]
    public function chambre(ChambreRepository $repo)
    {
        $chambres = $repo->findAll();

        dd($chambres);

        return $this->render('chambre.html.twig', [
            'chambres' => $chambres
        ]);

    }

   */
}
