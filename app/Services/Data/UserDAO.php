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
use App\Models\UserUpdateModel;

class UserDAO
{
    // retrieves all users from db
  public function retrieveUsers()
    {
        return DB::table('users')->get();
    }
	//check if user with same email exists
  public function userExists($id)
    {
      $response = DB::table('users')->where('ID', $id)
        ->count();

      if ($response > 0) {
        return true;
      } else {
        return false;
      }
		}
	public function findById($id) {
		$response = DB::table('users')->where('ID', $id)->first();
		if(isset($response)) {
			return $response;
		} else {
			return NULL;
		}
	}
	public function update(UserUpdateModel $user) {
		$affected = DB::table('users')
              ->where('ID', $user->getId())
							->update(['EMAIL' => $user->getEmail(),
							'FIRSTNAME' => $user->getFirstName(),
							'LASTNAME' => $user->getLastName(),
							'ROLE' => $user->getRole(),
							'SUSPENDED' => $user->getSuspended()]);
		return $affected > 0;
  }
	public function delete($id) {
		return DB::table('users')->where('ID', $id)->delete();
	}

    /**
     * @deprecated Just so any UI updates in works from other devs don't break while we clean up data structure.
     */
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
    /**
     * @deprecated Just so any UI updates in works from other devs don't break while we clean up data structure.
     */
    // returns user from db based on id
    public function findUser($id)
    {
        $response = DB::table('users')->where('ID', $id)->first();
        return $response;
    }
}
