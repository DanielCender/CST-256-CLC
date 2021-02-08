<?php

/**
 * CLC 2
 * UserUpdateModel 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2020
 * Model class containing data necessary to update user records
 *
 */
namespace App\Models;

use JsonSerializable;

class UserUpdateModel implements JsonSerializable
{

    // variables
    private $id;
    private $email;
    private $firstName;
    private $lastName;
    private $role;
    private $suspended;

    // constructor
    function __construct($id, $email, $firstName, $lastName, $role = 'USER', $suspended = False)
    {
        $this->id = $id;
        $this->email = $email;
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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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


    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'role' => $this->role,
            'suspended' => $this->suspended
        ];
    }
}
