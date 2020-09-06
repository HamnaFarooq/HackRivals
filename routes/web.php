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




Route::resource('/competition','CompetitionController');
Route::resource('/classroom','ClassroomController');
Route::resource('/problem','ProblemController');
Route::resource('/class_material','ClassMaterialController');
Route::resource('/test_case','TestCaseController');
Route::resource('/rank','RankController');

