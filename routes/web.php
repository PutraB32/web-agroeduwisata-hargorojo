<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\AgroeduwisataController;
use App\Http\Controllers\ProdukGulaKelapaController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\KatalogDesaController;
use App\Http\Controllers\KontakController;

// Route::middleware('guest')->group(function () {
//     Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//     Route::post('/login', 'Auth\LoginController@login');
//     Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//     Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//     Route::post('/register', 'Auth\RegisterController@register');
// });

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');
Route::get('/agroeduwisata', [AgroeduwisataController::class, 'index'])->name('agro');
Route::get('/produk', [ProdukGulaKelapaController::class, 'index'])->name('produk');
Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('ecommerce');
Route::get('/katalog', [KatalogDesaController::class, 'index'])->name('katalog');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// --- ROUTE PUBLIC FORM ---
Route::post('/beranda/testimoni', [BerandaController::class, 'storeTestimoni'])->name('public.testimoni.store');
