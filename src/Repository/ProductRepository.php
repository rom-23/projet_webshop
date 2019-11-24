<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class ProductRepository extends ServiceEntityRepository
{
    /**
     * ProductRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct( ManagerRegistry $registry )
    {
        parent ::__construct( $registry, Product::class );
    }

    /**
     * @return Product[]
     * retourne les 6 derniers enregistrements, affiche sur page accueil product
     */
    public function findLatestProduct()
    {
        return $this -> findVisibleQuery()
            ->orderBy('p.id', 'desc')
            ->setMaxResults(6)
            -> getQuery()
            -> getResult();
    }

    /**
     * @param ProductSearch $search
     * @return Query
     * retourne tous les produits non vendus, avec ou sans les parametres de filtres ( price et specificities )
     */
    public function findAllVisibleQuery( ProductSearch $search)
    {
        $query = $this -> findVisibleQuery();
        if($search -> getMaxPrice()) {
            $query = $query
                -> andWhere( 'p.price <= :maxprice' )
                -> setParameter( 'maxprice', $search -> getMaxPrice() );
        }
        if($search -> getMinPrice()) {
            $query = $query
                -> andWhere( 'p.price >= :minprice' )
                -> setParameter( 'minprice', $search -> getMinPrice() );
        }
        if($search -> getOptions() -> count() > 0) {
            $k = 0;
            foreach ($search -> getOptions() as $option) {
                $k++;
                $query = $query
                    -> andWhere( ":option$k MEMBER OF p.specificities" )
                    -> setParameter( "option$k", $option );
            }
        }
        return $query -> getQuery();
    }

    /**
     * @return QueryBuilder
     */
    private function findVisibleQuery()
    {
        return $this -> createQueryBuilder( 'p' )
            -> where( 'p.sold = 0' );
    }

}
