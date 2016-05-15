<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SectionStudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSectionStudentRepository extends EntityRepository implements SectionStudentRepository
{
 /**
     * Get all SectionStudents
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