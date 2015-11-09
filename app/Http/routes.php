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

Route::group(['prefix' => 'back'], function(){
    Route::group(['prefix' => 'events'], function(){
        Route::get('/accept/{id}', ['uses' => 'EventController@accept', 'as' => 'events.accept']);

        Route::get('/', ['uses' => 'EventController@index', 'as' => 'events.index']);
        Route::get('/create', ['uses' => 'EventController@create', 'as' => 'events.create']);
        Route::post('/create', ['uses' => 'EventController@store', 'as' => 'events.store']);
        Route::get('/{id}/edit', ['uses' => 'EventController@edit', 'as' => 'events.edit']);
        Route::post('/{id}/edit', ['uses' => 'EventController@update', 'as' => 'events.update']);
        Route::post('/{id}/delete', ['uses' => 'EventController@destroy', 'as' => 'events.destroy']);
        Route::get('/{id}', ['uses' => 'EventController@show', 'as' => 'events.show']);
    });


});

Route::group(['namespace' => 'API', 'prefix' => 'api'], function(){
    Route::group(['prefix' => 'v1'], function(){

        Route::get('users/me', 'User\UserController@profile');
        Route::get('users/verify/{token?}', 'User\UserController@verify');

        Route::resource('users', 'User\UserController'); 
        Route::resource('suggestions', 'User\SuggestionController'); 

        Route::post('authenticate', 'Auth\AuthController@authenticate');
        Route::post('refresh', 'Auth\AuthController@refresh');

        Route::resource('professors', 'Professor\ProfessorController');
        Route::resource('events', 'Event\EventController');

        Route::group(['prefix' => 'autocomplete'], function(){
            Route::get('events', 'Event\EventController@autocomplete');
            Route::get('degrees', 'Degree\DegreeController@autocomplete');
            Route::get('faculties', 'Faculty\FacultyController@autocomplete');
        });
    });

});