<?php

namespace App\Repository;

use App\Entity\Temoignage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Temoignage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Temoignage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Temoignage[]    findAll()
 * @method Temoignage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemoignageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Temoignage::class);
    }

    /**
     * @return Faq[] Returns an array of Faq objects
     */
    
    public function findBynextOdre($ordre)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.ordre >= :ordre')
            ->setParameter('ordre', $ordre)
            ->orderBy('t.ordre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Faq[] Returns an array of Faq objects
     */
    
    public function findByBetweenOdre($currentOrdre, $newOrdre)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.ordre >= :currentOrdre AND t.ordre <= :newOrdre OR t.ordre <= :currentOrdre AND t.ordre >= :newOrdre')
            ->setParameter('currentOrdre', $currentOrdre)
            ->setParameter('newOrdre', $newOrdre)
            ->orderBy('t.ordre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Temoignage[] Returns an array of Temoignage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Temoignage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
