<?php

namespace App\Repository;

use App\Entity\baby;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method baby|null find($id, $lockMode = null, $lockVersion = null)
 * @method baby|null findOneBy(array $criteria, array $orderBy = null)
 * @method baby[]    findAll()
 * @method baby[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BabyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, baby::class);
    }

    // /**
    //  * @return baby[] Returns an array of baby objects
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
    public function findOneBySomeField($value): ?baby
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
