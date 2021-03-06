<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SyllabusRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSyllabusRepository extends EntityRepository implements SyllabusRepository
{
 /**
     * Get all Syllabuss
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