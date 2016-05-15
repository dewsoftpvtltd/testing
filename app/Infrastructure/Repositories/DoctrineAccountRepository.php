<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\AccountRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineAccountRepository extends EntityRepository implements AccountRepository
{
 /**
     * Get all Accounts
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