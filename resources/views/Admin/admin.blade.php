<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="admin-dashboard flex h-screen text-neutral font-sans">

    <!-- Mobile Header -->
    <div class="admin-mobile-header md:hidden">
        <div class="admin-mobile-brand">
            <img src="{{ asset('images/assets foto/logo hargorojo.png') }}" alt="Logo Desa Wisata Hargorojo" class="admin-mobile-logo" onerror="this.src='https://ui-avatars.com/api/?name=DH&color=004D40&background=D4AF37'">
        </div>
        <button id="mobileMenuBtn" class="admin-mobile-menu-btn" aria-label="Buka menu admin">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="admin-sidebar-overlay fixed inset-0 z-40 hidden transition-opacity"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="admin-sidebar fixed inset-y-0 left-0 w-64 flex flex-col z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
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
@include('Admin.components.toast')
</body>
</html>
