<?php
namespace App\Models;

/**
 * CLC 1
 * LoginRequest 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * Model class containing data for login request
 */
class LoginRequest
{

    // variables
    private $email;
    private $password;

    // constructor
    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
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
}