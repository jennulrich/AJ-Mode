<?php

namespace App\Repository;

use App\Entity\PartnerDelivery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PartnerDelivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnerDelivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnerDelivery[]    findAll()
 * @method PartnerDelivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerDeliveryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PartnerDelivery::class);
    }

    // /**
    //  * @return PartnerDelivery[] Returns an array of PartnerDelivery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PartnerDelivery
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
