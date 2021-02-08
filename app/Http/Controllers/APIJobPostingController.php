<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;
use App\Models\DTO;
use App\Models\JobPostingModel;
use Exception;

class APIJobPostingController extends Controller
{
 public function index(Request $request) {
     $dto = new DTO();
    try {
        $jobsDAO = new DAO('job_postings');
        $dto->data = $jobsDAO->list();
    } catch (Exception $e) {
        $dto->errorCode = 500;
        $dto->errorMessage = 'An error occurred while processing your request. Msg: ' . $e->getMessage();
    }
        return $dto;
    }
 public function findSpecific(Request $request) {
        $dto = new DTO();
    try {
        $jobsDAO = new DAO('job_postings');

        $name = $request->query('name');
        $desc = $request->query('desc');
        $institution = $request->query('institution');
        $type = $request->query('type');

        $filters = array();
        if($name) array_push($filters, [
            'NAME',
            'LIKE',
            '%' . $name . '%'
        ]);
        if($desc) array_push($filters, [
            'DESCRIPTION',
            'LIKE',
            '%' . $desc . '%'
        ]);
        if($institution) array_push($filters, [
            'INSTITUTION',
            'LIKE',
            '%' . $institution . '%'
        ]);
        if($type) array_push($filters, [
            'TYPE',
            'LIKE',
            '%' . $type . '%'
        ]);

        if(count($filters) == 0) {
            $dto->data = [];
            return $dto;
        }

        // Transform items to more legible object structure, remove password fields
        $dto->data = array_map(function($el) {
            return new JobPostingModel($el->ID, $el->NAME, $el->DESCRIPTION, $el->INSTITUTION, $el->IDEAL_START_DATE, $el->TYPE, $el->USER_ID);
        }, $jobsDAO->list($filters)->toArray());
    } catch (Exception $e) {
        $dto->errorCode = 500;
        $dto->errorMessage = 'An error occurred while processing your request. Msg: ' . $e->getMessage();
    }
        return $dto;
    }
}
