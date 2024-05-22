<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananTransaksiController;
use App\Http\Resources\PesananTransaksiResources;
use App\Models\Transaksi;

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'store']);

Route::middleware('auth.basic')->group(function () {
    Route::get('/pesanan', [PesananTransaksiController::class, 'index']);
    // Tambahkan route lainnya jika diperlukan
});

Route::get('/pesanan/{id}', [PesananTransaksiController::class, 'show']);
Route::get('/pesanan/search/{name}/{id}', [PesananTransaksiController::class, 'showByNameProduk']);
Route::get('/pesanan/pickup/{status}', [PesananTransaksiController::class, 'showByStatus']);
Route::put('/pesanan/{id}', [PesananTransaksiController::class, 'updateStatus']);

// Route::middleware('auth.basic')->get('/pesanan', [PesananTransaksiController::class, 'index']);