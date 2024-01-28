<?php

namespace App\Repository;

use App\Entity\KidsShoeSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KidsShoeSize>
 *
 * @method KidsShoeSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method KidsShoeSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method KidsShoeSize[]    findAll()
 * @method KidsShoeSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KidsShoeSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KidsShoeSize::class);
    }

//    /**
//     * @return KidsShoeSize[] Returns an array of KidsShoeSize objects
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

//    public function findOneBySomeField($value): ?KidsShoeSize
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
