<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('root');
        $user->setEmail('root@locah.com');
        $user->setPassword('root');
        $manager->persist($user);
        $manager->flush();
    }
}
