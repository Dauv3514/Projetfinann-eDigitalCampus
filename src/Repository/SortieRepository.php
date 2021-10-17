<?php

namespace App\Repository;

use App\Entity\Sortie;
use App\Entity\Presence;
use App\Entity\User;
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
    public function findAllWithPresence($sortiesavecpresence): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT sortie.date, sortie.ville, sortie.adresse, sortie.image, sortie.description, presence.id, user.prenom, user.nom, user.id, presence.validation
            FROM App\Entity\Sortie sortie
            JOIN sortie.presences presence
            JOIN sortie.user user
            WHERE presence.validation = :presence'
        
        )->setParameter('presence',  $sortiesavecpresence);

        return $query->getResult();

    } 

    /**
     * @return Sortie[]
     */
    public function findAllWithoutPresence($sortiessanspresence): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT sortie.date, sortie.ville, sortie.adresse, sortie.image, sortie.description, presence.id, presence.validation
            FROM App\Entity\Sortie sortie
            JOIN sortie.presences presence
            JOIN sortie.user user
            WHERE presence.validation = :presence'

/* FROM App\Entity\Sortie sortie
JOIN sortie.presences presence
JOIN sortie.user user
WHERE user.id = :presence */
        
        )->setParameter('presence', $sortiessanspresence);

        return $query->getResult();

    } 

    /**
     * @return Sortie[]
     */
    public function findAllTerminee($sortiesterminees): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT sortie.date, sortie.ville, sortie.adresse, sortie.image, sortie.description, presence.id, user.prenom, user.nom, user.id, presence.validation
            FROM App\Entity\Sortie sortie
            JOIN sortie.presences presence
            JOIN sortie.user user
            WHERE presence.validation = :presence'
        
        )->setParameter('presence',  $sortiesterminees);

        return $query->getResult();

    } 

/*         $query = $entityManager->createQuery(
            
            'SELECT sortie.date, sortie.ville, sortie.adresse, sortie.image, sortie.description, presence.validation , user.prenom, user.nom, user.id
            FROM App\Entity\Sortie sortie
            JOIN sortie.presences presence
            JOIN sortie.user user
            WHERE user.id = 3'
        
        )->setParameter('user', $user); */
        
     // returns an array of Presence objects 

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


