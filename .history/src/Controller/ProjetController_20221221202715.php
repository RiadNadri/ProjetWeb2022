<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('projet/accueil.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    // #[Route('/connexion', name: 'app_connexion')]
    // public function connexion(): Response
    // {
    //     return $this->render('connexion.html.twig', [
    //         'controller_name' => 'ProjetController',
    //     ]);
    // }


}
