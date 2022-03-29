<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/orders/getOrder',[App\Http\Controllers\OrdersController::class, 'get_orders'])->name('get_orders');
Route::post('/orders/updateOrder',[App\Http\Controllers\OrdersController::class, 'update_order'])->name('update_order');
