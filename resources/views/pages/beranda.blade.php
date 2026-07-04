@extends('layouts.master')

@section('title', 'Beranda - Desa Hargorojo')

@section('content')

<section class="home-hero relative min-h-[100svh] w-full overflow-hidden bg-black">
    <div class="absolute inset-0 h-full w-full">
        <img
            src="{{ asset('images/assets foto/hero section.webp') }}"
            alt="Pemandangan Desa Wisata Hargorojo"
            class="home-hero__image h-full w-full scale-100 object-cover object-center animate-kenburns"
        >

        <div class="absolute inset-0 bg-black/55 animate-vignette"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent animate-slide-gradient"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
        <div class="absolute inset-0 bg-yellow-900/10 mix-blend-overlay animate-pulse-warm"></div>
    </div>

    <div class="home-hero__shell relative z-20 flex min-h-[100svh] items-end pb-8 pt-32 sm:pb-12 sm:pt-36 lg:pb-14 lg:pt-40">
        <div class="home-hero__inner mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-10">
            <div class="home-hero__grid flex w-full flex-col gap-8 lg:flex-row lg:items-end lg:justify-between lg:gap-10">
                <div class="home-hero__copy w-full max-w-[46rem]">
                    <div class="home-hero__eyebrow hero-fade-up delay-100 mb-4 flex items-center gap-3">
                        <div class="home-hero__eyebrow-line h-px w-10 shrink-0 bg-white/60 sm:w-14"></div>
                        <span class="home-hero__eyebrow-text text-xs font-medium uppercase tracking-[0.28em] text-yellow-400 sm:text-sm">
                            Selamat Datang Di
                        </span>
                        <div class="home-hero__eyebrow-line h-px w-10 shrink-0 bg-white/60 sm:w-14"></div>
                    </div>

                    <h1 class="home-hero__title hero-fade-up delay-200 font-hero text-[2.25rem] font-[550] uppercase leading-[0.98] tracking-normal text-white drop-shadow-[0_5px_25px_rgba(0,0,0,0.5)] sm:text-[3.75rem] md:text-[4.5rem] lg:text-[4.1rem]">
                        <span class="block whitespace-nowrap lg:inline">Desa Agroeduwisata</span>
                        <span class="block text-yellow-500 drop-shadow-[0_0_25px_rgba(250,204,21,0.35)] lg:inline lg:whitespace-nowrap lg:[overflow-wrap:normal]">
                            Gula Kelapa Hargorojo
                        </span>
                    </h1>

                    <p class="home-hero__lead hero-fade-up delay-300 mt-4 max-w-2xl text-sm font-light leading-relaxed text-gray-200 sm:text-base md:text-lg">
                        Menawarkan edukasi unik dan pengalaman natural wisata gula kelapa, didukung sistem monitoring terpadu yang menghadirkan informasi real-time, pengelolaan destinasi yang efektif, dengan mengutamakan kenyamanan, pelayanan, dan pengalaman terbaik bagi wisatawan.
                    </p>

                    <div class="home-hero__tags hero-fade-up delay-450 mt-6 flex flex-wrap gap-3 sm:mt-8 sm:gap-4">
                        <span class="home-hero__tag tag-shimmer flex items-center rounded-full border border-white/25 bg-white/5 px-4 py-2 text-xs font-normal text-white/90 backdrop-blur-2xl transition-all duration-300 hover:bg-white/10 sm:px-5 sm:py-2.5 sm:text-sm">
                            Budaya & Tradisi
                        </span>
                        <span class="home-hero__tag tag-shimmer flex items-center rounded-full border border-white/25 bg-white/5 px-4 py-2 text-xs font-normal text-white/90 backdrop-blur-xl transition-all duration-300 hover:bg-white/10 sm:px-5 sm:py-2.5 sm:text-sm">
                            Agroeduwisata
                        </span>
                        <span class="home-hero__tag tag-shimmer flex items-center rounded-full border border-white/25 bg-white/5 px-4 py-2 text-xs font-normal text-white/90 backdrop-blur-xl transition-all duration-300 hover:bg-white/10 sm:px-5 sm:py-2.5 sm:text-sm">
                            Produk Gula Kelapa
                        </span>
                        
                    </div>

                    <div class="home-hero__avatars mt-7 flex items-center sm:mt-10">
                        <div class="home-hero__avatar avatar-in delay-600 z-10 h-[3.25rem] w-[3.25rem] overflow-hidden rounded-full border-2 border-white shadow-2xl transition-all duration-300 hover:scale-105 sm:h-[4.5rem] sm:w-[4.5rem]">
                            <img src="{{ asset('images/agroeduwisata/menanam tanaman.jpg') }}" alt="Aktivitas menanam tanaman" class="h-full w-full object-cover">
                        </div>
                        <div class="home-hero__avatar home-hero__avatar--overlap avatar-in delay-700 z-20 -ml-4 h-[3.25rem] w-[3.25rem] overflow-hidden rounded-full border-2 border-white shadow-2xl transition-all duration-300 hover:scale-105 sm:-ml-7 sm:h-[4.5rem] sm:w-[4.5rem]">
                            <img src="{{ asset('images/agroeduwisata/1776929726.jpg') }}" alt="Kegiatan agroeduwisata Desa Hargorojo" class="h-full w-full object-cover">
                        </div>
                        <div class="home-hero__avatar home-hero__avatar--overlap avatar-in delay-800 z-30 -ml-4 h-[3.25rem] w-[3.25rem] overflow-hidden rounded-full border-2 border-white shadow-2xl transition-all duration-300 hover:scale-105 sm:-ml-5 sm:h-[4.5rem] sm:w-[4.5rem]">
                            <img src="{{ asset('images/agroeduwisata/1776929702.jpg') }}" alt="Wisata alam Desa Hargorojo" class="h-full w-full object-cover">
                        </div>
                        <div class="home-hero__avatar home-hero__avatar--overlap avatar-in delay-900 z-40 -ml-4 h-[3.25rem] w-[3.25rem] overflow-hidden rounded-full border-2 border-white shadow-2xl transition-all duration-300 hover:scale-105 sm:-ml-5 sm:h-[4.5rem] sm:w-[4.5rem]">
                            <img src="{{ asset('images/produk/Coconut sugar.jpg') }}" alt="Produk gula kelapa Hargorojo" class="h-full w-full object-cover">
                        </div>
                    </div>
                </div>

                <div class="home-hero__cta hero-fade-up delay-750 flex w-full flex-col gap-3 sm:max-w-fit sm:flex-row lg:w-auto lg:max-w-none lg:flex-row">
                    <a
                        href="{{ route('profil') }}"
                        class="home-hero__button btn-pulse group inline-flex min-h-[3.25rem] w-fit items-center justify-center gap-3 rounded-full border border-yellow-300/50 bg-yellow-500 px-6 text-md font-bold text-[#152014] shadow-[0_16px_40px_rgba(212,175,55,0.35)] backdrop-blur-xl transition-all duration-300 hover:scale-[1.02] hover:border-yellow-200 hover:bg-yellow-300 hover:shadow-[0_22px_55px_rgba(212,175,55,0.46)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-yellow-300 sm:px-6"
                    >
                        <span class="home-hero__button-text whitespace-nowrap text-center">Lihat Profil Desa</span>
                        <span class="home-hero__button-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#173c2d] text-white/80 transition-all duration-300 group-hover:bg-white group-hover:text-[#173c2d]"><i class="fa-solid fa-arrow-right text-lg leading-none"></i></span>
                    </a>

                    <a
                        href="{{ route('kontak') }}"
                        class="home-hero__button group inline-flex min-h-[3.25rem] w-fit items-center justify-center gap-3 rounded-full border border-green-300/70 bg-green-800/90 px-6 text-md font-bold text-white shadow-[0_16px_40px_rgba(0,77,64,0.35)] backdrop-blur-xl transition-all duration-300 hover:scale-[1.02] hover:border-yellow-300 hover:bg-green-700 hover:shadow-[0_22px_55px_rgba(0,77,64,0.48)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-yellow-300 sm:px-6"
                    >
                        <span class="home-hero__button-text whitespace-nowrap text-center">Hubungi Kami</span>
                        <span class="home-hero__button-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/60 text-green-900 transition-all duration-300 group-hover:bg-yellow-400 group-hover:text-black"><i class="fa-solid fa-arrow-right text-lg leading-none"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. POTENSI AGROEDUWISATA KAMI -->
