<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/profil', name: 'app_profil')]
class ProfilController extends AbstractController
{
    #[Route('/', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/logement', name: 'app_profil')]
    public function logement(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Logements de l\'utilisateur',
        ]);
    }

    #[Route('/activites', name: 'app_profil')]
    public function activites(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Activites de l\'utilisateur',
        ]);
    }

    #[Route('/transport', name: 'app_profil')]
    public function transport(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Transports de l\'utilisateur',
        ]);
    }
}
