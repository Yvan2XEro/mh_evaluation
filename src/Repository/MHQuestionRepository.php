<?php

namespace App\Repository;

use App\Entity\MHQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MHQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method MHQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method MHQuestion[]    findAll()
 * @method MHQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MHQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MHQuestion::class);
    }

    // /**
    //  * @return MHQuestion[] Returns an array of MHQuestion objects
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
    public function findOneBySomeField($value): ?MHQuestion
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
