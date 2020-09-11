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
Route::get('/admin', 'AdminController@home');
Route::get('/classroomsList', 'AdminController@classroomsList');
Route::get('/privateCompetitionList', 'AdminController@privateCompetitionList');
Route::get('/publicCompetition', 'AdminController@publicCompetition');

Route::get('/editCompetition/{id}', 'AdminController@editCompetition');
Route::get('/editClassrooms', 'AdminController@editClassrooms');


Route::get('/problem_attempt', 'HomeController@problem_attempt');