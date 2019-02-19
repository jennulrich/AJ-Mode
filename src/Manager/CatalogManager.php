<?php

namespace App\Manager;

use App\Entity\Catalog;
use App\Repository\CatalogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CatalogManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CatalogRepository */
    private $catalogRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->catalogRepository = $this->entityManager->getRepository(Catalog::class);
    }

    public function getList(): array
    {
        return $this->catalogRepository->findAll();
    }

    public function get(int $id): Catalog
    {
        /** @var $catalog Catalog */
        $catalog = $this->catalogRepository->find($id);
        $this->checkCatalog($catalog);

        return $catalog;
    }

    public function save(Catalog $catalog)
    {
        $this->entityManager->persist($catalog);
        $this->entityManager->flush();
    }

    public function remove(?Catalog $catalog)
    {
        if(!$catalog) {
            return;
        }

        $this->entityManager->remove($catalog);
        $this->entityManager->flush();
    }

    private function checkCatalog(?Catalog $catalog)
    {
        if (!$catalog) {
            throw new NotFoundHttpException('Catalog not found.');
        }
    }
}
