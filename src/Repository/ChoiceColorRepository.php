<?php

namespace App\Repository;

use App\Entity\ChoiceColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChoiceColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoiceColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoiceColor[]    findAll()
 * @method ChoiceColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoiceColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoiceColor::class);
    }

    // /**
    //  * @return ChoiceColor[] Returns an array of ChoiceColor objects
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
    public function findOneBySomeField($value): ?ChoiceColor
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
