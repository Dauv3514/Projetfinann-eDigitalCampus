<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    /**
     * @return Sortie[]
     */
    public function findAllGreaterThanSortie(int $presence): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
        'SELECT sortie.date, sortie.ville, sortie.adresse, sortie.image, sortie.description, presence.validation = 1, user.prenom, user.nom
        FROM sortie s
        INNER JOIN presence p
        On p.Id.sortie = sorties.id

        FROM user u
        INNER JOIN sortie s
        On u.Id.user = user.id

        FROM presence p
        INNER JOIN user u
        On u.Id.users = presence.id'

        )->setParameter('presence', $presence);
     // returns an array of Presence objects
        return $query->getResult();
    } 

    // /**
    //  * @return Sortie[] Returns an array of Sortie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}


