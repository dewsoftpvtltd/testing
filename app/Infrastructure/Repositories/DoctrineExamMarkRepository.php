<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ExamMarkRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineExamMarkRepository extends EntityRepository implements ExamMarkRepository
{
 /**
     * Get all ExamMarks
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