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

Route::get('/', function (){
    return Redirect::to('/home');
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
    Route::get('/insertElement', 'ElementController@showInsertForm');
    Route::post('/insertElement', 'ElementController@insert');
    Route::get('/updateElement', 'ElementController@showUpdateMenu');
    Route::get('/updateElement/getElementId', 'ElementController@getElementId');
    Route::get('/updateElement/{elementId}', 'ElementController@showUpdateForm');
    Route::post('/updateElement/{elementId}', 'ElementController@update');
    Route::get('/insertPokemon', 'PokemonController@showInsertForm');
    Route::post('/insertPokemon', 'PokemonController@insert');
    Route::get('/updatePokemon/{pokemonId}', 'PokemonController@showUpdateForm');
    Route::post('/updatePokemon/{pokemonId}', 'PokemonController@update');
    Route::get('/deletePokemon/{pokemonId}', 'PokemonController@delete');
    Route::get('/transaction', 'TransactionController@index');
    Route::post('/transaction/{transactionDetailId}', 'TransactionController@Accept');
    Route::post('/transaction2/{transactionDetailId}', 'TransactionController@Decline');
    Route::get('/deleteTransaction', 'TransactionController@index2');
    Route::post('/transactionDelete/{transactionDetailId}', 'TransactionController@Delete');
    Route::get('/transactionDetail/{transactionDetailId}', 'TransactionController@Detail');
});

Route::group(['middleware' => 'registered'], function () {
    Route::get('/pokemonList', 'PokemonController@showPokemonList');
    Route::get('/pokemonList/search', 'PokemonController@search');
});

Route::group(['middleware' =>'member'], function(){
    Route::get('/pokemonDetail/{pokemonId}', 'PokemonController@showPokemonDetail');
    Route::post('/pokemonDetail/{pokemonId}/comment', 'CommentController@insert');
    Route::get('/profileUpdate/{userId}', 'ProfileController@showForm');
    Route::post('/profileUpdate/{userId}', 'ProfileController@update');
    Route::get('/pokemonDetail/{pokemonId}', 'PokemonController@showPokemonDetail');
    Route::post('/pokemonDetail/{pokemonId}/comment', 'CommentController@insert');
    Route::get('/cart', 'CartController@index');
    Route::post('/addCart/{pokemonId}', 'CartController@add');
    Route::get('/cart/{cartId}', 'CartController@destroy');
    Route::post('/insertTransactionDetail', 'TransactionController@insert');
    Route::get('/pokemonList', 'PokemonController@showPokemonList');
    Route::get('/pokemonList/search', 'PokemonController@search');
});