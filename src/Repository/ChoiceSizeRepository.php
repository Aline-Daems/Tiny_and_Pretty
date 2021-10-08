<?php

namespace App\Repository;

use App\Entity\ChoiceSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChoiceSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoiceSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoiceSize[]    findAll()
 * @method ChoiceSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoiceSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoiceSize::class);
    }

    // /**
    //  * @return ChoiceSize[] Returns an array of ChoiceSize objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChoiceSize
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
