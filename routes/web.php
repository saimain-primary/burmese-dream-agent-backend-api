<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Auth::routes();

Route::get('admin/login', 'Backend\AuthController@showLoginForm');
Route::post('admin/login', 'Backend\AuthController@login')->name('admin.login');
Route::post('admin/logout', 'Backend\AuthController@logout')->name('admin.logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    $path = 'BurmeseDream/Products/Images/';
    $img = Storage::disk('ln_spaces')->url($path . "163068799459.jpg");
    return $img;
});
