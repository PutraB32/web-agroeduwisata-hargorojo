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
    <div id="sidebarOverlay" class="admin-sidebar-overlay fixed inset-0 z-40 hidden transition-opacity"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="admin-sidebar fixed inset-y-0 left-0 w-64 bg-white flex flex-col shadow-2xl md:shadow-lg border-r border-gray-200 z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
        @include('Admin.dashboard.sidebar', ['isSuperAdmin' => false])
    </aside>

    <!-- MAIN CONTENT -->
    <div class="admin-main min-w-0 flex-1 flex flex-col overflow-hidden bg-transparent pt-16 md:pt-0 w-full relative z-0">
        <!-- Content Scrollable Area -->
        <main class="min-w-0 flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-10">
            <div class="mx-auto w-full min-w-0 max-w-7xl">
                @include('Admin.dashboard.header', [
                    'eyebrow' => 'Panel Operasional',
                    'description' => 'Kelola konten wisata, katalog desa, produk, pesanan, dan testimoni dengan cepat.',
                    'roleLabel' => 'Admin',
                    'roleIcon' => 'fa-user-shield',
                    'roleBorder' => 'border-green-100',
                    'roleIconClass' => 'bg-green-50 text-primary',
                ])
                
                <div id="panel-dashboard" class="crud-panel">
                    @include('Admin.dashboard.overview', ['isSuperAdmin' => false])
                </div>

                <!-- Partials untuk masing-masing tabel -->
                @include('Admin.crud.produk')
                @include('Admin.crud.order')
                @include('Admin.crud.agroeduwisata')
                @include('Admin.crud.katalog')
                @include('Admin.crud.testimoni')

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

        const descriptions = {
            dashboard: 'Pantau ringkasan produk, agroeduwisata, pesanan, dan statistik penjualan.',
            produk: 'Kelola produk e-commerce, stok, harga, gambar, dan status produk unggulan.',
            order: 'Pantau pesanan customer, pembayaran, pengiriman, dan status proses order.',
            agro: 'Kelola konten agroeduwisata dan tahapan aktivitas wisata desa.',
            katalog: 'Kelola katalog desa, kategori dokumen, gambar, dan tautan akses.',
            testimoni: 'Kelola testimoni pengunjung dan rating yang tampil di website.'
        };

        let salesChartInstance = null;

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

                const pageHeader = document.getElementById('admin-page-header');
                if (pageHeader) {
                    pageHeader.classList.toggle('hidden', activePanelId !== 'dashboard');
                }
                
                // Update Title
                document.getElementById('page-title') ? document.getElementById('page-title').innerText = titles[activePanelId] || 'Dashboard' : null;
                document.getElementById('page-description') ? document.getElementById('page-description').innerText = descriptions[activePanelId] || descriptions.dashboard : null;

                if (activePanelId === 'dashboard') {
                    setTimeout(initChart, 0);
                }
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
            const params = new URLSearchParams(window.location.search);
            const panelFromUrl = params.get('panel');
            const availablePanels = Object.keys(titles);
            const activePanel = availablePanels.includes(panelFromUrl)
                ? panelFromUrl
                : (localStorage.getItem('activeAdminPanel') || 'dashboard');

            tampilkanPanel(activePanel);

            if (params.has('panel')) {
                params.delete('panel');
                const queryString = params.toString();
                window.history.replaceState({}, document.title, window.location.pathname + (queryString ? '?' + queryString : ''));
            }
        };

        // Inisialisasi Chart
        function initChart() {
            const ctx = document.getElementById('salesChart');
            if (!ctx) return;
            if (typeof Chart === 'undefined') return;

            if (salesChartInstance) {
                salesChartInstance.resize();
                salesChartInstance.update();
                return;
            }

            const labels = {!! json_encode($chartLabels ?? []) !!};
            const dataValues = {!! json_encode($chartData ?? []) !!};
            const chartLabels = labels.map((label) => {
                const words = String(label).split(' ');

                if (words.length <= 2) {
                    return label;
                }

                const firstLine = words.slice(0, 2).join(' ');
                const secondLine = words.slice(2).join(' ');

                return [
                    firstLine.length > 18 ? firstLine.slice(0, 18) + '...' : firstLine,
                    secondLine.length > 18 ? secondLine.slice(0, 18) + '...' : secondLine,
                ];
            });

            salesChartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Total Produk Terjual',
                        data: dataValues,
                        backgroundColor: 'rgba(0, 77, 64, 0.10)',
                        borderColor: '#004D40',
                        borderWidth: 3,
                        pointBackgroundColor: '#D4AF37',
                        pointBorderColor: '#004D40',
                        pointBorderWidth: 2,
                        pointHoverBackgroundColor: '#004D40',
                        pointHoverBorderColor: '#D4AF37',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.35
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0,
                                padding: 8,
                                font: {
                                    size: 11,
                                    family: 'Public Sans'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 77, 64, 0.08)'
                            },
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
                            backgroundColor: 'rgba(0, 77, 64, 0.92)',
                            titleFont: { family: 'Public Sans', size: 14 },
                            bodyFont: { family: 'Public Sans', size: 13, weight: 'bold' },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                title: function (items) {
                                    return labels[items[0].dataIndex] || '';
                                }
                            }
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
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.documentElement.style.overflow = 'hidden';
        }
        function closeModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
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
