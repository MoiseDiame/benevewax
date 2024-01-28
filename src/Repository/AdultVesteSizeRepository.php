<?php

namespace App\Repository;

use App\Entity\AdultVesteSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdultVesteSize>
 *
 * @method AdultVesteSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdultVesteSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdultVesteSize[]    findAll()
 * @method AdultVesteSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdultVesteSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdultVesteSize::class);
    }

//    /**
//     * @return AdultVesteSize[] Returns an array of AdultVesteSize objects
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

//    public function findOneBySomeField($value): ?AdultVesteSize
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
