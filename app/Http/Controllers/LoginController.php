<?php

/**
 * CLC 1
 * LoginController 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that handles all login operations
 * Verifies whether a user is allowed to login
 *
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginRequest;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{

    //returns view of login
    function index(Request $request)
    {
        return View("login");
    }

    //called on when user submits login form
    function attemptLogin(Request $request)
    {
        
        //variables
        $email = $request->input('email');
        $password = $request->input('password');
        
        //initialize login request
        $loginRequest = new LoginRequest($email, $password);
        
        //initialize security business service
        $securityService = new SecurityService();
        
        //login response
        $response = $securityService->login($loginRequest);
        
        //check if login passed
        if ($response->getSuccess()) {
            
            //return if passed
            return View('loginPassed', array(
                'email' => $loginRequest->getEmail()
            
            ));
        } else {
            
            //return if failed
            return View('loginFailed', array(
                'msg' => $response->getMsg()
            ));
        }            
    }       
}