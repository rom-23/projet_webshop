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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProductFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct( UserPasswordEncoderInterface $encoder )
    {
        $this -> encoder = $encoder;
    }

    public function load( ObjectManager $manager )
    {
        $faker = Factory ::create();
        for ($i = 1; $i <= 3; $i++) {
            $category = new Category();
            $category
                -> setTitle( $faker -> sentence(2) )
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
                    -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) )
                    -> setPrice( $faker -> randomFloat(2,10,200) )
                    -> setSold( false );

                $manager -> persist( $product );
                // image
                for ($t = 1; $t <= mt_rand( 4, 10 ); $t++) {
                    $image = new Image();
                    $image
                        -> setProducts( $product )
                        -> setFileName( $faker -> imageUrl() )
                        -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) );
                    $manager -> persist( $image );
                }
                //  users
                for ($f = 1; $f <= mt_rand( 2, 4 ); $f++) {
                    $user = new User();
                    $now = new \DateTime();
                    $interval = $now -> diff( $product -> getCreatedAt() );
                    $days = $interval -> days;
                    $minimum = '-' . $days . 'days'; // -100 days
                    $user
                        -> setUsername( $faker -> userName )
                        -> setEmail( $faker -> email )
                        -> setPassword( $this -> encoder -> encodePassword( $user, 'pass-' . $f ) )
                        -> setCreatedAt( $faker -> dateTimeBetween( $minimum ) );
                    $manager -> persist( $user );
                    // comment
                    for ($k = 1; $k <= mt_rand( 2, 4 ); $k++) {
                        $comment = new Comment();
                        $content = '<p>' . join( $faker -> paragraphs( 1 ), '</p><p>' ) . '</p>';
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
