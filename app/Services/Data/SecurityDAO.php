<?php

/**
 * CLC 1
 * SecurityDAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that contains the functions required for validating user data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class SecurityDAO
{

    //check if user with credentials already exists
    public function verifyUser($loginRequest)
    {
        $response = DB::table('users')->where('EMAIL', $loginRequest->getEmail())
            ->where('password', $loginRequest->getPassword())
            ->count();
        if ($response > 0) {
            return true;
        } else {
            return false;
        }
    }

    //check if user with same email exists
    public function userExists($registerRequest)
    {
        $response = DB::table('users')->where('EMAIL', $registerRequest->getEmail())
            ->count();
        
        if ($response > 0) {
            return true;
        } else {
            return false;
        }
    }

    //insert new user in database
    public function createUser($registerRequest)
    {
        $result = DB::table('users')->insert([
            'EMAIL' => $registerRequest->getEmail(),
            'PASSWORD' => $registerRequest->getPassword(),
            'FIRSTNAME' => $registerRequest->getFirstName(),
            'LASTNAME' => $registerRequest->getLastName()
        ]);
        
        return $result;
    }
}