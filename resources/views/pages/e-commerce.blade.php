@extends('layouts.master')

@section('title', 'Belanja Produk - Desa Hargorojo')

@section('content')
<!-- Hero Section -->
<div class="relative text-center py-20 px-4 shadow-sm border-b border-green-900" style="background-image: url('{{ asset('images/beranda.bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-b from-green-900/80 to-black/80"></div>
    <div class="relative z-10">
        <div class="inline-block border border-yellow-500 text-yellow-400 rounded-full px-5 py-1.5 text-xs font-bold mb-4 tracking-widest uppercase">
            KEARIFAN LOKAL
        </div>
        <h1 class="font-playfair text-3xl md:text-5xl font-bold text-white mb-4 tracking-tight drop-shadow-lg">Belanja Produk Desa</h1>
        <p class="text-gray-200 text-sm md:text-md max-w-lg mx-auto leading-relaxed drop-shadow-md">
            Jelajahi kekayaan alam dan kreativitas masyarakat Desa Hargorojo.<br>
            Dari manisnya gula kelapa hingga kerajinan tangan yang memikat hati.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 bg-white rounded-t-3xl -mt-6 relative z-20 shadow-xl">
    <!-- Search Bar & Cart -->
    <div class="mb-12 flex justify-center items-center gap-4 max-w-2xl mx-auto">
        <div class="relative w-full">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            <input type="text" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-green-200 rounded-full shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition-all" placeholder="Temukan produk pilihan Anda...">
        </div>
        <button class="flex items-center justify-center p-3.5 bg-yellow-500 hover:bg-yellow-600 text-black rounded-full shadow-md hover:shadow-lg transition-all relative">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            <span class="absolute top-0 right-0 bg-red-600 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full -mt-1 -mr-1 border border-white">0</span>
        </button>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
        @foreach($produks as $produk)
        <div class="bg-white rounded-2xl p-5 flex flex-col items-center shadow-lg border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition duration-300 relative group cursor-pointer z-10 hover:border-green-500">
            <div class="w-full aspect-square bg-gray-50 rounded-xl mb-5 overflow-hidden shadow-inner relative">
                <img src="{{ $produk->gambar ? asset('images/produk/' . $produk->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $produk->nama }}">
                
                <!-- Efek Kaca Hover Khusus untuk Produk Unggulan -->
                @if($produk->is_unggulan)
                <div class="absolute inset-0 bg-green-900/40 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center pointer-events-none">
                    <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-black text-[10px] sm:text-xs px-4 py-2 rounded-full uppercase tracking-widest shadow-2xl flex items-center gap-2 transform scale-75 group-hover:scale-100 transition-transform duration-500 border border-yellow-300">
                        <i class="fas fa-crown"></i> Produk Unggulan
                    </span>
                </div>
                @endif
            </div>
            <h3 class="font-bold text-gray-900 text-sm md:text-base mb-1 text-center {{ strlen($produk->nama) > 20 ? 'line-clamp-2 leading-tight' : '' }}">{{ $produk->nama }}</h3>
            <p class="text-sm font-semibold text-green-700 mb-4">Rp{{ number_format($produk->harga, 0, ',', '.') }} <span class="text-xs font-normal text-gray-500">/ pack</span></p>
            <button class="bg-black hover:bg-green-800 text-white text-xs font-bold py-2.5 px-6 rounded-full w-full transition-all shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                <i class="fas fa-shopping-cart"></i> Masukkan Keranjang
            </button>
        </div>
        @endforeach
    </div>
</div>

<!-- CTA Besar -->
<div class="bg-gradient-to-r from-green-900 to-black py-16 mt-12 bg-opacity-30 border-t border-green-800 relative overflow-hidden">
    <!-- Decorative background element -->
    <div class="absolute top-0 left-0 w-full h-full bg-[url('{{ asset('images/beranda.bg.jpeg') }}')] opacity-10 bg-cover bg-center mix-blend-overlay"></div>
    
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between bg-white relative z-10 rounded-3xl p-8 md:p-12 shadow-2xl border-l-4 border-yellow-500">
        <div class="mb-6 md:mb-0 text-center md:text-left flex-1 border-r-0 md:border-r border-gray-200 pr-0 md:pr-8">
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="w-8 h-px bg-yellow-500"></span>
                <span class="text-xs font-bold tracking-widest text-green-800 uppercase">Kemitraan Eduwisata</span>
            </div>
            <h3 class="font-playfair text-2xl md:text-3xl font-bold text-gray-900 mb-3">Pemesanan Dalam Jumlah Grosir?</h3>
            <p class="text-sm text-gray-600 max-w-lg leading-relaxed">Dapatkan penawaran khusus dan harga spesial. Kami melayani pemesanan dalam jumlah besar untuk kebutuhan bisnis, institusi liburan rutin anda.</p>
        </div>
        <div class="md:pl-8 text-center md:text-left w-full md:w-auto mt-6 md:mt-0">
            <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-3.5 px-8 rounded-full transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1 whitespace-nowrap flex items-center justify-center gap-3 w-full md:w-auto">
                <i class="fab fa-whatsapp text-lg"></i> Hubungi Admin
            </button>
            <p class="text-[10px] text-gray-400 mt-3 text-center">*Respon sangat cepat via WhatsApp</p>
        </div>
    </div>
</div>
@endsection
