<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Super Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md border-t-4 border-green-600">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 mb-6">Anda masuk sebagai <span class="bg-green-100 text-green-800 font-bold px-2 py-1 rounded">Super Admin</span>.</p>
        
        <div class="bg-green-50 p-4 rounded-lg mb-6 border border-green-200">
            <h2 class="font-bold text-green-800 text-lg mb-3">Menu Khusus Super Admin:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Menu Kelola Produk -->
                <a href="javascript:void(0)" onclick="tampilkanPanel('produk')" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Kelola Produk</h3>
                            <p class="text-xs text-green-700">Fitur CRUD Database Produk</p>
                        </div>
                    </div>
                </a>

                <!-- Menu Agroeduwisata -->
                <a href="javascript:void(0)" onclick="tampilkanPanel('agro')" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Agroeduwisata</h3>
                            <p class="text-xs text-green-700">Fitur CRUD Agroeduwisata</p>
                        </div>
                    </div>
                </a>

                <!-- Menu Kelola Users -->
                <a href="javascript:void(0)" onclick="tampilkanPanel('user')" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Kelola Users</h3>
                            <p class="text-xs text-green-700">Fitur CRUD Akun Pengguna</p>
                        </div>
                    </div>
                </a>

                <!-- Menu Katalog Desa -->
                <a href="javascript:void(0)" onclick="tampilkanPanel('katalog')" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Katalog Desa</h3>
                            <p class="text-xs text-green-700">Fitur CRUD Data Desa</p>
                        </div>
                    </div>
                </a>

                <!-- Menu Testimoni -->
                <a href="javascript:void(0)" onclick="tampilkanPanel('testimoni')" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Testimoni</h3>
                            <p class="text-xs text-green-700">Fitur CRUD Ulasan Tampil</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Partials Data -->
        @include('Admin.partials.produk_crud')
        @include('Admin.partials.agroeduwisata_crud')
        @include('Admin.partials.katalog_crud')
        @include('Admin.partials.user_crud')
        @include('Admin.partials.testimoni_crud')

        <div class="mt-8 flex justify-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-red-800 to-red-600 hover:from-red-700 hover:to-red-500 text-yellow-100 hover:text-white font-bold px-6 py-3 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 border border-red-500/30 group">
                    <i class="fas fa-sign-out-alt group-hover:-translate-x-1 transition-transform"></i> Keluar / Logout
                </button>
            </form>
        </div>

    </div>

    <!-- Script navigasi antar panel -->
    <script>
        function tampilkanPanel(panelId) {
            // Sembunyikan semua panel
            const panels = document.querySelectorAll('.crud-panel');
            panels.forEach(panel => {
                panel.style.display = 'none';
            });
            // Tampilkan panel yang diklik
            const target = document.getElementById('panel-' + panelId);
            if(target) {
                target.style.display = 'block';
                // Simpan id panel yang aktif ke penyimpanan lokal browser
                localStorage.setItem('activeSuperAdminPanel', panelId);
            }
        }
        
        // Cek panel terakhir yang dibuka, jika tidak ada, tampilkan produk secara default
        window.onload = function() {
            const activePanel = localStorage.getItem('activeSuperAdminPanel') || 'produk';
            tampilkanPanel(activePanel);
        };
    </script>
</body>
</html>