<?php

/**
 * CLC 3
 * JobPostingRequiredSkillsDAO 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-14-2021
 * File that contains the functions required for managing job posting item data
 *
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Interfaces\Stateful;

class JobPostingRequiredSkillsDAO implements Stateful
{
  public function list($filter = []) {
			/** $filter is array<array> of col|condition|val
			 * [
    	 *	['TYPE', '=', 'SKILL'],
    	 *  ['JOB_POSTING_ID', '<>', '1'],
			 * ]
			 */
    return DB::table('job_posting_required_skills')->where($filter)->get();
  }
	public function get($id) {
		$response = DB::table('job_posting_required_skills')->where('ID', $id)->first();
		if(isset($response)) {
			return $response;
		} else {
			return NULL;
		}
	}
	public function create($input) {
		$id = DB::table('job_posting_required_skills')->insertGetId($input);
		return $this->get($id);
	}
	public function update($id, $input) {
		$affected = DB::table('job_posting_required_skills')
              ->where('ID', $id)
							->update($input);
		return $this->get($id);
  }
	public function delete($id) {
		return DB::table('job_postings')->where('ID', $id)->delete();
	}
}
