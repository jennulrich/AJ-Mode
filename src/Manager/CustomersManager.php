<?php

namespace App\Manager;

use App\Entity\Customers;
use App\Repository\CustomersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomersManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CustomersRepository */
    private $customersRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->customersRepository = $this->entityManager->getRepository(Customers::class);
    }

    public function getList(): array
    {
        return $this->customersRepository->findAll();
    }

    public function get(int $id): Customers
    {
        /** @var $customers Customers */
        $customer = $this->customersRepository->find($id);
        $this->checkCustomer($customer);

        return $customer;
    }

    public function save(Customers $customers)
    {
        $this->entityManager->persist($customers);
        $this->entityManager->flush();
    }

    public function remove(?Customers $customers)
    {
        if(!$customers) {
            return;
        }

        $this->entityManager->remove($customers);
        $this->entityManager->flush();
    }

    private function checkCustomer(?Customers $customers)
    {
        if (!$customers) {
            throw new NotFoundHttpException('Customer not found.');
        }
    }
}
