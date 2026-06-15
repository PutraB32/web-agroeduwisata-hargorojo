<button id="closeSidebarBtn" class="md:hidden absolute top-4 right-4 text-gray-400 hover:text-red-500 bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center">
    <i class="fas fa-times"></i>
</button>

<div class="h-20 flex items-center px-6 border-b border-gray-100">
    <img src="{{ asset('images/assets foto/logo purworejo.png') }}" alt="Logo Purworejo" class="h-10 w-10 mr-3 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=DH&color=004D40&background=D4AF37'">
    <div class="leading-tight">
        <div class="text-[10px] font-bold tracking-widest text-gray-500 uppercase">Desa Wisata</div>
        <div class="text-base font-black text-primary font-serif">HARGOROJO</div>
    </div>
</div>

<nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5 no-scrollbar">
    <a href="javascript:void(0)" onclick="tampilkanPanel('dashboard', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm transition-colors bg-green-50 text-primary font-bold border-l-4 border-primary">
        <i class="fas fa-desktop w-5 text-center"></i> Dashboard
    </a>

    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-home w-5 text-center"></i> Beranda Website
    </a>

    <div class="pt-5 pb-2">
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Manajemen Data</p>
    </div>

    <a href="javascript:void(0)" onclick="tampilkanPanel('produk', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-box w-5 text-center"></i> Produk / E-Commerce
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('order', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-shopping-cart w-5 text-center"></i> Kelola Pesanan
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('agro', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-leaf w-5 text-center"></i> Agroeduwisata
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('katalog', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-book-open w-5 text-center"></i> Katalog Desa
    </a>
    <a href="javascript:void(0)" onclick="tampilkanPanel('testimoni', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
        <i class="fas fa-comment-dots w-5 text-center"></i> Testimoni
    </a>

    @if($isSuperAdmin ?? false)
        <div class="pt-5 pb-2">
            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Sistem</p>
        </div>

        <a href="javascript:void(0)" onclick="tampilkanPanel('user', this)" class="menu-link w-full flex items-center gap-3 px-4 py-2.5 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors border-l-4 border-transparent">
            <i class="fas fa-users-cog w-5 text-center"></i> Settings / Users
        </a>
    @endif

    <form action="{{ route('logout') }}" method="POST" class="mt-6 border-t border-gray-100 pt-4 mx-4">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 transition-colors">
            <i class="fas fa-sign-out-alt w-5 text-center"></i> Log Out
        </button>
    </form>
</nav>
