<?php
namespace App\Models;

/**
 * CLC 1
 * LoginResponse 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * Model class containing data for login response
 */
class LoginResponse
{

    // variables
    private $success;
    private $msg;

    // constructor
    function __construct()
    {
        $success = false;
    }

    // getters and setters
    
    /**
     *
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     *
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     *
     * @param mixed $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     *
     * @param mixed $data
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
}