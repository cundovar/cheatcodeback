<?php

namespace App\Repository;

use App\Entity\MenuContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MenuContent>
 *
 * @method MenuContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuContent[]    findAll()
 * @method MenuContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuContent::class);
    }

    public function add(MenuContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MenuContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
     /**
     * @return MenuContent[] Returns an array of MenuContent objects
     */
    public function findBySearchQuery(string $query)
    {
        return $this->createQueryBuilder('mc')
            ->andWhere('mc.title LIKE :query OR mc.content LIKE :query OR mc.para LIKE :query OR mc.para1 LIKE :query OR mc.content1 LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return MenuContent[] Returns an array of MenuContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MenuContent
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
