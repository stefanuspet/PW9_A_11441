<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamBukuController;
//Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

//Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// Logout
Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Buku
Route::get('/buku', [BukuController::class, 'index'])->name('index')->middleware('auth');
//delete
Route::delete('/buku/{id_buku}', [BukuController::class, 'destroy'])->name('destroy')->middleware('auth');
//edit
Route::get('/buku/{id_buku}/edit', [BukuController::class, 'edit'])->name('buku.edit')->middleware('auth');
//create
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create')->middleware('auth');
//store
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store')->middleware('auth');
// update
Route::put('/buku/{id_buku}', [BukuController::class, 'update'])->name('buku.update')->middleware('auth');

// pinjam
Route::get('/pinjam', [PinjamBukuController::class, 'index'])->name('pinjam.index')->middleware('auth');

Route::put('/pinjam/{id_buku}', [PinjamBukuController::class, 'pinjamBuku'])->name('pinjam.pinjamBuku')->middleware('auth');
Route::get('/pinjam/kembalikan', [PinjamBukuController::class, 'kembalikanView'])->name('kembalikanView')->middleware('auth');
Route::put('/pinjam/kembalikan/{id_pinjam_buku}', [PinjamBukuController::class, 'kembalikan'])->name('kembalikan')->middleware('auth');
