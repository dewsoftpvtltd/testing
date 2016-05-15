<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ExaminationStudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineExaminationStudentRepository extends EntityRepository implements ExaminationStudentRepository
{
 /**
     * Get all ExaminationStudents
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