<?php

namespace App\DataFixtures;

use App\Entity\Shop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ShopFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $shops = [
            [
                'shop_name' => 'H&M',
                'address' => '88 Rue de Rivoli 75004 Paris',
                'owner' => 'test',
                'email' => 'test@test.fr',
                'phone' => '0 805 08 88 88'
            ],
            [
                'shop_name' => 'Zara',
                'address' => '45 Rue de Rennes 75006 Paris',
                'owner' => 'test',
                'email' => 'test@test.fr',
                'phone' => '01 44 39 03 50'
            ]
        ];

        foreach ($shops as $key => $shop) {
            $shopInfo = new Shop();
            $shopInfo
                ->setShopName($shop['shop_name'])
                ->setAddress($shop['address'])
                ->setOwner($shop['owner'])
                ->setEmail($shop['email'])
                ->setPhone($shop['phone'])
                ->setUserId($this->getReference('shop-id-'.$key));

            $manager->persist($shopInfo);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}