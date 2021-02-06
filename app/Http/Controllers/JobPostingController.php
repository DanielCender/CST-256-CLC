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
        $userDAO = new DAO('users');

        $jobs = $jobsDAO->list();
        $params = ['jobs' => $jobs, 'name' => '', 'institution' => ''];
        if($id) {
            $job = $jobsDAO->get($id);
            $contact = $userDAO->get($job->USER_ID);
            // set parameters for selected item
            $params['selected'] = true;
            $params['item'] = $job;
            $params['item']->CONTACT = $contact->EMAIL;
        }

        // Figure out if we need to filter search results
        $name = $request->input('name');
        $institution = $request->input('institution');

        if($name) {
            $params['name'] = $name;
            $params['jobs'] = array_filter($jobs->toArray(), function($el) use ($name) {
                return strpos(strtolower($el->NAME), strtolower($name));
            });
        }
        if($institution) {
            $params['institution'] = $institution;
            $params['jobs']= array_filter($jobs->toArray(), function ($el) use ($institution) {
                return strpos(strtolower($el->INSTITUTION), strtolower($institution));
            });
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
    public function loadEdit(Request $request, $jobId) {
        // $jobId = $request->input('jobId')
         $jobsDAO = new DAO('job_postings');
         $job = $jobsDAO->get($jobId);

         return view('job-edit', ['item' => $job]);
    }
    public function updateJob(Request $request, $jobId) {
        $jobsDAO = new DAO('job_postings');

        $name = $request->input('name');
        $description = $request->input('description');
        $institution = $request->input('institution');
        $idealStartDate = $request->input('idealStartDate');
        $type = $request->input('type');

        $res = $jobsDAO->update($jobId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'INSTITUTION' => $institution,
            'IDEAL_START_DATE' => $idealStartDate,
            'TYPE' => $type
        ]);

        if($res) {
            return redirect()->action([UserProfileController::class, 'loadJobsByUser']);
        }
    }
    public function deleteJob($jobId) {
        $jobsDAO = new DAO('job_postings');
        $res = $jobsDAO->delete($jobId);
        if($res) {
            return redirect()->action([UserProfileController::class, 'loadJobsByUser']);
        }
    }
}
