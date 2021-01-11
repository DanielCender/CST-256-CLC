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
    return view('index');
});

// route for login form action
Route::post('/doLogin', 'App\Http\Controllers\LoginController@attemptLogin');

// route for register form action
Route::post('/doRegister', 'App\Http\Controllers\RegisterController@attemptRegister');

// route for home view
Route::get('/index', function () {
    return view('index');
});
// route for Login view
Route::get('/login', function () {
    return view('login');
});
// route for register view
Route::get('/signup', function () {
    return view('signup');
});
// route for profile view
Route::get('/profile', function () {
    return view('profile');
});
