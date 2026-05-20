@extends('layouts.master')

@section('title', 'Katalog Desa - Informasi')

@section('content')

{{-- NAVBAR --}}
@include('layouts.navbar')

<!-- Hero Berita Utama -->
<section class="relative py-16 px-4 shadow-sm overflow-hidden border-b border-green-900" style="background-image: url('{{ asset('images/beranda.bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-black/80"></div>
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-10 items-center relative z-10">
        <div class="flex-1 order-2 md:order-1 text-center md:text-left pr-4">
            <span class="inline-flex items-center gap-2 bg-yellow-500/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4 text-yellow-400 border border-yellow-500/50">
                <span class="w-2 h-2 rounded-full bg-red-500"></span> Selamat Datang
            </span>
            <h1 class="font-playfair text-3xl md:text-5xl font-bold text-white mb-5 leading-tight drop-shadow-lg">
                Katalog Informasi Terpadu Desa Hargorojo
            </h1>
            <p class="text-gray-200 text-sm md:text-base mb-8 leading-relaxed max-w-lg mx-auto md:mx-0 drop-shadow-md">
                Pusat informasi desa mulai dari pengumuman warga, berita terkini, literatur perpustakaan, hingga dokumentasi visual.
            </p>
        </div>
        <div class="w-full md:w-[480px] h-[320px] bg-green-800 rounded-3xl overflow-hidden order-1 md:order-2 shadow-2xl relative group border-4 border-yellow-500">
             <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Berita Utama">
             <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
             <div class="absolute bottom-6 left-6 right-6">
                <p class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-1 drop-shadow-md">Portal Desa</p>
                <h3 class="text-white font-playfair font-bold text-xl leading-snug drop-shadow-md group-hover:text-yellow-400 transition-colors">Transparan & Terpercaya</h3>
             </div>
        </div>
    </div>
</section>

