<?php

namespace App\Repository;

use App\Entity\Stopien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Stopien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stopien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stopien[]    findAll()
 * @method Stopien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StopienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stopien::class);
    }

    // /**
    //  * @return Stopien[] Returns an array of Stopien objects
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
    public function findOneBySomeField($value): ?Stopien
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
