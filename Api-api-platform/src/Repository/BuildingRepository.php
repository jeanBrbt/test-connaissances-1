<?php

namespace App\Repository;
use App\Entity\Organisation;
use App\Entity\Building;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

/**
 * @extends ServiceEntityRepository<Building>
 *
 * @method Building|null find($id, $lockMode = null, $lockVersion = null)
 * @method Building|null findOneBy(array $criteria, array $orderBy = null)
 * @method Building[]    findAll()
 * @method Building[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuildingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Building::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Building $entity, bool $flush = false): void
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
    public function remove(Building $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    /**
     * @return Building[] Returns an array of Building objects
     */

    public function findBuildingof($value): array{
    //    $value='Organisation_1';
        $qb=$this->createQueryBuilder('b');
        $qb->leftJoin('App\Entity\Organisation','o','WITH','b.id_organisation=o.id')
            ->where($qb->expr()->eq('o.nom', ':id'))
            ->setParameter('id',$value)
            ->getQuery()
            ->getResult();
        return $qb->getQuery()->getResult();
    }
    /**
     * @return array Returns an array of Building objects
     */

    public function PeopleIn($value): array{
        $qb=$this->createQueryBuilder('b');
        $qb->leftJoin('App\Entity\Piece','p','WITH','b.id=p.id_building')
            ->where($qb->expr()->eq('b.nom', ':nom'))
            ->setParameter('nom',$value)
            //->select('SUM(p.personnesPresentes) as personnesPresentes')
            ->getQuery()
            ->getResult();
        return $qb->getQuery()->getResult();

        /* $rawSql = "SELECT building.nom FROM organisation LEFT JOIN building on building.id_organisation_id = organisation.id WHERE organisation.nom='Organisation_A'";

         $stmt = $this->getEntityManager()->getConnection()->prepare($rawSql);
         $stmt->execute();
         var_dump($stmt->fetchAll());die;



         return [];*/
    }
/*        return $this->createQueryBuilder('b')
           // ->join('App\Entity\Organisation','o','WITH','o.nom=\'Organisation_A\'')
            ->innerJoin('App\Entity\Organisation','o')
            ->Where($this->expr()->eq('a.groupe', ':gr'))
            ->setParameter('nom2','1')
           // ->where($qb->expr()->)
             //->andWhere('o.id ='.$value)
          //  ->setParameter('val', $value)
          //  ->orderBy('b.id', 'ASC')
          //  ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;*/
//    /**
//     * @return Building[] Returns an array of Building objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Building
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
