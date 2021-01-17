<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class UserProfileController extends Controller
{
    public function index($id) {
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
        return view('cv', [
            'user' => $user,
            'skills' => $skills,
            'jobs' => $jobs,
            'education' => $education
        ]);
    }
}
