<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use App\Entity\TitreTransport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $faker = Faker\Factory::create('fr_FR');

        // TITRE DE TRANSPORT

        //Navigo
        $navigo = new TitreTransport();
        $navigo-> setTitre('Navigo');

        $manager->persist($navigo);

        //Ticket t+
        $ticket = new TitreTransport();
        $ticket-> setTitre('Ticket t+');
        
        $manager->persist($ticket);

        //Améthyste
        $amethyste = new TitreTransport();
        $amethyste-> setTitre('Améthyste');

        $manager->persist($amethyste);

        //Antipollution
        $antipol = new TitreTransport();
        $antipol-> setTitre('Antipollution');

        $manager->persist($antipol);


        // ACTIVITES

        $sitenodejs = new Activite();
        $sitenodejs->setNom('Site web Node JS');
        $sitenodejs->setDate($faker->dateTimeBetween('2023-05-25T00:00:00.000Z', '2023-06-10T00:00:00.000Z'));
        $sitenodejs->setDescription('Tentez de réaliser un site web en utilisant le framework Noje JS !');

        $manager->persist($sitenodejs);


        $match = new Activite();
        $match->setNom('Match de foot');
        $match->setDate($faker->dateTimeBetween('2023-05-25T00:00:00.000Z', '2023-06-10T00:00:00.000Z'));
        $match->setDescription('Venez participer à un super match de football à 11 contre 11 !');

        $manager->persist($match);


        $bowling = new Activite();
        $bowling->setNom('Bowling');
        $bowling->setDate($faker->dateTimeBetween('2023-05-25T00:00:00.000Z', '2023-06-10T00:00:00.000Z'));
        $bowling->setDescription('Venez faire une partie de bowling accompagné d\'étudiant en Master ! ');

        $manager->persist($bowling);

        $tri = new Activite();
        $tri->setNom('Algorithme de tri');
        $tri->setDate($faker->dateTimeBetween('2023-05-25T00:00:00.000Z', '2023-06-10T00:00:00.000Z'));
        $tri->setDescription('Faites vos preuves en code et essayez de développer l\'algorithme de tri le plus efficace possible !');

        $manager->persist($tri);

        $manager->flush();
    }
}
