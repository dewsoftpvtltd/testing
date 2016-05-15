<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\HomeworkRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineHomeworkRepository extends EntityRepository implements HomeworkRepository
{
 /**
     * Get all Homeworks
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