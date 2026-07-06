<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\AgroeduwisataController;
use App\Http\Controllers\ProdukGulaKelapaController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\KatalogDesaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MidtransNotificationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminAgroeduwisataController;
use App\Http\Controllers\AdminKatalogDesaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminKategoriKatalogController;


//============================================
// ROUTE PUBLIC (Bisa diakses tanpa login)
//============================================
Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');
Route::get('/agroeduwisata', [AgroeduwisataController::class, 'index'])->name('agro');
Route::get('/produk', [ProdukGulaKelapaController::class, 'index'])->name('produk');
Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('ecommerce');
Route::get('/katalog', [KatalogDesaController::class, 'index'])->name('katalog');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// --- ROUTE PUBLIC FORM ---
Route::post('/beranda/testimoni', [BerandaController::class, 'storeTestimoni'])
    ->middleware('throttle:public-form')
    ->name('public.testimoni.store');

// --- ROUTE E-COMMERCE CART ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->middleware('throttle:cart')->name('cart.add');
Route::delete('/cart/remove', [CartController::class, 'remove'])->middleware('throttle:cart')->name('cart.remove');
Route::put('/cart/update', [CartController::class, 'update'])->middleware('throttle:cart')->name('cart.update');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware('throttle:checkout')->name('checkout.process');

Route::post('/payment/midtrans/notification', MidtransNotificationController::class)
    ->name('payment.midtrans.notification');


//============================================
// ROUTE AUTHENTIKASI (Login & Logout)
//============================================
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', [AdminAuthController::class, 'authenticate'])->middleware('throttle:login')->name('login.post');
Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/customer/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->middleware('throttle:login')->name('customer.login.post');
Route::get('/customer/register', [CustomerAuthController::class, 'showRegister'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->middleware('throttle:login')->name('customer.register.post');
Route::get('/customer/forgot-password', [ForgotPasswordController::class, 'showCustomerLinkRequestForm'])->name('customer.password.request');
Route::post('/customer/forgot-password', [ForgotPasswordController::class, 'sendCustomerResetLinkEmail'])
    ->middleware('throttle:password-reset')
    ->name('customer.password.email');
Route::get('/customer/reset-password/{token}', [ResetPasswordController::class, 'showCustomerResetForm'])->name('customer.password.reset');
Route::post('/customer/reset-password', [ResetPasswordController::class, 'resetCustomer'])
    ->middleware('throttle:password-reset')
    ->name('customer.password.update');
Route::put('/customer/profile', [CustomerAuthController::class, 'updateProfile'])->name('customer.profile.update');
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->middleware('auth')->name('customer.logout');
Route::get('/customer/api/order-updates', [EcommerceController::class, 'checkOrderUpdates'])->name('customer.api.order-updates');

// Rute Lupa Password & Reset Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('throttle:password-reset')
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware('throttle:password-reset')
    ->name('password.update');


//=====================================================
// ROUTE DASHBOARD (Hanya bisa diakses jika sudah login)
//=====================================================
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'redirectByRole'])->name('dashboard');

    // =============================================
    // Rute Khusus Super Admin
    // =============================================
    Route::middleware(['role:super_admin'])->group(function () {

        Route::get('/admin/superAdmin', [AdminDashboardController::class, 'superAdmin'])
            ->name('superadmin.dashboard');


        // CRUD USER
        Route::post('/admin/user', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::put('/admin/user/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::delete('/admin/user/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

        // CRUD KATEGORI KATALOG
        Route::post('/admin/kategori-katalog', [AdminKategoriKatalogController::class, 'store'])->name('admin.kategori_katalog.store');
        Route::put('/admin/kategori-katalog/{id}', [AdminKategoriKatalogController::class, 'update'])->name('admin.kategori_katalog.update');
        Route::delete('/admin/kategori-katalog/{id}', [AdminKategoriKatalogController::class, 'destroy'])->name('admin.kategori_katalog.destroy');
    });


    // =============================================
    // KHUSUS PERAN: ADMIN BIASA
    // =============================================
    Route::middleware(['role:admin'])->group(function () {

        Route::get('/admin/admin', [AdminDashboardController::class, 'admin'])
            ->name('admin.dashboard');
    });


    //============================================
    // AKSES BERSAMA (SUPER ADMIN & ADMIN)
    //============================================
    Route::middleware(['role:super_admin,admin'])->group(function () {

        // Produk
        Route::post('/admin/produk', [AdminProdukController::class, 'store'])->name('admin.produk.store');
        Route::put('/admin/produk/{id}', [AdminProdukController::class, 'update'])->name('admin.produk.update');
        Route::delete('/admin/produk/{id}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');

        // Agroeduwisata
        Route::post('/admin/agroeduwisata', [AdminAgroeduwisataController::class, 'store'])->name('admin.agro.store');
        Route::put('/admin/agroeduwisata/{id}', [AdminAgroeduwisataController::class, 'update'])->name('admin.agro.update');
        Route::delete('/admin/agroeduwisata/{id}', [AdminAgroeduwisataController::class, 'destroy'])->name('admin.agro.destroy');

        // Katalog
        Route::post('/admin/katalog', [AdminKatalogDesaController::class, 'store'])->name('admin.katalog.store');
        Route::put('/admin/katalog/{id}', [AdminKatalogDesaController::class, 'update'])->name('admin.katalog.update');
        Route::delete('/admin/katalog/{id}', [AdminKatalogDesaController::class, 'destroy'])->name('admin.katalog.destroy');

        // Testimoni
        Route::post('/admin/testimoni', [AdminTestimoniController::class, 'store'])->name('admin.testimoni.store');
        Route::put('/admin/testimoni/{id}', [AdminTestimoniController::class, 'update'])->name('admin.testimoni.update');
        Route::delete('/admin/testimoni/{id}', [AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');

        // Order
        Route::put('/admin/order/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.order.update_status');
        Route::put('/admin/order/{id}/pengiriman', [AdminOrderController::class, 'updatePengiriman'])->name('admin.order.update_pengiriman');
        Route::delete('/admin/order/{id}', [AdminOrderController::class, 'destroy'])->name('admin.order.destroy');
    });
});
