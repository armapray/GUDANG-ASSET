<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route resource or CRUD
Route::resource('home', \App\Http\Controllers\HomeController::class);

Route::delete('/home/{post}', 'HomeController@destroy')->name('home.destroy');
Route::get('/home/{post}', 'HomeController@show')->name('home.show');
Route::get('/home/{post}', 'HomeController@edit')->name('home.edit');

Route::get('send', [HomeController::class, 'create'])->name('create');

// Route login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi')->middleware('auth');

// Route Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

