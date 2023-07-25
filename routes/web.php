<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminJenisSampah;
use App\Http\Controllers\AdminKategoriSampah;
use App\Http\Controllers\AdminTransaksi;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    //admiin dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //admin kategori sampah
    Route::get('/kategori-sampah', [AdminKategoriSampah::class, 'index'])->name('admin.kategori_sampah');
    Route::post('/kategori-sampahs', [AdminKategoriSampah::class, 'getAllData']);
    Route::post('/kategori-sampah', [AdminKategoriSampah::class, 'store']);
    Route::patch('/kategori-sampah/{item}', [AdminKategoriSampah::class, 'update']);

    //admin jenis sampah
    Route::get('/jenis-sampah', [AdminJenisSampah::class, 'index'])->name('admin.jenis_sampah');
    Route::post('/jenis-sampahs', [AdminJenisSampah::class, 'getAllData']);
    Route::get('/jenis-sampah/create', [AdminJenisSampah::class, 'create'])->name('admin.jenis_sampah.create');
    Route::post('/jenis-sampah', [AdminJenisSampah::class, 'store']);
    Route::get('/jenis-sampah/{item}/edit', [AdminJenisSampah::class, 'edit'])->name('admin.jenis_sampah.edit');
    Route::patch('/jenis-sampah/{item}', [AdminJenisSampah::class, 'update']);
    Route::delete('/jenis-sampah/{item}', [AdminJenisSampah::class, 'delete']);

    //admin transaksi
    Route::get('/transaksi', [AdminTransaksi::class, 'index'])->name('admin.transaksi');
    Route::post('/transaksis', [AdminTransaksi::class, 'getAllData']);
    Route::post('/transaksi', [AdminTransaksi::class, 'store']);
    Route::patch('/transaksi/proses/{item}', [AdminTransaksi::class, 'prosesTransaksiItem']);
    Route::get('/transaksi/create', [AdminTransaksi::class, 'create'])->name('admin.transaksi.create');
    Route::get('/transaksi/{item}', [AdminTransaksi::class, 'detail'])->name('admin.transaksi.detail');
    Route::post('/transaksi-change-status/{item}', [AdminTransaksi::class, 'chengeStatus']);
    Route::get('/transaksi/success/{item}', [AdminTransaksi::class, 'success']);

    // admin transaksi detail
    Route::get('/transaksi-detail/{item}', [AdminTransaksi::class, 'transaksiDetail'])->name('admin.transaksi_detail');
    Route::post('/transaksi-details', [AdminTransaksi::class, 'dataItemTransaksi']);
    Route::post('/view-transaksi-details', [AdminTransaksi::class, 'viewItemTransaksi']);
    Route::post('/transaksi-detail', [AdminTransaksi::class, 'transaksiDetailStore']);
    Route::post('/transaksi-item-detail/{item}', [AdminTransaksi::class, 'transaksiItemDetail']);
    Route::patch('/transaksi-item-detail/{item}', [AdminTransaksi::class, 'transaksiItemDetailUpdate']);
    Route::delete('/transaksi-detail/{item}', [AdminTransaksi::class, 'transaksiDetailDelete']);
});
