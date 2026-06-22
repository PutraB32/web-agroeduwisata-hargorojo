@extends('layouts.master')

@section('title', 'Katalog Desa - Informasi')

@section('content')

<!-- ===================================================== -->
<!-- HERO BERITA UTAMA -->
<!-- ===================================================== -->
<section class="relative overflow-hidden bg-black pt-28 pb-10 sm:pt-32 lg:h-[700px] lg:pb-0">

    <div class="absolute inset-0">
        <img id="hero-katalog-bg" src="{{ asset('images/assets foto/content_pendampingan petani.png') }}" alt="" class="w-full h-full object-cover scale-110 animate-kenburns">
        <div class="absolute inset-0 bg-black animate-vignette"></div>
        <div class="absolute inset-0 bg-[#173121]/50"></div>
    </div>

    <div class="relative z-20 max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 lg:grid-cols-[2.1fr_1fr] lg:gap-5">

            {{-- BERITA UTAMA — tambah hero-slide-left --}}
            <a
                href="{{ $beritaUtama->external_url ?? '#' }}"
                @if($beritaUtama->external_url) target="_blank" rel="noopener noreferrer" @else aria-disabled="true" tabindex="-1" @endif
                class="hero-slide-left relative min-h-[430px] overflow-hidden rounded-[18px] group sm:min-h-[500px] sm:rounded-[20px] lg:h-[550px] lg:min-h-0 {{ $beritaUtama->external_url ? '' : 'pointer-events-none' }}"
            >

                <img
                    src="{{ $beritaUtama->gambar_url }}"
                    alt="{{ $beritaUtama->judul }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                >

                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30"></div>

                <div class="relative z-10 flex min-h-[430px] flex-col justify-end p-5 sm:min-h-[500px] sm:p-8 lg:h-full lg:min-h-0 lg:p-12">

                    <span class="hero-fade-up delay-100 mb-3 inline-flex w-fit rounded-[10px] bg-green-700 px-3 py-2 text-xs font-semibold text-white sm:px-4 sm:text-sm">
                        BERITA UTAMA
                    </span>

                    <div class="hero-fade-up delay-200 mb-2 flex flex-wrap gap-x-4 gap-y-2 text-xs text-white/80 sm:gap-x-5 sm:text-sm">
                        <span><i class="fa-regular fa-calendar mr-1"></i>{{ $beritaUtama->created_at->translatedFormat('d F Y') }}</span>
                        <span><i class="fa-regular fa-folder mr-1"></i>{{ $beritaUtama->kategoriKatalog->nama_kategori }}</span>
                        <span><i class="fa-solid fa-award mr-1"></i>Berita Pilihan</span>
                    </div>

                    <h1 class="hero-fade-up delay-300 max-w-2xl font-lora text-[30px] font-medium leading-[1.08] text-white sm:text-[40px] lg:text-[50px] lg:leading-[1.05]">
                        {{ $beritaUtama->judul }}
                    </h1>

                    <p class="hero-fade-up delay-450 mt-3 max-w-2xl text-sm font-light italic leading-relaxed text-white/80 sm:text-base lg:text-[17px]">
                        {{ Str::limit(strip_tags($beritaUtama->deskripsi), 180) }}
                    </p>

                    {{-- Button — tambah btn-rise --}}
                    <div class="hero-fade-up delay-600 mt-6">
                        <span class="btn-rise inline-flex w-full items-center justify-center gap-3 rounded-2xl px-5 py-3 text-sm font-semibold sm:w-auto sm:text-base {{ $beritaUtama->external_url ? 'cursor-pointer bg-green-700 text-white' : 'cursor-not-allowed bg-white/20 text-white/60' }}">
                            Baca Artikel Lengkap
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </div>

            </a>

            {{-- SIDEBAR — sidebar-slide dari kanan sudah ada --}}
            <div class="sidebar-slide flex h-full flex-col justify-start rounded-[15px] border border-[#d4b254]/30 bg-[#173121]/70 p-4 shadow-[0_15px_40px_rgba(0,0,0,0.16)] backdrop-blur-sm sm:p-5 lg:justify-center">

                <h3 class="sidebar-item mb-4 font-lora text-[17px] font-bold text-white sm:mb-5 sm:text-[18px]">
                    Berita Terbaru Lainnya
                </h3>

                <div class="flex flex-col gap-3">
                    @foreach($sidebarBerita as $berita)
                    <a
                        href="{{ $berita->external_url ?? '#' }}"
                        @if($berita->external_url) target="_blank" rel="noopener noreferrer" @else aria-disabled="true" tabindex="-1" @endif
                        class="sidebar-item group flex gap-3 rounded-[15px] p-2 transition-all duration-300 hover:bg-white/10 {{ $berita->external_url ? '' : 'pointer-events-none opacity-60' }}"
                    >
                        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="h-[72px] w-[96px] flex-shrink-0 rounded-[10px] object-cover sm:h-[80px] sm:w-[120px]">
                        <div class="flex min-w-0 flex-col justify-center">
                            <h4 class="font-lora text-[14px] font-bold leading-[1.35] text-white transition-colors group-hover:text-[#d4b254] sm:text-[15px]">
                                {{ Str::limit($berita->judul, 75) }}
                            </h4>
                            <div class="mt-2 text-xs text-white/72 sm:text-sm">
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="sidebar-item mt-5 flex justify-end">
                    {{-- Link — tambah btn-rise --}}
                    <a href="#" class="btn-rise inline-flex items-center gap-2 text-sm font-semibold text-white transition-colors duration-300 hover:text-[#d4b254] sm:text-base">
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
<section class="bg-[#f8f8f6] py-8 sm:py-10">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Box utama — box-scale-in --}}
        <div class="
            box-scale-in
            bg-white rounded-[20px] sm:rounded-[25px]
            shadow-[0_10px_30px_rgba(0,0,0,0.04)]
            grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
            overflow-hidden
        ">

            @foreach($statistikKatalog as $statistik)
                <div class="stat-card {{ $statistik['delayClass'] }} flex min-w-0 items-center gap-4 p-4 sm:p-5 lg:p-8">
                    <div
                        class="stat-icon-pop flex h-12 w-12 shrink-0 items-center justify-center rounded-full sm:h-15 sm:w-15"
                        style="background-color: {{ $statistik['color'] }}"
                    >
                        <i class="{{ $statistik['icon'] }} text-[20px] text-white sm:text-[25px]"></i>
                    </div>
                    <div class="min-w-0">
                        <div data-count="{{ $statistik['count'] }}" class="font-display text-[26px] font-semibold leading-none text-[#111] sm:text-[30px]">
                            {{ $statistik['count'] }}
                        </div>
                        <div class="font-lora text-[18px] font-bold leading-tight text-[#111] sm:text-[20px]">{{ $statistik['label'] }}</div>
                        <p class="text-xs leading-relaxed text-[#666] sm:text-sm">{{ $statistik['description'] }}</p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>



