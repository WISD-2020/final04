<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProductlistController;
use App\Http\Controllers\AdminOrderlistController;


use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;

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
// 管理員路由
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('userlists', [AdminUserController::class, 'index'])->name('admin.userlists.index');                            //會員管理(顯示所有會員)
    Route::get('userlists/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.userlists.edit');                    //編輯會員資料
    Route::patch('userlists/{id}', [AdminUserController::class, 'update'])->name('admin.userlists.update');                    //更新會員資料
    Route::patch('userlists/{id}', [AdminUserController::class, 'update'])->name('admin.userlists.update');                   //更新會員資料
    Route::delete('userlists/{id}', [AdminUserController::class, 'destroy'])->name('admin.userlists.destroy');                 //刪除會員資料
    Route::delete('userlists/{id}', [AdminUserController::class, 'destroy'])->name('admin.userlists.destroy');

    Route::get('productlists', [AdminProductlistController::class, 'index'])->name('admin.productlists.index');               //商品管理(顯示所有商品)
    Route::get('productlists/create', [AdminProductlistController::class, 'create'])->name('admin.productlists.create');      //新增商品
    Route::post('productlists/store', [AdminProductlistController::class, 'store'])->name('admin.productlists.store');         //儲存商品
    Route::get('productlists/{id}/edit', [AdminProductlistController::class, 'edit'])->name('admin.productlists.edit');       //編輯商品
    Route::patch('productlists/{id}', [AdminProductlistController::class, 'update'])->name('admin.productlists.update');       //更新商品
    Route::delete('productlists/{id}', [AdminProductlistController::class, 'destroy'])->name('admin.productlists.destroy');    //刪除商品

    Route::get('orderlists', [AdminOrderlistController::class, 'index'])->name('admin.orderlists.index');                   //訂單管理(顯示所有訂單)
    Route::get('orderlists/{id}/edit', [AdminOrderlistController::class, 'edit'])->name('admin.orderlists.edit');           //編輯訂單
    Route::patch('orderlists/{id}', [AdminOrderlistController::class, 'update'])->name('admin.orderlists.update');           //更新訂單
    Route::delete('orderlists/{id}', [AdminOrderlistController::class, 'destroy'])->name('admin.orderlists.destroy');        //刪除訂單
});


// 會員路由
Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductsController::class, 'index'])->name('shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sendmail', [MailController::class, 'send']);

// 購物區
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/products', [ProductsController::class, 'index'])
    ->name('shop.index');


// 購物車
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/cart', [CartsController::class, 'index'])
    ->name('cart.index');
Route::middleware(['auth:sanctum', 'verified'])
    ->delete('/cart/{id}', [CartsController::class, 'destroy'])
    ->name('cart.destroy');
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/cartadd', [CartsController::class, 'store'])
    ->name('cart.add');

// 訂單
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/order', [OrdersController::class, 'index'])
    ->name('order.index');


// 個人資料
Route::middleware(['auth:sanctum', 'verified'])->get('/user', function () {
    return view('/user/index');
});
