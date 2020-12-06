<?php

namespace App\Repository;

use App\Entity\MHResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MHResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method MHResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method MHResponse[]    findAll()
 * @method MHResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MHResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MHResponse::class);
    }

    // /**
    //  * @return MHResponse[] Returns an array of MHResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MHResponse
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
