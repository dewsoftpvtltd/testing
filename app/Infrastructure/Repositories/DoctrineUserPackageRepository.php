<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UserPackageRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineUserPackageRepository extends EntityRepository implements UserPackageRepository
{
 /**
     * Get all UserPackages
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