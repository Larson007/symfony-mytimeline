<?php

namespace App\Repository;

use App\Entity\Timelines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Timelines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timelines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timelines[]    findAll()
 * @method Timelines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimelinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Timelines::class);
    }

    // /**
    //  * @return Timelines[] Returns an array of Timelines objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Timelines
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
