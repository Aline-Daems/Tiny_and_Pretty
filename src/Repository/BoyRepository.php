<?php

namespace App\Repository;

use App\Entity\Kids;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kids|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kids|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kids[]    findAll()
 * @method Kids[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kids::class);
    }

    // /**
    //  * @return Kids[] Returns an array of Kids objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kids
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
