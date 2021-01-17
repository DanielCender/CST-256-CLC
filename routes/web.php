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
// route for register view
Route::get('/signup?fail', function () {
    return view('signup');
});

// Admin Dashboard views and controller mappings
Route::get('/admin', 'App\Http\Controllers\AdministrationController@index');
//below route for edit the users detail and update.
Route::get('/admin/user-edit/{id}', 'App\Http\Controllers\AdministrationController@edit');
//update user button route
Route::put('/admin/user-update/{id}', 'App\Http\Controllers\AdministrationController@update');
//delete user button route
Route::delete('/admin/user-delete/{id}', 'App\Http\Controllers\AdministrationController@delete');
// route for profile view
Route::get('/profile', function () {
    return view('profile');
});

// See a users skills and experiences
Route::get('/users/{id}', 'App\Http\Controllers\UserProfileController@index');

Route::get('/users/{id}/edit', 'App\Http\Controllers\UserProfileController@loadEdit');

// Routes for user profile forms and update route controllers
Route::get('/users/{id}/{cvItemId}/edit', 'App\Http\Controllers\UserProfileController@loadCVEdit');

//update user  button route
Route::put('/users/{id}/{cvItemId}/update', 'App\Http\Controllers\UserProfileController@update');
//delete user button route
Route::delete('/users/{id}/{cvItemId}/delete', 'App\Http\Controllers\UserProfileController@delete');
