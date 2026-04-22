@extends('layouts.master')

@section('title', 'Katalog Desa - Informasi')

@section('content')

<!-- Hero Berita Utama -->
<section class="relative py-16 px-4 shadow-sm overflow-hidden border-b border-green-900" style="background-image: url('{{ asset('images/beranda.bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-black/80"></div>
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-10 items-center relative z-10">
        <div class="flex-1 order-2 md:order-1 text-center md:text-left pr-4">
            <span class="inline-flex items-center gap-2 bg-yellow-500/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4 text-yellow-400 border border-yellow-500/50">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> Berita Terkini
            </span>
            <h1 class="font-playfair text-3xl md:text-5xl font-bold text-white mb-5 leading-tight drop-shadow-lg">
                Warisan yang Terjaga: Jejak Penderes Nira Hargorojo
            </h1>
            <p class="text-gray-200 text-sm md:text-base mb-8 leading-relaxed max-w-lg mx-auto md:mx-0 drop-shadow-md">
                Menyelami lebih dalam kearifan lokal yang menggerakkan ekonomi kerakyatan melalui secangkir cerita kehidupan penderes nira.
            </p>
            <a href="#" class="inline-flex items-center gap-3 bg-yellow-500 text-black text-sm font-bold rounded-full px-7 py-3 hover:bg-yellow-400 hover:shadow-2xl hover:-translate-y-1 transition-all shadow-lg border border-yellow-400">
                Baca Selengkapnya <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="w-full md:w-[480px] h-[320px] bg-green-800 rounded-3xl overflow-hidden order-1 md:order-2 shadow-2xl relative group border-4 border-yellow-500">
             <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Berita Utama">
             <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
             <div class="absolute bottom-6 left-6 right-6">
                <p class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-1 drop-shadow-md">Eksklusif</p>
                <h3 class="text-white font-playfair font-bold text-xl leading-snug drop-shadow-md group-hover:text-yellow-400 transition-colors">Mengintip Dapur Nira Tradisional</h3>
             </div>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-12 gap-10">
    
    <!-- Sidebar / Kategori -->
    <aside class="md:col-span-3">
        <div class="sticky top-24">
            <h3 class="font-playfair text-2xl font-bold border-b-2 border-green-800 pb-3 mb-5 text-gray-900">Kanal Desa</h3>
            
            <div class="relative mb-8">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-green-600">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition-all" placeholder="Temukan cerita...">
            </div>

            <h4 class="text-xs font-bold text-gray-900 mb-4 uppercase tracking-widest text-green-800">Kategori Populer</h4>
            <div class="flex flex-wrap gap-2">
                <span class="bg-green-50 text-green-800 text-xs font-semibold px-4 py-2 border border-green-200 hover:border-green-600 hover:bg-green-100 rounded-lg cursor-pointer transition-all">#Gula_Kelapa</span>
                <span class="bg-yellow-50 text-yellow-800 text-xs font-semibold px-4 py-2 border border-yellow-200 hover:border-yellow-600 hover:bg-yellow-100 rounded-lg cursor-pointer transition-all">#Agroeduwisata</span>
                <span class="bg-green-50 text-green-800 text-xs font-semibold px-4 py-2 border border-green-200 hover:border-green-600 hover:bg-green-100 rounded-lg cursor-pointer transition-all">#Pariwisata</span>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="md:col-span-9 space-y-8">
        @foreach($katalogBerita as $berita)
        <div class="flex flex-col md:flex-row bg-white rounded-2xl p-5 shadow-lg border border-gray-100 gap-6 group hover:-translate-y-1 hover:shadow-2xl hover:border-green-400 transition-all duration-300">
            <div class="w-full md:w-48 h-40 bg-gray-100 rounded-xl overflow-hidden shrink-0 relative shadow-inner border-2 border-transparent group-hover:border-yellow-400 transition-colors">
                <img src="{{ $berita->gambar ? asset($berita->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $berita->judul }}">
            </div>
            <div class="flex-1 flex flex-col justify-center text-left">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-yellow-700 bg-yellow-100 border border-yellow-200 px-2 py-1 rounded">{{ $berita->kategori }}</span>
                    <span class="text-xs font-semibold text-green-600"><i class="far fa-clock"></i> Baru Saja</span>
                </div>
                <h3 class="font-bold text-gray-900 text-xl mb-3 leading-tight group-hover:text-green-700 transition-colors">{{ $berita->judul }}</h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                    {{ $berita->deskripsi }}
                </p>
                <a href="#" class="text-xs font-bold text-green-700 inline-flex items-center gap-2 uppercase tracking-wide group-hover:text-yellow-600 transition-colors">
                    Baca Artikel <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Koleksi Foto -->
