<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\OrganisationRepository;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ACL\Contracts\Organisation;


class DoctrineOrganisationRepository extends EntityRepository implements OrganisationRepository
{
    /**
     * Get all Organisations
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Organisation[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function userAll($user)
    {
        return $this->findBy(['user'=>$user]);
    }
    public function hasSchools($user)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT s,u FROM App\Domain\Entities\School s
                LEFT JOIN s.users u
                WHERE
                  u.id = :user"
        )
        ->setParameter('user', $user)
        ->getResult();

    }
}
