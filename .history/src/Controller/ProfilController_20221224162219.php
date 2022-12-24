<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/logement', name: 'app_logement')]
    public function logement(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Logements de l\'utilisateur',
        ]);
    }

    #[Route('/profil/activites', name: 'app_activites')]
    public function activites(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Activites de l\'utilisateur',
        ]);
    }

    #[Route('/profil/transport', name: 'app_transport')]
    public function transport(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Transports de l\'utilisateur',
        ]);
    }
}
