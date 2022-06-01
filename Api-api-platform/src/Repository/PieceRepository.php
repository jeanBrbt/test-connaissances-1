<?php

namespace App\Repository;

use App\Entity\Building;
use App\Entity\Piece;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Piece>
 *
 * @method Piece|null find($id, $lockMode = null, $lockVersion = null)
 * @method Piece|null findOneBy(array $criteria, array $orderBy = null)
 * @method Piece[]    findAll()
 * @method Piece[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Piece::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Piece $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Piece $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    /**
     * @return Piece[] Returns an array of pieces objects
     */

    public function findPieceof($value): array{
        $qb=$this->createQueryBuilder('p');
        $qb->leftJoin('App\Entity\Building','b','WITH','p.id_building=b.id')
            ->where($qb->expr()->eq('b.nom', ':id'))
            ->setParameter('id',$value)
            ->getQuery()
            ->getResult();
        return $qb->getQuery()->getResult();

    }

    public function BuildingPeopleIn($value): array{
        $qb=$this->createQueryBuilder('p');
        $qb->leftJoin('App\Entity\Building','b','WITH','p.id_building=b.id')
            ->where($qb->expr()->eq('b.nom', ':id'))
            ->setParameter('id',$value)
            ->select('SUM(p.personnesPresentes) AS personnesPresentes')
            ->getQuery()
            ->getResult();
        return $qb->getQuery()->getResult();

    }
    public function OrganisationPeopleIn($value): array{
        $qb=$this->createQueryBuilder('p');
        $qb->leftJoin('App\Entity\Building','b','WITH','p.id_building=b.id')
            ->leftJoin('App\Entity\Organisation','o','WITH','b.id_organisation=o.id')
            ->where($qb->expr()->eq('o.nom', ':id'))
            ->setParameter('id',$value)
            ->select('SUM(p.personnesPresentes) AS personnesPresentes')
            ->getQuery()
            ->getResult();
        return $qb->getQuery()->getResult();

    }
//    /**
//     * @return Piece[] Returns an array of Piece objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Piece
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
