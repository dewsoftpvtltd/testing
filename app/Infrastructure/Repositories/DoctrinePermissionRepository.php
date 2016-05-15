<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\PermissionRepository;
use Doctrine\ORM\EntityRepository;

class DoctrinePermissionRepository extends EntityRepository implements PermissionRepository
{
    /**
     * Get all Permissions
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Permission[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

   
   
}
