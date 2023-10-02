<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 *
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

//    /**
//     * @return Film[] Returns an array of Film objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Film
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function SearchFilmForOptionYear($year): array
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.year = :year')
            ->setParameter('year', $year)
            ->orderBy('y.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /*
    SELECT * FROM film
    JOIN film_country fc on film.id = fc.film_id
    JOIN film_genre fg on film.id = fg.film_id
    JOIN film_sub_genre fsg on film.id = fsg.film_id
    WHERE country_id=3 AND genre_id=3 AND sub_genre_id=8;
    /*, $subgenre, $country, $year*/


    public function SearchFilmForOptionGenre($genre):array
    {
        return $this->createQueryBuilder('g')
            ->addSelect('r')
            ->join('g.genres', 'r')
            ->where('r.id = :genre')
            ->setParameter('genre', $genre)
            ->getQuery()
            ->getArrayResult();
    }

    public function SearchFilmForOptionsGenreAndSubgenre($genre, ?string $subgenre = null):array
    {
        return $this->createQueryBuilder('g')
            ->addSelect('r')
            ->join('g.genres', 'r')
            ->where('r.id = :genre')
            ->setParameter('genre', $genre)
            ->addSelect('s')
            ->join('g.subGenres','s')
            ->andWhere('s.id = :subgenre')
            ->setParameter('subgenre', $subgenre)
            ->getQuery()
            ->getArrayResult();
    }
    public function SearchFilmForOptionsAll($genre,$subgenre, $country, $year):array
    {
        return $this->createQueryBuilder('g')
            ->addSelect('r')
            ->join('g.genres', 'r')
            ->where('r.id = :genre')
            ->setParameter('genre', $genre)
            ->addSelect('s')
            ->join('g.subGenres','s')
            ->andWhere('s.id = :subgenre')
            ->setParameter('subgenre', $subgenre)
            ->addSelect('c')
            ->join('c.countries', 'c')
            ->where('c.id = :country')
            ->setParameter('country', $country)
            ->addSelect('y')
            ->join('g.year', 'y')
            ->where('y.id = :year')
            ->setParameter('year', $year)
            ->getQuery()
            ->getArrayResult();
    }

}
