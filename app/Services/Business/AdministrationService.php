<?php

/**
 * CLC 3
 * AdministrationService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-16-2020
 * File that contains the functions required for admin logic checks
 *
 */
namespace App\Services\Business;

use App\Models\ServiceResponse;
use App\Models\UserUpdateModel;
use App\Services\Data\DAO;

class AdministrationService
{
    private $dao;
    function __construct() {
        $this->dao = new DAO('users');
    }
    public function listUsers() {
        $users = $this->dao->list();
        return $users;
    }
    public function getEditableUser($id) {
        $user = $this->dao->get($id);
        if($user == false) {
            return NULL;
        }
        return $user;
    }
    public function updateUser(UserUpdateModel $user) {
        $existing = $this->dao->get($user->getId());
        $e = $this->filter($user->getEmail());
        $f = $this->filter($user->getFirstName());
        $l = $this->filter($user->getLastName());
        $r = $this->filter($user->getRole());
        $s = $this->filter($user->getSuspended());

        // Check if any fields have changed
        if(!($existing->EMAIL == $e) or !($existing->FIRSTNAME == $f) or !($existing->LASTNAME == $l) or !($existing->ROLE == $r) or !((bool) $existing->SUSPENDED == $s)) {
            $result = $this->dao->update($user->getId(), [
            'EMAIL' => $user->getEmail(),
            'FIRSTNAME' => $user->getFirstName(),
            'LASTNAME' => $user->getLastName(),
            'ROLE' => $user->getRole(),
            'SUSPENDED' => $user->getSuspended()
        ]);
            return $result;
        }
        return true;
    }
    public function deleteUser($id) {
        $result = $this->dao->delete($id);
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
