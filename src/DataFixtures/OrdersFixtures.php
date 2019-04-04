<?php

namespace App\DataFixtures;

use App\Entity\Orders;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class OrdersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $orders = [
            [
                'order_number' => '201908250012',
                'amount' => 90,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250013',
                'amount' => 15,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250014',
                'amount' => 22,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250025',
                'amount' => 150,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250030',
                'amount' => 26,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250018',
                'amount' => 48,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '2019082500101',
                'amount' => 34,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250011',
                'amount' => 73,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '2019082500199',
                'amount' => 58,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ],
            [
                'order_number' => '201908250098',
                'amount' => 42,
                'ordered_at' => '2019-12-06',
                'shipped_at' => '2019-12-06',
                'status' => 'Expédié'
            ]
        ];

        //$i = 0;

        foreach ($orders as $key => $order) {
            $orderInfo = new Orders();

            $orderInfo
                ->setOrderNumber($order['order_number'])
                ->setAmount($order['amount'])
                ->setOrderedAt(new \DateTime($order['ordered_at']))
                ->setShippedAt(new \DateTime($order['shipped_at']))
                ->setStatus($order['status'])
                ->setUserId($this->getReference('order-id-'.$key));

            $manager->persist($orderInfo);

            //$this->addReference('catalog-id-'.$i, $shopInfo);
            //$i++;
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
