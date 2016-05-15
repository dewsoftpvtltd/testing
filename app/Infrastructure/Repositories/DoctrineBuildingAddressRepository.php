<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\BuildingAddressRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineBuildingAddressRepository extends EntityRepository implements BuildingAddressRepository
{
 /**
     * Get all BuildingAddresss
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

    public function userAll($building)
    {
        return $this->findBy(['building'=>$building]);
    }                   
}