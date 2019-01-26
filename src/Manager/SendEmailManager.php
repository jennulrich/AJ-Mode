<?php

namespace App\Manager;

use App\Entity\SendEmail;
use App\Repository\SendEmailRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SendEmailManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var SendEmailRepository */
    private $sendEmailRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->sendEmailRepository = $this->entityManager->getRepository(SendEmail::class);
    }

    public function getList(): array
    {
        return $this->sendEmailRepository->findAll();
    }

    public function get(int $id): SendEmail
    {
        /** @var $sendEmail SendEmail */
        $sendEmail = $this->sendEmailRepository->find($id);
        $this->checkSendEmail($sendEmail);

        return $sendEmail;
    }

    public function save(SendEmail $sendEmail)
    {
        $this->entityManager->persist($sendEmail);
        $this->entityManager->flush();
    }

    public function remove(?SendEmail $sendEmail)
    {
        if(!$sendEmail) {
            return;
        }

        $this->entityManager->remove($sendEmail);
        $this->entityManager->flush();
    }

    private function checkSendEmail(?SendEmail $sendEmail)
    {
        if (!$sendEmail) {
            throw new NotFoundHttpException('Email not found.');
        }
    }
}
