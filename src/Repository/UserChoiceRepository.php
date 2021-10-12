<?php

namespace App\Repository;

use App\Entity\UserChoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserChoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserChoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserChoice[]    findAll()
 * @method UserChoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserChoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserChoice::class);
    }

    // /**
    //  * @return UserChoice[] Returns an array of UserChoice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserChoice
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
