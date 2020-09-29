<?php

namespace App\Repository;

use App\Entity\StartDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StartDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method StartDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method StartDate[]    findAll()
 * @method StartDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StartDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StartDate::class);
    }

    // /**
    //  * @return StartDate[] Returns an array of StartDate objects
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
    public function findOneBySomeField($value): ?StartDate
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
