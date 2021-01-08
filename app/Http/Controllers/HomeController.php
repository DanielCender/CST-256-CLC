<?php

/**
 * CLC 1
 * HomeController 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that handles all home operations
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //returns view of home page
    public function index()
    {
        return view('welcome');
    }

    //constructor
    public function __construct()
    {}
}