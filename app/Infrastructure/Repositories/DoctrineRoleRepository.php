<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\RoleRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineRoleRepository extends EntityRepository implements RoleRepository
{
    /**
     * Get all Roles
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Role[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function findRole($user)
    {
        return $this->findBy(['name'=>$user]);
    }
}
