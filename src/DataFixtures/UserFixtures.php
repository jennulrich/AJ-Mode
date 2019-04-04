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
        $this->loadAdmin($manager);
        $this->loadCustomer($manager);
        $this->loadShop($manager);
        $this->loadUser($manager);
    }

    public function loadAdmin(ObjectManager $manager)
    {
        // On configure dans quelle langue nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // On créé 2 administrateurs
        for ($i = 0; $i < 2; $i++) {
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
            $user->setIsAdmin(true);
            $user->setIsShop(false);
            $user->setIsCustomer(false);
            $user->setIsUser(false);

            $manager->persist($user);
        }
        $manager->flush();
    }

    public function loadCustomer(ObjectManager $manager)
    {
        // On configure dans quelle langue nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // On créé 10 clients
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
            $user->setIsAdmin(false);
            $user->setIsShop(false);
            $user->setIsCustomer(true);
            $user->setIsUser(false);

            $manager->persist($user);
        }
        $manager->flush();
    }

    public function loadShop(ObjectManager $manager)
    {
        // On configure dans quelle langue nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // On créé 10 gérants de boutique
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
            $user->setIsAdmin(false);
            $user->setIsShop(true);
            $user->setIsCustomer(false);
            $user->setIsUser(false);

            $manager->persist($user);

            $this->addReference('shop-id-'.$i, $user);
        }
        $manager->flush();
    }

    public function loadUser(ObjectManager $manager)
    {
        // On configure dans quelle langue nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // On créé 10 gérants de boutique
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
            $user->setIsAdmin(false);
            $user->setIsShop(false);
            $user->setIsCustomer(false);
            $user->setIsUser(true);

            $manager->persist($user);

            $this->addReference('order-id-'.$i, $user);
        }
        $manager->flush();
    }
}
