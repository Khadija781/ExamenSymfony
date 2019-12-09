<?php

namespace App\Repository;

use App\Entity\Oeuvre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use DoctrineExtensions\Query\Mysql\Rand;

/**
 * @method Oeuvre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oeuvre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oeuvre[]    findAll()
 * @method Oeuvre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oeuvre::class);
    }

    public function getFourOeuvreRandom():Query
    {
        $query = $this->createQueryBuilder('oeuvre')
            ->setMaxResults(4)
            ->orderBy('RAND()')
            ->getQuery();


        return $query;
    }

    public function getOeuvreByCategoryId(int $id):Query
    {
        $query = $this->createQueryBuilder('oeuvre')
            ->join('oeuvre.category', 'category')
            ->where('category.id = :id')
            ->setParameters([
                'id' => $id
            ])
            ->getQuery();

        return $query;
    }

    public function getAllOeuvre():Query
    {
        $query = $this->createQueryBuilder('oeuvre')
            ->getQuery();

        return $query;
    }
}
