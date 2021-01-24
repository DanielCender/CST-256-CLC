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
    public function loadAdd($id) {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        return view('cv-item-add', ['user' => $user]);
    }
    public function loadEdit($id) {
        $data = $this->loadData($id);
        return view('cv-edit', $data);
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
             return redirect('cv-edit', $data);
        }
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
