<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\CrispController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\Rel_AlternatifController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

// Rute dengan middleware 'auth' dan 'level'
Route::middleware(['auth', 'level'])->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('home');
    Route::get('/alternatif/cetak', [AlternatifController::class, 'cetak'])->name('alternatif.cetak');
    Route::resource('/alternatif', AlternatifController::class);
    Route::get('/kriteria/cetak', [KriteriaController::class, 'cetak'])->name('kriteria.cetak');
    Route::resource('/kriteria', KriteriaController::class);
    Route::get('/crisp/cetak', [CrispController::class, 'cetak'])->name('crisp.cetak');
    Route::resource('/crisp', CrispController::class);
    Route::get('/rel_alternatif/cetak', [Rel_AlternatifController::class, 'cetak'])->name('rel_alternatif.cetak');
    Route::resource('/rel_alternatif', Rel_AlternatifController::class);
    Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
    Route::get('/hitung/cetak', [HitungController::class, 'cetak'])->name('hitung.cetak');
    Route::get('/user/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::post('/user/profil', [UserController::class, 'profilUpdate'])->name('user.profil.update');
    Route::get('/user/password', [UserController::class, 'password'])->name('user.password');
    Route::post('/user/password', [UserController::class, 'passwordUpdate'])->name('user.password.update');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::resource('user', UserController::class);
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin.home');
});

// Rute yang tidak memerlukan autentikasi
Route::get('/home', [HomeController::class, 'landingpage'])->name('landingpage');
Route::get('/hasilsaw', [HomeController::class, 'hasilsaw'])->name('hasilsaw');
Route::post('/filter', [HomeController::class, 'filter'])->name('home.filter');
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginAction'])->name('login.action');
Route::get('/detail/{id}', [DetailController::class, 'details'])->name('details');

// Rute untuk Google Login
Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [SocialController::class, 'googleCallback'])->name('google.callback');
