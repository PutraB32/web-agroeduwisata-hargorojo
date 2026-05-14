<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Public Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        /* Modal override - force visibility above all containers */
        .modal-aktif {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 2147483647 !important;
            overflow-y: auto !important;
            pointer-events: auto !important;
        }
    </style>
</head>
<body class="bg-gray-50 flex h-screen text-neutral font-sans">

    <!-- Mobile Header -->
    <div class="md:hidden bg-white shadow-sm border-b border-gray-200 fixed top-0 w-full z-40 h-16 flex items-center justify-between px-4">
        <div class="flex items-center">
            <img src="{{ asset('images/assets foto/logo purworejo.png') }}" alt="Logo" class="h-8 w-8 mr-2 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=DH&color=004D40&background=D4AF37'">
            <span class="font-black text-primary font-serif text-lg">HARGOROJO</span>
        </div>
        <button id="mobileMenuBtn" class="text-gray-600 hover:text-primary focus:outline-none p-2 rounded-lg bg-gray-100">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden transition-opacity"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white flex flex-col shadow-2xl md:shadow-lg border-r border-gray-200 z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
        
        <!-- Close button for mobile -->
        <button id="closeSidebarBtn" class="md:hidden absolute top-4 right-4 text-gray-400 hover:text-red-500 bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center">
            <i class="fas fa-times"></i>
        </button>
        <!-- Logo Area -->
        <div class="h-20 flex items-center px-6 border-b border-gray-100">
            <img src="{{ asset('images/assets foto/logo purworejo.png') }}" alt="Logo Purworejo" class="h-10 w-10 mr-3 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=DH&color=004D40&background=D4AF37'">
            <div class="leading-tight">
                <div class="text-[10px] font-bold tracking-widest text-gray-500 uppercase">Desa Wisata</div>
                <div class="text-base font-black text-primary font-serif">HARGOROJO</div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5 no-scrollbar">
            <a href="javascript:void(0)" onclick="tampilkanPanel('dashboard', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm transition-colors bg-green-50 text-primary font-bold border-l-4 border-primary">
                <i class="fas fa-desktop w-5 text-center"></i> Dashboard
            </a>
            
            <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
                <i class="fas fa-home w-5 text-center"></i> Beranda Website
            </a>

            <div class="pt-5 pb-2">
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Manajemen E-Commerce</p>
            </div>

            <a href="javascript:void(0)" onclick="tampilkanPanel('produk', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
                <i class="fas fa-box w-5 text-center"></i> Produk / Katalog
            </a>
            <a href="javascript:void(0)" onclick="tampilkanPanel('order', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
                <i class="fas fa-shopping-cart w-5 text-center"></i> Kelola Pesanan
            </a>
            <a href="javascript:void(0)" onclick="tampilkanPanel('katalog', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
                <i class="fas fa-book-open w-5 text-center"></i> Katalog Desa
            </a>
            <a href="javascript:void(0)" onclick="tampilkanPanel('testimoni', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
                <i class="fas fa-comments w-5 text-center"></i> Testimoni
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-6 border-t border-gray-100 pt-4 mx-4">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 transition-colors">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i> Log Out
                </button>
            </form>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden bg-gray-50 pt-16 md:pt-0 w-full relative z-0">
        <!-- Content Scrollable Area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-10">
            <div class="max-w-7xl mx-auto">
                
                <!-- Welcome Banner (Dashboard Panel) -->
                <div id="panel-dashboard" class="crud-panel">
                    <div class="bg-gradient-to-r from-primary to-green-800 rounded-2xl p-8 text-white shadow-lg relative overflow-hidden mb-8 border border-green-700">
                        <div class="absolute right-0 top-0 opacity-10 text-9xl -mt-10 -mr-10"><i class="fas fa-leaf"></i></div>
                        <h2 class="text-3xl font-bold mb-2 relative z-10 font-serif">Selamat Datang, {{ auth()->user()->name }}!</h2>
                        <p class="text-green-100 relative z-10 font-medium">Anda login sebagai <span class="bg-white text-green-800 font-bold px-2 py-0.5 rounded text-xs ml-1 shadow-sm">Admin</span></p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-green-50 text-primary rounded-full flex items-center justify-center text-xl mb-4 border border-green-100"><i class="fas fa-box"></i></div>
                            <h3 class="text-2xl font-black text-gray-800">{{ $produks->total() }}</h3>
                            <p class="text-gray-500 text-sm font-medium mt-1">Total Produk E-Commerce</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl mb-4 border border-blue-100"><i class="fas fa-shopping-bag"></i></div>
                            <h3 class="text-2xl font-black text-gray-800">{{ $orders->total() }}</h3>
                            <p class="text-gray-500 text-sm font-medium mt-1">Total Pesanan Masuk</p>
                        </div>
                    </div>

                    <!-- Grafik Penjualan -->
                    <div class="mt-8 bg-white border border-gray-200 p-6 rounded-xl shadow-sm">
                        <h3 class="text-xl font-bold text-gray-800 mb-1 font-serif flex items-center gap-2">
                            <i class="fas fa-chart-bar text-green-600"></i> Statistik Penjualan Produk
                        </h3>
                        <p class="text-sm text-gray-500 mb-6">Grafik ini membandingkan seluruh produk yang ada di E-Commerce. Angka pada batang grafik menunjukkan total unit yang terjual berdasarkan pesanan yang berstatus <strong>"Selesai"</strong>. Produk dengan angka 0 berarti belum pernah dibeli.</p>
                        <div class="w-full relative" style="height: 350px;">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Partials untuk masing-masing tabel -->
                @include('Admin.partials.produk_crud')
                @include('Admin.partials.order_crud')
                @include('Admin.partials.katalog_crud')
                @include('Admin.partials.testimoni_crud')

            </div>
        </main>
    </div>

    <!-- Script navigasi antar panel & Mobile Sidebar -->
    <script>
        // Mobile Sidebar Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            if(!sidebar) return;
            const isClosed = sidebar.classList.contains('-translate-x-full');
            if (isClosed) {
                sidebar.classList.remove('-translate-x-full');
                if(sidebarOverlay) sidebarOverlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                if(sidebarOverlay) sidebarOverlay.classList.add('hidden');
            }
        }

        if(mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleSidebar);
        if(closeSidebarBtn) closeSidebarBtn.addEventListener('click', toggleSidebar);
        if(sidebarOverlay) sidebarOverlay.addEventListener('click', toggleSidebar);

        // Data Title untuk mengubah Page Title
        const titles = {
            dashboard: 'Dashboard Utama',
            produk: 'Manajemen Produk & E-Commerce',
            order: 'Manajemen Pesanan',
            katalog: 'Manajemen Katalog Desa',
            testimoni: 'Manajemen Testimoni'
        };

        function tampilkanPanel(panelId, clickedElement = null) {
            // Sembunyikan semua panel
            const panels = document.querySelectorAll('.crud-panel');
            panels.forEach(panel => {
                panel.style.display = 'none';
                panel.classList.add('hidden');
            });
            
            // Tampilkan panel yang diklik
            const target = document.getElementById('panel-' + panelId);
            if(target) {
                target.classList.remove('hidden');
                target.style.display = 'block';
                localStorage.setItem('activeAdminPanel', panelId);
                
                // Update Title
                document.getElementById('page-title') ? document.getElementById('page-title').innerText = titles[panelId] || 'Dashboard' : null;
            }

            // Update state active di sidebar
            if (clickedElement) {
                document.querySelectorAll('.menu-link').forEach(link => {
                    link.classList.remove('bg-green-50', 'text-primary', 'font-bold', 'border-primary');
                    link.classList.add('text-gray-600', 'border-transparent', 'hover:bg-gray-50', 'hover:text-primary');
                });
                clickedElement.classList.add('bg-green-50', 'text-primary', 'font-bold', 'border-primary');
                clickedElement.classList.remove('text-gray-600', 'border-transparent', 'hover:bg-gray-50', 'hover:text-primary');
            } else {
                // Cari elemen menu berdasarkan fungsi onclick
                const links = document.querySelectorAll('.menu-link');
                links.forEach(link => {
                    if(link.getAttribute('onclick').includes(panelId)) {
                        link.classList.add('bg-green-50', 'text-primary', 'font-bold', 'border-primary');
                        link.classList.remove('text-gray-600', 'border-transparent', 'hover:bg-gray-50', 'hover:text-primary');
                    } else {
                        link.classList.remove('bg-green-50', 'text-primary', 'font-bold', 'border-primary');
                        link.classList.add('text-gray-600', 'border-transparent', 'hover:bg-gray-50', 'hover:text-primary');
                    }
                });
            }

            // Tutup sidebar di HP setelah klik menu
            if (window.innerWidth < 768) {
                if(sidebar && !sidebar.classList.contains('-translate-x-full')){
                    toggleSidebar();
                }
            }
        }
        
        // Cek panel terakhir yang dibuka
        window.onload = function() {
            const activePanel = localStorage.getItem('activeAdminPanel') || 'dashboard';
            tampilkanPanel(activePanel);
            initChart();
        };

        // Inisialisasi Chart
        function initChart() {
            const ctx = document.getElementById('salesChart');
            if (!ctx) return;

            const labels = {!! json_encode($chartLabels ?? []) !!};
            const dataValues = {!! json_encode($chartData ?? []) !!};

            // Palet warna estetik (Earthy, Green, Gold tones)
            const backgroundColors = [
                'rgba(0, 77, 64, 0.8)',   // Primary Green
                'rgba(212, 175, 55, 0.8)', // Gold
                'rgba(46, 125, 50, 0.8)',  // Forest Green
                'rgba(192, 113, 20, 0.8)', // Bronze/Orange
                'rgba(0, 105, 92, 0.8)',   // Teal
                'rgba(245, 127, 23, 0.8)', // Yellow
                'rgba(85, 139, 47, 0.8)',  // Light Olive
                'rgba(121, 85, 72, 0.8)',  // Brown
                'rgba(21, 101, 192, 0.8)', // Blue
                'rgba(158, 157, 36, 0.8)'  // Lime Dark
            ];

            const borderColors = backgroundColors.map(color => color.replace('0.8', '1.0'));

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Produk Terjual',
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1,
                        borderRadius: 6,
                        hoverBackgroundColor: borderColors
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleFont: { family: 'Public Sans', size: 14 },
                            bodyFont: { family: 'Public Sans', size: 13, weight: 'bold' },
                            padding: 12,
                            displayColors: true
                        }
                    }
                }
            });
        }
    </script>

    <!-- Global Modal Helper -->
    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            if (!modal.dataset.moved) {
                document.body.insertBefore(modal, document.body.firstChild);
                modal.dataset.moved = 'true';
            }
            modal.style.display = ''; // Clear inline display to let Tailwind work
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100vw';
            modal.style.height = '100vh';
            modal.style.zIndex = '99999';
            modal.style.overflowY = 'auto';
            modal.classList.remove('hidden');
            modal.classList.add('flex'); // Add flex for items-center centering
            document.documentElement.style.overflow = 'hidden';
        }
        function closeModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex'); // Remove flex so it hides completely
            document.documentElement.style.overflow = '';
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('[role="dialog"]').forEach(function(m) {
                    if (m.style.display !== 'none') closeModal(m.id);
                });
            }
        });
    </script>
</body>
</html>