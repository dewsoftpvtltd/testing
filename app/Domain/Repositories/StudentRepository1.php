<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\User;



interface StudentRepository1
{
    /**
     * Get all Students
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\User[]
     */
    public function all($orderField = 'id', $order = 'ASC');

    /**
     * Finds an entity by its primary key / identifier.
     *
     * @param mixed    $id          The identifier.
     * @param int|null $lockMode    One of the \Doctrine\DBAL\LockMode::* constants
     *                              or NULL if no specific lock mode should be used
     *                              during the search.
     * @param int|null $lockVersion The lock version.
     *
     * @return \App\Domain\Entities\User
     */
    public function find($id, $lockMode = null, $lockVersion = null);/**
     * Return the next identity
     *
     * @return UserId
     */
    public function nextIdentity();
    /**
     * Add a new User
     *
     * @param User $user
     * @return void
     */
    public function add(User $user);
    /**
     * Update an existing User
     *
     * @param User $user
     * @return void
     */
    public function update(User $user);
    /**
     * Find a user by their email address
     *
     * @param $email
     * @return User
     */
    public function userOfEmail($email);
     
    /**
     * Find a user by their firstname
     *
     * @param String $name
     * @return User
     */
    public function userOfFirstname($fname);
    /**
     * Find a user by their lastname
     *
     * @param String $name
     * @return User
     */
    public function userOfLastname($lname);
}

