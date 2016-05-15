<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\FeeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineFeeRepository extends EntityRepository implements FeeRepository
{
 /**
     * Get all Fees
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