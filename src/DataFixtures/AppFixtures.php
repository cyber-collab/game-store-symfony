<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setTitle('Category 1');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setTitle('Category 2');
        $manager->persist($category2);

        $subcategory1 = new Subcategory();
        $subcategory1->setName('Subcategory 1');
        $subcategory1->addCategory($category1);
        $subcategory1->addCategory($category2);
        $manager->persist($subcategory1);

        $subcategory2 = new Subcategory();
        $subcategory2->setName('Subcategory 2');
        $subcategory2->addCategory($category1);
        $manager->persist($subcategory2);

        $manager->flush();
    }
}
