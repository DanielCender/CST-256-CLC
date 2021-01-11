<?php

/**
 * CLC 2
 * UserDAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2021
 * File that contains the functions required for validating user data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Models\UserUpdateModel;

class UserDAO
{
	public function listUsers() {
		  $response = DB::table('users')
						->get();
			return $response;
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
		$affected = DB::table('users')->where('ID', $id)->delete();
		return $affected > 0;
	}
}
