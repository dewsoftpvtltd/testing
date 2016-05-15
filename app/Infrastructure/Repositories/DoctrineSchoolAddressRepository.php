<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SchoolAddressRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSchoolAddressRepository extends EntityRepository implements SchoolAddressRepository
{
 /**
     * Get all SchoolAddresss
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

    public function userAll($school)
    {
        return $this->findBy(['school'=>$school]);
    }                   
    public function userAddress($school){
        return userAll($school)->first();
    }
}