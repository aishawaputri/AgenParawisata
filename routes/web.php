<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('karyawan', KaryawanController::class)->middleware('auth');

Route::resource('paket_wisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');

Route::resource('daftar_paket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');

Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');

// Route::resource('profil_pelanggan',\App\Http\Controllers\ProfilPelangganController::class)->middleware('auth'); 

Route::resource('laporan', \App\Http\Controllers\LaporanController::class)->middleware('auth');

Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');

Route::get('profil_pelanggan', [PelangganController::class, 'profile'])->name('pelanggan.profile');



