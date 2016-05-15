<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\TempSchoolRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineTempSchoolRepository extends EntityRepository implements TempSchoolRepository
{
 /**
     * Get all TempSchools
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