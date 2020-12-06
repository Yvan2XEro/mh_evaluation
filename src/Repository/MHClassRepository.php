<?php

namespace App\Repository;

use App\Entity\MHClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MHClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method MHClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method MHClass[]    findAll()
 * @method MHClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MHClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MHClass::class);
    }

    // /**
    //  * @return MHClass[] Returns an array of MHClass objects
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
    public function findOneBySomeField($value): ?MHClass
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
