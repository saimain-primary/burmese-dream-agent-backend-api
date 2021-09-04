<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:admin')->namespace('Backend')->as('admin.')->group(function () {

    Route::get('/', 'PageController@index');

    Route::resource('accounts', 'AdminController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');


    Route::get('export/users', 'UserController@exportExcel')->name('user.excel.export');
    Route::post('import/users', 'UserController@importExcel')->name('user.excel.import');

    Route::get('admin-user/datatable/ssd', 'AdminController@ssd');
    Route::get('user/datatable/ssd', 'UserController@ssd');
    Route::get('products/datatable/ssd', 'ProductController@ssd');
});
