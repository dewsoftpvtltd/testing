<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\AddressTypeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineAddressTypeRepository extends EntityRepository implements AddressTypeRepository
{
 /**
     * Get all AddressTypes
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