<section class="bg-gray-50 py-20 border-y border-gray-200 shadow-inner">
    <div class="relative text-center mb-10">

        <!-- Decorative — tambah leaf-float -->
        <div class="absolute -left-5 top-0 opacity-[0.10] hidden lg:block leaf-float-left">
            <i class="fa-solid fa-leaf text-[120px] text-green-900"></i>
        </div>
        <div class="absolute -right-1 bottom-0 opacity-[0.08] hidden lg:block leaf-float-right">
            <i class="fa-solid fa-leaf text-[140px] text-yellow-800"></i>
        </div>

        <!-- Small Label — reveal pertama, line-expand pada garis -->
        <div class="reveal reveal-delay-1 flex items-center justify-center gap-2 sm:gap-3 mb-2">
            <div class="line-expand h-[2px] w-8 sm:w-12 bg-green-700 rounded-full"></div>
            <span class="
                uppercase tracking-[0.17em] sm:tracking-[0.19em] lg:tracking-[0.28em] text-sx sm:text-sm lg:text-[16px] font-semibold text-green-800 text-center">
                Potensi Unggulan Desa
            </span>
            <div class="line-expand h-[2px] w-8 sm:w-12 bg-green-700 rounded-full"></div>
        </div>

        <!-- Main Title — reveal kedua -->
        <h2 class="reveal reveal-delay-2
            font-display text-[36px] md:text-[56px] lg:text-[50px]
            font-medium leading-[1.1] tracking-normal
            text-gray-900 drop-shadow-sm
        ">
            Potensi Agroeduwisata Kami
        </h2>

        <!-- Description — reveal ketiga -->
        <p class="reveal reveal-delay-3
            mt-2 max-w-3xl mx-auto text-gray-600
            text-base md:text-xl lg:text-[18px]
            leading-[1.5] font-thin
        ">
            Menggabungkan kekayaan alam, kearifan lokal, dan edukasi untuk
            menciptakan pengalaman wisata yang berkesan, bermanfaat,
            dan berkelanjutan.
        </p>

        <!-- Pills — reveal keempat -->
        <div class="reveal reveal-delay-4 flex flex-wrap justify-center gap-4 mt-4">

            <span class="
                flex items-center gap-2.5
                border border-green-200 bg-white/80 backdrop-blur-md
                px-6 py-3 rounded-full text-sm text-gray-700
                shadow-sm hover:shadow-md hover:-translate-y-0.5
                transition-all duration-300
            ">
                <i class="fa-solid fa-hand-holding-heart text-green-700 text-xs"></i>
                Berkelanjutan
            </span>

            <span class="
                flex items-center gap-2.5
                border border-green-200 bg-white/80 backdrop-blur-md
                px-6 py-3 rounded-full text-sm text-gray-700
                shadow-sm hover:shadow-md hover:-translate-y-0.5
                transition-all duration-300
            ">
                <i class="fa-solid fa-users text-green-700 text-xs"></i>
                Edukasi & Interaktif
            </span>

            <span class="
                flex items-center gap-2.5
                border border-green-200 bg-white/80 backdrop-blur-md
                px-6 py-3 rounded-full text-sm text-gray-700
                shadow-sm hover:shadow-md hover:-translate-y-0.5
                transition-all duration-300
            ">
                <i class="fa-solid fa-shield-heart text-green-700 text-xs"></i>
                Asli & Otentik
            </span>

        </div>

    </div>


