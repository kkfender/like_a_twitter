<?php
use App\Task;
use Illuminate\Http\Request;

//Home
Route::get('/login','HomeController@login');


//Route::
Auth::routes();

Route::get('', 'HomeController@index')->name('');

Route::post('/post', 'PostController@post');

Route::post('/like', 'LikeController@like');
Route::post('/unlike', 'LikeController@unlike');
