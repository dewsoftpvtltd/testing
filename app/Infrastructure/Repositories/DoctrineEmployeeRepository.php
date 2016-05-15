<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\EmployeeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineEmployeeRepository extends EntityRepository implements EmployeeRepository
{
 /**
     * Get all Employees
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