<!-- ===================================================== -->
<!-- PENGUMUMAN DESA -->
<!-- ===================================================== -->
{{-- Tambah pengumuman-section --}}
<section class="pengumuman-section py-8 sm:py-10">

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-6 flex flex-col gap-5 sm:mb-8 md:flex-row md:items-center md:justify-between">

            <div class="reveal reveal-delay-1 flex items-start gap-3 sm:items-center sm:gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#D97706] shadow-md sm:h-15 sm:w-15">
                    <i class="fa-solid fa-bullhorn text-[20px] text-white sm:text-[25px]"></i>
                </div>

                <div class="min-w-0">
                    <h2 class="font-lora text-[28px] font-bold leading-tight text-[#173121] sm:text-[34px] md:text-[36px]">
                        Pengumuman
                    </h2>
                    <p class="mt-1 text-sm leading-relaxed text-[#6b736d] sm:text-base">
                        Informasi penting dan pengumuman terbaru dari Desa Hargorojo
                    </p>
                </div>

            </div>

        </div>

        <!-- PENGUMUMAN -->
        <div class="relative">

            @if($pengumuman->count())

            <div id="pengumumanContainer" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($pengumuman as $item)

                {{-- Tambah pengumuman-card --}}
                <div class="
                    pengumuman-card
                    h-full w-full
                    bg-white rounded-[20px] sm:rounded-[24px]
                    border border-[#ececec]
                    shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                    p-4 sm:p-5 relative
                    hover:-translate-y-1 hover:shadow-lg
                    transition-all duration-300
                ">

                    {{-- Date badge — tambah date-badge-pop --}}
                    <div class="date-badge-pop absolute left-4 top-4 flex h-[52px] w-[48px] flex-col items-center justify-center rounded-xl border bg-[#f8f8f6] sm:left-5 sm:top-5 sm:h-[58px] sm:w-[52px]">
                        <span class="text-[18px] font-bold text-[#173121] sm:text-[20px]">
                            {{ $item->created_at->format('d') }}
                        </span>
                        <span class="text-[10px] uppercase text-[#6b736d]">
                            {{ $item->created_at->translatedFormat('M') }}
                        </span>
                    </div>

                    {{-- Icon — tambah pengumuman-icon --}}
                    <div class="pengumuman-icon mx-auto mb-4 mt-2 flex h-14 w-14 items-center justify-center rounded-full bg-[#FFF7ED] sm:mb-5 sm:h-16 sm:w-16">
                        <i class="fa-solid fa-bullhorn text-xl text-[#D97706] sm:text-2xl"></i>
                    </div>

                    <h3 class="min-h-[72px] text-center font-lora text-[18px] font-bold leading-tight text-[#173121] sm:min-h-[80px] sm:text-[20px]">
                        {{ $item->judul }}
                    </h3>

                    <p class="mb-2 min-h-[92px] text-center text-sm leading-relaxed text-[#6b736d] sm:min-h-[100px] sm:text-[15px]">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 150) }}
                    </p>

                    @if($item->external_url)
                        <a href="{{ $item->external_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 text-sm font-semibold text-[#5d8c5a] transition-colors hover:text-[#173121] sm:text-base">
                            Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @else
                        <span class="flex cursor-not-allowed items-center justify-center gap-2 text-sm font-semibold text-[#5d8c5a]/45 sm:text-base" aria-disabled="true">
                            Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    @endif

                </div>

                @endforeach

            </div>

            @else

            <div class="rounded-[20px] border border-dashed border-gray-300 bg-white px-5 py-12 text-center sm:rounded-[24px] sm:px-8 sm:py-16">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">
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
<section class="artikel-section py-10 sm:py-12">

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-6 flex flex-col gap-5 sm:mb-8 md:flex-row md:items-center md:justify-between">

            <div class="reveal reveal-delay-1 flex items-start gap-3 sm:items-center sm:gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#2563EB] shadow-md sm:h-15 sm:w-15">
                    <i class="fa-regular fa-newspaper text-xl text-white sm:text-2xl"></i>
                </div>

                <div class="min-w-0">
                    <h2 class="font-lora text-[28px] font-bold leading-tight text-[#173121] sm:text-[34px] md:text-[36px]">
                        Artikel & Berita
                    </h2>
                    <p class="mt-1 text-sm leading-relaxed text-[#6b736d] sm:text-base">
                        Berita terkini seputar kegiatan dan perkembangan Desa Hargorojo
                    </p>
                </div>

            </div>

        </div>

        <!-- ARTICLE GRID -->
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">

            @forelse($artikelBerita as $artikel)

            {{-- Tambah artikel-card + relative untuk ::before --}}
            <article class="
                artikel-card
                relative
                bg-white rounded-[14px] sm:rounded-[15px] overflow-hidden
                border border-[#ececec]
                shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                hover:-translate-y-1 hover:shadow-lg
                transition-all duration-300
                group
            ">

                {{-- Image — tambah artikel-img --}}
                <img
                    src="{{ $artikel->gambar ? $artikel->gambar_url : asset('images/default-article.jpg') }}"
                    alt=""
                    class="artikel-img h-[190px] w-full object-cover transition-all duration-900 sm:h-[220px]"
                >

                <div class="p-4 sm:p-5">

                    {{-- Date — tambah artikel-date --}}
                    <div class="artikel-date mb-2 flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-[#6b736d] sm:text-sm">
                        <i class="fa-regular fa-calendar"></i>
                        <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                        <span>•</span>
                        <i class="fa-regular fa-clock"></i>
                        <span>{{ $artikel->created_at->format('H:i') }} WIB</span>
                    </div>

                    <h3 class="mb-2 font-lora text-[18px] font-bold leading-snug text-[#173121] line-clamp-3 sm:min-h-[90px] sm:text-[20px]">
                        {{ $artikel->judul }}
                    </h3>

                    <p class="text-sm leading-relaxed text-[#6b736d] line-clamp-3 sm:min-h-[72px] sm:text-[15px]">
                        {{ Str::limit(strip_tags($artikel->deskripsi), 140) }}
                    </p>

                    @if($artikel->external_url)
                        <a
                            href="{{ $artikel->external_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#173121] px-4 py-3 text-sm font-semibold text-white transition-all hover:bg-[#224430] sm:w-auto"
                        >
                            Selengkapnya
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    @else
                        <span
                            class="mt-5 inline-flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-xl bg-[#173121]/35 px-4 py-3 text-sm font-semibold text-white/70 sm:w-auto"
                            aria-disabled="true"
                        >
                            Selengkapnya
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    @endif

                </div>

            </article>

            @empty

            <div class="col-span-full py-12 text-center sm:py-16">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#f8f6f1] sm:h-20 sm:w-20">
                    <i class="fa-regular fa-newspaper text-2xl text-[#173121] sm:text-3xl"></i>
                </div>
                <h3 class="mb-2 font-lora text-xl font-bold text-[#173121] sm:text-2xl">Belum Ada Artikel</h3>
                <p class="text-sm text-[#6b736d] sm:text-base">Artikel dan berita terbaru desa akan tampil di sini.</p>
            </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- PERPUSTAKAAN DESA -->
<!-- ===================================================== -->
<section class="perpus-section py-8 sm:py-10">

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-6 flex flex-col gap-5 sm:mb-8 lg:flex-row lg:items-center lg:justify-between">

            <div class="reveal reveal-delay-1 flex items-start gap-3 sm:items-center sm:gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#7C3AED] shadow-md sm:h-15 sm:w-15">
                    <i class="fa-solid fa-book-open text-[22px] text-white sm:text-[28px]"></i>
                </div>
                <div class="min-w-0">
                    <h2 class="font-lora text-[28px] font-bold leading-tight text-[#173121] sm:text-[34px] md:text-[36px]">
                        Perpustakaan Desa
                    </h2>
                    <p class="mt-1 text-sm leading-relaxed text-[#6B736D] sm:text-base">Koleksi buku, dokumen, dan literatur desa</p>
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
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 xl:gap-6">

            @forelse($perpustakaan as $index => $item)

            @php $theme = $themes[$index % count($themes)]; @endphp

            {{-- Tambah perpus-card + delay --}}
            <div class="
                perpus-card perpus-card-delay-{{ ($index % 4) + 1 }}
                {{ $theme['card'] }} border rounded-[22px] sm:rounded-[28px] p-5 sm:p-6
                shadow-[0_8px_25px_rgba(0,0,0,0.04)]
                hover:-translate-y-1 hover:shadow-lg
                transition-all duration-300
                flex flex-col min-h-[240px] sm:min-h-[280px]
            ">

                <div class="mb-5 flex flex-1 gap-4 sm:mb-6 sm:gap-5">

                    {{-- Icon box — tambah perpus-icon --}}
                    <div class="perpus-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-[16px] {{ $theme['icon_bg'] }} sm:h-[60px] sm:w-[60px] sm:rounded-[20px]">
                        <i class="fa-solid {{ $theme['icon'] }} {{ $theme['text'] }} text-[22px] sm:text-[28px]"></i>
                    </div>

                    <div class="min-w-0 flex-1">

                        {{-- Label — tambah perpus-label --}}
                        <span class="perpus-label text-[12px] font-bold uppercase tracking-wide {{ $theme['text'] }}">
                            {{ $theme['label'] }}
                        </span>

                        <h3 class="mt-2 font-lora text-[17px] font-bold leading-tight text-[#173121] line-clamp-3 sm:min-h-[60px] sm:text-[18px]">
                            {{ $item->judul }}
                        </h3>

                        <p class="mt-2 text-[13px] leading-relaxed text-[#6B736D] line-clamp-3 sm:min-h-[42px] sm:text-[14px]">
                            {{ Str::limit(strip_tags($item->deskripsi), 90) }}
                        </p>

                    </div>

                </div>

                @if($item->external_url)
                {{-- Button — tambah perpus-arrow pada icon --}}
                <a href="{{ $item->external_url }}" target="_blank" rel="noopener noreferrer" class="mt-auto inline-flex items-center gap-2 text-sm font-semibold text-[#173121] transition-all duration-300 hover:gap-3 sm:text-base">
                    <span class="w-2 h-2 rounded-full {{ $theme['text'] }}"></span>
                    Lihat Koleksi
                    <i class="perpus-arrow fa-solid fa-arrow-right"></i>
                </a>
                @else
                <span class="mt-auto inline-flex cursor-not-allowed items-center gap-2 text-sm font-semibold text-[#173121]/35 sm:text-base" aria-disabled="true">
                    <span class="w-2 h-2 rounded-full {{ $theme['text'] }}"></span>
                    Lihat Koleksi
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                @endif

            </div>

            @empty

            <div class="col-span-full py-12 text-center sm:py-16">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#F8F6F1] sm:h-20 sm:w-20">
                    <i class="fa-solid fa-book-open text-2xl text-[#173121] sm:text-3xl"></i>
                </div>
                <h3 class="mb-2 font-lora text-xl font-bold text-[#173121] sm:text-2xl">Belum Ada Koleksi</h3>
                <p class="text-sm text-[#6B736D] sm:text-base">Koleksi perpustakaan desa akan tampil di sini.</p>
            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- GALERI DESA -->
<!-- ===================================================== -->
<section class="galeri-katalog-section bg-[#faf9f6] py-10 sm:py-12">

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-6 flex flex-col gap-5 sm:mb-8 lg:flex-row lg:items-center lg:justify-between">

            <div class="reveal reveal-delay-1 flex items-start gap-3 sm:items-center sm:gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#5B8F5B] shadow-md sm:h-15 sm:w-15">
                    <i class="fa-regular fa-image text-[22px] text-white sm:text-[28px]"></i>
                </div>
                <div class="min-w-0">
                    <h2 class="font-lora text-[28px] font-bold leading-tight text-[#173121] sm:text-[34px] md:text-[36px]">
                        Galeri Desa
                    </h2>
                    <p class="mt-1 text-sm leading-relaxed text-[#6B736D] sm:text-base">Potret kehidupan, budaya, dan keindahan Desa Hargorojo</p>
                </div>
            </div>

        </div>

        @if($galeri->isNotEmpty())

            @php $hero = $galeri->first(); @endphp

            <div class="grid gap-3 lg:grid-cols-2">

                {{-- HERO IMAGE — galeri-katalog-hero + galeri-tint --}}
                <div class="galeri-katalog-hero galeri-tint group relative min-h-[340px] overflow-hidden rounded-[18px] sm:min-h-[420px] sm:rounded-[20px] lg:min-h-[500px]">

                    <img
                        src="{{ $hero->gambar_url }}"
                        alt="{{ $hero->judul }}"
                        class="galeri-zoom w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                    {{-- Caption — galeri-caption --}}
                    <div class="galeri-caption absolute bottom-5 left-5 right-5 sm:bottom-8 sm:left-8 sm:right-8">
                        <h3 class="font-lora text-[24px] font-bold leading-tight text-white/80 sm:text-[28px] md:text-[35px]">
                            {{ $hero->judul }}
                        </h3>
                        <p class="mt-2 max-w-[600px] text-sm leading-relaxed text-white/70 sm:text-base">
                            {{ Str::limit(strip_tags($hero->deskripsi), 140) }}
                        </p>
                    </div>

                </div>

                {{-- SMALL GRID --}}
                <div class="grid gap-3 sm:grid-cols-2">

                    @foreach($galeri->skip(1)->take(4) as $item)

                    {{-- Tambah galeri-katalog-item + galeri-tint --}}
                    <div class="galeri-katalog-item galeri-tint group relative min-h-[190px] overflow-hidden rounded-[18px] sm:min-h-[220px] sm:rounded-[20px] lg:min-h-[240px]">

                        <img
                            src="{{ $item->gambar_url }}"
                            alt="{{ $item->judul }}"
                            class="galeri-zoom w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                        {{-- Caption — galeri-caption --}}
                        <div class="galeri-caption absolute bottom-5 left-5 right-5 sm:bottom-6 sm:left-6 sm:right-6">
                            <h4 class="font-lora text-[18px] font-bold leading-tight text-white line-clamp-2 sm:text-[20px]">
                                {{ $item->judul }}
                            </h4>
                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        @else

            <div class="py-16 text-center sm:py-20">
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-[#F8F6F1] sm:h-24 sm:w-24">
                    <i class="fa-solid fa-camera-retro text-3xl text-[#173121] sm:text-4xl"></i>
                </div>
                <h3 class="mb-3 font-lora text-2xl font-bold text-[#173121] sm:text-[28px]">Belum Ada Galeri</h3>
                <p class="mx-auto max-w-[500px] text-sm leading-relaxed text-[#6B736D] sm:text-base">
                    Dokumentasi kegiatan dan potret kehidupan Desa Hargorojo akan tampil di sini.
                </p>
            </div>

        @endif

    </div>

</section>


@endsection
