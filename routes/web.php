<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrxInController;
use App\Http\Controllers\TrxOutController;
use App\Http\Controllers\StokController;

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
    return view('dashboard/index');
});

Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/trxin/index', [TrxInController::class, 'index'])->name('trxinindex');
// Route::get('/sales/create', [SalesController::class, 'create'])->name('salescreate');
Route::post('/trxin/store', [TrxInController::class, 'store'])->name('trxinstore');
Route::get('/sales/edit/{IdSalesDetail}', [SalesController::class, 'edit'])->name('salesedit');
Route::put('/sales/update/{IdSalesDetail}', [SalesController::class, 'update'])->name('salesupdate');
Route::put('/sales/delete/{IdSalesDetail}', [SalesController::class, 'destroy'])->name('salesdestroy');

Route::get('/stok/index', [StokController::class, 'index'])->name('stokindex');
Route::get('/stok/edit/{IdStok}', [StokController::class, 'edit'])->name('stokedit');
Route::put('/stok/update/{IdStok}', [StokController::class, 'update'])->name('stokupdate');



Route::get('/trxout/index', [TrxOutController::class, 'index'])->name('trxoutindex');

