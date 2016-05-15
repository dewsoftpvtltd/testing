<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\FamilyRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineFamilyRepository extends EntityRepository implements FamilyRepository
{
 /**
     * Get all Familys
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
    public function userAllInverse($familymember)  {
        return $this->findBy(['familymember'=>$familymember]);
    }  
    public function userFamily($user){
        $f1 = collect($this->userAll($user));
        $f2 =collect($this->userAllInverse($user));
        return $f1->merge($f2);
    }              
}