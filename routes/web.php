<?php

use Illuminate\Support\Facades\Route;

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

// route login
Route::get('/', 'LoginController@login')->name('login');
Route::post('loginaksi', 'LoginController@loginaksi')->name('loginaksi');
Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi')->middleware('auth');


