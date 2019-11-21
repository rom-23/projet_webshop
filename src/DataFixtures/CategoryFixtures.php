<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($j = 1; $j < 10; $j++) {
            $category = new Category();
            $category -> setTitle( 'Category'. $j );
            $category -> setCatDescription( 'bla bla bla - description'. $j );
            $manager -> persist( $category );
        }
        $manager->flush();
    }
}
