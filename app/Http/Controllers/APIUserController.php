<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;
use App\Models\DTO;
use App\Models\UserUpdateModel;

class APIUserController extends Controller
{
 public function index(Request $request) {
        $dto = new DTO();
        $userDAO = new DAO('users');

        $email = $request->query('email');
        $firstName = $request->query('firstName');
        $lastName = $request->query('lastName');
        $role = $request->query('role');
        $suspended = $request->query('suspended');

        $filters = array();
        if($email) array_push($filters, [
            'EMAIL',
            'LIKE',
            '%' . $email . '%'
        ]);
        if($firstName) array_push($filters, [
            'FIRSTNAME',
            'LIKE',
            '%' . $firstName . '%'
        ]);
        if($lastName) array_push($filters, [
            'LASTNAME',
            'LIKE',
            '%' . $lastName . '%'
        ]);
        if($role) array_push($filters, [
            'ROLE',
            'LIKE',
            '%' . $role . '%'
        ]);
        if($suspended) array_push($filters, [
            'SUSPENDED',
            'LIKE',
            '%' . $suspended . '%'
        ]);

        if(count($filters) == 0) {
            $dto->data = [];
            return $dto;
        }

        // Transform items to more legible object structure, remove password fields
        $dto->data = array_map(function($el) {
            return new UserUpdateModel($el->ID, $el->EMAIL, $el->FIRSTNAME, $el->LASTNAME, $el->ROLE, $el->SUSPENDED);
        }, $userDAO->list($filters)->toArray());

        return $dto;
    }
}
