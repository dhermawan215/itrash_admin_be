<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriSampah;
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
});
