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
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::get('/view', 'TaskController@view');
Route::put('/view/{task}', 'TaskController@status');
Route::put('edit/{task}', 'TaskController@edit');
Route::put('update/{task}', 'TaskController@update');
Route::delete('/task/{task}', 'TaskController@destroy');
