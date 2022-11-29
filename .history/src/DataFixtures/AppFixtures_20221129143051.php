<?php

namespace App\DataFixtures;

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
        $amiens->setUniversite(Amiens);
        $amiens->setTel(3 22 82 88 07);
        
        $manager->persist($amiens);
        $manager->flush();
    }
}
