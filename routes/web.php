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
use Illuminate\Support\Facades\Auth; 

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
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('checkout.process');


// --- ROUTE AUTENTIKASI ---
// 1. Menampilkan form login 
Route::get('/login', function () {
    return view('pages.login'); 
})->name('login');

// 2. Memproses data dari form login
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

// 3. Memproses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- ROUTE DASHBOARD (Hanya bisa diakses jika sudah login) 
Route::middleware(['auth'])->group(function () {
    
    // Rute Khusus Super Admin
    Route::get('/admin/superAdmin', function (\Illuminate\Http\Request $request) {
        if (Auth::user()->role !== 'super_admin') {
            abort(403, 'Akses Ditolak: Anda bukan Super Admin.');
        }
        
        $searchProduk = $request->query('search_produk');
        $produks = \App\Models\Produk::when($searchProduk, function($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->paginate(5, ['*'], 'produk_page');

        $searchAgro = $request->query('search_agro');
        $filterAgro = $request->query('filter_kat_agro');
        $agroeduwisatas = \App\Models\Agroeduwisata::when($searchAgro, function($query, $search) {
            return $query->where('Judul', 'like', "%{$search}%");
        })->when($filterAgro, function($query, $filter) {
            if ($filter === 'induk') {
                return $query->whereNull('parent_id');
            }
            return $query->where('kategori_id', $filter);
        })->paginate(5, ['*'], 'agro_page');

        $parentAgros = \App\Models\Agroeduwisata::whereNull('parent_id')->get();

        $searchKatalog = $request->query('search_katalog');
        $filterKatalog = $request->query('filter_kat_katalog');
        $katalogs = \App\Models\KatalogDesa::when($searchKatalog, function($query, $search) {
            return $query->where('Judul', 'like', "%{$search}%");
        })->when($filterKatalog, function($query, $filter) {
            return $query->where('kategori_id', $filter);
        })->paginate(5, ['*'], 'katalog_page');

        $searchUser = $request->query('search_user');
        $users = \App\Models\User::when($searchUser, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
        })->paginate(5, ['*'], 'user_page');

        $searchTestimoni = $request->query('search_testimoni');
        $testimonis = \App\Models\Testimoni::when($searchTestimoni, function($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")->orWhere('isi_testimoni', 'like', "%{$search}%");
        })->paginate(5, ['*'], 'testimoni_page');

        $searchOrder = $request->query('search_order');
        $orders = \App\Models\Order::with('orderDetails.produk')->when($searchOrder, function($query, $search) {
            return $query->where('nama_pemesan', 'like', "%{$search}%")
                         ->orWhere('no_hp', 'like', "%{$search}%");
        })->latest('created_at')->paginate(10, ['*'], 'order_page');

        $kategoriKatalogs = \App\Models\KategoriKatalog::all();

        // Data untuk Grafik Produk (Menampilkan Semua Produk)
        $produksWithSales = \App\Models\Produk::withSum(['orderDetails as total_terjual' => function($query) {
            $query->whereHas('order', function($q) {
                $q->where('status', 'Selesai');
            });
        }], 'jumlah')->get();

        $chartLabels = $produksWithSales->pluck('nama')->toArray();
        $chartData = $produksWithSales->pluck('total_terjual')->map(function($val) {
            return (int) $val; // Mengubah null (belum terjual) menjadi 0
        })->toArray();

        return view('Admin.superAdmin', compact('produks', 'agroeduwisatas', 'katalogs', 'users', 'testimonis', 'orders', 'kategoriKatalogs', 'chartLabels', 'chartData', 'parentAgros')); 
    })->name('superadmin.dashboard');





    // Rute Khusus Admin Biasa
    Route::get('/admin/admin', function (\Illuminate\Http\Request $request) {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('superadmin.dashboard'); 
        }
        
        $searchProduk = $request->query('search_produk');
        $produks = \App\Models\Produk::when($searchProduk, function($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->paginate(5, ['*'], 'produk_page');

        $searchOrder = $request->query('search_order');
        $orders = \App\Models\Order::with('orderDetails.produk')->when($searchOrder, function($query, $search) {
            return $query->where('nama_pemesan', 'like', "%{$search}%")
                         ->orWhere('no_hp', 'like', "%{$search}%");
        })->latest('created_at')->paginate(10, ['*'], 'order_page');

        // Data untuk Grafik Produk (Menampilkan Semua Produk)
        $produksWithSales = \App\Models\Produk::withSum(['orderDetails as total_terjual' => function($query) {
            $query->whereHas('order', function($q) {
                $q->where('status', 'Selesai');
            });
        }], 'jumlah')->get();

        $chartLabels = $produksWithSales->pluck('nama')->toArray();
        $chartData = $produksWithSales->pluck('total_terjual')->map(function($val) {
            return (int) $val; // Mengubah null (belum terjual) menjadi 0
        })->toArray();
        $searchKatalog = $request->query('search_katalog');
        $filterKatalog = $request->query('filter_kat_katalog');
        $katalogs = \App\Models\KatalogDesa::when($searchKatalog, function($query, $search) {
            return $query->where('Judul', 'like', "%{$search}%");
        })->when($filterKatalog, function($query, $filter) {
            return $query->where('kategori_id', $filter);
        })->paginate(5, ['*'], 'katalog_page');

        $kategoriKatalogs = \App\Models\KategoriKatalog::all();

        $searchTestimoni = $request->query('search_testimoni');
        $testimonis = \App\Models\Testimoni::when($searchTestimoni, function($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")->orWhere('isi_testimoni', 'like', "%{$search}%");
        })->paginate(5, ['*'], 'testimoni_page');
        
        return view('Admin.admin', compact('produks', 'orders', 'katalogs', 'kategoriKatalogs', 'chartLabels', 'chartData', 'testimonis'));
    })->name('admin.dashboard');






    // Rute Manajemen Produk (CRUD)
    Route::post('/admin/produk', [\App\Http\Controllers\AdminProdukController::class, 'store'])->name('admin.produk.store');
    Route::put('/admin/produk/{id}', [\App\Http\Controllers\AdminProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{id}', [\App\Http\Controllers\AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');

    // Rute Manajemen Agroeduwisata (CRUD)
    Route::post('/admin/agroeduwisata', [\App\Http\Controllers\AdminAgroeduwisataController::class, 'store'])->name('admin.agro.store');
    Route::put('/admin/agroeduwisata/{id}', [\App\Http\Controllers\AdminAgroeduwisataController::class, 'update'])->name('admin.agro.update');
    Route::delete('/admin/agroeduwisata/{id}', [\App\Http\Controllers\AdminAgroeduwisataController::class, 'destroy'])->name('admin.agro.destroy');

    // Rute Manajemen Katalog Desa (CRUD)
    Route::post('/admin/katalog', [\App\Http\Controllers\AdminKatalogDesaController::class, 'store'])->name('admin.katalog.store');
    Route::put('/admin/katalog/{id}', [\App\Http\Controllers\AdminKatalogDesaController::class, 'update'])->name('admin.katalog.update');
    Route::delete('/admin/katalog/{id}', [\App\Http\Controllers\AdminKatalogDesaController::class, 'destroy'])->name('admin.katalog.destroy');

    // Rute Manajemen User (CRUD)
    Route::post('/admin/user', [\App\Http\Controllers\AdminUserController::class, 'store'])->name('admin.user.store');
    Route::put('/admin/user/{id}', [\App\Http\Controllers\AdminUserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [\App\Http\Controllers\AdminUserController::class, 'destroy'])->name('admin.user.destroy');

    // Rute Manajemen Testimoni (CRUD)
    Route::post('/admin/testimoni', [\App\Http\Controllers\AdminTestimoniController::class, 'store'])->name('admin.testimoni.store');
    Route::put('/admin/testimoni/{id}', [\App\Http\Controllers\AdminTestimoniController::class, 'update'])->name('admin.testimoni.update');
    Route::delete('/admin/testimoni/{id}', [\App\Http\Controllers\AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
});