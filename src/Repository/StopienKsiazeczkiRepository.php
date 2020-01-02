<?php

namespace App\Repository;

use App\Entity\StopienKsiazeczki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StopienKsiazeczki|null find($id, $lockMode = null, $lockVersion = null)
 * @method StopienKsiazeczki|null findOneBy(array $criteria, array $orderBy = null)
 * @method StopienKsiazeczki[]    findAll()
 * @method StopienKsiazeczki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StopienKsiazeczkiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StopienKsiazeczki::class);
    }

    // /**
    //  * @return StopienKsiazeczki[] Returns an array of StopienKsiazeczki objects
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
    public function findOneBySomeField($value): ?StopienKsiazeczki
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
