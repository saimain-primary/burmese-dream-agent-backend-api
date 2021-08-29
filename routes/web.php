<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/login', 'Backend\AuthController@showLoginForm');
Route::post('admin/login', 'Backend\AuthController@login')->name('admin.login');
Route::post('admin/logout', 'Backend\AuthController@logout')->name('admin.logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
