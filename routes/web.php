<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\ProductsController;

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
//管理員
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
});


//會員
Route::middleware(['auth:sanctum', 'verified'])->
get('/', [ProductsController::class, 'index'])->name('shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sendmail', [MailController::class, 'send']);

Route::middleware(['auth:sanctum', 'verified'])->
get('/products', [ProductsController::class, 'index'])->name('shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function () {
    return view('/cart/index');
})->name('cart');

Route::middleware(['auth:sanctum', 'verified'])->get('/order', function () {
    return view('/order/index');
})->name('order');

Route::middleware(['auth:sanctum', 'verified'])->get('/user', function () {
    return view('/user/index');
});
