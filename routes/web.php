<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Siswa Management
Route::get('siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
// Import Siswa
Route::get('siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::post('siswa/import', [SiswaController::class, 'importStore'])->name('siswa.import.store');
Route::post('siswa/import/preview', [SiswaController::class, 'importPreview'])->name('siswa.import.preview');
Route::resource('siswa', SiswaController::class);
// Akademik Management
Route::get('akademik/data', [AkademikController::class, 'data'])->name('akademik.data');
Route::resource('akademik', AkademikController::class);
// Pembayaran Management
Route::get('pembayaran/data', [PembayaranController::class, 'data'])->name('pembayaran.data');
Route::resource('pembayaran', PembayaranController::class);