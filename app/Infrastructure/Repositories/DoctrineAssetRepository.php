<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\AssetRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineAssetRepository extends EntityRepository implements AssetRepository
{
 /**
     * Get all Assets
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