<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\User;
use App\Form\RFormType;
use App\Form\ActiviteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function reservation(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    #[Route('/reservation/activite', name: 'app_activite')]
    public function activite(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $activite= $this->getUser();
        $form = $this->createForm(ActiviteFormType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $entityManager->persist($activite);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_reservation');
        }
        return $this->render('reservation/Activités/activite.html.twig', [
            'activiteForm' => $form->createView(),
        ]);
    }

    #[Route('/reservation/titret', name: 'app_titre')]
    public function titre(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }
}
