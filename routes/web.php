<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PengaduanController::class, 'home']);
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pengaduan', [PengaduanController::class, 'create']);
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::get('/semuapengaduan', [PengaduanController::class, 'semuaPengaduan']);
    Route::get('/pengaduansaya', [PengaduanController::class, 'pengaduansaya']);
    Route::get('/belum', [PengaduanController::class, 'belum']);
    Route::get('/proses', [PengaduanController::class, 'proses']);
    Route::get('/selesai', [PengaduanController::class, 'selesai']);
    Route::post('/editprofil', [UserController::class, 'edit']);
    Route::get('/pengaduan-detail/{pengaduan}', [PengaduanController::class, 'show']);
});

Route::group(['middleware' => 'petugas'], function () {
    Route::get('/dashboard/laporan', [DashboardController::class, 'index']);
    Route::get('/dashboard/belum', [DashboardController::class, 'belum']);
    Route::get('/dashboard/proses', [DashboardController::class, 'proses']);
    Route::get('/dashboard/selesai', [DashboardController::class, 'selesai']);
    Route::post('/dashboard/proses-laporan/{pengaduan}', [DashboardController::class, 'prosesLaporan']);
    Route::get('/dashboard/laporan-selesai/{pengaduan}', [DashboardController::class, 'laporanSelesai']);
    Route::get('/dashboard/laporan-detail/{pengaduan}', [DashboardController::class, 'show']);
    Route::post('/tanggapi/{pengaduan}', [DashboardController::class, 'store']);
    Route::get('/dahboard/laporan/hapus/{pengaduan}', [DashboardController::class, 'destroy']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard/users', [DashboardController::class, 'users']);
        Route::get('/cetak', [DashboardController::class, 'export']);
        Route::post('/dashboard/ubah-user/{user}', [DashboardController::class, 'ubahUser']);
        Route::post('/dahboard/user/hapus/{user}', [DashboardController::class, 'hapusUser']);
        Route::post('/dashboard/register', [DashboardController::class, 'buat']);
    });
});
