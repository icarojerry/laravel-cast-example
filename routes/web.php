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


Route::get('/', 'WelcomeController@index');
Route::get('/home', 'ProjectController@index')->name('projects');


Route::resource('projects', 'ProjectController');

Route::resource('tasks', 'TaskProjectController');

Route::get('/projects/{project}/tasks/create', 'TaskProjectController@create');
Route::get('/projects/{project}/tasks/{task}', 'TaskProjectController@show');
Route::post('/projects/{project}/tasks', 'TaskProjectController@store');
Route::patch('/projects/{project}/tasks/{task}', 'TaskProjectController@update');
Route::delete('/projects/{project}/tasks/{task}', 'TaskProjectController@destroy');


Auth::routes();

