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
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/suggestions_member','UserController@getSuggestions');
    Route::post('/suggestions','SuggestionController@store');

  Route::group(['middleware' => 'admin'], function () {

    Route::resource('/users','UserController');
    Route::post('/users_update_profile','UserController@updateProfile');
    Route::resource('/payments','PaymentController');
    Route::get('/suggestions','SuggestionController@index');
    Route::get('/suggestions/{id?}/answer','SuggestionController@edit');
    Route::post('/suggestions/{id?}','SuggestionController@update');

  });

  Route::group(['middleware' => 'member'], function () {

  });

});
