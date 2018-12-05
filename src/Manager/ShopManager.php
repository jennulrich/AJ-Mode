<?php

namespace App\Manager;

use App\Entity\Shop;
use App\Repository\ShopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShopManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ShopRepository */
    private $shopRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->shopRepository = $this->entityManager->getRepository(Shop::class);
    }

    public function getList(): array
    {
        return $this->shopRepository->findAll();
    }

    public function get(int $id): Shop
    {
        /** @var $shop Shop */
        $shop = $this->shopRepository->find($id);
        $this->checkShop($shop);

        return $shop;
    }

    public function save(Shop $shop)
    {
        $this->entityManager->persist($shop);
        $this->entityManager->flush();
    }

    public function remove(?Shop $shop)
    {
        if(!$shop) {
            return;
        }

        $this->entityManager->remove($shop);
        $this->entityManager->flush();
    }

    private function checkShop(?Shop $shop)
    {
        if (!$shop) {
            throw new NotFoundHttpException('Shop not found.');
        }
    }
}
