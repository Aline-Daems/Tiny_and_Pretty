<?php

namespace App\Repository;

use App\Entity\TopImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TopImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TopImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TopImage[]    findAll()
 * @method TopImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TopImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TopImage::class);
    }

    // /**
    //  * @return TopImage[] Returns an array of TopImage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TopImage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
