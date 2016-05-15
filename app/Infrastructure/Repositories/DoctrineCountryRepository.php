<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\CountryRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineCountryRepository extends EntityRepository implements CountryRepository
{
 /**
     * Get all Countrys
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