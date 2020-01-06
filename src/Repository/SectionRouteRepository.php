<?php

namespace App\Repository;

use App\Entity\SectionRoute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SectionRoute|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionRoute|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionRoute[]    findAll()
 * @method SectionRoute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionRouteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionRoute::class);
    }

    // /**
    //  * @return SectionRoute[] Returns an array of SectionRoute objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectionRoute
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
