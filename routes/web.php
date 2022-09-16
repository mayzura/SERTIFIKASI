<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard');
});

Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('index');
Route::get('/suratmasuk/index',[SuratMasukController::class, 'index'])->name('index');
Route::get('/suratmasuk/create',[SuratMasukController::class, 'create'])->name('create');
Route::post('/suratmasuk/tambah',[SuratMasukController::class, 'tambah'])->name('tambah');
Route::get('/suratmasuk/{id}/tampil',[SuratMasukController::class, 'tampil'])->name('tampil');
Route::get('/suratmasuk/{id}/edit',[SuratMasukController::class, 'edit'])->name('edit');
Route::post('/suratmasuk/{id}/update',[SuratMasukController::class, 'update'])->name('update');
Route::get('/suratmasuk/{id}/delete',[SuratMasukController::class, 'delete'])->name('delete');

Route::get('/klasifikasi', [KlasifikasiController::class, 'index'])->name('index');
Route::get('/klasifikasi/index',[KlasifikasiController::class, 'index'])->name('index');
Route::get('/klasifikasi/create',[KlasifikasiController::class, 'create'])->name('create');
Route::post('/klasifikasi/tambah',[KlasifikasiController::class, 'tambah'])->name('tambah');
Route::get('/klasifikasi/{id}/edit',[KlasifikasiController::class, 'edit'])->name('edit');
Route::post('/klasifikasi/{id}/update',[KlasifikasiController::class, 'update'])->name('update');
Route::get('/klasifikasi/{id}/delete',[KlasifikasiController::class, 'delete'])->name('delete');

Route::get('/profile',[ProfileController::class, 'index'])->name('index');