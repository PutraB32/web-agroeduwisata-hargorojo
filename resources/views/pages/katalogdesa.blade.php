@extends('layouts.master')

@section('title', 'Katalog Desa - Informasi')

@section('content')

{{-- NAVBAR --}}
@include('layouts.navbar')

<!-- ===================================================== -->
<!-- HERO BERITA UTAMA -->
<!-- ===================================================== -->
<section class="relative h-[700px] pt-28 overflow-hidden bg-black">

    <div class="absolute inset-0">
        <img id="hero-katalog-bg" src="{{ asset('images/assets foto/content_pendampingan petani.png') }}" alt="" class="w-full h-full object-cover scale-110 animate-kenburns">
        <div class="absolute inset-0 bg-black animate-vignette"></div>
        <div class="absolute inset-0 bg-[#173121]/50"></div>
    </div>

    <div class="relative z-20 max-w-[1400px] mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-[2.1fr_1fr] gap-5">

            {{-- BERITA UTAMA — tambah hero-slide-left --}}
            <a href="#" class="hero-slide-left relative overflow-hidden rounded-[20px] h-[550px] group">

                <img
                    src="{{ asset('images/katalog/' . $beritaUtama->gambar) }}"
                    alt="{{ $beritaUtama->judul }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                >

                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30"></div>

                <div class="relative z-10 h-full flex flex-col justify-end p-8 lg:p-12">

                    <span class="hero-fade-up delay-100 inline-flex w-fit px-4 py-2 rounded-[10px] bg-green-700 text-white text-sm font-semibold mb-3">
                        BERITA UTAMA
                    </span>

                    <div class="hero-fade-up delay-200 flex flex-wrap gap-5 text-white/80 text-sm mb-2">
                        <span><i class="fa-regular fa-calendar mr-1"></i>{{ $beritaUtama->created_at->translatedFormat('d F Y') }}</span>
                        <span><i class="fa-regular fa-folder mr-1"></i>{{ $beritaUtama->kategoriKatalog->nama_kategori }}</span>
                        <span><i class="fa-solid fa-award mr-1"></i>Berita Pilihan</span>
                    </div>

                    <h1 class="hero-fade-up delay-300 font-lora text-white text-[42px] lg:text-[50px] leading-[1.05] font-medium max-w-2xl">
                        {{ $beritaUtama->judul }}
                    </h1>

                    <p class="hero-fade-up delay-450 mt-2 max-w-2xl text-white/80 italic text-[17px] font-light leading-relaxed">
                        {{ Str::limit(strip_tags($beritaUtama->deskripsi), 180) }}
                    </p>

                    {{-- Button — tambah btn-rise --}}
                    <div class="hero-fade-up delay-600 mt-6">
                        <span class="btn-rise inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-green-700 text-white font-semibold cursor-pointer">
                            Baca Artikel Lengkap
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </div>

            </a>

            {{-- SIDEBAR — sidebar-slide dari kanan sudah ada --}}
            <div class="sidebar-slide bg-white/70 rounded-[15px] p-5 border border-[#ece8df] shadow-[0_15px_40px_rgba(0,0,0,0.05)] h-full flex flex-col justify-center">

                <h3 class="sidebar-item font-lora text-[18px] font-bold text-[#173121] mb-5">
                    Berita Terbaru Lainnya
                </h3>

                <div class="flex flex-col gap-3">
                    @foreach($sidebarBerita as $berita)
                    <a href="#" class="sidebar-item flex gap-3 p-2 rounded-[15px] group hover:bg-[#e3e1da] transition-all duration-300">
                        <img src="{{ asset('images/katalog/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-[120px] h-[80px] rounded-[10px] object-cover flex-shrink-0">
                        <div class="flex flex-col justify-center">
                            <h4 class="font-lora text-[15px] leading-[1.3] font-bold text-[#173121] group-hover:text-[#d4b254] transition-colors">
                                {{ Str::limit($berita->judul, 75) }}
                            </h4>
                            <div class="mt-2 text-sm text-[#4c4444]">
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="sidebar-item mt-5 flex justify-end">
                    {{-- Link — tambah btn-rise --}}
                    <a href="#" class="btn-rise inline-flex items-center gap-2 text-[#173121] font-semibold hover:text-[#d4b254] transition-colors duration-300">
                        <span>Lihat Semua Berita</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>

</section>

