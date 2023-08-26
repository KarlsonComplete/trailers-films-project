<?php

namespace App\Repository;

use App\Entity\SubGenre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubGenre>
 *
 * @method SubGenre|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubGenre|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubGenre[]    findAll()
 * @method SubGenre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubGenreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubGenre::class);
    }

//    /**
//     * @return SubGenre[] Returns an array of SubGenre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SubGenre
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
