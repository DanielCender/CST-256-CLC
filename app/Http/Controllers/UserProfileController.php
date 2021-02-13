<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class UserProfileController extends Controller
{
    public function index($id) {
        $data = $this->loadData($id);
        return view('cv', $data);
    }
    public function loadAllProfiles() {
        $userDAO = new DAO('users');
        $users = $userDAO->list();
        return view('profiles', ['users' => $users]);
    }
    public function loadAdd($id) {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        return view('cv-item-add', ['user' => $user]);
    }
    public function loadEdit($id) {
        $data = $this->loadData($id);
        return view('cv-edit', $data);
    }
    // New profile page makes use of the PHP session cookie.
    public function loadNewEdit(Request $request) {
        $id = $request->session()->get('userId', null);
         if(!$id) return view('login');
        $data = $this->loadData($id);
        return view('selfInfo', $data);
    }
    public function loadCVEdit($id, $cvItemId) {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        $cvItemsDAO = new DAO('cv_items');
        $cvItem  = $cvItemsDAO->get($cvItemId);
        $data = [
            'user' => $user,
            'item' => $cvItem
        ];
        return view('cv-item-edit', $data);
    }
    public function addCVItem(Request $request, $id) {
        $cvDAO = new DAO('cv_items');
        //variables
        $name = $request->input('name');
        $description = $request->input('description');
        $institution = $request->input('institution');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        $res = $cvDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'INSTITUTION' => $institution,
            'START_DATE' => $startDate,
            'END_DATE' => $endDate,
            'TYPE' => $type,
            'USER_ID' => $id
        ]);
        if($res) {
            $data = $this->loadData($id);
             return view('cv-edit', $data);
        } else {
             $this->loadAdd($id);
        }
    }
    public function updateCVItem(Request $request, $id, $cvItemId) {
        $cvDAO = new DAO('cv_items');

        $name = $request->input('name');
        $description = $request->input('description');
        $institution = $request->input('institution');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        $res = $cvDAO->update($cvItemId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'INSTITUTION' => $institution,
            'START_DATE' => $startDate,
            'END_DATE' => $endDate,
            'TYPE' => $type
        ]);

        if($res) {
            return $this->loadEdit($id);
        }
    }
    public function deleteCVItem($id, $cvItemId) {
        $cvDAO = new DAO('cv_items');
        $res = $cvDAO->delete($cvItemId);
        if($res) {
            $data = $this->loadData($id);
            return redirect()->route('loadUserEdit', ['id' => $id]);
        }
    }
    public function loadGroupsByUser(Request $request) {
        $groupsDAO = new DAO('affinity_groups');
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $groupUsersDAO = new DAO('affinity_group_users');

        $data = $groupsDAO->list();
        $modifiedGroups = array_map(function ($el) use ($id, $groupUsersDAO) {
            $usersGroups = $groupUsersDAO->list([['USER_ID', '=', $id], ['GROUP_ID', '=', $el->ID]])->toArray();
            $el->JOINED = count($usersGroups) > 0;
            return $el;
        }, $data->toArray());

        return view('affinity-groups-assigned', ['groups' => $modifiedGroups, 'userId' => $id]);
    }
    public function loadJobsByUser(Request $request) {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $jobsDAO = new DAO('job_postings');
        $res = $jobsDAO->list([['USER_ID', '=', $id]]);

        return view('posted-jobs', ['jobs' => $res]);
    }
    public function loadData($id) {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        $cvItemsDAO = new DAO('cv_items');
        $cvItems  = $cvItemsDAO->list([
            'USER_ID' => $id
        ]);
        $skills = $cvItems->filter(function($item) {
            return $item->TYPE === 'SKILL';
        });
        $jobs = $cvItems->filter(function($item) {
            return $item->TYPE === 'JOB';
        });
        $education =$cvItems->filter(function($item) {
            return $item->TYPE === 'LEARNING_EXPERIENCE';
        });

        return [
            'user' => $user,
            'skills' => $skills,
            'jobs' => $jobs,
            'education' => $education
        ];
    }
}
