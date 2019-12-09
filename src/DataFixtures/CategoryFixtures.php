<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categ = ['peinture','dessin', 'sculture'];

        for ($i = 0; $i < count($categ); $i++){
            $category = new Category();
            $category->setName($categ[$i]);
            $this->addReference("categorie$i", $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
