<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\SkoolumAccountRepository;
use Doctrine\ORM\EntityRepository;
                   
class DoctrineSkoolumAccountRepository extends EntityRepository implements SkoolumAccountRepository
{
 /**
     * Get all SkoolumAccounts
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\SkoolumAccount[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function userAccount($account)
    {
        return $this->findBy(['nameofsender'=>$account]);
    } 
     public function userAmount($amount)
    {
        return $this->findBy(['feeamount'=>$amount]);
    }  
     public function depositDate($date)
    {
        return $this->findBy(['dateofdeposit'=>$date]);
    }
    // public function findUser($user)
    // {
    //     return $this->findBy(['user'=>$user]);
    // } 
    public function findDate($account,$amount)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT s.dateofdeposit FROM App\Domain\Entities\SkoolumAccount s
                WHERE
                  s.nameofsender = :account
                  AND  
                  s.feeamount = :amount"
        )
        ->setParameter('account', $account)
        ->setParameter('amount', $amount)
        ->getResult();

    } 
              
}