<?php

namespace App\Repository;

use App\Entity\Specificities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Specificities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specificities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specificities[]    findAll()
 * @method Specificities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecificitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specificities::class);
    }

    // /**
    //  * @return Specificities[] Returns an array of Specificities objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Specificities
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
