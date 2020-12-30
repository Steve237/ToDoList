<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Collection;

/**
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

 
    public function findClosedTasks()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.isDone = 1')
            ->getQuery()
            ->getResult()
        ;
    }
   

    public function findOpenTasks()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.isDone != 1')
            ->getQuery()
            ->getResult()
        ;
    }

}
