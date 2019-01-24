<?php

namespace App\Manager;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ContactRepository */
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $this->entityManager->getRepository(Contact::class);
    }

    public function getList(): array
    {
        return $this->contactRepository->findAll();
    }

    public function get(int $id): Contact
    {
        /** @var $contact Contact */
        $contact = $this->contactRepository->find($id);
        $this->checkContact($contact);

        return $contact;
    }

    public function save(Contact $contact)
    {
        $this->entityManager->persist($contact);
        $this->entityManager->flush();
    }

    public function remove(?Contact $contact)
    {
        if(!$contact) {
            return;
        }

        $this->entityManager->remove($contact);
        $this->entityManager->flush();
    }

    private function checkContact(?Contact $contact)
    {
        if (!$contact) {
            throw new NotFoundHttpException('Email not found.');
        }
    }
}
