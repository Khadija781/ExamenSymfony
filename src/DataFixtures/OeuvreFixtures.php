<?php

namespace App\DataFixtures;

use App\Entity\Oeuvre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class OeuvreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //instancier faker
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $oeuvre = new Oeuvre();
            $oeuvre->setName($faker->unique()->sentence(3));
            $oeuvre->setDescription($faker->text);
            $oeuvre->setImage($faker->image('public/img/imageOeuvre', 800, 450, null, false));
            
            $randomCategory = random_int(0, 2);
            $oeuvre->setCategory($this->getReference("categorie$randomCategory"));

            $randomArtiste = random_int(0, 5);
            $oeuvre->setArtiste($this->getReference("artiste$randomArtiste"));

            $manager->persist($oeuvre);

        }

        $manager->flush();
    }


    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            ArtisteFixtures::class
        ];
    }
}
