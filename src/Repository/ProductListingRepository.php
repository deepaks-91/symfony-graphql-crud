<?php

namespace App\Repository;

use App\Entity\ProductListing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductListing|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductListing|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductListing[]    findAll()
 * @method ProductListing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductListing::class);
    }

    // /**
    //  * @return ProductListing[] Returns an array of ProductListing objects
    //  */
    /*
    public function findByExampleField($value)
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
    */

    /*
    public function findOneBySomeField($value): ?ProductListing
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
