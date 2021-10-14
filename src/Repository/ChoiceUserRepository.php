<?php

namespace App\Repository;

use App\Entity\ChoiceUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChoiceUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoiceUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoiceUser[]    findAll()
 * @method ChoiceUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoiceUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoiceUser::class);
    }

    // /**
    //  * @return ChoiceUser[] Returns an array of ChoiceUser objects
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
    public function findOneBySomeField($value): ?ChoiceUser
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
