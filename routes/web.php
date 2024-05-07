<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\JadwalKonselorController;
use App\Http\Controllers\JanjiKonselingController;
use App\Http\Controllers\UserController;

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

Route::get('/home', [HomeController::class, 'index'])
    ->name('home_new')
    ->middleware('verified');

Route::middleware(['auth', 'isloggedin'])->group(function () {
    // routing menu konselors
    Route::get('/konselors/createusers', [KonselorController::class, 'createuser'])->name('konselors.createuser');
    Route::post('/konselors/storeusers', [KonselorController::class, 'storeuser'])->name('konselors.storeusers');
    Route::get('/konselors', [KonselorController::class, 'index'])->name('konselors.index');
    Route::get('/konselors/create/{id_user}', [KonselorController::class, 'create'])->name('konselors.create');
    Route::post('/konselors', [KonselorController::class, 'store'])->name('konselors.store');
    Route::patch('/konselors/{konselor}', [KonselorController::class, 'update'])->name('konselors.update');
    Route::get('/konselors/{id_konselor}/edit', [KonselorController::class, 'edit'])->name('konselors.edit');
    Route::delete('/konselors/{id_konselor}', [KonselorController::class, 'destroy'])->name('konselors.destroy');
    Route::get('/konselors/{id_konselor}', [KonselorController::class, 'show'])->name('konselors.show');
    // Route::get('/konselors/reset-password/{id}', [KonselorController::class, 'resetPasswordForm'])->name('konselors.resetPasswordForm');
    // Route::get('/konselors/{id}/reset-password', [KonselorController::class, 'showResetPasswordForm'])->name('konselors.resetPassword');

    Route::get('konselors/reset-password/{id}', [KonselorController::class, 'showResetPasswordForm'])->name('konselors.showResetPasswordForm');
    Route::put('konselors/reset-password/{id}', [KonselorController::class, 'updatePassword'])->name('konselors.updatePassword');

    // end routing menu konselors

    // routing menu pasiens
    Route::get('/pasiens', [PasienController::class, 'index'])->name('pasiens.index');
    Route::get('/pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
    Route::post('/pasiens', [PasienController::class, 'store'])->name('pasiens.store');
    Route::patch('/pasiens/{id_pasien}', [PasienController::class, 'update'])->name('pasiens.update');
    Route::get('/pasiens/{id_pasien}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
    Route::delete('/pasiens/{id_pasien}', [PasienController::class, 'destroy'])->name('pasiens.destroy');
    Route::get('/pasiens/{id_pasien}', [PasienController::class, 'show'])->name('pasiens.show');
    // end routing menu pasiens

    Route::resource('jadwal-konselors', JadwalKonselorController::class);
    Route::resource('janji-konselings', JanjiKonselingController::class)->except(['create']);
    Route::resource('konselings', KonselingController::class);

    // routing menu users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    // end routing menu users

    Route::get('/janji-konseling/create/{id}', [JanjiKonselingController::class, 'create'])->name('janji-konseling.create');

    Route::get('/janji-konseling/pilihkonselor', [JanjiKonselingController::class, 'pilihkonselor'])->name('janjikonseling.pilihkonselor');

    Route::get('/getjadwal', [JanjiKonselingController::class, 'getjadwal'])->name('getjadwal');

    // routing menu role managemen
    Route::get('roles/get-permissions', [RoleController::class, 'getPermissions'])->name('roles.get-permissions');
    Route::get('roles/refresh-delete-permission', [RoleController::class, 'refreshAndDeletePermissions'])->name('roles.refresh-delete-permissions');
    Route::resource('roles', RoleController::class);
    // end routing menu role managemen

    Route::get('/info-hiv', [HomeController::class, 'info'])->name('info_hiv');
    Route::get('/daftar_konselor', [HomeController::class, 'daftar_konselor'])->name('daftar_konselor');
    Route::get('/jadwalkan_konseling', [HomeController::class, 'jadwalkan_konseling'])->name('jadwalkan_konseling');
});