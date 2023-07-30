<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\JenisSampahController;
use App\Http\Controllers\API\PembayaranRestController;
use App\Http\Controllers\API\TransaksiRestController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/auth/logout', [LoginController::class, 'logout']);
    Route::post('/pembayaran', [PembayaranRestController::class, 'getPembayaran']);
    Route::post('/transaksi', [TransaksiRestController::class, 'getTransaksi']);
    Route::post('/transaksi/store', [TransaksiRestController::class, 'saveTransaksi']);
});

Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/auth/register', [LoginController::class, 'register']);
Route::get('/jenis-sampah', [JenisSampahController::class, 'getAll']);
