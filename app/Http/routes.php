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

Route::group(['prefix' => 'back', 'namespace' => 'Backend'], function(){
    Route::get('/', ['uses' => 'HomeController@dashboard', 'middleware' => 'auth', 'as' => 'dashboard']);

    Route::group(['namespace' => 'Auth'], function(){
        Route::get('login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
        Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => 'auth.login.post']);
        Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
    });

    Route::group(['prefix' => 'events', 'namespace' => 'Event', 'middleware' => 'auth'], function(){
        Route::get('/accept/{id}', ['uses' => 'EventController@accept', 'as' => 'events.accept']);
        Route::post('/contact/{id}', ['uses' => 'EventController@contact', 'as' => 'events.contact']);

        Route::get('/', ['uses' => 'EventController@index', 'as' => 'events.index']);
        Route::get('/create', ['uses' => 'EventController@create', 'as' => 'events.create']);
        Route::post('/create', ['uses' => 'EventController@store', 'as' => 'events.store']);
        Route::get('/{id}/edit', ['uses' => 'EventController@edit', 'as' => 'events.edit']);
        Route::post('/{id}/edit', ['uses' => 'EventController@update', 'as' => 'events.update']);
        Route::post('/{id}/delete', ['uses' => 'EventController@destroy', 'as' => 'events.destroy']);
        Route::get('/{id}', ['uses' => 'EventController@show', 'as' => 'events.show']);
    });

    Route::group(['prefix' => 'categories', 'namespace' => 'Category', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'CategoryController@index', 'as' => 'categories.index']);
        Route::get('/create', ['uses' => 'CategoryController@create', 'as' => 'categories.create']);
        Route::post('/create', ['uses' => 'CategoryController@store', 'as' => 'categories.store']);
        Route::get('/{id}/edit', ['uses' => 'CategoryController@edit', 'as' => 'categories.edit']);
        Route::post('/{id}/edit', ['uses' => 'CategoryController@update', 'as' => 'categories.update']);
        Route::post('/{id}/delete', ['uses' => 'CategoryController@destroy', 'as' => 'categories.destroy']);
        Route::get('/{id}', ['uses' => 'CategoryController@show', 'as' => 'categories.show']);
    });

    Route::group(['prefix' => 'professors', 'namespace' => 'Professor', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'ProfessorController@index', 'as' => 'professors.index']);
        Route::get('/create', ['uses' => 'ProfessorController@create', 'as' => 'professors.create']);
        Route::post('/create', ['uses' => 'ProfessorController@store', 'as' => 'professors.store']);
        Route::get('/{id}/edit', ['uses' => 'ProfessorController@edit', 'as' => 'professors.edit']);
        Route::post('/{id}/edit', ['uses' => 'ProfessorController@update', 'as' => 'professors.update']);
        Route::post('/{id}/delete', ['uses' => 'ProfessorController@destroy', 'as' => 'professors.destroy']);
        Route::get('/{id}', ['uses' => 'ProfessorController@show', 'as' => 'professors.show']);
    });

    Route::group(['prefix' => 'places', 'namespace' => 'Place', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'PlaceController@index', 'as' => 'places.index']);
        Route::get('/create', ['uses' => 'PlaceController@create', 'as' => 'places.create']);
        Route::post('/create', ['uses' => 'PlaceController@store', 'as' => 'places.store']);
        Route::get('/{id}/edit', ['uses' => 'PlaceController@edit', 'as' => 'places.edit']);
        Route::post('/{id}/edit', ['uses' => 'PlaceController@update', 'as' => 'places.update']);
        Route::post('/{id}/delete', ['uses' => 'PlaceController@destroy', 'as' => 'places.destroy']);
        Route::get('/{id}', ['uses' => 'PlaceController@show', 'as' => 'places.show']);
    });

    Route::group(['prefix' => 'degrees', 'namespace' => 'Degree', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'DegreeController@index', 'as' => 'degrees.index']);
        Route::get('/create', ['uses' => 'DegreeController@create', 'as' => 'degrees.create']);
        Route::post('/create', ['uses' => 'DegreeController@store', 'as' => 'degrees.store']);
        Route::get('/{id}/edit', ['uses' => 'DegreeController@edit', 'as' => 'degrees.edit']);
        Route::post('/{id}/edit', ['uses' => 'DegreeController@update', 'as' => 'degrees.update']);
        Route::post('/{id}/delete', ['uses' => 'DegreeController@destroy', 'as' => 'degrees.destroy']);
        Route::get('/{id}', ['uses' => 'DegreeController@show', 'as' => 'degrees.show']);
    });

    Route::group(['prefix' => 'faculties', 'namespace' => 'Faculty', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'FacultyController@index', 'as' => 'faculties.index']);
        Route::get('/create', ['uses' => 'FacultyController@create', 'as' => 'faculties.create']);
        Route::post('/create', ['uses' => 'FacultyController@store', 'as' => 'faculties.store']);
        Route::get('/{id}/edit', ['uses' => 'FacultyController@edit', 'as' => 'faculties.edit']);
        Route::post('/{id}/edit', ['uses' => 'FacultyController@update', 'as' => 'faculties.update']);
        Route::post('/{id}/delete', ['uses' => 'FacultyController@destroy', 'as' => 'faculties.destroy']);
        Route::get('/{id}', ['uses' => 'FacultyController@show', 'as' => 'faculties.show']);
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