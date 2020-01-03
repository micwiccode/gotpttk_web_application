<?php

namespace App\Repository;

use App\Entity\Ksiazeczka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ksiazeczka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ksiazeczka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ksiazeczka[]    findAll()
 * @method Ksiazeczka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KsiazeczkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ksiazeczka::class);
    }

    // /**
    //  * @return Ksiazeczka[] Returns an array of Ksiazeczka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ksiazeczka
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
