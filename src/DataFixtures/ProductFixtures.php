<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Image;
use App\Entity\Product;
use App\Entity\User;
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
                $product
                    -> setName( $faker -> sentence() )
                    -> setDescription( $faker -> sentence() )
                    -> setCategory( $category )
                    -> setImage( $faker -> imageUrl() )
                    -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) );
                $manager -> persist( $product );
                // image
                for ($t = 1; $t <= mt_rand( 4, 10 ); $t++) {
                    $image = new Image();
                    $image
                        -> setProducts( $product)
                        -> setFileName( $faker -> imageUrl() )
                        -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) );
                    $manager -> persist( $image );
                }
                    //  users
                    for ($f = 1; $f <= mt_rand( 4, 8 ); $f++) {
                        $user = new User();
                        $user
                            -> setUsername( $faker -> name )
                            -> setEmail( $faker -> email )
                            -> setPassword( 'pass-' . $f );
                        $manager -> persist( $user );
                        for ($k = 1; $k <= mt_rand( 4, 10 ); $k++) {
                            $comment = new Comment();
                            $content = '<p>' . join( $faker -> paragraphs( 1 ), '</p><p>' ) . '</p>';
                            $now = new \DateTime();
                            $interval = $now -> diff( $product -> getCreatedAt() );
                            $days = $interval -> days;
                            $minimum = '-' . $days . 'days'; // -100 days
                            $comment
                                -> setProducts( $product )
                                -> setAuthor( $faker -> name )
                                -> setContent( $content )
                                -> setCreatedAt( $faker -> dateTimeBetween( $minimum ) )
                                -> setUser( $user );
                            $manager -> persist( $comment );
                        }
                    }
                }
            }
            $manager -> flush();
        }


    }
