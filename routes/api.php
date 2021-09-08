<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::get('/categories', 'CategoryController@getCategories');
    Route::get('/categories/{slug}', 'CategoryController@showCategory');
    Route::get('/products/{slug}', 'ProductController@showProduct');

    Route::middleware('auth:api')->group(function () {
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');

        Route::post('/cart', 'OrderController@viewCart');
        Route::post('order/checkout', 'OrderController@checkout');
    });
});
