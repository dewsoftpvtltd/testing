<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SchoolRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSchoolRepository extends EntityRepository implements SchoolRepository
{
 /**
     * Get all Schools
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
    public function hasSchools($user)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT s,u FROM App\Domain\Entities\School s
                LEFT JOIN s.users u
                WHERE
                  u.id = :user"
        )
        ->setParameter('user', $user)
        ->getResult();

    }                 
}