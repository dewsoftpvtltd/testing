<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\FacilityRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineFacilityRepository extends EntityRepository implements FacilityRepository
{
 /**
     * Get all Facilitys
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