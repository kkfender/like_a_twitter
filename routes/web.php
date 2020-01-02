<?php
use App\Task;
use Illuminate\Http\Request;

//Home
Route::get('/login','HomeController@login');

//tasks

//Route::
Auth::routes();
<<<<<<< HEAD
Route::get('', 'HomeController@index')->name('home');
=======
Route::get('/', 'HomeController@index')->name('home');
>>>>>>> #7

Route::post('/post', 'PostController@post');
