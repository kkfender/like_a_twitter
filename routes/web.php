<?php
use App\Task;
use Illuminate\Http\Request;

//Home
Route::get('/login','HomeController@login');

//tasks

//Route::
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::post('/post', 'PostController@post');
