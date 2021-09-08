<?php

namespace App\Repository;

use App\Entity\ContactPartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactPartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactPartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactPartner[]    findAll()
 * @method ContactPartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactPartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactPartner::class);
    }

    // /**
    //  * @return ContactPartner[] Returns an array of ContactPartner objects
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
    public function findOneBySomeField($value): ?ContactPartner
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
