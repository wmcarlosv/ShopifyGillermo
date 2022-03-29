<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>array('auth')], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('users',App\Http\Controllers\UsersController::class);
    Route::get('profile',[App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
    Route::put('update_profile',[App\Http\Controllers\UsersController::class, 'update_profile'])->name('update_profile');
    Route::put('change_password',[App\Http\Controllers\UsersController::class, 'change_password'])->name('change_password');
    Route::resource('orders',App\Http\Controllers\OrdersController::class);
    Route::get('/fast-update/{id}/{column}/{value}', [App\Http\Controllers\OrdersController::class, 'fast_update'])->name('fast_update');
    Route::resource('products',App\Http\Controllers\ProductsController::class);
});