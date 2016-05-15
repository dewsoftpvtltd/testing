<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\CourseStudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineCourseStudentRepository extends EntityRepository implements CourseStudentRepository
{
 /**
     * Get all CourseStudents
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