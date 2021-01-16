<?php

/**
 * CLC 3
 * JobPostingDAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-14-2021
 * File that contains the functions required for managing job posting item data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Interfaces\Stateful;

class JobPostingDAO implements Stateful
{
  public function list($filter = []) {
			// TODO: use filters
			// type: SALARY || HOURLY || CONTRACT || INTERNSHIP - not enum either
			// authorId: ...
			// creatorId: ...
			/** $filter is array<array> of col|condition|val
			 * [
    	 *	['status', '=', '1'],
    	 *  ['subscribed', '<>', '1'],
			 * ]
			 */
    return DB::table('job_postings')->where($filter)->get();
  }
	public function get($id) {
		$response = DB::table('job_postings')->where('ID', $id)->first();
		if(isset($response)) {
			return $response;
		} else {
			return NULL;
		}
	}
	public function create($input) {
		$id = DB::table('job_postings')->insertGetId($input);
		return $this->get($id);
	}
	public function update($id, $input) {
		$affected = DB::table('job_postings')
              ->where('ID', $id)
							->update($input);
		return $this->get($id);
  }
	public function delete($id) {
		return DB::table('job_postings')->where('ID', $id)->delete();
	}
}
