<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;

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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/aksi_login', [AuthController::class, 'login'])->name('aksi_login');

Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::post('/tambahproduk', [ProdukController::class, 'tambah_produk'])->name('produk.post');
Route::delete('/hapusproduk/{id}', [ProdukController::class, 'hapus_produk'])->name('hapus.produk');
Route::post('/editproduk/{id}', [ProdukController::class, 'edit_produk'])->name('edit.produk');



