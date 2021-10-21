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

    // Public function qui permet de faire une recherche dans la categorie House et de faire l'affichage via un lien dans le menu header

    public function findSearch(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('h', 'p')
            ->join('p.house', 'h');
        if(!empty($search->maison)) {
            $query = $query
                ->andWhere('h.name LIKE :House')
                ->setParameter('House', "%{$search->maison}%");
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


//Recherche pour la partie Enfants (kids)

    public function findSearchKids(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('k', 'p')
            ->join('p.kids', 'k');
        if(!empty($search->enfant)) {
            $query = $query
                ->andWhere('k.name LIKE :enfant')
                ->setParameter('enfant', "%{$search->enfant}%");
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

        if(!empty($search->Kids)){
            $query = $query
                ->andWhere('k.id IN (:Kids)')
                ->setParameter('Kids', $search->Kids);
        }
        return $query->getQuery()->getResult();
    }

    public function findSearchBaby(SearchData $search):array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('b', 'p')
            ->join('p.baby', 'b');
        if(!empty($search->baby)) {
            $query = $query
                ->andWhere('b.name LIKE :baby')
                ->setParameter('baby', "%{$search->baby}%");
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
                ->andWhere('b.id IN (:fashions)')
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


    #### Recherche global sur tous les produits via nom, sous titre et description ###

    public function findSearchBar(SearchData $search)
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('n', 'p')
            ->join('p.name', 'n');
        if(!empty($search->name)) {
            $query = $query
                ->andWhere('p.name LIKE :name')
                ->setParameter('name', "%{$search->name}%");
        }

        return $query->getQuery()->getResult();
    }
}
