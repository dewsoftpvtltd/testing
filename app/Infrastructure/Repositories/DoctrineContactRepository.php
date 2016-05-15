<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ContactRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineContactRepository extends EntityRepository implements ContactRepository
{
 /**
     * Get all Contacts
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