<section class="bg-gradient-to-b from-green-900 to-black py-16 border-t border-green-800">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <div class="inline-block border border-yellow-500 rounded-full px-4 py-1.5 mb-3"><span class="font-bold text-[10px] text-yellow-400 uppercase tracking-widest">Galeri Desa</span></div>
            <h2 class="font-playfair text-3xl font-bold text-white drop-shadow-md">Perpustakaan Lensa</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($katalogFoto->take(3) as $foto)
            <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-2xl group relative cursor-pointer border-2 border-transparent hover:border-yellow-500 transition-colors duration-300">
                <div class="w-full aspect-[4/3] overflow-hidden bg-black">
                    <img src="{{ $foto->gambar ? asset($foto->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 filter brightness-75 group-hover:brightness-100 transition duration-700" alt="{{ $foto->judul }}">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-100 flex flex-col justify-end p-6">
                    <h3 class="font-bold text-yellow-400 text-lg mb-1 drop-shadow-md group-hover:-translate-y-1 transition-transform">{{ $foto->judul }}</h3>
                    <p class="text-xs text-gray-300 line-clamp-1 opacity-0 group-hover:opacity-100 group-hover:-translate-y-1 transition-all">{{ $foto->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Produk UMKM Lainnya -->
<section class="max-w-6xl mx-auto px-4 py-16 mb-8 mt-4 rounded-[2rem] bg-white shadow-2xl border-t-4 border-b-4 border-yellow-500 relative overflow-hidden">
     <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2 z-0"></div>
     <div class="text-center mb-12 relative z-10">
        <h2 class="font-playfair text-3xl font-bold text-green-900">Jelajahi Produk UMKM</h2>
        <p class="text-sm text-gray-600 mt-2 max-w-md mx-auto font-medium">Karya tangan masyarakat, pilar penggerak kreativitas dari desa untuk dunia.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
        @foreach($katalogUMKM->take(3) as $umkm)
        <div class="bg-gray-50 rounded-2xl p-6 shadow-md border border-gray-100 text-center group hover:-translate-y-2 hover:shadow-2xl hover:border-green-400 transition-all duration-300">
            <div class="w-32 h-32 mx-auto bg-green-100 rounded-full mb-5 overflow-hidden shadow-inner p-1.5 border-4 border-yellow-400">
                <img src="{{ $umkm->gambar ? asset($umkm->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover rounded-full group-hover:rotate-6 group-hover:scale-110 transition duration-500" alt="{{ $umkm->judul }}">
            </div>
            <h3 class="font-bold text-gray-900 text-md mb-2 group-hover:text-green-700 transition">{{ $umkm->judul }}</h3>
            <p class="text-xs text-gray-500 mb-5 h-10 leading-relaxed">{{ $umkm->deskripsi }}</p>
            <a href="#" class="inline-flex items-center justify-center gap-2 w-full bg-black hover:bg-green-800 text-white text-[10px] font-bold uppercase tracking-widest px-5 py-3 rounded-full transition-all shadow-md">
                Pesan Sekarang <i class="fas fa-shopping-bag text-yellow-400"></i>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection
