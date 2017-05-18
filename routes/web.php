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
    return view('welcome')
        ->with('site',\App\Site::first())
        ->with('news',\App\News::all())
        ->with('users',\App\User::all());
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::post('/contacts','ContactController@store');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/suggestions_member','UserController@getSuggestions');
    Route::post('/suggestions','SuggestionController@store');
    Route::get('/payments_member','UserController@getPayments');
    Route::get('/assistance_member','UserController@getAssistance');
    Route::get('/activities_member','UserController@getActivitiesAssistance');
    Route::get('/lend_equipments_member','UserController@getLendEquipment');

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
    Route::get('/meetings_assistance/{id?}/edit','MeetingController@editAssistance');
    Route::post('/meetings_assistance','MeetingController@saveAssistance');

    Route::get('/meetings_records','MeetingController@listRecords');
    Route::get('/meetings_records/{id?}/edit','MeetingController@editRecords');
    Route::post('/meetings_records','MeetingController@saveRecord');

    Route::resource('/equipments','EquipmentController');
    Route::get('/lend_equipments','EquipmentController@listLendEquipments');
    Route::post('/lend_equipments','EquipmentController@saveLendEquipments');
    Route::get('/lend_equipments/{id?}/edit','EquipmentController@editLendEquipments');

    Route::resource('/activities','ActivityController');

    Route::get('/activities_assistance','ActivityController@listActivityAssistance');
    Route::get('/activities_assistance/{id?}/edit','ActivityController@editActivityAssistance');
    Route::post('/activities_assistance','ActivityController@saveActivityAssistance');

  });

  Route::group(['middleware' => 'member'], function () {

  });

});
