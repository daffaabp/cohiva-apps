<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\JadwalKonselorController;
use App\Http\Controllers\JanjiKonselingController;
use App\Http\Controllers\HomeController;


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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home_new')->middleware('verified');
Route::resource('konselors', KonselorController::class);
Route::resource('pasiens', PasienController::class);
Route::resource('jadwal-konselors', JadwalKonselorController::class);
Route::resource('janji-konselings', JanjiKonselingController::class);

Route::get('/info-hiv', [HomeController::class, 'info'])->name('info_hiv');
Route::get('/daftar_konselor', [HomeController::class, 'daftar_konselor'])->name('daftar_konselor');
Route::get('/jadwalkan_konseling', [HomeController::class, 'jadwalkan_konseling'])->name('jadwalkan_konseling');