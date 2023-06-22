<?php

use App\Http\Controllers\api\ApiAuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAllController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

    Route::get('/me', [ApiAuthController::class, 'me']);

    Route::get('/barang', [ApiAllController::class, 'barang']);
    Route::post('/add-barang', [ApiAllController::class, 'add_barang']);
    Route::put('/update-barang/{id}', [ApiAllController::class, 'update_barang']);
    Route::delete('/delete-barang/{id}', [ApiAllController::class, 'delete_barang']);
    Route::get('/get_barang_by_id/{id}', [ApiAllController::class, 'get_barang_by_id']);
    
    Route::get('/pemesanan',[ApiAllController::class,'pemesanan']);
    Route::get('/get_pemesanan_by_id/{id}', [ApiAllController::class, 'get_pemesanan_by_id']);
    Route::post('/add_pemesanan',[ApiAllController::class,'add_pemesanan']);
    Route::put('/update_pemesanan/{id}',[ApiAllController::class,'update_pemesanan']);
    Route::delete('/delete_pemesanan/{id}',[ApiAllController::class,'delete_pemesanan']);
    Route::post('/updateTransaksi', [ApiAllController::class, 'updateTransaksi']);
