<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\PackageRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrinePackageRepository extends EntityRepository implements PackageRepository
{
 /**
     * Get all Packages
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

    public function typeAll($type)
    {
        return $this->findBy(['type'=>$type]);
    }  
   public function findRegistration($account,$amount)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT p.registration FROM App\Domain\Entities\Package p
                WHERE
                  p.id = :id"
        )
        ->setParameter('id', $id)
        ->getResult();

    }                  
}