<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class AffinityGroupsController extends Controller
{
    //
    public function index() {
        $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();
        return view('affinity-groups', ['groups' => $data]);
    }
    public function loadUsersGroups($id) {
        $groupsDAO = new DAO('affinity_groups');
        $callback = function($value) {
            return $groupsDAO->get($value->GROUP_ID);
        };

        $userGroupsDAO = new DAO('affinity_group_users');
        $userGroupIds = $userGroupsDAO->list(['USER_ID' => $id]);
        $groups = array_map($callback, $userGroupIds);
        return $groups;
    }
}
