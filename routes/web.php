<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\JadwalKonselorController;
use App\Http\Controllers\JanjiKonselingController;
use App\Http\Controllers\Auth\VerificationController;

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

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])
    ->name('home_new')
    ->middleware(['auth', 'verified', 'isloggedin']);

Route::middleware(['auth', 'isloggedin', 'verified'])->group(function () {
    // routing menu role management
    Route::get('roles/get-permissions', [RoleController::class, 'getPermissions'])->name('roles.get-permissions')->middleware('permission:roles.get-permissions');
    Route::get('roles/refresh-delete-permission', [RoleController::class, 'refreshAndDeletePermissions'])->name('roles.refresh-delete-permissions')->middleware('permission:roles.refresh-delete-permissions');
    Route::resource('roles', RoleController::class)->middleware([
        'permission:roles.index',
        'permission:roles.create',
        'permission:roles.store',
        'permission:roles.edit',
        'permission:roles.update',
        'permission:roles.destroy',
    ]);
    // end routing menu role management

    // routing menu konselors
    Route::get('/konselors/createusers', [KonselorController::class, 'createuser'])->name('konselors.createuser')->middleware('permission:konselors.createuser');
    Route::post('/konselors/storeusers', [KonselorController::class, 'storeuser'])->name('konselors.storeusers')->middleware('permission:konselors.storeusers');
    Route::get('/konselors', [KonselorController::class, 'index'])->name('konselors.index')->middleware('permission:konselors.index');
    Route::get('/konselors/create/{id_user}', [KonselorController::class, 'create'])->name('konselors.create')->middleware('permission:konselors.create');
    Route::post('/konselors', [KonselorController::class, 'store'])->name('konselors.store')->middleware('permission:konselors.store');
    Route::patch('/konselors/{konselor}', [KonselorController::class, 'update'])->name('konselors.update')->middleware('permission:konselors.update');
    Route::get('/konselors/{id_konselor}/edit', [KonselorController::class, 'edit'])->name('konselors.edit')->middleware('permission:konselors.edit');
    Route::delete('/konselors/{id_konselor}', [KonselorController::class, 'destroy'])->name('konselors.destroy')->middleware('permission:konselors.destroy');
    Route::get('/konselors/{id_konselor}', [KonselorController::class, 'show'])->name('konselors.show')->middleware('permission:konselors.show');
    Route::get('konselors/reset-password/{id}', [KonselorController::class, 'showResetPasswordForm'])->name('konselors.showResetPasswordForm')->middleware('permission:konselors.showResetPasswordForm');
    Route::put('konselors/reset-password/{id}', [KonselorController::class, 'updatePassword'])->name('konselors.updatePassword')->middleware('permission:konselors.updatePassword');
    // end routing menu konselors

    // routing menu create pasiens
    Route::get('/pasiens', [PasienController::class, 'index'])->name('pasiens.index');
    Route::get('/pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
    Route::post('/pasiens', [PasienController::class, 'store'])->name('pasiens.store');
    Route::patch('/pasiens/{id_pasien}', [PasienController::class, 'update'])->name('pasiens.update');
    Route::get('/pasiens/{id_pasien}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
    Route::delete('/pasiens/{id_pasien}', [PasienController::class, 'destroy'])->name('pasiens.destroy');
    Route::get('/pasiens/{id_pasien}', [PasienController::class, 'show'])->name('pasiens.show');
    // end routing menu create pasiens

    // routing menu users
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('permission:users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('permission:users.store');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('permission:users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('permission:users.show');
    // end routing menu users

    // routing menu jadwal
    Route::resource('jadwal-konselors', JadwalKonselorController::class)->middleware([
        'permission:jadwal-konselors.index',
        'permission:jadwal-konselors.create',
        'permission:jadwal-konselors.store',
        'permission:jadwal-konselors.edit',
        'permission:jadwal-konselors.update',
        'permission:jadwal-konselors.destroy',
    ]);
    Route::get('/getjadwal', [JanjiKonselingController::class, 'getjadwal'])->name('getjadwal')->middleware('permission:getjadwal');
    // end routing menu jadwal

    // routing menu janji konseling
    Route::resource('janji-konselings', JanjiKonselingController::class)->except(['create'])->middleware([
        'permission:janji-konselings.index',
        'permission:janji-konselings.store',
        'permission:janji-konselings.show',
        'permission:janji-konselings.edit',
        'permission:janji-konselings.update',
        'permission:janji-konselings.destroy',
    ]);
    Route::get('/janji-konseling/create/{id}', [JanjiKonselingController::class, 'create'])->name('janji-konseling.create')->middleware('permission:janji-konseling.create');
    Route::get('/janji-konseling/pilihkonselor', [JanjiKonselingController::class, 'pilihkonselor'])->name('janjikonseling.pilihkonselor')->middleware('permission:janjikonseling.pilihkonselor');
    // end routing menu janji konseling

    // routing menu konselings
    Route::resource('konselings', KonselingController::class);
    // end routing menu konselings

    // routing menu yang dapat diakses oleh pasien
    Route::get('/info-hiv', [HomeController::class, 'info'])->name('info_hiv')->middleware('permission:info_hiv');
    Route::get('/daftar_konselor', [HomeController::class, 'daftar_konselor'])->name('daftar_konselor')->middleware('permission:daftar_konselor');
    Route::get('/jadwalkan_konseling', [HomeController::class, 'jadwalkan_konseling'])->name('jadwalkan_konseling')->middleware('permission:jadwalkan_konseling');
    // end routing menu yang dapat diakses oleh pasien
});
