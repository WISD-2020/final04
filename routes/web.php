<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;

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
// 管理員
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('userlists', [AdminUserController::class, 'index'])->name('admin.userlists.index');                            //會員管理(顯示所有會員)
    Route::get('userlists/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.userlists.edit');                    //編輯會員資料
    Route::patch('userlists/{id}', [AdminUserController::class, 'update'])->name('admin.userlists.update');                    //更新會員資料
    Route::delete('userlists/{id}', [AdminUserController::class, 'destroy'])->name('admin.userlists.destroy');
});


// 會員
Route::middleware(['auth:sanctum', 'verified'])->
get('/', [ProductsController::class, 'index'])->name('shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sendmail', [MailController::class, 'send']);

Route::middleware(['auth:sanctum', 'verified'])->
get('/products', [ProductsController::class, 'index'])->name('shop');


// 購物車路由
Route::get('/cart', function () {
    return view('/cart/index');
})->name('cart');
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/cart', [CartsController::class, 'index'])
    ->name('cart.index');
Route::middleware(['auth:sanctum', 'verified'])
    ->delete('/cart/{id}', [CartsController::class, 'destroy'])
    ->name('cart.destroy');
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/cart/add', [CartsController::class, 'store'])
    ->name('shop.store');


Route::middleware(['auth:sanctum', 'verified'])->get('/order', function () {
    return view('/order/index');
})->name('order');

Route::middleware(['auth:sanctum', 'verified'])->get('/user', function () {
    return view('/user/index');
});
