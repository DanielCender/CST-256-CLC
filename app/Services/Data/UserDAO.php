<?php

/**
 * CLC 2
 * UserDAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2021
 * File that contains the functions required for managing user data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class UserDAO
{
    
    // returns user from db based on id
    public function findUser($id)
    {
        $response = DB::table('users')->where('ID', $id)->first();
        return $response;
    }
    
    // retrieves all users from db
    public function retrieveUsers()
    {
        return DB::table('users')->get();
    }
    
    // updates user
    public function updateUser($user)
    {
        $result = DB::table('users')->where('ID', $user->getID())
        ->update([
            'EMAIL' => $user->getEmail(),
            'PASSWORD' => $user->getPassword(),
            'FIRSTNAME' => $user->getFirstName(),
            'LASTNAME' => $user->getLastName(),
            'RIGHTS' => $user->getRights(),
            'ROLE' => $user->getRole()
        ]);
        
        return $result;
    }
    
    // deletes user
    public function deleteUser($id)
    {
        return DB::table('users')->where('ID', $id)->delete();
        
    }
} 