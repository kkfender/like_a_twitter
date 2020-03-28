<?php
use App\Task;
use Illuminate\Http\Request;

//Home
Route::get('/login','HomeController@login');


//Route::
Auth::routes();

Route::get('', 'HomeController@index')->name('home.index');
Route::get('/{userName}', 'UserController@index')->name('user.index');
Route::post('/update', 'UserController@update')->name('user.update');

Route::post('/post', 'PostController@post');
Route::delete('/delete/{delete}', 'PostController@delete');


Route::post('/user/{user}/like/{post}', 'LikeController@store')->name('like.store');;
Route::post('/user/{user}/unlike/{post}', 'LikeController@destroy')->name('like.destroy');;;
