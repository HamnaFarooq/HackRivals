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

Auth::routes();

Route::get('/home', 'HomeController@home');
Route::get('/my_competitions', 'HomeController@competitions');
Route::get('/my_classrooms', 'HomeController@classrooms');
Route::get('/rankings', 'HomeController@rankings');
Route::get('/user_admin', 'HomeController@user_admin');
Route::get('/profile', 'HomeController@profile');



Route::post('/joinclass', 'UsersInClassroomController@store');
Route::get('/leaveclass/{id}', 'UsersInClassroomController@destroy');

Route::resource('/competition','CompetitionController');
Route::resource('/classroom','ClassroomController');
Route::resource('/problem','ProblemController');
Route::resource('/classroom/{id}/class_material','ClassMaterialController');
Route::resource('/problem/{id}/test_case','TestCaseController');
Route::resource('/rank','RankController');
Route::get('/home', 'AdminController@home');
Route::get('/classroomsList', 'AdminController@classroomsList');
Route::get('/competitionList', 'AdminController@competitionList');

Route::get('/editCompetition/{id}', 'AdminController@editCompetition');
Route::patch('/updateCompetition/{id}', 'AdminController@updateCompetition');
Route::patch('/updateClassrooms/{id}', 'AdminController@updateClassrooms');
Route::get('/editClassrooms/{id}', 'AdminController@editClassrooms');
Route::patch('/classroomsList/{id}', 'AdminController@updateClassroomsList');
Route::get('/deleteUser/{id}', 'AdminController@deleteUser');
Route::get('/deleteSuperUser/{id}', 'AdminController@deleteSuperUser');
Route::get('/blockUser/{id}', 'AdminController@blockUser');
Route::get('/unBlockUser/{id}', 'AdminController@unBlockUser');
Route::get('/deleteClassroom/{id}', 'AdminController@deleteClassroom');
Route::get('/deleteCompetition/{id}', 'AdminController@deleteCompetition');
Route::get('/editUsers/{id}', 'AdminController@editUsers');

Route::patch('/updateEditUser/{id}', 'AdminController@updateEditUser');

Route::get('/problem_attempt', 'HomeController@problem_attempt');