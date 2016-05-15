<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\WorkHistoryRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineWorkHistoryRepository extends EntityRepository implements WorkHistoryRepository
{
 /**
     * Get all WorkHistorys
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\WorkHistory[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function userAll($user)
    {
        return $this->findBy(['user'=>$user]);
    }                   
}