<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\LiabilityRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineLiabilityRepository extends EntityRepository implements LiabilityRepository
{
 /**
     * Get all Liabilitys
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