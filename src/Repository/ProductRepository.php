<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
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
     */
    public function findLatestProduct()
    {
        return $this -> findVisibleQuery()
            ->orderBy('p.id', 'desc')
            ->setMaxResults(8)
            -> getQuery()
            -> getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function findVisibleQuery()
    {
        return $this -> createQueryBuilder( 'p' );
//            -> where( 'p.sold = 0' );
    }

}
