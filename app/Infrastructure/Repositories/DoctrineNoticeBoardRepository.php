<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\NoticeBoardRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineNoticeBoardRepository extends EntityRepository implements NoticeBoardRepository
{
 /**
     * Get all NoticeBoards
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