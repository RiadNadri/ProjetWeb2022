<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    
    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig', [
            'controller_name' => 'Utilisateurs des admins',
        ]);
    }
    

    #[Route('/admin/users', name: 'app_user')]
    public function user(): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'controller_name' => 'Utilisateurs des admins',
        ]);
    }

    #[Route('/admin/partenaire', name: 'app_partenaire')]
    public function partenaire(): Response
    {
        return $this->render('admin/partners/partenaire.html.twig', [
            'controller_name' => 'Utilisateurs des admins',
        ]);
    }
}
