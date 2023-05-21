<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dasboard');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::resource('/products', ProductController::class)->middleware('auth')->except([
    'create', 'store', 'edit', 'update', 'destroy'
]);
Route::get('transactions/sell', [TransactionController::class, 'sell'])->middleware('auth')->name('transactions.sell');
Route::post('transactions/sell', [TransactionController::class, 'sellProduct'])->middleware('auth');
Route::resource('transactions', TransactionController::class)->middleware('auth')->except([
    'edit', 'update', 'destroy'
]);
Route::get('/reports', [ReportController::class, 'index'])->middleware('super.admin')->name('reports');