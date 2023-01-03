<?php

namespace App\DataFixtures;

use App\Entity\Miage;
use App\Entity\Statut;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class AppFixtures extends Fixture
{


    public function __construct(private UserPasswordHasherInterface $passwordEncoder, private SluggerInterface $interface){

    }


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

        $faker = Faker\Factory::create('fr_FR');
        
        $adminUN=new User();
        $adminUN->setEmail('riadnadri@hotmail.fr');
        $adminUN->setNom('Nadri');
        $adminUN->setPrenom('Riad');
        $adminUN->setDateNaissance($faker->dateTimeBetween('-21years', '-20years'));
        $adminUN->setAdresse('6 avenue du parc 92400 Courbevoie');
        $adminUN->setTelephone(698173842);
        $adminUN->setRefMiage($nanterre);
        $adminUN->addStatut($dir);
        $adminUN->setPassword(
            $this->passwordEncoder->hashPassword($adminUN, 'admin92')
        );
        $adminUN->setRoles(['ROLE_ADMIN']);

        $manager->persist($adminUN);

        //User 1

        $faker = Faker\Factory::create('fr_FR');
        
        $user1=new User();
        $user1->setEmail($faker->email);
        $user1->setNom($faker->name);
        $user1->setPrenom('Riad');
        $user1->setDateNaissance($faker->dateTimeBetween('-26years', '-20years'));
        $user1->setAdresse($faker->address);
        $user1->setTelephone(58968296);
        $user1->setRefMiage($orleans);
        $user1->addStatut($etudiant);
        $user1->setPassword(
            $this->passwordEncoder->hashPassword($user1, 'etudiant1')
        );
        $user1->setRoles(['ROLE_USER']);

        $manager->persist($user1);

        //User 2
        
        $user2=new User();
        $user2->setEmail($faker->email);
        $user2->setNom($faker->name);
        $user2->setPrenom($faker->firstNameMale);
        $user2->setDateNaissance($faker->dateTimeBetween('-26years', '-20years'));
        $user2->setAdresse($faker->address);
        $user2->setTelephone(581069280);
        $user2->setRefMiage($orleans);
        $user2->addStatut($etudiant);
        $user2->setPassword(
            $this->passwordEncoder->hashPassword($user2, 'etudiant1')
        );
        $user2->setRoles(['ROLE_USER']);

        $manager->persist($user2);


        //User 3
        
        $user3=new User();
        $user3->setEmail($faker->email);
        $user3->setNom($faker->name);
        $user3->setPrenom($faker->firstNameMale);
        $user3->setDateNaissance($faker->dateTimeBetween('-26years', '-20years'));
        $user3->setAdresse($faker->address);
        $user3->setTelephone(296037563);
        $user3->setRefMiage($orleans);
        $user3->addStatut($teacher);
        $user3->setPassword(
            $this->passwordEncoder->hashPassword($user3, 'etudiant1')
        );
        $user3->setRoles(['ROLE_USER']);

        $manager->persist($user3);

        


        //User 4
        
        $user4=new User();
        $user4->setEmail($faker->email);
        $user4->setNom($faker->lastName);
        $user4->setPrenom($faker->firstNameFemale);
        $user4->setDateNaissance($faker->dateTimeBetween('-26years', '-20years'));
        $user4->setAdresse($faker->address);
        $user4->setTelephone(491274569);
        $user4->setRefMiage($nice);
        $user4->addStatut($etudiant);
        $user4->setPassword(
            $this->passwordEncoder->hashPassword($user4, 'etudiant1')
        );
        $user4->setRoles(['ROLE_USER']);

        $manager->persist($user4);

        //User 5
        
        $user5=new User();
        $user5->setEmail($faker->email);
        $user5->setNom($faker->lastName);
        $user5->setPrenom($faker->firstNameFemale);
        $user5->setDateNaissance($faker->dateTimeBetween('-26years', '-20years'));
        $user5->setAdresse($faker->address);
        $user5->setTelephone(491045728);
        $user5->setRefMiage($rennes);
        $user5->addStatut($membreBDE);
        $user5->setPassword(
            $this->passwordEncoder->hashPassword($user5, 'etudiant1')
        );
        $user5->setRoles(['ROLE_USER']);

        $manager->persist($user5);


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
