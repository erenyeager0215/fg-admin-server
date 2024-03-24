<?php

namespace App\Repository;

use App\Entity\Testdb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Testdb>
 *
 * @method Testdb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testdb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testdb[]    findAll()
 * @method Testdb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestdbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testdb::class);
    }

    //    /**
    //     * @return Testdb[] Returns an array of Testdb objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Testdb
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
