<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin')]
class AdminController extends AbstractController
{
    
    #[Route('/', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig', [
            'controller_name' => 'Utilisateurs des admins',
        ]);
    }
    
    
    
    #[Route('/users', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'controller_name' => 'Utilisateurs des admins',
        ]);
    }
}
