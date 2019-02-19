<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var UserRepository */
    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function getList(): array
    {
        return $this->userRepository->findAll();
    }

    public function get(int $id): User
    {
        /** @var $user User */
        $user = $this->userRepository->find($id);
        $this->checkUser($user);

        return $user;
    }

    public function save(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function remove(?User $user)
    {
        if(!$user) {
            return;
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    private function checkUser(?User $user)
    {
        if (!$user) {
            throw new NotFoundHttpException('User not found.');
        }
    }
}