<!-- CONTENT SECTION -->
<div class="max-w-[1300px] mx-auto mt-[20px] space-y-8 md:space-y-5">

    @foreach($agroeduwisata as $index => $agro)

    {{-- Card: ganjil dari kiri, genap dari kanan --}}
    <div class="
        {{ $index % 2 == 0 ? 'card-slide-left' : 'card-slide-right' }}
        grid lg:grid-cols-2
        items-stretch
        bg-[#fdfbf7]
        rounded-[30px]
        overflow-hidden
        border border-[#ece7de]
        shadow-[0_10px_30px_rgba(0,0,0,0.04)]
    ">

        <!-- IMAGE -->
        <div class="
            relative group overflow-hidden min-h-[300px] rounded-[30px]
            {{ $index % 2 == 1 ? 'lg:order-2' : '' }}
        ">
            <img 
                src="{{ $agro->gambar_url }}"
                alt="{{ $agro->judul }}"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            >

            <!-- Gradient overlay tetap -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent"></div>

            <!-- Tirai reveal — tambahan baru -->
            <div class="img-reveal-overlay"></div>
        </div>

        <!-- CONTENT -->
        <div class="
            p-7 md:p-9 flex flex-col justify-center
            {{ $index % 2 == 1 ? 'lg:order-1' : '' }}
        ">

            <!-- TOP META -->
            <div class="flex items-center gap-4 mb-6">

                <!-- Number — tambah badge-pop -->
                <div class="
                    badge-pop
                    w-14 h-14 rounded-2xl bg-green-700 text-white
                    flex items-center justify-center text-2xl font-bold shadow-md
                ">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </div>

                <!-- Label -->
                <div class="flex items-center gap-2 text-green-700 font-semibold text-[17px]">
                    {{ $index == 0 ? 'Proses Produksi' : ($index == 1 ? 'Cerita dari Perkebunan Desa' : ($index == 2 ? 'Jelajah Keindahan Alam Desa' : 'Budaya & Tradisi Desa')) }}
                </div>

            </div>

            <!-- TITLE -->
            <h3 class="font-display text-[35px] md:text-[38px] leading-[1] tracking-normal text-[#146432] mb-4">
                {{ $agro->judul }}
            </h3>

            <!-- DESCRIPTION -->
            <p class="text-gray-600 leading-[1.9] text-[15px] md:text-base font-light max-w-xl mb-8">
                {{ $agro->deskripsi }}
            </p>

            <!-- FEATURES — tambah icon-bounce pada setiap icon -->
            <div class="grid grid-cols-3 border-t border-[#ece7de]">

                @if($index == 0)
                <div class="pt-5 pr-4">
                    <div class="icon-bounce icon-bounce-delay-1 text-yellow-500 text-xl mb-3">
                        <i class="fa-solid fa-fire"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Tradisional</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Proses pembuatan gula dilakukan secara turun-temurun.</p>
                </div>
                <div class="pt-5 px-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-2 text-green-700 text-xl mb-3">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Alami</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Menggunakan bahan alami tanpa campuran kimia.</p>
                </div>
                <div class="pt-5 pl-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-3 text-orange-500 text-xl mb-3">
                        <i class="fa-solid fa-hand"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Handmade</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Diproses langsung oleh perajin lokal desa.</p>
                </div>

                @elseif($index == 1)
                <div class="pt-5 pr-4">
                    <div class="icon-bounce icon-bounce-delay-1 text-green-700 text-xl mb-3">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Edukatif</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Pengunjung belajar langsung dari alam dan perkebunan.</p>
                </div>
                <div class="pt-5 px-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-2 text-yellow-500 text-xl mb-3">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Interaktif</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Aktivitas wisata dirancang menarik dan partisipatif.</p>
                </div>
                <div class="pt-5 pl-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-3 text-emerald-600 text-xl mb-3">
                        <i class="fa-solid fa-tree"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Perkebunan</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Mengenal berbagai tanaman khas pedesaan.</p>
                </div>

                @elseif($index == 2)
                <div class="pt-5 pr-4">
                    <div class="icon-bounce icon-bounce-delay-1 text-blue-500 text-xl mb-3">
                        <i class="fa-solid fa-mountain-sun"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Panorama Alam</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Menyuguhkan pemandangan alam desa yang memukau.</p>
                </div>
                <div class="pt-5 px-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-2 text-cyan-500 text-xl mb-3">
                        <i class="fa-solid fa-wind"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Udara Segar</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Suasana pedesaan yang sejuk dan menenangkan.</p>
                </div>
                <div class="pt-5 pl-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-3 text-green-700 text-xl mb-3">
                        <i class="fa-solid fa-route"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Jelajah Desa</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Menyusuri alam dan sudut indah Desa Hargorojo.</p>
                </div>

                @else
                <div class="pt-5 pr-4">
                    <div class="icon-bounce icon-bounce-delay-1 text-red-500 text-xl mb-3">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Budaya Lokal</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Tradisi masyarakat tetap dijaga dan dilestarikan.</p>
                </div>
                <div class="pt-5 px-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-2 text-yellow-500 text-xl mb-3">
                        <i class="fa-solid fa-masks-theater"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Tradisi Desa</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Mengenal kehidupan dan budaya masyarakat lokal.</p>
                </div>
                <div class="pt-5 pl-4 border-l border-[#ece7de]">
                    <div class="icon-bounce icon-bounce-delay-3 text-orange-500 text-xl mb-3">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">Gotong Royong</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Semangat kebersamaan masih terjaga hingga kini.</p>
                </div>
                @endif

            </div>
        </div>
    </div>

    @endforeach
</div>


{{-- Tambah class cta-section pada section utama --}}
<section class="cta-section relative mt-18 overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        {{-- Tambah id untuk parallax --}}
        <img 
            id="cta-bg"
            src="{{ asset('images/assets foto/CTA_Potensi.png') }}"
            alt="Agroeduwisata"
            class="w-full h-full object-cover scale-110"
        >
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-green-950/90 via-green-900/60 to-black/40"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-8 max-w-[4000px] mx-auto px-6 lg:px-12 py-12 lg:py-14">
        <div class="rounded-[34px] overflow-hidden border border-white/5">
            <div class="grid lg:grid-cols-[1fr_1.4fr_0.8fr] items-center gap-10 px-6 lg:px-10 py-1">

                <!-- LEFT CONTENT — reveal -->
                <div class="reveal reveal-delay-1">
                    <h3 class="
                        font-display text-white/90 text-[30px]
                        leading-[1] tracking-normal mb-5
                    ">
                        Agroeduwisata untuk Pengalaman yang Bermakna
                    </h3>
                    <p class="text-white/70 text-sm leading-[1.8] font-thin max-w-sm">
                        Kami berkomitmen memberikan pengalaman wisata yang tidak hanya menyenangkan, tetapi juga
                        edukatif, menginspirasi, dan memberi dampak positif bagi masyarakat desa.
                    </p>
                </div>

                <!-- STATS — reveal dengan delay -->
                <div class="reveal reveal-delay-2 grid grid-cols-1 lg:grid-cols-4 gap-2">

                    <!-- ITEM 1 — tambah stat-border-grow, stat-icon-float -->
                    <div class="stat-border-grow text-center lg:pr-6">
                        <div class="stat-icon-float text-white text-2xl mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h4 
                            x-data="counter(15, 15)"
                            x-init="init()"
                            class="text-yellow-400 text-[45px] font-bold leading-none mb-2"
                        >
                            <span x-text="count"></span>+
                        </h4>
                        <p class="text-white text-sm">Potensi Wisata</p>
                    </div>

                    <!-- ITEM 2 -->
                    <div class="stat-border-grow text-center lg:pr-6">
                        <div class="stat-icon-float stat-icon-float-2 text-white text-2xl mb-3">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h4 
                            x-data="counter(10, 70)"
                            x-init="init()"
                            class="text-yellow-400 text-5xl font-bold leading-none mb-2"
                        >
                            <span x-text="count"></span>+
                        </h4>
                        <p class="text-white text-sm">Aktivitas Edukasi</p>
                    </div>

                    <!-- ITEM 3 -->
                    <div class="stat-border-grow text-center lg:pr-6">
                        <div class="stat-icon-float stat-icon-float-3 text-white text-2xl mb-3">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <h4 
                            x-data="counter(100, 15)"
                            x-init="init()"
                            class="text-yellow-400 text-[42px] font-bold leading-none mb-2"
                        >
                            <span x-text="count"></span>%
                        </h4>
                        <p class="text-white text-sm">Alam Asri</p>
                    </div>

                    <!-- ITEM 4 -->
                    <div class="text-center">
                        <div class="stat-icon-float stat-icon-float-4 text-white text-2xl mb-3">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </div>
                        <h4 
                            x-data="counter(10, 95)"
                            x-init="init()"
                            class="text-yellow-400 text-[45px] font-bold leading-none mb-2"
                        >
                            <span x-text="count"></span>+
                        </h4>
                        <p class="text-white text-sm">Produk Lokal</p>
                    </div>

                </div>

                <!-- CTA BUTTON — reveal delay terakhir -->
                <div class="reveal reveal-delay-3 flex justify-center lg:justify-end">
                    <div class="text-center lg:text-left">
                        <p class="text-white/80 text-[20px] font-semibold leading-relaxed mb-6 max-w-xs">
                            Jelajahi lebih banyak potensi desa kami
                        </p>

                        <a href="{{ route('agro') }}"
                        class="
                            btn-glow
                            inline-flex items-center gap-4
                            bg-yellow-400 hover:bg-yellow-300
                            text-black px-6 py-3 rounded-full
                            font-semibold transition-all duration-300
                            hover:scale-105 shadow-2xl
                        ">
                            Jelajahi Selengkapnya
                            <span class="w-8 h-8 rounded-full bg-black text-white flex items-center justify-center text-sm">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>


<!-- ===================================================== -->
<!-- 3. PRODUK UNGGULAN KAMI -->
<!-- ===================================================== -->
<section class="relative py-15 bg-[#f8f6f1] overflow-hidden border-y border-[#ece7de]">

    <!-- Decorative leaf — leaf-float sudah ada dari sebelumnya -->
    <div class="absolute left-0 top-0 opacity-[0.05] hidden lg:block pointer-events-none leaf-float-left">
        <i class="fa-solid fa-leaf text-[220px] text-green-900"></i>
    </div>

    <!-- Decorative star — tambah star-spin -->
    <div class="absolute right-10 top-30 opacity-[0.04] hidden lg:block pointer-events-none">
        <i class="star-spin fa-solid fa-star text-[180px] text-yellow-700"></i>
    </div>

    <div class="relative z-10 max-w-[1400px] mx-auto px-6 lg:px-10">

        <!-- SECTION HEADER — pakai reveal yang sudah ada -->
        <div class="text-center mb-12">

            <div class="reveal reveal-delay-1 flex items-center justify-center gap-3 mb-2">
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                <span class="uppercase tracking-[0.2em] text-sm font-semibold text-yellow-600">
                    Produk Kami
                </span>
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
            </div>

            <h2 class="reveal reveal-delay-2
                font-display text-[38px] md:text-[58px] lg:text-[55px]
                leading-[0.95] tracking-normal text-[#183322] mb-3 drop-shadow-sm
            ">
                Produk Unggulan Kami
            </h2>

            <p class="reveal reveal-delay-3
                max-w-2xl mx-auto text-gray-600
                text-base md:text-[18px] leading-[1.2] font-thin
            ">
                Produk alami berkualitas hasil karya masyarakat desa,
                dibuat dengan cita rasa khas dan kearifan lokal
                Agroeduwisata Hargorojo.
            </p>

        </div>

        <!-- PRODUCT GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            @foreach($produkUnggulan as $index => $produk)

            {{-- Tambah product-card + delay per index --}}
            <div class="
                product-card product-card-delay-{{ ($index % 4) + 1 }}
                group relative bg-white/85 backdrop-blur-md
                rounded-[20px] overflow-hidden
                border border-[#ece7de]
                shadow-[0_20px_60px_rgba(0,0,0,0.12)]
                hover:-translate-y-3
                hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)]
                transition-all duration-700
                flex flex-col
            ">

                <!-- IMAGE -->
                <div class="relative overflow-hidden h-[240px]">
                    <img 
                        src="{{ $produk->gambar_url }}"
                        alt="{{ $produk->nama }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>

                    <!-- Hover Stamp -->
                    <div class="
                        absolute inset-0 bg-black/30 backdrop-blur-[2px]
                        opacity-0 group-hover:opacity-100
                        transition-all duration-300
                        flex items-center justify-center
                    ">
                        <span class="
                            bg-gradient-to-r from-yellow-400 to-yellow-500
                            text-black font-extrabold text-[12px]
                            px-4 py-2 rounded-full uppercase tracking-wider
                            shadow-lg flex items-center gap-2
                            scale-90 group-hover:scale-100 transition-transform duration-500
                        ">
                            <i class="fas fa-award text-[16px]"></i>
                            Produk Unggulan
                        </span>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="relative px-6 pt-10 pb-8 flex flex-col flex-grow text-center">

                    {{-- Floating Icon — tambah float-icon-drop --}}
                    <div class="
                        float-icon-drop
                        absolute -top-6 left-1/2 -translate-x-1/2
                        w-14 h-14 rounded-full
                        bg-gradient-to-br from-[#1d4d3a] to-[#2f7a5d]
                        border-2 border-white
                        flex items-center justify-center
                        text-white text-xl shadow-lg
                    ">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <h3 class="font-bold text-[20px] leading-[1.1] tracking-normal text-[#1b472b] mb-4 line-clamp-2">
                        {{ strtoupper($produk->nama) }}
                    </h3>

                    <p class="text-gray-500 text-[14px] leading-[1.2] font-light mb-2 min-h-[50px]">
                        {{ Str::limit($produk->deskripsi, 85) }}
                    </p>

                    <div class="text-[#d4af37] text-[18px] font-bold leading-none mb-5">
                        Rp{{ number_format($produk->harga, 0, ',', '.') }}
                        <span class="text-[14px] font-medium text-[#7a7a7a]">/ {{ $produk['satuan'] }}</span>
                    </div>

                    <a href="{{ route('ecommerce') }}"
                    class="
                        mt-auto inline-flex items-center justify-center gap-5
                        w-full bg-gradient-to-r from-green-800 to-green-700
                        hover:from-green-700 hover:to-green-600
                        text-white max-w-[240px] mx-auto py-3 px-2
                        rounded-xl font-semibold shadow-md transition-all duration-500
                    ">
                        Pesan Sekarang
                        <span class=" ">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                    </a>

                </div>

            </div>

            @endforeach

        </div>

        <!-- CTA BUTTON — reveal -->
        <div class="reveal reveal-delay-4 text-center mt-15">
            <a href="{{ route('produk') }}"
            class="
                inline-flex items-center gap-5
                bg-gradient-to-r from-green-900 to-green-700
                hover:scale-105 text-white px-8 py-3
                rounded-full font-semibold text-lg
                shadow-lg transition-all duration-500
            ">
                Lihat Semua Produk
                <span class="w-8 h-8 rounded-full bg-white/60 text-black flex items-center justify-center text-sm">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>
        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- 4. KATALOG DESA -->
<!-- ===================================================== -->
@php
    $katalogTabs = [
        [
            'key' => 'Pengumuman',
            'label' => 'Pengumuman',
            'description' => 'Info terbaru desa',
            'icon' => 'fa-solid fa-bullhorn',
            'items' => $pengumuman,
            'empty' => 'Belum ada pengumuman terbaru.',
        ],
        [
            'key' => 'Artikel & Berita',
            'label' => 'Artikel & Berita',
            'description' => 'Informasi kegiatan',
            'icon' => 'fa-regular fa-newspaper',
            'items' => $artikelBerita,
            'empty' => 'Belum ada artikel dan berita terbaru.',
        ],
        [
            'key' => 'Perpustakaan',
            'label' => 'Perpustakaan',
            'description' => 'Arsip & dokumen',
            'icon' => 'fa-regular fa-file-lines',
            'items' => $perpustakaan,
            'empty' => 'Belum ada arsip perpustakaan desa.',
        ],
        [
            'key' => 'Galeri',
            'label' => 'Galeri Desa',
            'description' => 'Foto & dokumentasi',
            'icon' => 'fa-regular fa-image',
            'items' => $galeri,
            'empty' => 'Belum ada dokumentasi galeri desa.',
        ],
    ];
@endphp
<section x-data="{ activeKatalogTab: 'Pengumuman' }" class="relative overflow-hidden bg-[#f8f6f1] py-15">

    <div class="absolute left-0 top-0 hidden opacity-[0.06] lg:block">
        <img src="{{ asset('images/ornament-daun.png') }}" class="w-[300px]" alt="">
    </div>

    <div class="relative z-10 mx-auto max-w-[1200px] px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-14 text-center">
            <div class="reveal reveal-delay-1 mb-2 inline-flex items-center gap-2 rounded-full border border-[#dde7d7] bg-[#eef3ea] px-6 py-3">
                <i class="fa-solid fa-book-open text-green-800"></i>
                <span class="text-sm font-semibold tracking-wide text-green-900">Informasi & Dokumentasi Desa Hargorojo</span>
            </div>

            <h2 class="reveal reveal-delay-2 mb-3 font-display text-[38px] leading-[0.95] tracking-normal text-[#000000] drop-shadow-sm md:text-[58px] lg:text-[55px]">
                Katalog Desa
            </h2>

            <p class="reveal reveal-delay-3 mx-auto mt-3 max-w-3xl text-[18px] font-thin leading-[1.3] text-[#1f211f]">
                Temukan berbagai informasi, berita, artikel, dan dokumentasi kegiatan yang mencerminkan semangat serta perkembangan Desa Hargorojo
            </p>
        </div>

        <!-- CATEGORY MENU -->
        <div class="cat-menu mx-auto mb-8 mt-5 max-w-[1000px] rounded-[25px] border border-[#ebe7de] bg-white/90 shadow-[0_10px_40px_rgba(0,0,0,0.05)] backdrop-blur-xl lg:mt-10">
            <div class="grid grid-cols-1 gap-3 p-2 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($katalogTabs as $index => $tab)
                    <button type="button" @click="activeKatalogTab = {{ \Illuminate\Support\Js::from($tab['key']) }}" :class="activeKatalogTab === {{ \Illuminate\Support\Js::from($tab['key']) }} ? 'bg-[#e4eddf] shadow-sm' : 'bg-white hover:bg-[#f7faf5]'" class="cat-item cat-item-delay-{{ $index + 1 }} flex min-w-0 items-center gap-4 rounded-2xl px-5 py-5 text-left transition-all duration-300">
                        <span :class="activeKatalogTab === {{ \Illuminate\Support\Js::from($tab['key']) }} ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700'" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-lg transition-colors duration-300">
                            <i class="{{ $tab['icon'] }}"></i>
                        </span>
                        <span class="min-w-0">
                            <span class="block truncate text-[16px] font-bold text-[#1b3b2b]">{{ $tab['label'] }}</span>
                            <span class="block truncate text-sm text-gray-500">{{ $tab['description'] }}</span>
                        </span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- CONTENT -->
        <div class="space-y-5">
            @foreach($katalogTabs as $tab)
                <div x-cloak x-show="activeKatalogTab === {{ \Illuminate\Support\Js::from($tab['key']) }}" x-transition.opacity.duration.200ms class="space-y-5">

                    @if($tab['key'] === 'Galeri')
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                            @forelse($tab['items']->sortByDesc('created_at') as $item)
                                @php $externalUrl = $item->external_url ?? null; @endphp
                                <a href="{{ $externalUrl ?: '#' }}" @if($externalUrl) target="_blank" rel="noopener noreferrer" @endif class="group relative overflow-hidden rounded-[10px]">
                                    <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" loading="lazy" class="class="class="aspect-[3/4] w-full object-cover transition duration-700 group-hover:scale-110""" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                                    <div class="absolute inset-0 bg-black/0 transition duration-300 group-hover:bg-black/15"></div>
                                    <div class="absolute right-3 top-3 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 backdrop-blur-md opacity-0 scale-75 transition-all duration-300 group-hover:opacity-100 group-hover:scale-100">
                                        <i class="fa-solid fa-expand text-[#173121]"></i>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-full rounded-[24px] border border-dashed border-[#d9d9d9] bg-white py-20 text-center">
                                    <i class="fa-regular fa-image text-5xl text-[#8aa88b]"></i>
                                    <p class="mt-5 text-[#6b736d]">Belum ada galeri desa.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        @forelse($tab['items']->sortByDesc('created_at')->take(3) as $loopIndex => $item)
                            @php
                                $kategori = $item->kategoriKatalog->nama_kategori ?? $tab['label'];
                                $kategoriLabel = $kategori === 'Galeri' ? 'Galeri Desa' : $kategori;
                                $externalUrl = $item->external_url ?? null;
                            @endphp

                            <article class="katalog-card visible katalog-card-delay-{{ $loopIndex + 1 }} mx-auto grid min-h-[300px] max-w-[1100px] overflow-hidden rounded-[20px] border border-[#ece7de] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.05)] transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_20px_60px_rgba(0,0,0,0.08)] lg:grid-cols-[0.8fr_1.2fr]">

                                <div class="group relative min-h-[220px] overflow-hidden lg:min-h-0">
                                    <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>
                                    <div class="badge-reveal absolute left-5 top-5 flex items-center gap-3 rounded-full bg-green-800 px-4 py-2.5 text-sm font-semibold text-white shadow-xl sm:left-6 sm:top-6 sm:px-5 sm:py-3">
                                        <i class="{{ $tab['icon'] }}"></i>
                                        {{ $kategoriLabel }}
                                    </div>
                                </div>

                                <div class="flex flex-col justify-center p-6 sm:p-8 lg:p-10">
                                    <div class="mb-4 flex items-center gap-3 text-sm text-gray-500">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>

                                    <h3 class="mb-5 line-clamp-2 font-display text-[24px] leading-[1.2] tracking-normal text-[#000000] md:text-[22px]">
                                        {{ $item->judul }}
                                    </h3>

                                    <p class="mb-3 line-clamp-5 font-lora text-[14px] font-thin italic leading-[1.9] text-[#5f6d63]">
                                        {{ Str::limit($item->deskripsi, 300) }}
                                    </p>

                                    @if($externalUrl)
                                        <a href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer" class="read-more-link text-lg font-semibold text-[#2b4238]">
                                            Baca Selengkapnya
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('katalog') }}" class="read-more-link text-lg font-semibold text-[#2b4238]">
                                            Baca Selengkapnya
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    @endif
                                </div>

                            </article>
                        @empty
                            <div class="mx-auto max-w-[900px] rounded-[20px] border border-dashed border-[#d9d2c4] bg-white/80 px-6 py-12 text-center shadow-[0_10px_30px_rgba(0,0,0,0.04)]">
                                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#eef3ea] text-green-800">
                                    <i class="{{ $tab['icon'] }} text-xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-[#173121]">{{ $tab['label'] }}</h3>
                                <p class="mt-2 text-sm text-[#6b736d]">{{ $tab['empty'] }}</p>
                            </div>
                        @endforelse
                    @endif

                </div>
            @endforeach
        </div>

        <!-- CTA -->
        <div class="reveal reveal-delay-4 mt-16 flex justify-center">
            <a href="{{ route('katalog') }}" class="inline-flex items-center justify-center gap-3 sm:gap-4 lg:gap-5 rounded-full bg-gradient-to-r from-[#1d4d3a] to-[#2f7a5d] px-5 py-3 sm:px-7 lg:px-8 text-sm sm:text-base lg:text-lg font-semibold text-white shadow-[0_15px_40px_rgba(29,77,58,0.25)] transition-all duration-500 hover:scale-[1.03]">
                <i class="fa-solid fa-book-open"></i>
                <span class="text-center">Lihat Selengkapnya di Katalog Desa</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-sm text-black">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>
        </div>

    </div>

</section>
<!-- ===================================================== -->
<!-- TESTIMONI PENGUNJUNG -->
<!-- ===================================================== -->
<section class="max-w-7xl mx-auto px-6 py-15">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-14">

        <!-- LEFT — reveal -->
        <div class="reveal reveal-delay-1 text-center lg:text-left">

            <div class="inline-flex items-center gap-3 mb-2">
                <div class="line-expand h-[2px] bg-yellow-500"></div>
                <span class="uppercase tracking-[0.25em] text-[12px] font-semibold text-yellow-600">
                    Testimoni
                </span>
                <div class="line-expand h-[2px] bg-yellow-500"></div>
            </div>

            <h2 class="font-bold text-[30px] lg:text-[42px] leading-[1.1] tracking-[-0.03em] text-[#1c3528] mb-2">
                Apa Kata Pengunjung Kami?
            </h2>

            <p class="text-[#66736b] text-[15px] lg:text-[17px] leading-[1.7] max-w-2xl">
                Pengalaman, cerita, dan kesan dari para pengunjung
                yang telah menikmati suasana Desa Hargorojo.
            </p>

        </div>
</div>
    <!-- TESTIMONI GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($testimoni as $index => $testi)

        {{-- Card — tambah testi-card + delay (loop 1-3) --}}
        <div class="
            testi-card testi-card-delay-{{ ($index % 3) + 1 }}
            h-full bg-white rounded-[30px]
            border border-[#ece7de] p-8 text-center
            shadow-[0_10px_35px_rgba(0,0,0,0.04)]
            hover:-translate-y-2
            hover:shadow-[0_20px_60px_rgba(0,0,0,0.08)]
            transition-all duration-500
        ">

            <!-- FOTO / INISIAL — tambah avatar-scale -->
            @if($testi->foto)
                <img
                    src="{{ $testi->foto_url }}"
                    alt="{{ $testi->nama }}"
                    class="
                        avatar-scale
                        w-20 h-20 mb-7
                        object-cover object-center
                        rounded-full inline-block
                        border-[3px] border-[#edf3ea] shadow-md
                    "
                >
            @else
                <div class="
                    avatar-scale
                    w-20 h-20 mb-7 rounded-full
                    inline-flex items-center justify-center
                    bg-[#eef5eb] border-[3px] border-[#edf3ea]
                    text-[#1d4d3a] font-bold text-2xl
                ">
                    {{ strtoupper(substr($testi->nama, 0, 1)) }}
                </div>
            @endif

            <!-- TESTIMONI -->
            <p class="font-lora text-[#5f6d63] text-[16px] leading-[1.9] italic mb-7">
                "{{ Str::limit($testi->isi_testimoni, 250) }}"
            </p>

            {{-- Separator line — ganti class dengan testi-line --}}
            <span class="
                testi-line
                inline-block h-[3px] rounded-full
                bg-gradient-to-r from-yellow-500 to-yellow-400
                mb-5
            "></span>

            <!-- NAMA -->
            <h3 class="text-[#1c3528] font-bold tracking-[0.08em] text-sm uppercase mb-1">
                {{ $testi->nama }}
            </h3>

            {{-- RATING — setiap bintang dibungkus span.star-item --}}
            <div class="text-yellow-400 text-base tracking-[0.15em]">
                @for($s = 1; $s <= 5; $s++)
                    <span class="star-item">
                        {{ $s <= ($testi->rating ?: 5) ? '★' : '☆' }}
                    </span>
                @endfor
            </div>

        </div>

        @empty

        <div class="col-span-full text-center py-14 bg-[#f8faf7] rounded-[30px] border border-dashed border-[#d9e2d3]">
            <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-[#eef5eb] flex items-center justify-center text-[#1d4d3a] text-3xl">
                <i class="fa-regular fa-comments"></i>
            </div>
            <h3 class="text-[#1d3528] font-bold text-xl mb-2">Belum Ada Ulasan</h3>
            <p class="text-[#6b776f] text-sm">Jadilah pengunjung pertama yang memberikan testimoni.</p>
        </div>

        @endforelse

    </div>

</section>


<!-- ===================================================== -->
<!-- MANFAAT SISTEM -->
<!-- ===================================================== -->
{{-- Section ornamen atas — tidak diubah --}}
<section class="relative overflow-hidden py-1 px-6">
    <div class="absolute -left-20 top-20 w-62 h-75 bg-green-100/40 blur-3xl rounded-full"></div>
    <div class="absolute -right-20 bottom-1 w-62 h-62 bg-yellow-100/40 blur-3xl rounded-full"></div>
</section>


<section class="relative overflow-hidden pt-1 pb-15 px-6">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-green-100/30 blur-3xl rounded-full"></div>

    <div class="max-w-[1400px] mx-auto relative z-10">

        <div class="
            box-scale-in
            relative overflow-hidden rounded-[40px]
            border border-[#e3eadf]
            bg-gradient-to-br from-[#f7faf5] via-white to-[#f3f8ef]
            shadow-[0_20px_60px_rgba(0,0,0,0.05)]
            px-8 py-12 lg:px-14 lg:py-10
        ">

            <div class="absolute -top-24 -right-24 w-72 h-72 bg-green-100/40 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-yellow-100/40 rounded-full blur-3xl"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-15 items-center">

                <div>

                    <div class="reveal reveal-delay-1 inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white border border-[#dce6d7] mb-1">
                        <i class="fa-solid fa-leaf text-[#4b8b60]"></i>
                        <span class="uppercase tracking-[0.2em] text-[11px] font-semibold text-[#2f5c44]">
                            Desa Agroeduwisata Hargorojo
                        </span>
                    </div>

                    <h2 class="reveal reveal-delay-2
                        text-[#183322] text-[34px] lg:text-[42px]
                        leading-[1.1] tracking-normal font-bold mb-2
                    ">
                        Temukan Cerita, Tradisi, dan Keindahan Desa Hargorojo
                    </h2>

                    <p class="reveal reveal-delay-3
                        text-[#617066] text-[16px] leading-[1.9] mb-7 sm:mb-10 max-w-xl
                    ">
                        Lebih dari sekadar destinasi wisata, Desa Agroeduwisata Hargorojo menghadirkan pengalaman yang menghubungkan pengunjung dengan alam, budaya, serta kehidupan masyarakat lokal yang penuh kehangatan dan kearifan tradisional.
                    </p>

                    <a href="{{ route('agro') }}" class="reveal reveal-delay-4
                        inline-flex items-center gap-6
                        bg-[#1d4d3a] hover:bg-[#173c2d] hover:-translate-y-[2px]
                        text-white px-6 py-3 rounded-full font-semibold
                        shadow-[0_12px_30px_rgba(29,77,58,0.20)]
                        transition-all duration-300
                    ">
                        Jelajahi Desa
                        <span class="w-9 h-8 rounded-full bg-white/15 flex items-center justify-center text-sm">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </a>

                </div>

                <!-- RIGHT STATS -->
                <div class="grid grid-cols-2 gap-5">

                    {{-- Card 1 --}}
                    <div class="stat-card stat-card-delay-1 bg-white/80 backdrop-blur-xl border border-[#e3eadf] rounded-[28px] px-4 py-6 sm:px-6 sm:py-7 text-center overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        
                    <div class="stat-icon-pop w-14 h-14 mx-auto mb-5 rounded-full bg-[#edf5e9] flex items-center justify-center text-[#4f8c64] text-xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    
                    <div data-count="1.250+" class="text-[#2e6b4d] text-2xl sm:text-3xl lg:text-[36px] font-bold leading-none mb-3 whitespace-nowrap" >1.250+ </div>
                    
                    <p class="text-[#607066] text-sm leading-[1.6]">
                        Pengunjung Web Aktif
                    </p>
                </div>

                    {{-- Card 2 --}}
                    <div class="stat-card stat-card-delay-2
                        bg-white/80 backdrop-blur-xl border border-[#e3eadf]
                        rounded-[28px] px-6 py-7 text-center
                        hover:-translate-y-1 hover:shadow-lg transition-all duration-300
                    ">
                        <div class="stat-icon-pop w-14 h-14 mx-auto mb-5 rounded-full bg-[#edf5e9] flex items-center justify-center text-[#4f8c64] text-xl">
                            <i class="fa-solid fa-file-circle-check"></i>
                        </div>
                        <div data-count="1.480+" class="text-[#2e6b4d] text-2xl sm:text-3xl lg:text-[36px] font-bold leading-none mb-3 whitespace-nowrap""> 1.480+ </div>

                        <p class="text-[#607066] text-sm leading-[1.6]">Layanan Selesai</p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="stat-card stat-card-delay-3
                        bg-white/80 backdrop-blur-xl border border-[#e3eadf]
                        rounded-[28px] px-6 py-7 text-center
                        hover:-translate-y-1 hover:shadow-lg transition-all duration-300
                    ">
                        <div class="stat-icon-pop w-14 h-14 mx-auto mb-5 rounded-full bg-[#edf5e9] flex items-center justify-center text-[#4f8c64] text-xl">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div data-count="120+"
                            class="text-[#2e6b4d] text-2xl sm:text-3xl lg:text-[36px] font-bold leading-none mb-3 whitespace-nowrap">
                            120+
                        </div>
                        <p class="text-[#607066] text-sm leading-[1.6]">Informasi Terupdate</p>
                    </div>

                    {{-- Card 4 --}}
                    <div class="stat-card stat-card-delay-4
                        bg-white/80 backdrop-blur-xl border border-[#e3eadf]
                        rounded-[28px] px-6 py-7 text-center
                        hover:-translate-y-1 hover:shadow-lg transition-all duration-300
                    ">
                        <div class="stat-icon-pop w-14 h-14 mx-auto mb-5 rounded-full bg-[#edf5e9] flex items-center justify-center text-[#4f8c64] text-xl">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div data-count="98%"
                            class="text-[#2e6b4d] text-2xl sm:text-3xl lg:text-[36px] font-bold leading-none mb-3 whitespace-nowrap">
                            98%
                        </div>
                        <p class="text-[#607066] text-sm leading-[1.6]">Kepuasan Pengunjung</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
