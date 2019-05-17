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
            [ 'shop_name' => 'H&M' ],
            [ 'shop_name' => 'Zara' ],
            [ 'shop_name' => 'Desigual' ],
            [ 'shop_name' => 'Jennyfer' ],
            [ 'shop_name' => 'Naf Naf' ],
            [ 'shop_name' => 'Pull & Bear' ],
            [ 'shop_name' => 'Tally Weijl' ],
            [ 'shop_name' => 'Naf Naf' ],
            [ 'shop_name' => 'Pull & Bear' ],
            [ 'shop_name' => 'Tally Weijl' ]
        ];

        $i = 0;

        foreach ($shops as $key => $shop) {
            $shopInfo = new Shop();

            $shopInfo
                ->setShopName($shop['shop_name'])
                ->setUserId($this->getReference('shop-id-'.$key));

            $manager->persist($shopInfo);

            $this->addReference('catalog-id-'.$i, $shopInfo);
            $i++;
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