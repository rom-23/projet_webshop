<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture
{
    public function load( ObjectManager $manager )
    {
        $faker = Factory ::create();
        for ($i = 1; $i <= 3; $i++) {
            $category = new Category();
            $category
                -> setTitle( $faker -> sentence() )
                -> setCatDescription( $faker -> paragraph() );
            $manager -> persist( $category );
            // fake pour produits
            for ($j = 1; $j <= mt_rand( 4, 6 ); $j++) {
                $product = new Product();
                $content = '<p>' . join( $faker -> paragraphs( 1 ), '</p><p>' ) . '</p>';
                $product
                    -> setName( $faker -> sentence() )
                    -> setDescription( $content )
                    -> setCategory( $category )
                    -> setImage( $faker -> imageUrl() )
                    -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) );
                $manager -> persist( $product );
            }
        }
        $manager -> flush();
    }
}
