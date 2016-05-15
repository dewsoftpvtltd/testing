<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SchoolAdminRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSchoolAdminRepository extends EntityRepository implements SchoolAdminRepository
{
 /**
     * Get all SchoolAdmins
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