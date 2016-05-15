<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\DutyRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineDutyRepository extends EntityRepository implements DutyRepository
{
 /**
     * Get all Dutys
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