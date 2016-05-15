<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UserContactRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineUserContactRepository extends EntityRepository implements UserContactRepository
{
 /**
     * Get all UserContacts
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
        return $this->findBy(['user'=>$user]);
    }                   
}