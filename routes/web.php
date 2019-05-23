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


Route::get('/', 'PageController@home');


Route::resource('tasklist', 'TaskListController');

Route::resource('task', 'TaskController');
// Route::get('/tasks', 'TaskController@index');
// Route::get('/tasks/create', 'TaskController@create');
// Route::get('/tasks/{id}', 'TaskController@show');
// Route::post('/tasks/', 'TaskController@store');
// Route::get('/tasks/{id}/edit', 'TaskController@edit');
// Route::patch('/tasks/{id}', 'TaskController@update');
// Route::delete('/tasks/{id}', 'TaskController@destroy);