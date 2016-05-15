<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\FeeTypeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineFeeTypeRepository extends EntityRepository implements FeeTypeRepository
{
 /**
     * Get all FeeTypes
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