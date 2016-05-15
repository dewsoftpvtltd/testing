<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SubjectNameRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSubjectNameRepository extends EntityRepository implements SubjectNameRepository
{
 /**
     * Get all SubjectNames
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