<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // Connection
    Route::get('/', 'HomeController@welcome')->name('home');
    Route::get('/info', 'HomeController@info');
    Route::get('/help', 'HomeController@help');
    Route::get('/commands', 'HomeController@commands')->name('commands');
    Route::get('/utilities', 'HomeController@utilities')->name('utilities');

    // Connection
    Route::post('/connect', 'ConnectionsController@set');
    Route::get('/connect', 'ConnectionsController@show')->name('connect');
    Route::get('/disconnect', 'ConnectionsController@disconnect');

    // Logs
    Route::get('/logs/{cloud}', 'LogsController@index');
    Route::get('/logs/{cloud}/data', 'LogsController@getLogData')->name('logs.data');

    // Logs
    Route::get('/messages', 'LogsController@messages');
});
