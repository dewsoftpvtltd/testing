<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\GroundRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineGroundRepository extends EntityRepository implements GroundRepository
{
 /**
     * Get all Grounds
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