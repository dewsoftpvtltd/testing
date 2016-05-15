<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\PeriodRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrinePeriodRepository extends EntityRepository implements PeriodRepository
{
 /**
     * Get all Periods
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