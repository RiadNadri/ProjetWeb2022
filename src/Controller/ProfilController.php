<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\EditProfileFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;



class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'user' => 'ProfilController',
        ]);
    }

    #[Route('/profil/edit', name: 'app_edit')]
    public function editProfile(Request $request, EntityManagerInterface $entityManager): Response
    {
        $edit= $this->getUser();
        $form = $this->createForm(EditProfileFormType::class, $edit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $entityManager->persist($edit);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_profil');
        }
        return $this->render('profil/edit/edit.html.twig', [
            'editType' => $form->createView(),
        ]);
    }
}
