<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('admin/users', name: 'app_users')]
class UsersController extends AbstractController
{
    #[Route('/', name: 'app_users')]
    public function index(): Response
    {
        return $this->render('Admin/Users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
}
