<?php

/**
 * CLC 3
 * DAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-14-2021
 * File that contains the functions required for managing user cv item data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Interfaces\Stateful;

class DAO implements Stateful
{
	private $tableName;
	function __construct($tableName = '') {
		$this->tableName = $tableName;
	}

  public function list($filter = [])
    {
			// type: JOB || SKILL || LEARNING_EXPERIENCE
			// userId: ...
			/** $filter is array<array> of col|condition|val
			 * [
    	 *	['status', '=', '1'],
    	 *  ['subscribed', '<>', '1'],
			 * ]
			 */
      return DB::table($this->tableName)->where($filter)->get();
    }
	public function get($id) {
		$response = DB::table($this->tableName)->where('ID', $id)->first();
		if(isset($response)) {
			return $response;
		} else {
			return NULL;
		}
	}
	public function create($input) {
		$id = DB::table($this->tableName)->insertGetId($input);
		return $this->get($id);
	}
	public function update($id, $input) {
		$affected = DB::table($this->tableName)
              ->where('ID', $id)
							->update($input);
		return $this->get($id);
  }
	public function delete($id) {
		return DB::table($this->tableName)->where('ID', $id)->delete();
	}
}
