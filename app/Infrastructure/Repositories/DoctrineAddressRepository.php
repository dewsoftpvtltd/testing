<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\AddressRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineAddressRepository extends EntityRepository implements AddressRepository
{
 /**
     * Get all Addresss
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