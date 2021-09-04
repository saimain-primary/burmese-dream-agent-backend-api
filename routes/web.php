<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Auth::routes();

Route::get('admin/login', 'Backend\AuthController@showLoginForm');
Route::post('admin/login', 'Backend\AuthController@login')->name('admin.login');
Route::post('admin/logout', 'Backend\AuthController@logout')->name('admin.logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    // $path = 'BurmeseDream/Products/Images/';
    // $img = Storage::disk('ln_spaces')->url($path . "163068799459.jpg");
    // return $img;
    $o = [
        [
            'product_id' => 1,
            'qty' => 13
        ],
        [
            'product_id' => 2,
            'qty' => 5
        ]
    ];

    $user = User::find(1);

    $order = new Order();
    $order->user_id = $user->id;
    $order->order_id = 'BDO-3049';
    $order->order = json_encode($o);
    $order->payment = 'KPay';
    $order->payment_slip = 'screenshot.png';
    $order->save();
    return $order;
});
