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
    public function addCVItem(Request $request) {
        $userDAO = new DAO('cv_items');
        //variables
        $name = $request->input('name');
        $description = $request->input('description');
        $institution = $request->input('institution');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        dd($name, $description, $institution, $startDate, $endDate, $type);
    }
    public function updateCVItem(Request $request) {
        $userDAO = new DAO('cv_items');

    }
    public function deleteCVItem(Request $request) {
        $userDAO = new DAO('cv_items');

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
