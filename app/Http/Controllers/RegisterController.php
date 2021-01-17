<?php

/**
 * CLC 1
 * RegisterController 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that handles all registration operations and
 * verifies whether a user is allowed to register
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegisterRequest;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    //returns view of register
    function index(Request $request)
    {
        return View("register");
    }

    //called on when user submits register form
    function attemptRegister(Request $request)
    {
        $this->validateForm($request);

        //variables
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');

        //initialize register request model
        $registerRequest = new RegisterRequest($email, $password, $passwordConfirm, $firstName, $lastName);
        //initialize security business service
        $securityService = new SecurityService();

        //register response
        $response = $securityService->register($registerRequest);

        //check if registration passed
        if ($response->getSuccess()) {
            //return if passed
            return view('userEdit', array(
                'email' => $registerRequest->getEmail()
            ));
        } else {
            //return if failed
            //TODO -- still working on fail page
            return view('signup?fail');
        }
    }

    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form
        // Lol, can't require Alpha now, cause of Elon Musk and Grimes'

        $rules = [
            'firstName' => 'Required | Max:30',
            'lastName' => 'Required | Max:30',
            'email' => 'Required | Email',
            'password' => 'Required | Between:8,16',
            'passwordConfirm' => 'Required | same:password'

        ];
        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}
