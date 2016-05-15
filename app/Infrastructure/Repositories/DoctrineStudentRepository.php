<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\StudentRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineStudentRepository extends EntityRepository implements StudentRepository
{
 /**
     * Get all Students
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
     public function StudentsInSchool($school)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT s,sk FROM App\Domain\Entities\Student s
                LEFT JOIN s.school sk
                WHERE
                  sk.id = :school"
        )
        ->setParameter('school', $school)
        ->getResult();

    }                 
}