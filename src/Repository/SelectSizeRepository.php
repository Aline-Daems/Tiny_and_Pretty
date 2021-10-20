<?php

namespace App\Repository;

use App\Entity\SelectSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SelectSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method SelectSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method SelectSize[]    findAll()
 * @method SelectSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SelectSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SelectSize::class);
    }

    // /**
    //  * @return SelectSize[] Returns an array of SelectSize objects
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
    public function findOneBySomeField($value): ?SelectSize
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
