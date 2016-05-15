<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\IncomeRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineIncomeRepository extends EntityRepository implements IncomeRepository
{
 /**
     * Get all Incomes
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