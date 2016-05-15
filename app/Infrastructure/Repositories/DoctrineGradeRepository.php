<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\GradeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineGradeRepository extends EntityRepository implements GradeRepository
{
 /**
     * Get all Grades
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function userAll($user)
    {
        return $this->findBy(['school'=>$user]);
    }                   
}