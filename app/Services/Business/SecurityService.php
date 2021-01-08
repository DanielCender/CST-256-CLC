<?php

/**
 * CLC 1
 * SecurityService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that contains the functions required for user logic checks
 *
 */
namespace App\Services\Business;

use App\Models\LoginResponse;
use App\Models\RegisterResponse;
use App\Services\Data\SecurityDAO;

class SecurityService
{

    //validates login form request
    public function login($loginRequest)
    {
        
        //filters passed in variables
        $e = $this->filter($loginRequest->getEmail());
        $p = $this->filter($loginRequest->getPassword());
        
        //creates login response 
        $response = new LoginResponse();
        $response->setSuccess(false);
        
        //security data service instance
        $securityDAO = new SecurityDAO();
        
        //validation checks
        if (empty($e)) {
            $response->setMsg("Email cannot be left blank.");
        } else if (empty($p)) {
            $response->setMsg("Password cannot be left blank.");
        } else if (! $this->IsSafe($p)) {
            $response->setMsg("Password contains illegal characters.");
        } else if (! $this->isEmail($e)) {
            $response->setMsg("Email not valid.");
        } else {
            
            $loginRequest->setEmail($e);
            $loginRequest->setPassword($p);
            
            // check if email and password combo exists
            if ($securityDAO->verifyUser($loginRequest)) {
                $response->setSuccess(true);
            } else {
                $response->setMsg("Invalid email or password.");
            }
        }
        
        return $response;
    }

    //register form request
    public function register($registerRequest)
    {
        
        //filters passed in variables
        $e = $this->filter($registerRequest->getEmail());
        $p = $this->filter($registerRequest->getPassword());
        $p2 = $this->filter($registerRequest->getPassword2());
        $f = $this->filter($registerRequest->getFirstName());
        $l = $this->filter($registerRequest->getLastName());
        
        //create register response
        $response = new RegisterResponse();
        $response->setSuccess(false);
        
        //create security data service
        $securityDAO = new SecurityDAO();
        
        //validation checks
        if (empty($e)) {
            $response->setMsg("Email cannot be left blank.");
        } else if (empty($p)) {
            $response->setMsg("Password cannot be left blank.");
        } else if (! $this->IsSafe($p)) {
            $response->setMsg("Email contains illegal characters.");
        } else if (! ($p === $p2)) {
            $response->setMsg("Passwords must match.");
        } else if (! $this->isEmail($e)) {
            $response->setMsg("Email not valid.");
        } else {
            
            $registerRequest->setEmail($e);
            $registerRequest->setPassword($p);
            $registerRequest->setFirstName($f);
            $registerRequest->setLastName($l);
            
            //check if email already exists in database
            if (! $securityDAO->userExists($registerRequest)) {
                
                //check if user was created successfully
                if ($securityDAO->createUser($registerRequest) > 0) {
                    $response->setSuccess(true);
                } else {
                    $response->setMsg("Error inserting user into database.");
                }
            } else {
                $response->setMsg("User with email already exists.");
            }
        }
        
        return $response;
    }

    //filters strings
    function filter($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    //check for any illegal characters
    function IsSafe($string)
    {
        if (preg_match('/[^a-zA-Z0-9_]/', $string) == 0) {
            return true;
        } else {
            return false;
        }
    }

    //check if email is valid
    function isEmail($str)
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    } 
}