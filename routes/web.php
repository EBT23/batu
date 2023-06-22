<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemesananController;

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
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/aksi_login', [AuthController::class, 'login'])->name('aksi_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::controller(DashboardController::class)->group( function(){
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/profile','profile')->name('profile');
    Route::post('/edit-profile/{id}','edit_profile')->name('edit.profile');
});

Route::controller(LaporanController::class)->group( function(){
    Route::get('/laporan','laporan')->name('laporan');
    Route::get('/export-excel','downloadExcel')->name('export.excel');
});

Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::post('/tambahproduk', [ProdukController::class, 'tambah_produk'])->name('produk.post');
Route::delete('/hapusproduk/{id}', [ProdukController::class, 'hapus_produk'])->name('hapus.produk');
Route::post('/editproduk/{id}', [ProdukController::class, 'edit_produk'])->name('edit.produk');

Route::controller(PemesananController::class)->group( function (){
    Route::get('/pemesanan','pemesanan')->name('pemesanan');
    Route::post('/update-pemesanan/{id}','update_pemesanan')->name('update.pemesanan');
});


Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache cleared';
});
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Routes cache cleared';
});