<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ExaminationRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineExaminationRepository extends EntityRepository implements ExaminationRepository
{
 /**
     * Get all Examinations
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