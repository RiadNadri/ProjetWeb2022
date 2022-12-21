<?php

namespace App\DataFixtures;

use App\Entity\Miage;
use App\Entity\Statut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //MIAGE
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

        //Nanterre
        
        $nanterre=new Miage();
        $nanterre->setUniversite('Nanterre');
        $nanterre->setNumtel(140977200);

        //STATUTS 
        
        //Etudiant
        $etudiant=new Statut();
        $etudiant->setNom('Etudiant');

        //Ancien diplômé
        $diplome=new Statut();
        $diplome->setNom('Ancien diplômé');

        //Enseignant
        $teacher=new Statut();
        $teacher->setNom('Enseignant');

        //Directeur de MIAGE
        $dir=new Statut();
        $dir->setNom('Directeur de MIAGE');

        //Membre de BDE
        $membreBDE=new Statut();
        $membreBDE->setNom('Membre de BDE');

        //Membre de CA de l'association
        $membreCA=new Statut();
        $membreCA->setNom('Membre de CA de l\'association');



        //1er admin
        $adminUN=new User();
        $adminUN=setEmail('riadnadri@hotmail.fr');
        $adminUN=setNom('Nadri');
        $adminUN=setPrenom('Riad');
        $adminUN=set(2002-01-27);
        $adminUN=setAdresse('6 avenue du parc 92400 Courbevoie');
        $adminUN=setTelephone(698173842);
        $adminUN=setRefMiage($nanterre);
        $adminUN=setStatut($dir);
        $adminUN=setPassword(
            $this->passwordEncoder($adminUN, 'admin92')
        );
        $adminUN=setRole(['ROLE_ADMIN']);

        $manager->persist($adminUN);


        $manager->persist($amiens);
        $manager->persist($dauphine);
        $manager->persist($sorbonne);
        $manager->persist($orleans);
        $manager->persist($rennes);
        $manager->persist($nice);
        $manager->persist($nanterre);

        $manager->persist($etudiant);
        $manager->persist($diplome);
        $manager->persist($teacher);
        $manager->persist($dir);
        $manager->persist($membreBDE);
        $manager->persist($membreCA);


        $manager->flush();
    }
}
