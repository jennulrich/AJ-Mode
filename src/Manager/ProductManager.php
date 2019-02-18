<?php

namespace App\Manager;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ProductRepository */
    private $productRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->productRepository = $this->entityManager->getRepository(Product::class);
    }

    public function getList(): array
    {
        return $this->productRepository->findAll();
    }

    public function get(int $id): Product
    {
        /** @var $product Product */
        $product = $this->productRepository->find($id);
        $this->checkProduct($product);

        return $product;
    }

    private function checkProduct(?Product $product)
    {
        if (!$product) {
            throw new NotFoundHttpException('Product not found.');
        }
    }
}