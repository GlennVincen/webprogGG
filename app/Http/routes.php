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

Route::get('/formitem', function () {
    return view('formitem');
});

Route::get('/insertitem', 'ItemController@insert');

Route::get('/updateitem', 'ItemController@update');

Route::get('/deleteitem', 'ItemController@delete');

Route::get('/viewitem', 'ItemController@view');

Route::get('/openitemform', function() {
    return view('formitem');
});