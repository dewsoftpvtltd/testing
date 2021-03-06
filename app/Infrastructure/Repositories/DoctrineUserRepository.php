<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UserRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineUserRepository extends EntityRepository implements UserRepository
{
 /**
     * Get all Users
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