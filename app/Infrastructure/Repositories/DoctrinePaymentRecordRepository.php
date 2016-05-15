<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\PaymentRecordRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrinePaymentRecordRepository extends EntityRepository implements PaymentRecordRepository
{
 /**
     * Get all PaymentRecords
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
     public function findPaymentType($user,$school,$package)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT p.type FROM App\Domain\Entities\PaymentRecord p
                WHERE
                  p.school = :school
                  AND  
                  p.user = :user
                  AND
                  p.package = :package"
        )
        ->setParameter('school', $school)
        ->setParameter('user', $user)
        ->setParameter('package', $package)
        ->getResult();

    } 
    public function findPaymentDate($user,$school,$package)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT p.date FROM App\Domain\Entities\PaymentRecord p
                WHERE
                  p.school = :school
                  AND  
                  p.user = :user
                  AND
                  p.package = :package"
        )
        ->setParameter('school', $school)
        ->setParameter('user', $user)
        ->setParameter('package', $package)
        ->getResult();

    }  
     public function findPaymentsByASchool($user,$school)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT p FROM App\Domain\Entities\PaymentRecord p
                WHERE
                  p.school = :school
                  AND  
                  p.user = :user"
        )
        ->setParameter('school', $school)
        ->setParameter('user', $user)
        ->getResult();

    }                 
}