<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Siswa Management
Route::resource('siswa', SiswaController::class);
// Akademik Management
Route::get('akademik/data', [AkademikController::class, 'data'])->name('akademik.data');
Route::resource('akademik', AkademikController::class);
// Jurusan Management
Route::get('jurusan/data', [JurusanController::class, 'data'])->name('jurusan.data');
Route::resource('jurusan', JurusanController::class);