<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\StateRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineStateRepository extends EntityRepository implements StateRepository
{
 /**
     * Get all States
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