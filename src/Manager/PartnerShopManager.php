<?php

namespace App\Manager;

use App\Entity\PartnerShop;
use App\Repository\PartnerShopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PartnerShopManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var PartnerShopRepository */
    private $partnerShopRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->partnerShopRepository = $this->entityManager->getRepository(PartnerShop::class);
    }

    public function getList(): array
    {
        return $this->partnerShopRepository->findAll();
    }

    public function get(int $id): PartnerShop
    {
        /** @var $partnerShop PartnerShop */
        $partnerShop = $this->partnerShopRepository->find($id);
        $this->checkPartnerShop($partnerShop);

        return $partnerShop;
    }

    public function save(PartnerShop $partnerShop)
    {
        $this->entityManager->persist($partnerShop);
        $this->entityManager->flush();
    }

    public function remove(?PartnerShop $partnerShop)
    {
        if(!$partnerShop) {
            return;
        }

        $this->entityManager->remove($partnerShop);
        $this->entityManager->flush();
    }

    private function checkPartnerShop(?PartnerShop $partnerShop)
    {
        if (!$partnerShop) {
            throw new NotFoundHttpException('Partner Shop not found.');
        }
    }
}
