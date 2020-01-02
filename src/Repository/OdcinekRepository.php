<?php

namespace App\Repository;

use App\Entity\Odcinek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Odcinek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Odcinek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Odcinek[]    findAll()
 * @method Odcinek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OdcinekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Odcinek::class);
    }

    // /**
    //  * @return Odcinek[] Returns an array of Odcinek objects
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
    public function findOneBySomeField($value): ?Odcinek
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
