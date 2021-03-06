<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', 'UserController@home');
Route::get('/my_competitions', 'UserController@competitions');
Route::get('/my_classrooms', 'UserController@classrooms');
Route::get('/rankings', 'UserController@rankings');
Route::get('/user_admin', 'UserController@user_admin');
Route::get('/profile', 'UserController@profile');

Route::post('/joinclass', 'UsersInClassroomController@store');
Route::get('/leaveclass/{id}', 'UsersInClassroomController@destroy');

Route::post('/joincompetition', 'UsersInCompetitionController@store');
Route::get('/joincompetition/{id}', 'UsersInCompetitionController@storepub');
Route::get('/leavecompetition/{id}', 'UsersInCompetitionController@destroy');
Route::post('/submitcode', 'SolvedProblemsController@store');

Route::get('/competition/{id}/addproblem/{probid}', 'ProblemsInCompetitionController@store');
Route::get('/competition/{id}/removeproblem/{probid}', 'ProblemsInCompetitionController@destroy');
Route::get('/competition/{cid}/problem/{pid}', 'ProblemsInCompetitionController@show');
Route::get('/update_class_rankings/{id}', 'ClassroomController@updateRankings');

Route::post('/eval', 'SolvedProblemsController@eval');

Route::resource('/competition','CompetitionController');
Route::resource('/classroom','ClassroomController');
Route::resource('/problem','ProblemController');
Route::resource('/classroom/{id}/class_material','ClassMaterialController');
Route::resource('/problem/{id}/test_case','TestCaseController');

//admin routes

Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/editUser/{id}', 'AdminController@editUser');
Route::patch('/admin/updateUser/{id}', 'AdminController@updateUser');
Route::get('/admin/deleteUser/{id}', 'AdminController@deleteUser');
Route::get('/admin/blockUser/{id}', 'AdminController@blockUser');
Route::get('/admin/unBlockUser/{id}', 'AdminController@unBlockUser');

Route::get('/admin/classrooms', 'AdminController@classrooms');
Route::get('/admin/editClassroom/{id}', 'AdminController@editClassroom');
Route::patch('/admin/updateClassroom/{id}', 'AdminController@updateClassroom');
Route::get('/admin/deleteClassroom/{id}', 'AdminController@deleteClassroom');

Route::get('/admin/competitions', 'AdminController@competitions');
Route::get('/admin/editCompetition/{id}', 'AdminController@editCompetition');
Route::patch('/admin/updateCompetition/{id}', 'AdminController@updateCompetition');
Route::get('/admin/deleteCompetition/{id}', 'AdminController@deleteCompetition');

Route::get('/admin/problems', 'AdminController@problems');
Route::get('/admin/viewProblem/{id}', 'AdminController@viewProblem');
Route::get('/admin/copyProblem/{id}', 'AdminController@copyProblem');

Route::get('/admin/admins', 'AdminController@admins');
Route::get('/admin/makeAdmin/{id}', 'AdminController@makeAdmin');
Route::get('/admin/removeAdmin/{id}', 'AdminController@removeAdmin');