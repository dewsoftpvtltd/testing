<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\StudentRepository1;
use Doctrine\ORM\EntityRepository;
use App\Domain\Entities\User;



class DoctrineStudentRepository1 extends EntityRepository implements StudentRepository1
{
    /**
     * Get all Students
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\User[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function userAll($school)
    {
        return $this->findBy(['user'=>$school]);
    }
     public function hasStudents($school)
    {
    return $this->getEntityManager()
        ->createQuery(
            "SELECT u,o FROM App\Domain\Entities\User u
                LEFT JOIN u.organisations o
                WHERE
                  o.id = :school"
        )
        ->setParameter('school', $school)
        ->getResult();

    }
    /**
     * Return the next identity
     *
     * @return UserId
     */
    public function nextIdentity()
    {
        return UserId::generate();
    }
    /**
     * Add a new User
     *
     * 
     * @param User $user
     * @return void
     */
    public function add(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
     
    /**
     * Update an existing User
     *
     * @param User $user
     * @return void
     */
    public function update(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
    /**
     * Find a user by their email address
     *
     * @param Email $email
     * @return User
     */
    public function userOfEmail($email)
    {
        return $this->findBy(['email'=>$email]);
    }
     
    /**
     * Find a user by their firstname
     *
     * @param  String $name
     * @return User
     */
    public function userOfFirstname($name)
    {
        return $this->findBy(['name.firstname'=>$name]);
    }
    /**
     * Find a user by their lastname
     *
     * @param  String $name
     * @return User
     */
     public function userOfLastname($name)
    {
        return $this->findBy(['name.lastname'=>$name]);
    }
}
