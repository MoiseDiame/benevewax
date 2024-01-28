<?php

namespace App\Repository;

use App\Entity\KidsVesteSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KidsVesteSize>
 *
 * @method KidsVesteSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method KidsVesteSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method KidsVesteSize[]    findAll()
 * @method KidsVesteSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KidsVesteSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KidsVesteSize::class);
    }

//    /**
//     * @return KidsVesteSize[] Returns an array of KidsVesteSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KidsVesteSize
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
