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
<body class="admin-dashboard flex h-screen text-neutral font-sans">

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
    <aside id="sidebar" class="admin-sidebar fixed inset-y-0 left-0 w-64 bg-white flex flex-col shadow-2xl md:shadow-lg border-r border-gray-200 z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
        @include('Admin.partials.dashboard_sidebar', ['isSuperAdmin' => false])
    </aside>

    <!-- MAIN CONTENT -->
    <div class="admin-main flex-1 flex flex-col overflow-hidden bg-transparent pt-16 md:pt-0 w-full relative z-0">
        <!-- Content Scrollable Area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-10">
            <div class="max-w-7xl mx-auto">
                @include('Admin.partials.dashboard_header', [
                    'eyebrow' => 'Panel Operasional',
                    'description' => 'Kelola konten wisata, katalog desa, produk, pesanan, dan testimoni dengan cepat.',
                    'roleLabel' => 'Admin',
                    'roleIcon' => 'fa-user-shield',
                    'roleBorder' => 'border-green-100',
                    'roleIconClass' => 'bg-green-50 text-primary',
                ])
                
                <!-- Welcome Banner (Dashboard Panel) -->
                <div id="panel-dashboard" class="crud-panel">
                    <div class="admin-hero rounded-lg p-6 md:p-8 text-white shadow-lg relative overflow-hidden mb-8 border border-green-700">
                        <div class="absolute right-0 top-0 opacity-10 text-9xl -mt-10 -mr-10"><i class="fas fa-leaf"></i></div>
                        <h2 class="text-3xl font-bold mb-2 relative z-10 font-serif">Selamat Datang, {{ auth()->user()->name }}!</h2>
                        <p class="text-green-100 relative z-10 font-medium">Anda login sebagai <span class="bg-white text-green-800 font-bold px-2 py-0.5 rounded text-xs ml-1 shadow-sm">Admin</span></p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="admin-stat-card bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="admin-stat-icon bg-green-50 text-primary text-xl mb-4"><i class="fas fa-box"></i></div>
                            <h3 class="text-2xl font-black text-gray-800">{{ $produks->count() }}</h3>
                            <p class="text-gray-500 text-sm font-medium mt-1">Total Produk E-Commerce</p>
                        </div>
                        <div class="admin-stat-card bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="admin-stat-icon bg-yellow-50 text-secondary text-xl mb-4"><i class="fas fa-leaf"></i></div>
                            <h3 class="text-2xl font-black text-gray-800">{{ $agroeduwisatas->count() }}</h3>
                            <p class="text-gray-500 text-sm font-medium mt-1">Total Data Agroeduwisata</p>
                        </div>
                        <div class="admin-stat-card bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="admin-stat-icon bg-blue-50 text-blue-600 text-xl mb-4"><i class="fas fa-shopping-bag"></i></div>
                            <h3 class="text-2xl font-black text-gray-800">{{ $orders->count() }}</h3>
                            <p class="text-gray-500 text-sm font-medium mt-1">Total Pesanan Masuk</p>
                        </div>
                    </div>

                    <!-- Grafik Penjualan -->
                    <div class="admin-chart-card mt-8 bg-white border border-gray-200 p-6 rounded-lg shadow-sm">
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
                @include('Admin.partials.agroeduwisata_crud')
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
            agro: 'Manajemen Agroeduwisata',
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
            let activePanelId = panelId;
            let target = document.getElementById('panel-' + activePanelId);

            if (!target) {
                activePanelId = 'dashboard';
                target = document.getElementById('panel-dashboard');
            }

            if(target) {
                target.classList.remove('hidden');
                target.style.display = 'block';
                localStorage.setItem('activeAdminPanel', activePanelId);
                
                // Update Title
                document.getElementById('page-title') ? document.getElementById('page-title').innerText = titles[activePanelId] || 'Dashboard' : null;
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
                    if(link.getAttribute('onclick').includes(activePanelId)) {
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