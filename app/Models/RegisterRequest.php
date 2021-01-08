<?php
namespace App\Models;

/**
 * CLC 1
 * RegisterRequest 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * Model class containing data for register request
 */
class RegisterRequest
{

    // variables
    private $email;
    private $password;
    private $password2;
    private $firstName;
    private $lastName;

    // constructor
    function __construct($email, $password, $password2, $firstName, $lastName)
    {
        $this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
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
     * @return mixed
     */
    public function getPassword2()
    {
        return $this->password2;
    }

    /**
     *
     * @param mixed $password2
     */
    public function setPassword2($password2)
    {
        $this->password2 = $password2;
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
}