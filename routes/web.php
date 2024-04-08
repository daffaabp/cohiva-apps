<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\JadwalKonselorController;
use App\Http\Controllers\JanjiKonselingController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_new');
Route::resource('konselors', KonselorController::class);
Route::resource('pasiens', PasienController::class);
Route::resource('jadwal-konselors', JadwalKonselorController::class);
Route::resource('janji-konselings', JanjiKonselingController::class);