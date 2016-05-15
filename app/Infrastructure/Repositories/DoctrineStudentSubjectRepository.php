<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\StudentSubjectRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineStudentSubjectRepository extends EntityRepository implements StudentSubjectRepository
{
 /**
     * Get all StudentSubjects
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