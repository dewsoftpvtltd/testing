<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\RoomRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineRoomRepository extends EntityRepository implements RoomRepository
{
 /**
     * Get all Rooms
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Room[]
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