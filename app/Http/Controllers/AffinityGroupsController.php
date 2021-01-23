<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class AffinityGroupsController extends Controller
{
    // Runs before /groups renders
    public function index() {
        $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();
        return view('affinity-groups', ['groups' => $data]);
    }
    // Runs before rendering a user's group list
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
    // Runs before rendering a
    public function loadEdit() {
       $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();
        return view('affinity-groups-edit', ['groups' => $data]);
    }
    // Runs before rendering a group editor
    public function loadGroupEditor($groupId) {
        $groupsDAO = new DAO('affinity_groups');
        $group  = $groupsDAO->get($groupId);
        $data = [
            'item' => $group
        ];
        return view('affinity-group-edit', $data);
    }
    // Runs after receiving group edits
    public function updateGroup(Request $request, $groupId) {
        $groupsDAO = new DAO('affinity_groups');

        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');

        $res = $groupsDAO->update($groupId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'TYPE' => $type
        ]);

        if($res) {
            return $this->loadEdit();
        }
    }
    // Runs after receiving DELETE HTTP request
    public function deleteGroup($id) {
        $groupsDAO = new DAO('affinity_groups');
        $res = $groupsDAO->delete($id);
        if($res) {
           $groupsDAO = new DAO('affinity_groups');
            $data = $groupsDAO->list();
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
        }
    }
}
