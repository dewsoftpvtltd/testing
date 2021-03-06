<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\FeeStudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineFeeStudentRepository extends EntityRepository implements FeeStudentRepository
{
 /**
     * Get all FeeStudents
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