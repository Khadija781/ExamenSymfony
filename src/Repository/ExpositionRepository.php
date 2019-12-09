<?php

namespace App\Repository;

use App\Entity\Exposition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use DoctrineExtensions\Query\Mysql\Date;

/**
 * @method Exposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exposition[]    findAll()
 * @method Exposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exposition::class);
    }

    public function GetFutureExpos():Query
    {
        $query = $this->createQueryBuilder('exposition')
            ->where('exposition.date > :date')
            ->setParameters([
                'date' => new \DateTime()
            ])
            ->orderBy('exposition.date', 'ASC')
            ->getQuery();

        return $query;
    }

    public function GetPreviousExpos():Query
    {
        $query = $this->createQueryBuilder('exposition')
            ->where('exposition.date < :date')
            ->setParameters([
                'date' => new \DateTime()
            ])
            ->orderBy('exposition.date', 'ASC')
            ->getQuery();

        return $query;
    }
}
