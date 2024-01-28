<?php

namespace App\Repository;

use App\Entity\VesteSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VesteSize>
 *
 * @method VesteSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method VesteSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method VesteSize[]    findAll()
 * @method VesteSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VesteSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VesteSize::class);
    }

//    /**
//     * @return VesteSize[] Returns an array of VesteSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VesteSize
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
