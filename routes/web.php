<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

// route login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi')->middleware('auth');



