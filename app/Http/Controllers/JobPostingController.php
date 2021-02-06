<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class JobPostingController extends Controller
{
    //
    public function index(Request $request) {
        $id = $request->input('selected');
        $jobsDAO = new DAO('job_postings');

        $jobs = $jobsDAO->list();
        $params = ['jobs' => $jobs];
        if($id) {
            $job = $jobsDAO->get($id);
            // set parameters for selected item
            $params['selected'] = true;
            $params['item'] = $job;
        }

        return view('jobs', $params);
    }
    public function createJob(Request $request) {
        $id = $request->session()->get('userId', null);
        $jobsDAO = new DAO('job_postings');
        //variables
        $name = $request->input('name');
        $description = $request->input('description');
        $institution = $request->input('institution');
        $idealStartDate = $request->input('idealStartDate');
        $type = $request->input('type');

        $res = $jobsDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'INSTITUTION' => $institution,
            'IDEAL_START_DATE' => $idealStartDate,
            'TYPE' => $type,
            'USER_ID' => $id
        ]);

        if($res) {
            return redirect()->action([JobPostingController::class, 'index']);
        }
        return view('job-create');
    }
}
