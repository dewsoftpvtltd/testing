<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\CourseRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineCourseRepository extends EntityRepository implements CourseRepository
{
 /**
     * Get all Courses
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