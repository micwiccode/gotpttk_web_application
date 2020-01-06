<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Section|null find($id, $lockMode = null, $lockVersion = null)
 * @method Section|null findOneBy(array $criteria, array $orderBy = null)
 * @method Section[]    findAll()
 * @method Section[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Section::class);
    }

    public function getDistinctEndPointsFromGroup($idG): array
    {
        $qb = $this->createQueryBuilder('r')
            ->where('r.idG = :idG')
            ->setParameter('idG', $idG)
            ->groupBy('r.endPoint');

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findByNameAndGroup($sectionName, $sectionGroup): array
    {
        if($sectionGroup){
            $qb = $this->createQueryBuilder('section')
                ->join('section.startPoint', 'startPoint')
                ->join('section.endPoint', 'endPoint')
                ->where("startPoint.name LIKE :name")
                ->orWhere("endPoint.name LIKE :name")
                ->andWhere('section.idG = :idG')
                ->setParameter('name', '%' . $sectionName . '%')
                ->setParameter('idG', $sectionGroup);
        }
        else{
            $qb = $this->createQueryBuilder('section')
                ->join('section.startPoint', 'startPoint')
                ->join('section.endPoint', 'endPoint')
                ->where("startPoint.name LIKE :name")
                ->orWhere("endPoint.name LIKE :name")
                ->setParameter('name', '%' . $sectionName . '%');
        }
        $query = $qb->getQuery();
        return $query->execute();
    }


    // /**
    //  * @return Section[] Returns an array of Section objects
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
    public function findOneBySomeField($value): ?Section
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
