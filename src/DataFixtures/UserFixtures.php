<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class UserFixtures extends Fixture
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
        $user = new User();
        $user -> setUsername( 'admin' );
        $user -> setEmail( 'admin@admin.com' );
        $user -> setPassword( $this -> encoder -> encodePassword( $user, 'admin' ) );
        $user -> setCreatedAt( $faker -> dateTimeBetween( '-6 months' ) );
        $manager -> persist( $user );
        $manager -> flush();
    }
}