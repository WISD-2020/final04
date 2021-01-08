<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;


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
Route::prefix('admin')->group(function (){
    Route::get('/',[AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
});


//會員
Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sendmail', [MailController::class, 'send']);

Route::get('/shopping', function () {
    return view('/shopping/index');
})->name('shop');

Route::get('/cart', function () {
    return view('/cart/index');
})->name('cart');

Route::get('/order', function () {
    return view('/order/index');
})->name('order');

Route::get('/user', function () {
    return view('/user/index');
});

Route::get('/admin', function () {
    return view('/admin/index');
});