<!-- ===================================================== -->
<!-- STATISTIK KATALOG DESA -->
<!-- ===================================================== -->
<section class="py-10 bg-[#f8f8f6]">
    <div class="max-w-[1400px] mx-auto px-2 md:px-6 lg:px-8">

        {{-- Box utama — box-scale-in --}}
        <div class="
            box-scale-in
            bg-white rounded-[25px]
            shadow-[0_10px_30px_rgba(0,0,0,0.04)]
            grid grid-cols-2 lg:grid-cols-4
            overflow-hidden
        ">

            {{-- ITEM 1 --}}
            <div class="stat-card stat-card-delay-1 flex items-center gap-5 p-6 lg:p-8">
                <div class="stat-icon-pop w-15 h-15 rounded-full bg-[#D97706] flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-bullhorn text-white text-[25px]"></i>
                </div>
                <div>
                    <div data-count="12" class="font-display text-[30px] font-semibold leading-none text-[#111]">
                        12
                    </div>
                    <div class="font-lora text-[20px] font-bold leading-tight text-[#111]">Pengumuman</div>
                    <p class="text-sm text-[#666]">Informasi terbaru desa</p>
                </div>
            </div>

            {{-- ITEM 2 --}}
            <div class="stat-card stat-card-delay-2 flex items-center gap-5 p-6 lg:p-8">
                <div class="stat-icon-pop w-15 h-15 rounded-full bg-[#2563EB] flex items-center justify-center shrink-0">
                    <i class="fa-regular fa-newspaper text-white text-[25px]"></i>
                </div>
                <div>
                    <div data-count="58" class="font-display text-[30px] font-semibold leading-none text-[#111]">
                        58
                    </div>
                    <div class="font-lora text-[20px] font-bold leading-tight text-[#111]">Artikel & Berita</div>
                    <p class="text-sm text-[#666]">Cerita dan kegiatan desa</p>
                </div>
            </div>

            {{-- ITEM 3 --}}
            <div class="stat-card stat-card-delay-3 flex items-center gap-5 p-6 lg:p-8">
                <div class="stat-icon-pop w-15 h-15 rounded-full bg-[#7C3AED] flex items-center justify-center shrink-0">
                    <i class="fa-regular fa-file-lines text-white text-[25px]"></i>
                </div>
                <div>
                    <div data-count="35" class="font-display text-[30px] font-semibold leading-none text-[#111]">
                        35
                    </div>
                    <div class="font-lora text-[20px] font-bold leading-tight text-[#111]">Perpustakaan Desa</div>
                    <p class="text-sm text-[#666]">Arsip & buku desa</p>
                </div>
            </div>

            {{-- ITEM 4 --}}
            <div class="stat-card stat-card-delay-4 flex items-center gap-5 p-6 lg:p-8">
                <div class="stat-icon-pop w-15 h-15 rounded-full bg-[#5B8F5B] flex items-center justify-center shrink-0">
                    <i class="fa-regular fa-image text-white text-[25px]"></i>
                </div>
                <div>
                    <div data-count="120" class="font-display text-[30px] font-semibold leading-none text-[#111]">
                        120
                    </div>
                    <div class="font-lora text-[20px] font-bold leading-tight text-[#111]">Galeri Desa</div>
                    <p class="text-sm text-[#666]">Momen kegiatan desa</p>
                </div>
            </div>

        </div>

    </div>
</section>



