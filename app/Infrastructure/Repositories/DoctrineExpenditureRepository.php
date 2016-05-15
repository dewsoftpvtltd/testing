<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ExpenditureRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineExpenditureRepository extends EntityRepository implements ExpenditureRepository
{
 /**
     * Get all Expenditures
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