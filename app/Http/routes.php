<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/updateUser', 'UserController@showUpdateMenu');
    Route::get('/updateUser/getUserId', 'UserController@getUserId');
    Route::get('/updateUser/{userId}', 'UserController@showUpdateForm');
    Route::post('/updateUser/{userId}', 'UserController@update');
    Route::get('/deleteUser', 'UserController@showDeleteMenu');
    Route::post('/deleteUser', 'UserController@delete');
});