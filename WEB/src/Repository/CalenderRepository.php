<?php

namespace App\Repository;

use App\Entity\Calender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calender|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calender|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calender[]    findAll()
 * @method Calender[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalenderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calender::class);
    }

    // /**
    //  * @return Calender[] Returns an array of Calender objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Calender
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
