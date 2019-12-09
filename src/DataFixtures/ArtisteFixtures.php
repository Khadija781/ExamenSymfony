<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class ArtisteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $artiste = new Artiste();
            $artiste->setName($faker->unique()->sentence(2));
            $artiste->setPhoto($faker->image('public/img/imageArtiste', 800, 450, 'people', false));
            
            $this->addReference("artiste$i", $artiste);

            $manager->persist($artiste);
        }

        $manager->flush();
    }
}
