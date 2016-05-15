<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\InterestRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineInterestRepository extends EntityRepository implements InterestRepository
{
 /**
     * Get all Interests
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