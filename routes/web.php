<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;

Route::get('/', [AuthController::class, 'showLogin'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/login/qr', [AuthController::class, 'qrLogin'])->name('login.qr');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/katalog', [LibraryController::class, 'katalog'])->name('katalog');
    Route::get('/sirkulasi', [LibraryController::class, 'sirkulasi'])->name('sirkulasi');
    Route::post('/sirkulasi/scan-book', [LibraryController::class, 'scanBook'])->name('sirkulasi.scan');
    Route::get('/statistik', [LibraryController::class, 'statistik'])->name('statistik');
    Route::get('/akun', [LibraryController::class, 'akun'])->name('akun');
});

