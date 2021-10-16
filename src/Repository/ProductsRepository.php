<?php

namespace App\Repository;

use App\Classe\Search;
use App\Data\SearchData;
use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Stripe\Product;

/**
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Products::class);
    }

    /**
     * Requête qui permet de récup les produits en fonction de la search
     * @return Product[]
     */

    /**
     * @return Products[] Returns an array of Products objects
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public function findSizeByProduct(): array {
        $sql = "SELECT sizes.name FROM products_sizes JOIN sizes on products_sizes.sizes_id = sizes.id";


        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }




    public function findOneBySomeField($value): ?Products
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // Public function qui permet de faire une recherche dans la categorie maison et de faire l'affichage via un lien dans le menu header

    public function findSearch(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('h', 'p')
            ->join('p.maison', 'h');
        if(!empty($search->maison)) {
            $query = $query
                ->andWhere('h.name LIKE :maison')
                ->setParameter('maison', "%{$search->maison}%");
        }
        if(!empty($search->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', $search->min*100);
        }
        if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', $search->max*100);
        }
        if(!empty($search->house)){
            $query = $query
                ->andWhere('h.id IN (:house)')
                ->setParameter('house', $search->house);
        }
        return $query->getQuery()->getResult();
    }

    // public function qui permet de faire une recherche dans la catégories graçon uniquement et fair un affichage via les liens dans le menu (header)

//    public function findSearchBoy(SearchData $search):array
//    {
//        $query = $this
//            ->createQueryBuilder('p')
//            ->select('b', 'p')
//            ->join('p.boy', 'b');
//        if(!empty($search->garcon)) {
//            $query = $query
//                ->andWhere('b.name LIKE :garcon')
//                ->setParameter('garcon', "%{$search->garcon}%");
//        }
//        // Recherche par prix minimum et maximum
//        if(!empty($search->min)){
//            $query = $query
//                ->andWhere('p.price >= :min')
//                ->setParameter('min', $search->min*100);
//        }
//        if(!empty($search->max)){
//            $query = $query
//                ->andWhere('p.price <= :max')
//                ->setParameter('max', $search->max*100);
//        }
//
//        if(!empty($search->boys)){
//            $query = $query
//                ->andWhere('b.id IN (:boys)')
//                ->setParameter('boys', $search->boys);
//        }
//        return $query->getQuery()->getResult();
//    }

    public function findSearchBaby(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('m', 'p')
            ->join('p.mode', 'm');
        if(!empty($search->mode)) {
            $query = $query
                ->andWhere('m.name LIKE :mode')
                ->setParameter('mode', "%{$search->mode}%");
        }
        // Recherche par prix minimum et maximum
        if(!empty($search->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', $search->min*100);
        }
        if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', $search->max*100);
        }

        if(!empty($search->fashions)){
            $query = $query
                ->andWhere('m.id IN (:fashions)')
                ->setParameter('fashions', $search->fashions);
        }
        return $query->getQuery()->getResult();
    }

    public function findSearchToy(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('j', 'p')
            ->join('p.toys', 'j');
        if(!empty($search->jouet)) {
            $query = $query
                ->andWhere('j.name LIKE :jouet')
                ->setParameter('jouet', "%{$search->jouet}%");
        }
        // Recherche par prix minimum et maximum
        if(!empty($search->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', $search->min*100);
        }
        if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', $search->max*100);
        }

        if(!empty($search->toys)){
            $query = $query
                ->andWhere('j.id IN (:toys)')
                ->setParameter('toys', $search->toys);
        }
        return $query->getQuery()->getResult();
    }

    public function findSizeType(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('s', 'p')
            ->join('p.size', 's');
        if(!empty($search->taille)) {
            $query = $query
                ->andWhere('s.name LIKE :taille')
                ->setParameter('taille', "%{$search->taille}%");
        }

        if(!empty($search->size)){
            $query = $query
                ->andWhere('s.id IN (:size)')
                ->setParameter('size', $search->size);
        }
        return $query->getQuery()->getResult();
    }
}
