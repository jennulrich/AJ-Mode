<?php

namespace App\DataFixtures;

use App\Entity\Catalog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class CatalogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 produits
        for ($i = 0; $i < 10; $i++) {
            $catalog = new Catalog();
            $catalog->setRef('REF'.$faker->randomNumber(5));
            $catalog->setTitle($faker->words(3, true));
            $catalog->setImage($faker->imageUrl());
            $catalog->setDescription($faker->text());
            $catalog->setPrice($faker->numberBetween(1, 500));
            $catalog->setStock($faker->numberBetween(1, 50));
            $catalog->setCategory($faker->sentence(1));
            $catalog->setComposition($faker->sentence(3));
            $manager->persist($catalog);
        }
        $manager->flush();
    }
}