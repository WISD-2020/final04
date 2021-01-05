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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sendmail', [\App\Http\Controllers\MailController::class, 'send']);

Route::get('/shopping', function () {
    return view('/shopping/index');
});

Route::get('/cart', function () {
    return view('/cart/index');
});

Route::get('/order', function () {
    return view('/order/index');
});

Route::get('/user', function () {
    return view('/user/index');
});

Route::get('/admin', function () {
    return view('/admin/index');
});
