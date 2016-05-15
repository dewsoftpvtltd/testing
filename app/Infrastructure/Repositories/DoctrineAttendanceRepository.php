<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\AttendanceRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineAttendanceRepository extends EntityRepository implements AttendanceRepository
{
 /**
     * Get all Attendances
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