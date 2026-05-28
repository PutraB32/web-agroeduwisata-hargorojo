<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\AgroeduwisataController;
use App\Http\Controllers\ProdukGulaKelapaController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\KatalogDesaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminAgroeduwisataController;
use App\Http\Controllers\AdminKatalogDesaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminKategoriKatalogController;
use Illuminate\Support\Facades\Auth;


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
Route::post('/beranda/testimoni', [BerandaController::class, 'storeTestimoni'])->name('public.testimoni.store');

// --- ROUTE E-COMMERCE CART ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.process');


//============================================
// ROUTE AUTHENTIKASI (Login & Logout)
//============================================
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//=====================================================
// ROUTE DASHBOARD (Hanya bisa diakses jika sudah login)
//=====================================================
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role === 'super_admin') {
            return redirect()->route('superadmin.dashboard');
        }

        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    // =============================================
    // Rute Khusus Super Admin
    // =============================================
    Route::middleware(['role:super_admin'])->group(function () {

        Route::get('/admin/superAdmin', function (\Illuminate\Http\Request $request) {

            $searchProduk = $request->query('search_produk');

            $produks = \App\Models\Produk::when($searchProduk, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })->get();


            $searchAgro = $request->query('search_agro');
            $filterAgro = $request->query('filter_kat_agro');

            $agroeduwisatas = \App\Models\Agroeduwisata::when($searchAgro, function ($query, $search) {
                return $query->where('Judul', 'like', "%{$search}%");
            })->when($filterAgro === 'induk', function ($query) {
                return $query->whereNull('parent_id');
            })->get();


            $parentAgros = \App\Models\Agroeduwisata::whereNull('parent_id')->get();


            $searchKatalog = $request->query('search_katalog');
            $filterKatalog = $request->query('filter_kat_katalog');

            $katalogs = \App\Models\KatalogDesa::when($searchKatalog, function ($query, $search) {
                return $query->where('Judul', 'like', "%{$search}%");
            })->when($filterKatalog, function ($query, $filter) {
                return $query->where('kategori_id', $filter);
            })->get();


            $searchUser = $request->query('search_user');

            $users = \App\Models\User::when($searchUser, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })->get();


            $searchTestimoni = $request->query('search_testimoni');

            $testimoni = \App\Models\Testimoni::when($searchTestimoni, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('isi_testimoni', 'like', "%{$search}%");
            })->get();


            $searchOrder = $request->query('search_order');

            $orders = \App\Models\Order::with('orderDetails.produk')
                ->when($searchOrder, function ($query, $search) {
                    return $query->where('nama_pemesan', 'like', "%{$search}%")
                                 ->orWhere('no_hp', 'like', "%{$search}%");
                })
                ->latest('created_at')
                ->get();


            $kategoriKatalogs = \App\Models\KategoriKatalog::all();


            $produksWithSales = \App\Models\Produk::withSum([
                'orderDetails as total_terjual' => function ($query) {
                    $query->whereHas('order', function ($q) {
                        $q->where('status', 'Selesai');
                    });
                }
            ], 'jumlah')->get();


            $chartLabels = $produksWithSales->pluck('nama')->toArray();

            $chartData = $produksWithSales->pluck('total_terjual')
                ->map(function ($val) {
                    return (int) $val;
                })->toArray();


            return view('Admin.superAdmin', compact(
                'produks',
                'agroeduwisatas',
                'katalogs',
                'users',
                'testimoni',
                'orders',
                'kategoriKatalogs',
                'chartLabels',
                'chartData',
                'parentAgros'
            ));

        })->name('superadmin.dashboard');


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

        Route::get('/admin/admin', function (\Illuminate\Http\Request $request) {

            $searchProduk = $request->query('search_produk');

            $produks = \App\Models\Produk::when($searchProduk, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })->get();


            $searchAgro = $request->query('search_agro');
            $filterAgro = $request->query('filter_kat_agro');

            $agroeduwisatas = \App\Models\Agroeduwisata::when($searchAgro, function ($query, $search) {
                return $query->where('Judul', 'like', "%{$search}%");
            })->when($filterAgro === 'induk', function ($query) {
                return $query->whereNull('parent_id');
            })->get();


            $parentAgros = \App\Models\Agroeduwisata::whereNull('parent_id')->get();


            $searchOrder = $request->query('search_order');

            $orders = \App\Models\Order::with('orderDetails.produk')
                ->when($searchOrder, function ($query, $search) {
                    return $query->where('nama_pemesan', 'like', "%{$search}%")
                                 ->orWhere('no_hp', 'like', "%{$search}%");
                })
                ->latest('created_at')
                ->get();


            $produksWithSales = \App\Models\Produk::withSum([
                'orderDetails as total_terjual' => function ($query) {
                    $query->whereHas('order', function ($q) {
                        $q->where('status', 'Selesai');
                    });
                }
            ], 'jumlah')->get();


            $chartLabels = $produksWithSales->pluck('nama')->toArray();

            $chartData = $produksWithSales->pluck('total_terjual')
                ->map(function ($val) {
                    return (int) $val;
                })->toArray();


            $searchKatalog = $request->query('search_katalog');
            $filterKatalog = $request->query('filter_kat_katalog');

            $katalogs = \App\Models\KatalogDesa::when($searchKatalog, function ($query, $search) {
                return $query->where('Judul', 'like', "%{$search}%");
            })->when($filterKatalog, function ($query, $filter) {
                return $query->where('kategori_id', $filter);
            })->get();


            $kategoriKatalogs = \App\Models\KategoriKatalog::all();


            $searchTestimoni = $request->query('search_testimoni');

            $testimoni = \App\Models\Testimoni::when($searchTestimoni, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('isi_testimoni', 'like', "%{$search}%");
            })->get();


            return view('Admin.admin', compact(
                'produks',
                'agroeduwisatas',
                'orders',
                'katalogs',
                'kategoriKatalogs',
                'chartLabels',
                'chartData',
                'testimoni',
                'parentAgros'
            ));

        })->name('admin.dashboard');
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
        Route::delete('/admin/order/{id}', [AdminOrderController::class, 'destroy'])->name('admin.order.destroy');
    });
});
