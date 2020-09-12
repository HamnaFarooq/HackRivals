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

Route::post('/joincompetition', 'UsersInCompetitionController@store');
Route::get('/joincompetition/{id}', 'UsersInCompetitionController@storepub');
Route::get('/leavecompetition/{id}', 'UsersInCompetitionController@destroy');
Route::post('/submitcode', 'SolvedProblemsController@store');

Route::get('/competition/{id}/addproblem/{probid}', 'ProblemsInCompetitionController@store');
Route::get('/competition/{id}/removeproblem/{probid}', 'ProblemsInCompetitionController@destroy');
Route::get('/competition/{id}/problem/{id}', 'ProblemsInCompetitionController@show');

Route::resource('/competition','CompetitionController');
Route::resource('/classroom','ClassroomController');
Route::resource('/problem','ProblemController');
Route::resource('/classroom/{id}/class_material','ClassMaterialController');
Route::resource('/problem/{id}/test_case','TestCaseController');
Route::resource('/rank','RankController');

