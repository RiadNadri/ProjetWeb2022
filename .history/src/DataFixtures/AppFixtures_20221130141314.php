<?php

namespace App\DataFixtures;

use App\Entity\Miage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //Amiens

        $amiens=new Miage();
        $amiens->setUniversite('Amiens');
        $amiens->setNumtel(322828807);

        //Dauphine

        $dauphine=new Miage();
        $dauphine->setUniversite('Dauphine');
        $dauphine->setNumtel(144054405);

        //Sorbonne

        $sorbonne=new Miage();
        $sorbonne->setUniversite('Sorbonne');
        $sorbonne->setNumtel(144078894);

        //Orleans
        
        $orleans=new Miage();
        $orleans->setUniversite('Orléans');
        $orleans->setNumtel(238417178);
        
        //Rennes
        
        $rennes=new Miage();
        $rennes->setUniversite('Rennes');
        $rennes->setNumtel(223233911);

        //Nice
        
        $nice=new Miage();
        $nice->setUniversite('Nice');
        $nice->setNumtel(492388500);

        //STATUTS 
        
        //Etudiant
        $nice=new Statut();
        $nice->setNom('Etudiant');

        //Ancien diplômé
        $nice=new Statut();
        $nice->setNom('Ancien diplômé');

        //Enseignant
        $nice=new Statut();
        $nice->setNom('Enseignant');

        //Directeur de MIAGE
        $nice=new Statut();
        $nice->setNom('Directeur de MIAGE');

        //Membre de BDE
        $nice=new Statut();
        $nice->setNom('Membre de BDE');

        //Membre de CA de l'association
        $nice=new Statut();
        $nice->setNom('Membre de CA de l\'association');

        //Etudiant
        $nice=new Statut();
        $nice->setNom('Etudiant');
        


        $manager->persist($amiens);
        $manager->persist($dauphine);
        $manager->persist($sorbonne);
        $manager->persist($orleans);
        $manager->persist($rennes);
        $manager->persist($nice);


        $manager->flush();
    }
}
