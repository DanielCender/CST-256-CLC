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

Route::get('/index', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});

// Admin Dashboard views and controller mappings
Route::get('/admin', 'App\Http\Controllers\AdministrationController@index');
//below route for edit the users detail and update.
Route::get('/admin/user-edit/{id}', 'App\Http\Controllers\AdministrationController@edit');
//update user button route
Route::put('/admin/user-update/{id}','App\Http\Controllers\AdministrationController@update');
Route::delete('/admin/user-delete/{id}', 'App\Http\Controllers\AdministrationController@delete');
