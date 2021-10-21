<?php

namespace App\Repository;

use App\Entity\DatePicker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DatePicker|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatePicker|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatePicker[]    findAll()
 * @method DatePicker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatePickerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DatePicker::class);
    }

    // /**
    //  * @return DatePicker[] Returns an array of DatePicker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DatePicker
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
