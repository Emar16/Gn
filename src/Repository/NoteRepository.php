<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Note|null find($id, $lockMode = null, $lockVersion = null)
 * @method Note|null findOneBy(array $criteria, array $orderBy = null)
 * @method Note[]    findAll()
 * @method Note[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }


    
    public function test(){
        $entityManager = $this->getEntityManager();
        $query= $entityManager->createQuery(
        'select n,e
        from App\Entity\note n
        join n.etudiant e
       

        ');
    //     $qb=$this->createQueryBuilder("e")
    //    ->select('e.nom');
        return $query->getResult();
    }


    public function findjointure()
    {
       // $conn = $this->getEntityManager()->getConnection();

        // $sql = '
        // SELECT etudiant.*,matiere.*,note.*,SUM(note.note * matiere.poids) AS moyenne FROM note INNER JOIN etudiant ON note.etudiant_id = etudiant.id INNER JOIN matiere ON note.matiere_id = matiere.id WHERE ue_id = 1 GROUP BY etudiant.nom
        //     ';
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();

        // // returns an array of arrays (i.e. a raw data set)
        // return $stmt->fetchAll();
        $conn = $this->getEntityManager()->getConnection();
        $query =
            // 'SELECT n, e,m,SUM(n.note * m.poids) AS moyenne
            'SELECT etudiant.nom,ue.design_ue,ue.credit,SUM(note*matiere.poids) as moyenne from note n
            inner JOIN matiere on n.matiere_id=matiere.id 
            inner join ue on matiere.ue_id=ue.id 
            inner join etudiant on n.etudiant_id=etudiant.id 
            group by etudiant.id ,ue.design_ue
            ';
            $stmt = $conn->prepare($query);
            $stmt->execute();
        return  $stmt->fetchAll();
    }





    // /**
    //  * @return Note[] Returns an array of Note objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Note
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
