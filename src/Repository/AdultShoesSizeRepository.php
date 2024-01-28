<?php

namespace App\Repository;

use App\Entity\AdultShoesSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdultShoesSize>
 *
 * @method AdultShoesSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdultShoesSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdultShoesSize[]    findAll()
 * @method AdultShoesSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdultShoesSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdultShoesSize::class);
    }

//    /**
//     * @return AdultShoesSize[] Returns an array of AdultShoesSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdultShoesSize
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
