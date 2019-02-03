<?php

namespace App\Repository;

use App\Entity\InterUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InterUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method InterUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method InterUser[]    findAll()
 * @method InterUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InterUser::class);
    }

    // /**
    //  * @return InterUser[] Returns an array of InterUser objects
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
    public function findOneBySomeField($value): ?InterUser
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
