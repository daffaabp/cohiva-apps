<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KonselingController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home_new')->middleware('verified');
Route::resource('konselors', KonselorController::class);
Route::resource('pasiens', PasienController::class);
Route::resource('jadwal-konselors', JadwalKonselorController::class);
Route::resource('janji-konselings', JanjiKonselingController::class)->except(['create']);
Route::resource('konselings', KonselingController::class);

Route::get('roles/get-permissions', [RoleController::class, 'getPermissions'])->name('roles.get-permissions');
Route::get('roles/refresh-delete-permission', [RoleController::class, 'refreshAndDeletePermissions'])->name('roles.refresh-delete-permissions');
Route::resource('roles', RoleController::class);

Route::get('/janji-konseling/create/{id}', [JanjiKonselingController::class, 'create'])->name('janji-konseling.create');
Route::get('/janji-konseling/pilihkonselor', [JanjiKonselingController::class, 'pilihkonselor'])->name('janjikonseling.pilihkonselor');
Route::get('/getjadwal', [JanjiKonselingController::class, 'getjadwal'])->name('getjadwal');

Route::get('/info-hiv', [HomeController::class, 'info'])->name('info_hiv');
Route::get('/daftar_konselor', [HomeController::class, 'daftar_konselor'])->name('daftar_konselor');
Route::get('/jadwalkan_konseling', [HomeController::class, 'jadwalkan_konseling'])->name('jadwalkan_konseling');

Route::get('/konselors/reset-password/{id}', [KonselorController::class, 'resetPasswordForm'])->name('konselors.reset-password');
Route::put('/konselors/{id}/reset-password', [KonselorController::class, 'resetPassword'])->name('konselors.reset-password.update');