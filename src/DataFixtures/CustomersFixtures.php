<?php

namespace App\DataFixtures;

use App\Entity\Customers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class CustomersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 clients
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customers();
            $customer->setFirstname($faker->firstName);
            $customer->setLastname($faker->lastName);
            $customer->setAddress1($faker->streetAddress);
            $customer->setAddress2($faker->address);
            $customer->setZipCode($faker->randomNumber(5));
            $customer->setCity($faker->city);
            $customer->setEmail($faker->email);
            $customer->setPhoneNumber($faker->phoneNumber);
            $manager->persist($customer);
        }
        $manager->flush();
    }
}