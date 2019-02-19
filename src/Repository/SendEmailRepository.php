<?php

namespace App\Repository;

use App\Entity\SendEmail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SendEmail|null find($id, $lockMode = null, $lockVersion = null)
 * @method SendEmail|null findOneBy(array $criteria, array $orderBy = null)
 * @method SendEmail[]    findAll()
 * @method SendEmail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SendEmailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SendEmail::class);
    }

    // /**
    //  * @return SendEmail[] Returns an array of SendEmail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SendEmail
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
