<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// BARANG KELUAR
Route::get('admin/barang-keluar',[BarangKeluarController::class, 'index'])->name(name: 'barang_keluar.index');
Route::post('admin/barang-keluar/store', [BarangKeluarController::class, 'store'])->name('barang_keluar.store');

// BARANG MASUK
Route::get('admin/barang-masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
Route::post('admin/barang-masuk/store', [BarangMasukController::class, 'store'])->name('barang_masuk.store');

// STOK BARANG
Route::get('admin/barang', [BarangController::class, 'index'])->name('barang.index');