<!-- Section Pengumuman -->
<section class="max-w-7xl mx-auto px-4 py-8 -mt-12 relative z-20">
    <div class="bg-yellow-500 rounded-2xl shadow-2xl p-1 overflow-hidden">
        <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-8 items-start md:items-center">
            <div class="flex-shrink-0 flex items-center justify-center bg-yellow-100 text-yellow-600 w-20 h-20 rounded-full border-4 border-white shadow-inner">
                <i class="fas fa-bullhorn text-3xl"></i>
            </div>
            <div class="flex-1 w-full">
                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-gray-100 inline-block">Pengumuman Desa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($pengumuman as $p)
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-yellow-50 transition border-l-4 border-yellow-400 shadow-sm">
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-sm mb-1">{{ $p->judul }}</h3>
                            <p class="text-xs text-gray-600 line-clamp-2">{{ $p->deskripsi }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-500 italic">Belum ada pengumuman saat ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Grid: Artikel & Berita + Perpustakaan -->
<div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-10">
    
    <!-- Left Col: Artikel & Berita (8 cols) -->
    <div class="lg:col-span-8 space-y-6">
        <div class="flex items-center justify-between border-b-2 border-green-800 pb-3 mb-6">
            <h3 class="font-playfair text-2xl font-bold text-gray-900">Artikel & Berita</h3>
            <span class="text-sm font-semibold text-green-700 bg-green-100 px-3 py-1 rounded-full">{{ $artikelBerita->count() }} Postingan</span>
        </div>
        
        @forelse($artikelBerita as $artikel)
        <div class="flex flex-col md:flex-row bg-white rounded-2xl p-5 shadow-sm border border-gray-100 gap-6 group hover:-translate-y-1 hover:shadow-xl hover:border-green-400 transition-all duration-300">
            <div class="w-full md:w-56 h-40 bg-gray-100 rounded-xl overflow-hidden shrink-0 relative">
                @php
                    $fotoUrl = asset('images/beranda.bg.jpeg');
                    if ($artikel->gambar) {
                        if (\Illuminate\Support\Facades\Storage::disk('public')->exists('katalog/' . $artikel->gambar)) {
                            $fotoUrl = asset('storage/katalog/' . $artikel->gambar);
                        } else {
                            $fotoUrl = file_exists(public_path('images/katalog/' . $artikel->gambar)) ? asset('images/katalog/' . $artikel->gambar) : asset('images/' . $artikel->gambar);
                        }
                    }
                @endphp
                <img src="{{ $fotoUrl }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $artikel->judul }}" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
            </div>
            <div class="flex-1 flex flex-col justify-center text-left">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-green-700 bg-green-50 border border-green-200 px-2 py-1 rounded">Berita Desa</span>
                    <span class="text-xs text-gray-500"><i class="far fa-calendar-alt"></i> {{ $artikel->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="font-bold text-gray-900 text-xl mb-3 leading-tight group-hover:text-green-700 transition-colors">{{ $artikel->judul }}</h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                    {{ $artikel->deskripsi }}
                </p>
                <a href="#" class="text-xs font-bold text-green-700 inline-flex items-center gap-2 uppercase tracking-wide group-hover:text-yellow-600 transition-colors">
                    Baca Artikel <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>
        @empty
        <div class="text-center py-10 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
            <p class="text-gray-500">Belum ada artikel atau berita.</p>
        </div>
        @endforelse
    </div>

    <!-- Right Col: Perpustakaan (Sidebar 4 cols) -->
    <aside class="lg:col-span-4">
        <div class="sticky top-24">
            <div class="bg-gradient-to-br from-green-900 to-green-800 rounded-2xl p-6 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-6 -top-6 text-white/5 text-9xl">
                    <i class="fas fa-book-open"></i>
                </div>
                
                <h3 class="font-playfair text-2xl font-bold text-white mb-6 relative z-10 flex items-center gap-3 border-b border-white/20 pb-4">
                    <i class="fas fa-book text-yellow-400"></i> Perpustakaan
                </h3>
                
                <div class="space-y-4 relative z-10">
                    @forelse($perpustakaan as $buku)
                    <a href="{{ $buku->Url ?? '#' }}" target="_blank" class="block bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/10 rounded-xl p-4 transition cursor-pointer group">
                        <div class="flex items-start gap-4">
                            <div class="bg-yellow-500/20 p-3 rounded-lg text-yellow-400 group-hover:bg-yellow-400 group-hover:text-green-900 transition-colors">
                                <i class="fas fa-file-pdf text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-white font-bold text-sm leading-tight mb-1 group-hover:text-yellow-300 transition-colors">{{ $buku->judul }}</h4>
                                <p class="text-gray-300 text-xs line-clamp-2">{{ $buku->deskripsi }}</p>
                            </div>
                        </div>
                    </a>
                    @empty
                    <p class="text-white/70 text-sm text-center py-4">Belum ada dokumen di perpustakaan.</p>
                    @endforelse
                </div>
                
                <button class="mt-8 w-full py-3 bg-yellow-500 hover:bg-yellow-400 text-green-900 font-bold text-center rounded-xl transition text-sm flex items-center justify-center gap-2 shadow-lg">
                    <i class="fas fa-download"></i> Unduh Katalog Lengkap
                </button>
            </div>
        </div>
    </aside>

</div>

<!-- Galeri -->
<section class="bg-black py-16 border-t-4 border-yellow-500 relative">
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <div class="inline-block border border-yellow-500 rounded-full px-4 py-1.5 mb-3"><span class="font-bold text-[10px] text-yellow-400 uppercase tracking-widest">Koleksi Visual</span></div>
            <h2 class="font-playfair text-3xl md:text-4xl font-bold text-white drop-shadow-md mb-4">Galeri Desa</h2>
            <p class="text-gray-400 text-sm max-w-xl mx-auto">Potret kehidupan, keindahan alam, dan aktivitas warga Desa Hargorojo yang diabadikan dalam lensa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galeri as $foto)
            <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-2xl group relative cursor-pointer border-2 border-transparent hover:border-yellow-500 transition-colors duration-300">
                <div class="w-full aspect-[4/3] overflow-hidden bg-black">
                    @php
                        $fotoUrl = asset('images/beranda.bg.jpeg');
                        if ($foto->gambar) {
                            if (\Illuminate\Support\Facades\Storage::disk('public')->exists('katalog/' . $foto->gambar)) {
                                $fotoUrl = asset('storage/katalog/' . $foto->gambar);
                            } else {
                                $fotoUrl = file_exists(public_path('images/katalog/' . $foto->gambar)) ? asset('images/katalog/' . $foto->gambar) : asset('images/' . $foto->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $fotoUrl }}" class="w-full h-full object-cover group-hover:scale-105 filter brightness-75 group-hover:brightness-100 transition duration-500" alt="{{ $foto->judul }}" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-90 flex flex-col justify-end p-6">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="font-bold text-white text-lg mb-2 drop-shadow-md group-hover:text-yellow-400 transition-colors">{{ $foto->judul }}</h3>
                        <p class="text-xs text-gray-300 line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">{{ $foto->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center border border-dashed border-gray-700 rounded-2xl">
                <i class="fas fa-images text-4xl text-gray-600 mb-3"></i>
                <p class="text-gray-400 text-sm">Belum ada foto galeri.</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <button class="inline-flex items-center gap-2 border border-white text-white hover:bg-white hover:text-black font-bold text-sm px-6 py-3 rounded-full transition-colors">
                Muat Lebih Banyak <i class="fas fa-chevron-down"></i>
            </button>
        </div>
    </div>
</section>

@endsection
