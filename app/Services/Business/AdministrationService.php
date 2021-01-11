<?php

/**
 * CLC 2
 * AdministrationService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2020
 * File that contains the functions required for admin logic checks
 *
 */
namespace App\Services\Business;

use App\Models\LoginResponse;
use App\Models\RegisterResponse;
use App\Models\UserUpdateModel;
use App\Services\Data\SecurityDAO;
use App\Services\Data\UserDAO;

class AdministrationService
{
    public function listUsers() {
        $service = new UserDAO();
        $users = $service->retrieveUsers();
        return $users;
    }
    public function getEditableUser($id) {
        $securityService = new SecurityDAO();
        $service = new UserDAO();

        // find if user exists
        $exists = $service->userExists($id);
        if($exists == false) {
            return NULL;
        }
        $user = $service->findById($id);
        return $user;
    }
    public function updateUser(UserUpdateModel $user) {
        $securityService = new SecurityDAO();
        $service = new UserDAO();
        $existing = $service->findById($user->getId());
        $e = $this->filter($user->getEmail());
        $f = $this->filter($user->getFirstName());
        $l = $this->filter($user->getLastName());
        $r = $this->filter($user->getRole());
        $s = $this->filter($user->getSuspended());

        // Check if any fields have changed
        if(!($existing->EMAIL == $e) or !($existing->FIRSTNAME == $f) or !($existing->LASTNAME == $l) or !($existing->ROLE == $r) or !((bool) $existing->SUSPENDED == $s)) {
            $result = $service->update($user);
            return $result;
        }
        return true;
    }
    public function deleteUser($id) {
        $service = new UserDAO();
        $result = $service->delete($id);
        return $result;
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
