<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\MedicalIssueRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineMedicalIssueRepository extends EntityRepository implements MedicalIssueRepository
{
 /**
     * Get all MedicalIssues
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
        return $this->findBy(['user'=>$user]);
    }                   
}