<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpsiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\PertanyaanController;

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

Route::get('/', [JawabanController::class, 'index']);

Route::resource('jawaban', JawabanController::class);
Route::resource('opsi', OpsiController::class);
Route::resource('form', FormController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('pertanyaan', PertanyaanController::class);
Route::resource('responden', RespondenController::class);
