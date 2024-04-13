<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/info-hiv', [HomeController::class, 'info'])->name('info_hiv');
Route::get('/daftar_konselor', [HomeController::class, 'daftar_konselor'])->name('daftar_konselor');