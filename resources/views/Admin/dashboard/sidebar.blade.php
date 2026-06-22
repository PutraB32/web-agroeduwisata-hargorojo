<button id="closeSidebarBtn" class="admin-sidebar-close md:hidden" aria-label="Tutup menu admin">
    <i class="fas fa-times"></i>
</button>

<div class="admin-sidebar-brand">
    <img src="{{ asset('images/assets foto/logo hargorojo.png') }}" alt="Logo Desa Wisata Hargorojo" class="admin-sidebar-logo" onerror="this.src='https://ui-avatars.com/api/?name=DH&color=004D40&background=D4AF37'">
</div>

<nav class="admin-sidebar-nav no-scrollbar">
    <a href="javascript:void(0)" onclick="tampilkanPanel('dashboard', this)" class="menu-link is-active">
        <i class="fas fa-desktop"></i> Dashboard
    </a>

    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="admin-sidebar-external">
        <i class="fas fa-home"></i> Beranda Website
    </a>

    <div class="admin-sidebar-section">Manajemen Data</div>

    <a href="javascript:void(0)" onclick="tampilkanPanel('produk', this)" class="menu-link">
        <i class="fas fa-box"></i> Produk / E-Commerce
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('order', this)" class="menu-link">
        <i class="fas fa-shopping-cart"></i> Kelola Pesanan
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('agro', this)" class="menu-link">
        <i class="fas fa-leaf"></i> Agroeduwisata
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('katalog', this)" class="menu-link">
        <i class="fas fa-book-open"></i> Katalog Desa
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('testimoni', this)" class="menu-link">
        <i class="fas fa-comment-dots"></i> Testimoni
    </a>

    @if($isSuperAdmin ?? false)
        <div class="admin-sidebar-section">Sistem</div>

        <a href="javascript:void(0)" onclick="tampilkanPanel('user', this)" class="menu-link">
            <i class="fas fa-users-cog"></i> Settings / Users
        </a>
    @endif

    <form action="{{ route('logout') }}" method="POST" class="admin-sidebar-logout-form">
        @csrf
        <button type="submit" class="admin-sidebar-logout">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </button>
    </form>
</nav>
