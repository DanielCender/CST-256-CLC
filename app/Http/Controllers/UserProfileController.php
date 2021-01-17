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

    }
    public function updateCVItem(Request $request) {

    }
    public function deleteCVItem(Request $request) {

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
