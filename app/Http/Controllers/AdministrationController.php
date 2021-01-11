<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\UserDAO;
use App\Models\UserUpdateModel;
use App\Services\Data\SecurityDAO;
use App\Services\Business\AdministrationService;

class AdministrationController extends Controller
{
    public function index() {
        $service = new AdministrationService();
        $users = $service->listUsers();

        return view('admin')->with('users', $users);
    }
    public function edit($id) {
        $service = new AdministrationService();
        $user = $service->getEditableUser($id);
        if(isset($user)) {
            return view('userEdit')->with('user', $user);
        }
        return redirect('index');
    }
    public function update(Request $request, $id) {
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $role = $request->input('role');
        // suspended input either null or "on"
        $suspended = $request->input('suspended') == NULL ? false : true;

        $user = new UserUpdateModel($id, $email, $firstName, $lastName, $role, $suspended);
        // Perform operations to update user
        $service = new AdministrationService();
        $result = $service->updateUser($user);
        return redirect('admin');
    }
    public function delete($id) {
        $service = new AdministrationService();
        $result = $service->deleteUser($id);
        return redirect('admin');
    }
}
