<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 produits
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName($faker->name);
            $product->setImage($faker->imageUrl());
            $product->setPrice($faker->numberBetween(50, 500));
            $product->setSlug($faker->slug);
            $product->setDescription($faker->text(500));
            $product->setStock($faker->numberBetween(10, 40));

            $manager->persist($product);
        }
        $manager->flush();
    }
}