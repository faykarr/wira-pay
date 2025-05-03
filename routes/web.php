<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Siswa Management
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');