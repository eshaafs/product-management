<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;

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
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::resource('/products', ProductController::class)->middleware('auth');
Route::get('transactions/buy', [TransactionController::class, 'buy'])->middleware('auth');
Route::get('transactions/sell', [TransactionController::class, 'sell'])->middleware('auth');
Route::get('transactions/listSellProduct', [TransactionController::class, 'listSellProduct'])->middleware('auth');
Route::post('transactions/sell', [TransactionController::class, 'sellProduct'])->middleware('auth');
Route::resource('transactions', TransactionController::class)->middleware('auth');
Route::get('/reports', [ReportController::class, 'index'])->middleware('IsAdmin');