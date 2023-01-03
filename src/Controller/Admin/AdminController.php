<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\PartenaireRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


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
    public function user(UserRepository $user): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'user' => $user -> findBy([], ['id'=> 'asc'])
        ]);
    }

    #[Route('/admin/partenaire', name: 'app_part')]
    public function partenaire(PartenaireRepository $partenaire): Response
    {
        return $this->render('admin/partners/partenaire.html.twig', [
            'partenaire' => $partenaire -> findBy([], ['id'=> 'asc'])
        ]);
    }

}
