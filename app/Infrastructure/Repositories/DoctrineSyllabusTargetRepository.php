<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SyllabusTargetRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSyllabusTargetRepository extends EntityRepository implements SyllabusTargetRepository
{
 /**
     * Get all SyllabusTargets
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