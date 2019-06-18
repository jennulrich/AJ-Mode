<?php

namespace App\Manager;

use App\Entity\PartnerDelivery;
use App\Repository\PartnerDeliveryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PartnerDeliveryManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var PartnerDeliveryRepository */
    private $partnerDeliveryRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->partnerDeliveryRepository = $this->entityManager->getRepository(PartnerDelivery::class);
    }

    public function getList(): array
    {
        return $this->partnerDeliveryRepository->findAll();
    }

    public function get(int $id): PartnerDelivery
    {
        /** @var $partnerDelivery PartnerDelivery */
        $partnerDelivery = $this->partnerDeliveryRepository->find($id);
        $this->checkPartnerDelivery($partnerDelivery);

        return $partnerDelivery;
    }

    public function save(PartnerDelivery $partnerDelivery)
    {
        $this->entityManager->persist($partnerDelivery);
        $this->entityManager->flush();
    }

    public function remove(?PartnerDelivery $partnerDelivery)
    {
        if(!$partnerDelivery) {
            return;
        }

        $this->entityManager->remove($partnerDelivery);
        $this->entityManager->flush();
    }

    private function checkPartnerDelivery(?PartnerDelivery $partnerDelivery)
    {
        if (!$partnerDelivery) {
            throw new NotFoundHttpException('Partner delivery not found.');
        }
    }
}
