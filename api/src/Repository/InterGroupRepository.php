<?php

namespace App\Repository;

use App\Entity\InterGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InterGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method InterGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method InterGroup[]    findAll()
 * @method InterGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InterGroup::class);
    }

    // /**
    //  * @return InterGroup[] Returns an array of InterGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InterGroup
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
