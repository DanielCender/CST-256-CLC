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

// route for loggedin user home view
Route::get('/home', function () {
    return view('home');
});
// route for search for jobs view
Route::get('/jobs', function () {
    return view('jobs');
});
// route for search for jobs view
// Route::get('/profilelist', function () {
//     return view('profiles');
// });
Route::get('/profilelist', 'App\Http\Controllers\UserProfileController@loadAllProfiles');

Route::get('/user', function () {
    return view('thisUser');
});
Route::get('/myprofile', 'App\Http\Controllers\UserProfileController@loadNewEdit');

// Admin Dashboard views and controller mappings
Route::get('/admin', 'App\Http\Controllers\AdministrationController@index');
//below route for edit the users detail and update.
Route::get('/admin/user-edit/{id}', 'App\Http\Controllers\AdministrationController@edit');
//update user button route
Route::put('/admin/user-update/{id}', 'App\Http\Controllers\AdministrationController@update');
//delete user button route
Route::delete('/admin/user-delete/{id}', 'App\Http\Controllers\AdministrationController@delete');

// See a users skills and experiences
Route::get('/users/{id}', 'App\Http\Controllers\UserProfileController@index');
Route::get('/users/{id}/add', 'App\Http\Controllers\UserProfileController@loadAdd');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UserProfileController@loadEdit')->name('loadUserEdit');
Route::get('/users/{id}/profile/edit', 'App\Http\Controllers\UserProfileController@loadProfileEdit');
Route::post('/users/{id}/profile/update', 'App\Http\Controllers\UserProfileController@applyProfileEdit');
// Routes for user profile forms and update route controllers
Route::get('/users/{id}/{cvItemId}/edit', 'App\Http\Controllers\UserProfileController@loadCVEdit');

// Add user CV Item button route
Route::post('/users/{id}/add', 'App\Http\Controllers\UserProfileController@addCVItem');
// Update user CV Item button route
Route::post('/users/{id}/{cvItemId}/update', 'App\Http\Controllers\UserProfileController@updateCVItem');
// Delete user CV Item button route
Route::delete('/users/{id}/{cvItemId}/delete', 'App\Http\Controllers\UserProfileController@deleteCVItem');


// Affinity Groups
// Gets
Route::get('/groups', 'App\Http\Controllers\AffinityGroupsController@index');
Route::get('/groups/edit', 'App\Http\Controllers\AffinityGroupsController@loadEdit');
Route::get('/groups/edit/{id}/edit', 'App\Http\Controllers\AffinityGroupsController@loadGroupEditor');
Route::get('/groups/edit/create', function () {
    return view('affinity-group-create');
});

// Data Actions
Route::post('/groups/create', 'App\Http\Controllers\AffinityGroupsController@createGroup');
Route::post('/groups/edit/{id}/update', 'App\Http\Controllers\AffinityGroupsController@updateGroup');
Route::delete('/groups/edit/{id}/delete', 'App\Http\Controllers\AffinityGroupsController@deleteGroup');

// Affinity Groups Users
// Views
Route::get('/mygroups', 'App\Http\Controllers\UserProfileController@loadGroupsByUser');

// Data Ops
Route::post('/groups/{groupId}/{userId}/add', 'App\Http\Controllers\AffinityGroupsController@addUserToGroup');
Route::delete('/groups/{groupId}/{userId}/delete', 'App\Http\Controllers\AffinityGroupsController@removeUserFromGroup');


// Job Postings Views / Data Routes

// Views
Route::get('/jobs', 'App\Http\Controllers\JobPostingController@index');
Route::get('/jobs/create', 'App\Http\Controllers\JobPostingController@loadCreate');

// function() {
//     return view('job-create');
// });

// TODO
Route::get('/jobs/{jobId}/edit', 'App\Http\Controllers\JobPostingController@loadEdit');
// TODO
Route::get('/myjobs', 'App\Http\Controllers\UserProfileController@loadJobsByUser');

// Data Ops
Route::post('/jobs/create', 'App\Http\Controllers\JobPostingController@createJob');
// TODO
Route::post('/jobs/{jobId}/update', 'App\Http\Controllers\JobPostingController@updateJob');
// TODO
Route::delete('/jobs/{jobId}', 'App\Http\Controllers\JobPostingController@deleteJob');
