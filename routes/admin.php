<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:admin')->namespace('Backend')->as('admin.')->group(function () {

    Route::get('/', 'PageController@index');

    Route::resource('account', 'AdminController');
    Route::resource('user', 'UserController');

    Route::get('admin-user/datatable/ssd', 'AdminController@ssd');
    Route::get('user/datatable/ssd', 'UserController@ssd');
});
