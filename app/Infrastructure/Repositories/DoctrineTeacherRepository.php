<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\TeacherRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineTeacherRepository extends EntityRepository implements TeacherRepository
{
 /**
     * Get all Teachers
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Teacher[]
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