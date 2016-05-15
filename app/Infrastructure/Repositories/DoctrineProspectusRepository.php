<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ProspectusRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineProspectusRepository extends EntityRepository implements ProspectusRepository
{
 /**
     * Get all Prospectuss
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