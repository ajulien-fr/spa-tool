<?php

namespace App\Repository;

use App\Entity\Contributeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Contributeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contributeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contributeur[]    findAll()
 * @method Contributeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContributeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contributeur::class);
    }

    // /**
    //  * @return Contributeur[] Returns an array of Contributeur objects
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
    public function findOneBySomeField($value): ?Contributeur
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
