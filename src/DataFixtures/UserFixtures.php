<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setAddress1($faker->streetAddress);
            $user->setAddress2($faker->address);
            $user->setZipCode($faker->randomNumber(5));
            $user->setCity($faker->city);
            $user->setPhoneNumber($faker->phoneNumber);
            $user->setEmail($faker->companyEmail);
            $user->setPassword($this->passwordEncoder->encodePassword($user,
                    'test'));
            $user->setIsAdmin($faker->boolean);
            $user->setIsShop($faker->boolean);
            $user->setIsCustomer($faker->boolean);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
