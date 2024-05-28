<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TransaksiHarianController;
use Illuminate\Support\Facades\Route;

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
});
// Route::resource('dashboard', DashboardController::class);
Route::resource('rekening', RekeningController::class);
Route::resource('periode', PeriodeController::class);
Route::resource('target', TargetController::class);
Route::resource('transaksi_harian', TransaksiHarianController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/pendapatan', [LaporanController::class, 'pendapatan'])->name('laporan.pendapatan');