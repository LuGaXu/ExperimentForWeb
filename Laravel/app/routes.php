<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');

Route::group(array('prefix' => 'api/v1'), function()
    {
		Route::resource('sleepdata','SleepDataController');
		Route::resource('bloodpressuredata','BloodpressureDataController');
		Route::resource('heartratedata','HeartrateDataController');
		Route::resource('distancedata','DistanceDataController');
		Route::resource('stepdata','StepDataController');
        Route::resource('bodydata','BodyDataController');
		
		Route::resource('sleep','SleepController');
		Route::resource('bloodpressure','BloodpressureController');
		Route::resource('heartrate','HeartrateController');
		Route::resource('distance','DistanceController');
		Route::resource('step','StepController');
       
    });

Route::resource('activities','ActivityPageController');
Route::resource('index','IndexController');
Route::get('bodydata/weightdata','BodyDataPageController@weightdata');
Route::get('bodydata/bwhdata','BodyDataPageController@bwhdata');
Route::get('bodydata/heartratedata','BodyDataPageController@heartratedata');
Route::get('bodydata/bloodpressuredata','BodyDataPageController@bloodpressuredata');

Route::get('bodydata/weightdata','BodyDataPageController@weightdata');
Route::get('bodydata/bwhdata','BodyDataPageController@bwhdata');
Route::get('bodydata/heartratedata','BodyDataPageController@heartratedata');
Route::get('bloodpressuredata','BloodpressureDataController');

Route::resource('bodydata','BodyDataPageController');
Route::get('sportsdata/distance','SportsDataPageController@distance');
Route::get('sportsdata/steps','SportsDataPageController@steps');
Route::get('sportsdata/actTime','SportsDataPageController@actTime');
Route::get('sportsdata/calories','SportsDataPageController@calories');
Route::resource('sportsdata','SportsDataPageController');
Route::resource('sleepdata','SleepDataPageController');
Route::resource('home', 'UserController@postLogin');