<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpsiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
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

Route::get('/', [JawabanController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::resource('jawaban', JawabanController::class);
    Route::resource('opsi', OpsiController::class);
    Route::resource('form', FormController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pertanyaan', PertanyaanController::class);
    Route::resource('responden', RespondenController::class);
    Route::get('/jawaban', [printController::class,'index'])->name('print');
    Route::get('/logout', [UserController::class,'logout'])->name('logout');
});
Route::get('/login', [UserController::class,'showLogin'])->name('login');
Route::post('/login', [UserController::class,'login'])->name('login');
