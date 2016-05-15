<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\CityRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineCityRepository extends EntityRepository implements CityRepository
{
 /**
     * Get all Citys
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