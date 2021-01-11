<?php

/**
 * CLC 2
 * UserModel 2
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2021
 * Model class containing data neccessary for users
 *
 */
namespace App\Models;

class UserModel
{

    // variables
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $role;
    private $suspended;

    // constructor
    function __construct($id, $email, $password, $firstName, $lastName, $role = 'USER', $suspended = False)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rights = $rights;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
        $this->suspended = $suspended;
    }

    // getters and setters

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getSuspended() {
        return $this->suspended;
    }

    /**
     *
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     *
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * @param boolean $suspended
     */
    public function setSuspended($suspended) {
        $this->suspended = $suspended;
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
