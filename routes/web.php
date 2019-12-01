<?php
use App\Task;
use Illuminate\Http\Request;

//Home
Route::get('/','HomeController@index');
Route::get('/login','HomeController@login');

//tasks
//Route::get('/','TaskController@index');
Route::post('/task', 'TaskController@create');
Route::delete('/task/{task}','TaskController@delete');

//users
//Route::
