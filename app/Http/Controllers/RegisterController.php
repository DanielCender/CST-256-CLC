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
    function index(Request $request) {
        return View("register");
    }
    
    //called on when user submits register form
    function attemptRegister(Request $request) {
        
        //variables
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password2');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        
        
        //initialize register request model
        $registerRequest = new RegisterRequest($email, $password, $password2, $firstName, $lastName);
        
        //initialize security business service
        $securityService = new SecurityService();
        
        //register response
        $response = $securityService->register($registerRequest);
        
        //check if registration passed
        if ($response->getSuccess()) {
            
            //return if passed
            return View('registerPassed', array(
                'email' => $registerRequest->getEmail()
            ));
        } else {
            
            //return if failed
            return View('registerFailed', array(
                'msg' => $response->getMsg()
            ));
        }
        
    }
    
}