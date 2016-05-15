<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\HomeworkStudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineHomeworkStudentRepository extends EntityRepository implements HomeworkStudentRepository
{
 /**
     * Get all HomeworkStudents
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