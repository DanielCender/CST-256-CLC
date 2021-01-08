<?php
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// route for home view
Route::get('/', function () {
    return view('welcome');
});

// route for login form action
Route::post('/doLogin', 'App\Http\Controllers\LoginController@attemptLogin');

// route for register form action
Route::post('/doRegister', 'App\Http\Controllers\RegisterController@attemptRegister');

// route for login view
Route::get('/login', function () {
    return view('login');
});

// route for register view
Route::get('/register', function () {
    return view('register');
});