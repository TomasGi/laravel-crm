<?php

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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'UserController@createUserManager');

Route::get('/user/create', 'UserController@showRegistrationForm');
Route::post('/user/create', 'UserController@create');

Route::get('/task/create', 'TaskController@showTaskForm');
Route::post('/task/create', 'TaskController@create');
Route::get('/task/index', 'TaskController@index');
