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
Route::post('/contacts','ContactController@store');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/suggestions_member','UserController@getSuggestions');
    Route::post('/suggestions','SuggestionController@store');
    Route::get('/payments_member','UserController@getPayments');

    Route::get('/profile_member','UserController@getProfile');
    Route::post('/users_update_profile','UserController@updateProfile');

  Route::group(['middleware' => 'admin'], function () {

    Route::resource('/users','UserController');

    Route::resource('/info_club','SiteController');

    Route::resource('/payments','PaymentController');
    Route::get('/suggestions','SuggestionController@index');
    Route::get('/suggestions/{id?}/answer','SuggestionController@edit');
    Route::post('/suggestions/{id?}','SuggestionController@update');
    Route::get('/contacts','ContactController@index');
    Route::resource('/news','NewsController');

    Route::resource('/meetings','MeetingController');

    Route::get('/meetings_assistance','MeetingController@listAssistance');

    Route::get('/meetings_records','MeetingController@listRecords');
    Route::get('/meetings_records/{id?}/edit','MeetingController@editRecords');
    Route::post('/meetings_records','MeetingController@saveRecord');
  });

  Route::group(['middleware' => 'member'], function () {

  });

});
