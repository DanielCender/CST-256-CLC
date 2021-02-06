<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class AffinityGroupsController extends Controller
{
    //  private $groupsDAO;
    // function __construct() {
    //     $this->groupsDAO = new DAO('affinity_groups');
    // }
    // Runs before /groups renders
    public function index(Request $request) {
        // check if user is logged in
        $id = $request->session()->get('userId', null);
        // Go to actual user group selector
        if($id) return redirect()->action([UserProfileController::class, 'loadGroupsByUser']);

        // $userDAO = new DAO('users');
        // $user = $userDAO->get($id);
        $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();

        // $groupUsersDAO = new DAO('affinity_group_users');
        // $map = function($el) {
        //     $usersGroups = $groupUsersDAO->list([['USER_ID', '=', $id]])->toArray();
        //     $el->JOINED = count($usersGroups) > 0;
        //     return $el;
        // };
        // $modifiedGroups = array_map($map, $data->toArray());
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
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
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

    public function createGroup(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');

        $groupsDAO = new DAO('affinity_groups');

        $res = $groupsDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'TYPE' => $type
        ]);

        if($res) {
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
        }
        return redirect('affinity-group-create');
    }

    // Adds a user to the group specified
    public function addUserToGroup(Request $request, $groupId, $userId) {
        $groupUsersDAO = new DAO('affinity_group_users');
        $userDAO = new DAO('users');
        $groupsDAO = new DAO('affinity_groups');
        // Verify user and group existence
        $user = $userDAO->get($userId);
        $group = $groupsDAO->get($groupId);
        // Verify user isn't already part of group
        $alreadyIn = $groupUsersDAO->list([[
            'USER_ID',
            '=',
            $userId
        ], [
            'GROUP_ID',
            '=',
            $groupId
        ]]);

        if(!$user or !$group or (count($alreadyIn) > 0)) {
            // Don't try to add user
            return redirect('affinity-groups');
        }

        $res = $groupUsersDAO->create([
            'USER_ID' => $userId,
            'GROUP_ID' => $groupId
        ]);

        if($res) {
            return redirect()->action([UserProfileController::class, 'loadGroupsByUser']);
        }
        return redirect('affinity-groups');
    }
    public function removeUserFromGroup(Request $request, $groupId, $userId) {
        $groupUsersDAO = new DAO('affinity_group_users');
        $userDAO = new DAO('users');
        $groupsDAO = new DAO('affinity_groups');
        // Verify user and group existence
        $user = $userDAO->get($userId);
        $group = $groupsDAO->get($groupId);
        // Verify user isn't already part of group
        $alreadyIn = $groupUsersDAO->list([[
            'USER_ID',
            '=',
            $userId
        ], [
            'GROUP_ID',
            '=',
            $groupId
        ]]);

        if(!$user or !$group or (count($alreadyIn) == 0)) {
            // Don't try to remove user
            return redirect('affinity-groups');
        }

        $res = $groupUsersDAO->delete($alreadyIn[0]->ID);

        if($res) {
            return redirect()->action([UserProfileController::class, 'loadGroupsByUser']);
        }
        return redirect('affinity-groups');
    }


}
