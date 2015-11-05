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

Route::group(['namespace' => 'API', 'prefix' => 'api'], function(){
    Route::group(['prefix' => 'v1'], function(){

        Route::get('users/verify/{token?}', 'User\UserController@verify');
        Route::resource('users', 'User\UserController'); 

        Route::post('authenticate', 'Auth\AuthController@authenticate');

        Route::resource('events', 'Event\EventController');

        Route::group(['prefix' => 'autocomplete'], function(){
            Route::get('events', 'Event\EventController@autocomplete');
        });
    });

});