<!-- ===================================================== -->
<!-- PENGUMUMAN DESA -->
<!-- ===================================================== -->
{{-- Tambah pengumuman-section --}}
<section class="pengumuman-section py-5">

    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

            <div class="reveal reveal-delay-1 flex items-center gap-4">

                <div class="w-15 h-15 rounded-full bg-[#D97706] flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-bullhorn text-white text-[25px]"></i>
                </div>

                <div>
                    <h2 class="font-lora text-[36px] md:text-[25px] font-bold text-[#173121] leading-none">
                        Pengumuman
                    </h2>
                    <p class="text-[#6b736d] mt-1">
                        Informasi penting dan pengumuman terbaru dari Desa Hargorojo
                    </p>
                </div>

            </div>

        </div>

        <!-- PENGUMUMAN -->
        <div class="relative">

            {{-- Nav buttons — tambah nav-btn-reveal --}}
            <button id="prevPengumuman" class="
                nav-btn-reveal
                hidden lg:flex
                absolute left-[-50px] top-1/2 -translate-y-1/2 z-10
                w-12 h-12 rounded-full bg-white shadow-lg
                items-center justify-center text-[#173121]
                hover:bg-[#173121] hover:text-white transition-all
            ">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button id="nextPengumuman" class="
                nav-btn-reveal
                hidden lg:flex
                absolute right-[-55px] top-1/2 -translate-y-1/2 z-10
                w-12 h-12 rounded-full bg-white shadow-lg
                items-center justify-center text-[#173121]
                hover:bg-[#173121] hover:text-white transition-all
            ">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            @if($pengumuman->count())

            <div id="pengumumanContainer" class="flex gap-5 overflow-x-auto scroll-smooth no-scrollbar pb-4">

                @foreach($pengumuman as $item)

                {{-- Tambah pengumuman-card --}}
                <div class="
                    pengumuman-card
                    flex-shrink-0 w-[350px]
                    bg-white rounded-[24px]
                    border border-[#ececec]
                    shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                    p-5 relative
                    hover:-translate-y-1 hover:shadow-lg
                    transition-all duration-300
                ">

                    {{-- Date badge — tambah date-badge-pop --}}
                    <div class="date-badge-pop absolute top-5 left-5 w-[52px] h-[58px] rounded-xl bg-[#f8f8f6] border flex flex-col items-center justify-center">
                        <span class="text-[20px] font-bold text-[#173121]">
                            {{ $item->created_at->format('d') }}
                        </span>
                        <span class="text-[10px] uppercase text-[#6b736d]">
                            {{ $item->created_at->translatedFormat('M') }}
                        </span>
                    </div>

                    {{-- Icon — tambah pengumuman-icon --}}
                    <div class="pengumuman-icon w-16 h-16 mx-auto mt-2 mb-5 rounded-full bg-[#FFF7ED] flex items-center justify-center">
                        <i class="fa-solid fa-bullhorn text-[#D97706] text-2xl"></i>
                    </div>

                    <h3 class="font-lora min-h-[80px] text-[20px] font-bold text-center text-[#173121] leading-tight">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-center text-[#6b736d] min-h-[100px] text-[15px] leading-relaxed mb-2">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 150) }}
                    </p>

                    <a href="#" class="flex justify-center items-center gap-2 text-[#5d8c5a] font-semibold hover:text-[#173121] transition-colors">
                        Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

                @endforeach

            </div>

            @else

            <div class="bg-white rounded-[24px] border border-dashed border-gray-300 py-16 px-8 text-center">
                <div class="w-16 h-16 mx-auto mb-5 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fa-solid fa-bullhorn text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Pengumuman</h3>
                <p class="text-gray-500">Informasi terbaru dari Desa Hargorojo akan ditampilkan di sini.</p>
            </div>

            @endif

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- ARTIKEL & BERITA -->
<!-- ===================================================== -->
<section class="artikel-section py-12">

    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

            <div class="reveal reveal-delay-1 flex items-center gap-4">

                <div class="w-15 h-15 rounded-full bg-[#2563EB] flex items-center justify-center shadow-md">
                    <i class="fa-regular fa-newspaper text-white text-2xl"></i>
                </div>

                <div>
                    <h2 class="font-lora text-[36px] md:text-[25px] font-bold text-[#173121] leading-none">
                        Artikel & Berita
                    </h2>
                    <p class="text-[#6b736d] mt-1">
                        Berita terkini seputar kegiatan dan perkembangan Desa Hargorojo
                    </p>
                </div>

            </div>

        </div>

        <!-- ARTICLE GRID -->
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

            @forelse($artikelBerita as $artikel)

            {{-- Tambah artikel-card + relative untuk ::before --}}
            <article class="
                artikel-card
                relative
                bg-white rounded-[15px] overflow-hidden
                border border-[#ececec]
                shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                hover:-translate-y-1 hover:shadow-lg
                transition-all duration-300
                group
            ">

                {{-- Image — tambah artikel-img --}}
                <img
                    src="{{ $artikel->gambar ? asset('images/katalog/' . $artikel->gambar) : asset('images/default-article.jpg') }}"
                    alt=""
                    class="artikel-img w-full h-[220px] object-cover transition-all duration-900"
                >

                <div class="p-5">

                    {{-- Date — tambah artikel-date --}}
                    <div class="artikel-date text-sm text-[#6b736d] mb-2">
                        <i class="fa-regular fa-calendar"></i>
                        <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                        <span>•</span>
                        <i class="fa-regular fa-clock"></i>
                        <span>{{ $artikel->created_at->format('H.i') }} WIB</span>
                    </div>

                    <h3 class="font-lora text-[20px] font-bold text-[#173121] leading-snug min-h-[90px] line-clamp-3 mb-2">
                        {{ $artikel->judul }}
                    </h3>

                    <p class="text-[#6b736d] text-[15px] leading-relaxed min-h-[72px] line-clamp-3">
                        {{ Str::limit(strip_tags($artikel->deskripsi), 140) }}
                    </p>

                </div>

            </article>

            @empty

            <div class="col-span-full py-16 text-center">
                <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-[#f8f6f1] flex items-center justify-center">
                    <i class="fa-regular fa-newspaper text-3xl text-[#173121]"></i>
                </div>
                <h3 class="font-lora text-2xl font-bold text-[#173121] mb-2">Belum Ada Artikel</h3>
                <p class="text-[#6b736d]">Artikel dan berita terbaru desa akan tampil di sini.</p>
            </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- PERPUSTAKAAN DESA -->
<!-- ===================================================== -->
<section class="perpus-section py-10">

    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

            <div class="reveal reveal-delay-1 flex items-center gap-4">
                <div class="w-15 h-15 rounded-full bg-[#7C3AED] flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-book-open text-white text-[28px]"></i>
                </div>
                <div>
                    <h2 class="font-lora text-[28px] md:text-[25px] font-bold text-[#173121] leading-none">
                        Perpustakaan Desa
                    </h2>
                    <p class="text-[#6B736D] mt-1">Koleksi buku, dokumen, dan literatur desa</p>
                </div>
            </div>

        </div>

        @php
            $themes = [
                ['card' => 'bg-[#F5F9EE] border-[#E5ECD7]', 'icon_bg' => 'bg-[#ECF4DF]', 'text' => 'text-[#7FA45A]', 'icon' => 'fa-book-open', 'label' => 'BUKU'],
                ['card' => 'bg-[#F2F8FD] border-[#DDEAF6]', 'icon_bg' => 'bg-[#E6F1FB]', 'text' => 'text-[#5D9CD6]', 'icon' => 'fa-file-lines', 'label' => 'DOKUMEN'],
                ['card' => 'bg-[#FFF8E7] border-[#F4E5B3]', 'icon_bg' => 'bg-[#FFF2CF]', 'text' => 'text-[#D7A731]', 'icon' => 'fa-book', 'label' => 'BUKU'],
                ['card' => 'bg-[#F7F3FD] border-[#E9DEF7]', 'icon_bg' => 'bg-[#EFE7FA]', 'text' => 'text-[#9B7ED9]', 'icon' => 'fa-file-pdf', 'label' => 'LAPORAN'],
            ];
        @endphp

        <!-- GRID -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

            @forelse($perpustakaan as $index => $item)

            @php $theme = $themes[$index % count($themes)]; @endphp

            {{-- Tambah perpus-card + delay --}}
            <div class="
                perpus-card perpus-card-delay-{{ ($index % 4) + 1 }}
                {{ $theme['card'] }} border rounded-[28px] p-6
                shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                hover:-translate-y-1 hover:shadow-lg
                transition-all duration-300
                flex flex-col min-h-[280px]
            ">

                <div class="flex gap-5 flex-1 mb-6">

                    {{-- Icon box — tambah perpus-icon --}}
                    <div class="perpus-icon w-[60px] h-[60px] rounded-[20px] {{ $theme['icon_bg'] }} flex items-center justify-center shrink-0">
                        <i class="fa-solid {{ $theme['icon'] }} {{ $theme['text'] }} text-[28px]"></i>
                    </div>

                    <div class="flex-1">

                        {{-- Label — tambah perpus-label --}}
                        <span class="perpus-label text-[12px] font-bold uppercase tracking-wide {{ $theme['text'] }}">
                            {{ $theme['label'] }}
                        </span>

                        <h3 class="mt-2 font-lora text-[18px] font-bold text-[#173121] leading-tight line-clamp-3 min-h-[60px]">
                            {{ $item->judul }}
                        </h3>

                        <p class="mt-2 text-[#6B736D] text-[14px] leading-relaxed line-clamp-3 min-h-[42px]">
                            {{ Str::limit(strip_tags($item->deskripsi), 90) }}
                        </p>

                    </div>

                </div>

                @if($item->Url)
                {{-- Button — tambah perpus-arrow pada icon --}}
                <a href="{{ $item->Url }}" target="_blank" class="mt-auto inline-flex items-center gap-2 font-semibold text-[#173121] hover:gap-3 transition-all duration-300">
                    <span class="w-2 h-2 rounded-full {{ $theme['text'] }}"></span>
                    Lihat Koleksi
                    <i class="perpus-arrow fa-solid fa-arrow-right"></i>
                </a>
                @endif

            </div>

            @empty

            <div class="col-span-full text-center py-16">
                <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-[#F8F6F1] flex items-center justify-center">
                    <i class="fa-solid fa-book-open text-[#173121] text-3xl"></i>
                </div>
                <h3 class="font-lora text-2xl font-bold text-[#173121] mb-2">Belum Ada Koleksi</h3>
                <p class="text-[#6B736D]">Koleksi perpustakaan desa akan tampil di sini.</p>
            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- GALERI DESA -->
<!-- ===================================================== -->
<section class="galeri-katalog-section py-12 bg-[#faf9f6]">

    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

            <div class="reveal reveal-delay-1 flex items-center gap-4">
                <div class="w-15 h-15 rounded-full bg-[#5B8F5B] flex items-center justify-center shadow-md">
                    <i class="fa-regular fa-image text-white text-[28px]"></i>
                </div>
                <div>
                    <h2 class="font-lora text-[28px] md:text-[25px] font-bold text-[#173121] leading-none">
                        Galeri Desa
                    </h2>
                    <p class="text-[#6B736D] mt-1">Potret kehidupan, budaya, dan keindahan Desa Hargorojo</p>
                </div>
            </div>

        </div>

        @if($galeri->isNotEmpty())

            @php $hero = $galeri->first(); @endphp

            <div class="grid lg:grid-cols-2 gap-2">

                {{-- HERO IMAGE — galeri-katalog-hero + galeri-tint --}}
                <div class="galeri-katalog-hero galeri-tint relative overflow-hidden rounded-[20px] group min-h-[500px]">

                    <img
                        src="{{ asset('images/katalog/' . $hero->gambar) }}"
                        alt="{{ $hero->judul }}"
                        class="galeri-zoom w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                    {{-- Caption — galeri-caption --}}
                    <div class="galeri-caption absolute bottom-8 left-8 right-8">
                        <h3 class="font-lora text-white/80 text-[28px] md:text-[35px] font-bold leading-tight">
                            {{ $hero->judul }}
                        </h3>
                        <p class="text-white/70 leading-relaxed max-w-[600px]">
                            {{ Str::limit(strip_tags($hero->deskripsi), 140) }}
                        </p>
                    </div>

                </div>

                {{-- SMALL GRID --}}
                <div class="grid sm:grid-cols-2 gap-2">

                    @foreach($galeri->skip(1)->take(4) as $item)

                    {{-- Tambah galeri-katalog-item + galeri-tint --}}
                    <div class="galeri-katalog-item galeri-tint relative overflow-hidden rounded-[20px] group min-h-[240px]">

                        <img
                            src="{{ asset('images/katalog/' . $item->gambar) }}"
                            alt="{{ $item->judul }}"
                            class="galeri-zoom w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                        {{-- Caption — galeri-caption --}}
                        <div class="galeri-caption absolute bottom-6 left-6 right-6">
                            <h4 class="font-lora text-white text-[20px] font-bold leading-tight line-clamp-2">
                                {{ $item->judul }}
                            </h4>
                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        @else

            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-[#F8F6F1] flex items-center justify-center">
                    <i class="fa-solid fa-camera-retro text-[#173121] text-4xl"></i>
                </div>
                <h3 class="font-lora text-[28px] font-bold text-[#173121] mb-3">Belum Ada Galeri</h3>
                <p class="text-[#6B736D] max-w-[500px] mx-auto">
                    Dokumentasi kegiatan dan potret kehidupan Desa Hargorojo akan tampil di sini.
                </p>
            </div>

        @endif

    </div>

</section>


<script>
    const container = document.getElementById('pengumumanContainer');

    if (container) {

        document.getElementById('nextPengumuman')
            ?.addEventListener('click', () => {

                container.scrollBy({
                    left: 340,
                    behavior: 'smooth'
                });

            });

        document.getElementById('prevPengumuman')
            ?.addEventListener('click', () => {

                container.scrollBy({
                    left: -340,
                    behavior: 'smooth'
                });

            });

    }
</script>

@endsection