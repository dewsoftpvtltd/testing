<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SyllabusCompletionRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSyllabusCompletionRepository extends EntityRepository implements SyllabusCompletionRepository
{
 /**
     * Get all SyllabusCompletions
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