<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\BuildingRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineBuildingRepository extends EntityRepository implements BuildingRepository
{
    /**
     * Get all Buildings
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Building[]
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
