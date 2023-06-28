<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');

Route::middleware(['auth'])->group(function () {
    Route::get('/register-user', [RegisterUserController::class, 'showRegistrationForm'])->name('register.user');
    Route::post('/register-user', [RegisterUserController::class, 'register'])->name('register.user');
});
