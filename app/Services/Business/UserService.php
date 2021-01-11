<?php

/**
 * CLC 2
 * UserService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2021
 * File that contains the functions required for managing user data
 *
 */
namespace App\Services\Business;

use App\Models\User;
use App\Services\Data\UserDAO;

class UserService
{

    // returns user from db based on id
    public function getUser($id)
    {
        $userDAO = new UserDAO();
        $response = $userDAO->findUser($id);
        return new User($response->ID, $response->EMAIL, $response->PASSWORD, $response->FIRSTNAME, $response->LASTNAME, $response->RIGHTS, $response->ROLE);
    }

    // updates user
    public function updateUser($user)
    {
        $userDAO = new UserDAO();
        if ($userDAO->updateUser($user) > 0)
            return true;

        return false;
    }

    // checks if use is logged in
    public function loggedIn()
    {
        if (session('user'))
            return true;
        return false;
    }

    // checks if user is an admin
    public function isAdmin()
    {
        if ($this->loggedIn())
            if (session('user')->getRights() > 0)
                return true;
        return false;   
    }

} 