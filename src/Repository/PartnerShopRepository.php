<?php

namespace App\Repository;

use App\Entity\PartnerShop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PartnerShop|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnerShop|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnerShop[]    findAll()
 * @method PartnerShop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerShopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PartnerShop::class);
    }

    // /**
    //  * @return PartnerShop[] Returns an array of PartnerShop objects
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
    public function findOneBySomeField($value): ?PartnerShop
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
