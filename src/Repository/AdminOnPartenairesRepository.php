<?php

namespace App\Repository;

use App\Entity\AdminOnPartenaires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdminOnPartenaires>
 *
 * @method AdminOnPartenaires|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminOnPartenaires|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminOnPartenaires[]    findAll()
 * @method AdminOnPartenaires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminOnPartenairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminOnPartenaires::class);
    }

    public function save(AdminOnPartenaires $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AdminOnPartenaires $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AdminOnPartenaires[] Returns an array of AdminOnPartenaires objects
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

//    public function findOneBySomeField($value): ?AdminOnPartenaires
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
