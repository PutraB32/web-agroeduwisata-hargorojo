@extends('layouts.master')

@section('title', 'Beranda - Desa Hargorojo')

@section('content')

<section class="relative w-full h-screen overflow-hidden">

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Background --}}
    <div class="absolute inset-0 w-full h-full">

        <!-- Background Image -->
        <img 
            src="{{ asset('images/assets foto/hero section.png') }}"alt="Hero Background"
            class="w-full h-full object-cover object-center scale-100">

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/30"></div>

        <!-- Left Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r  from-black/60 via-black/ to-transparent"> </div>

        <!-- Bottom Shadow -->
        <div class="absolute inset-0 
            bg-gradient-to-t 
            from-black/30 
            via-transparent 
            to-transparent">
        </div>

        <!-- Warm Tone -->
        <div class="absolute inset-0 bg-yellow-900/10 mix-blend-overlay"></div>
    </div>

    {{-- HERO CONTENT --}}
    <div class="relative z-20 h-full flex items-end">

        <div class="max-w-7xl mx-auto px-3 w-full pb-1 md:pb-9 pl-3">

            <div class="flex flex-col lg:flex-row justify-between items-end gap-12">

                <!-- LEFT CONTENT -->
                 <div class="max-w-5xl"> 
                    <!-- TOP LABEL -->
                    <div class="flex items-center gap-3 mb-4">
                        <!-- Left Line -->
                         <div class="w-15 h-[2px] bg-white/60"></div>
                         <!-- Text -->
                          <span class="text-yellow-400 uppercase tracking-[0.35em] text-sm md:text-base font-medium">Selamat Datang Di</span>
                          <!-- Right Line -->
                           <div class="w-15 h-[2px] bg-white/60"></div>
                        </div>
                        
                        <!-- MAIN HEADING -->
                         <h1 class=" font-hero font-[550] text-[52px] md:text-[72px] lg:text-[65px] leading-[0.9] tracking-[-0.03em] uppercase text-white drop-shadow-[0_5px_25px_rgba(0,0,0,0.5)]">
                            Desa Agroeduwisata
                            <br>
                            <span class="text-yellow-500 leading-[] whitespace-nowrap drop-shadow-[0_0_25px_rgba(250,204,21,0.35)]">Gula Kelapa Hargorojo
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="
                        mt-3
                        font-light
                        md:text-lg
                        text-gray-200
                        leading-relaxed
                        max-w-2xl
                        pl-2
                    ">
                        Menawarkan edukasi unik dan pengalaman natural wisata gula kelapa, didukung sistem monitoring terpadu yang menghadirkan informasi real-time, pengelolaan destinasi
                        yang efektif, dengan mengutamakan kenyamanan, pelayanan, dan pengalaman terbaik bagi wisatawan.
                    </p>

                    <!-- Tags -->
                     <div class="flex flex-wrap gap-4 mt-8">
                        <!-- Tag 1 -->
                         <span class="
                         flex items-center gap-2.5
                         border border-white/25
                         bg-white/5
                         backdrop-blur-2xl
                         text-white/90
                         text-sm
                         px-5 py-2.5
                         rounded-full
                         font-normal
                         hover:bg-white/10
                         transition-all duration-300
                         ">Budaya & Tradisi
                        </span>

                        <!-- Tag 2 -->
                         <span class="flex items-center gap-2.5
                         border border-white/25
                         bg-white/5
                         backdrop-blur-xl
                         text-white/90
                         text-sm
                         px-5 py-2.5
                         rounded-full
                         font-normal
                         hover:bg-white/10
                         transition-all duration-300">Agroeduwisata
                        </span>
                        
                        <!-- Tag 3 -->
                         <span class="
                         flex items-center gap-2.5
                         border border-white/25
                         bg-white/5
                         backdrop-blur-xl
                         text-white/90
                         text-sm
                         px-5 py-2.5
                         rounded-full
                         font-normal
                         hover:bg-white/10
                         transition-all duration-300">Produk Gula Kelapa
                        </span>
                    </div>
                    <!-- CIRCULAR IMAGE GROUP -->
                     <div class="flex items-center mt-10">
                        <!-- Image 1 -->
                         <div class="
                         w-18 h-18
                         rounded-full
                         border-2 border-white
                         overflow-hidden
                         shadow-2xl
                         hover:scale-105
                         transition-all duration-300
                         z-10">
                         <img src="{{ asset('images/agroeduwisata/menanam tanaman.jpg') }}"
                         alt=""
                         class="w-full h-full object-cover">

                    </div>
                    <!-- Image 2 -->
                     <div class="
                     w-18 h-18
                     rounded-full
                     border-2 border-white
                     overflow-hidden
                     shadow-2xl
                     hover:scale-105
                     transition-all duration-300
                     -ml-7
                     z-20
                     ">
                     <img src="{{ asset('images/agroeduwisata/1776929726.jpg') }}" alt=""
                     class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Image 3 -->
                    <div class="
                    w-18 h-18
                    rounded-full
                    border-2 border-white
                    overflow-hidden
                    shadow-2xl
                    hover:scale-105
                    transition-all duration-300
                    -ml-5
                    z-30">
                    <img src="{{ asset('images/agroeduwisata/1776929702.jpg') }}" alt=""
                    class="w-full h-full object-cover">
                </div>
                <!-- Image 4 -->
                <div class="
                w-18 h-18
                rounded-full
                border-2 border-white
                overflow-hidden
                shadow-2xl
                hover:scale-105
                transition-all duration-300
                -ml-5
                z-40
                ">
                <img src="{{ asset('images/produk/Coconut sugar.jpg') }}" alt=""
                class="w-full h-full object-cover">
            </div>
        </div>
    </div>
                <!-- RIGHT BUTTONS -->
                <div class="flex flex-col sm:flex-row gap-5 w-full translate-x-20">

                    <!-- Button 1 -->
                    <a href="{{ route('profil') }}"
                    class="
                        flex items-center justify-center gap-1
                        bg-white
                        hover:bg-yellow-400
                        text-black
                        font-bold
                        h-13
                        text-sm
                        px-1 
                        lg:px-6 lg:py-1.5
                        rounded-full
                        transition-all duration-300
                        shadow-2xl
                        hover:scale-105
                    "> Lihat Profil Desa
                        <span class="
                            w-10 h-10
                            rounded-full
                            bg-black
                            text-white
                            flex items-center justify-center
                            text-lg
                            translate-x-4
                        ">
                            ➜
                        </span>
                    </a>

                    <!-- Button 2 -->
                    <a href="{{ route('kontak') }}"
                    class="
                        flex items-center justify-center gap-1
                        bg-white/10
                        backdrop-blur-xl
                        border border-white/20
                        text-white
                        font-bold
                        h-13
                        text-sm
                        px-7
                        rounded-full
                        transition-all duration-300
                        hover:bg-white
                        hover:text-black
                        shadow-xl
                        group
                    ">

                        Hubungi Kami

                        <span class="
                            w-10 h-10
                            rounded-full
                            bg-white
                            text-black
                            flex items-center justify-center
                            text-lg
                            transition-all
                            group-hover:bg-black
                            group-hover:text-white
                            translate-x-4
                        ">
                            ➜
                        </span>
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>

</section>

<!-- 2. POTENSI AGROEDUWISATA KAMI -->
<section class="bg-gray-50 py-20 border-y border-gray-200 shadow-inner">
    <!-- SECTION HEADER -->
<div class="relative text-center mb-12">

    <!-- Decorative Background -->
    <div class="absolute -left-5 top- opacity-[0.10] hidden lg:block">
        <i class="fa-solid fa-leaf text-[120px] text-green-900 rotate-[-20deg]"></i>
    </div>

    <div class="absolute -right-1 bottom-0 opacity-[0.04] hidden lg:block">
        <i class="fa-solid fa-leaf text-[140px] text-yellow-700 rotate-[25deg]"></i>
    </div>
    


    <!-- Small Label -->
    <div class="flex items-center justify-center gap-3 mb-3">

        <!-- Left Line -->
        <div class="w-14 h-[2px] bg-green-700 rounded-full"></div>

        <!-- Text -->
        <span class="
            uppercase
            tracking-[0.28em]
            text-[15px]
            font-semibold
            text-green-800
        ">
            Potensi Unggulan Desa
        </span>

        <!-- Right Line -->
        <div class="w-14 h-[2px] bg-green-700 rounded-full"></div>

    </div>

    <!-- Main Title -->
<h2 class="
    font-display
    text-[38px]
    md:text-[56px]
    lg:text-[50px]
    font-medium
    leading-[1]
    tracking-[-0.02em]
    text-gray-900
    drop-shadow-sm
">
    Potensi Agroeduwisata Kami
</h2>


    <!-- Description -->
    <p class="
        mt-4
        max-w-3xl
        mx-auto
        text-gray-600
        text-base
        md:text-xl
        lg:text-[18px]
        leading-[1.5]
        font-thin
    ">
        Menggabungkan kekayaan alam, kearifan lokal, dan edukasi untuk
        menciptakan pengalaman wisata yang berkesan, bermanfaat,
        dan berkelanjutan.
    </p>


    <!-- Feature Pills -->
    <div class="flex flex-wrap justify-center gap-4 mt-4">

        <!-- Pill 1 -->
        <span class="
            flex items-center gap-2.5
            border border-green-200
            bg-white/80
            backdrop-blur-md
            px-6 py-3
            rounded-full
            text-sm
            text-gray-700
            shadow-sm
            hover:shadow-md
            transition-all duration-300
        ">

            <i class="fa-solid fa-hand-holding-heart text-green-700 text-xs"></i>

            Berkelanjutan
        </span>


        <!-- Pill 2 -->
        <span class="
            flex items-center gap-2.5
            border border-green-200
            bg-white/80
            backdrop-blur-md
            px-6 py-3
            rounded-full
            text-sm
            text-gray-700
            shadow-sm
            hover:shadow-md
            transition-all duration-300
        ">

            <i class="fa-solid fa-users text-green-700 text-xs"></i>

            Edukasi & Interaktif
        </span>


        <!-- Pill 3 -->
        <span class="
            flex items-center gap-2.5
            border border-green-200
            bg-white/80
            backdrop-blur-md
            px-6 py-3
            rounded-full
            text-sm
            text-gray-700
            shadow-sm
            hover:shadow-md
            transition-all duration-300
        ">

            <i class="fa-solid fa-shield-heart text-green-700 text-xs"></i>

            Asli & Otentik
        </span>

    </div>

</div>


<!-- CONTENT SECTION -->
<div class="max-w-[1250px] mx-auto mt-[20px] space-y-8 md:space-y-5">

    @foreach($agroeduwisata as $index => $agro)

    <div class="
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
            relative
            group
            overflow-hidden
            min-h-[300px]
            rounded-[30px]
            {{ $index % 2 == 1 ? 'lg:order-2' : '' }}
        ">

            <img 
                src="{{ $agro->gambar 
                    ? asset('images/agroeduwisata/' . $agro->gambar) 
                    : asset('images/beranda.bg.jpeg') }}"
                alt="{{ $agro->judul }}"
                class="
                    w-full
                    h-full
                    object-cover
                    
                    transition-transform
                    duration-700
                    group-hover:scale-105
                ">

            <!-- Overlay -->
            <div class="
                absolute inset-0
                bg-gradient-to-t
                from-black/25
                via-transparent
                to-transparent
            "></div>

            <!-- Badge -->
            <div class="
                absolute top-5 left-5
                bg-gradient-to-r
                from-green-700
                to-green-600
                text-white
                px-5 py-2.5
                rounded-full
                text-sm
                font-medium
                flex items-center gap-2
                shadow-lg
            ">

                <i class="fa-solid fa-leaf text-xs"></i>

                {{ $index == 0 ? 'Produk Unggulan' : ($index == 1 ? 'Edukasi Pertanian' : 'Wisata Alam') }}

            </div>

        </div>



        <!-- CONTENT -->
        <div class="
            p-7 md:p-9
            flex flex-col justify-center
            {{ $index % 2 == 1 ? 'lg:order-1' : '' }}
        ">

            <!-- TOP META -->
            <div class="flex items-center gap-4 mb-6">

                <!-- Number -->
                <div class="
                    w-14 h-14
                    rounded-2xl
                    bg-green-700
                    text-white
                    flex items-center justify-center
                    text-2xl
                    font-bold
                    shadow-md
                ">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </div>

                <!-- Label -->
                <div class="
                    flex items-center gap-2
                    text-green-700
                    font-semibold
                    text-sm
                ">

                    <i class="fa-solid fa-seedling text-xs"></i>

                    {{ $index == 0 ? 'Proses Produksi' : ($index == 1 ? 'Edukasi Pertanian' : 'Wisata Alam') }}

                </div>

            </div>



            <!-- TITLE -->
            <h3 class="
                font-display
                text-[34px]
                md:text-[38px]
                leading-[1]
                tracking-[-0.03em]
                text-[#146432]
                mb-5
            ">
                {{ $agro->judul }}
            </h3>



            <!-- DESCRIPTION -->
            <p class="
                text-gray-600
                leading-[1.9]
                text-[15px]
                md:text-base
                font-light
                max-w-xl
                mb-8
            ">
                {{ $agro->deskripsi }}
            </p>



            <!-- FEATURES -->
            <div class="
                grid
                grid-cols-3
                border-t border-[#ece7de]
            ">

                <!-- Feature -->
                <div class="pt-5 pr-4">

                    <div class="
                        text-green-700
                        text-xl
                        mb-3
                    ">
                        <i class="fa-solid fa-leaf"></i>
                    </div>

                    <h4 class="
                        text-sm
                        font-semibold
                        text-gray-900
                        mb-1
                    ">
                        Alami & Sehat
                    </h4>

                    <p class="
                        text-xs
                        text-gray-500
                        leading-relaxed
                    ">
                        Produk alami dan ramah lingkungan.
                    </p>

                </div>


                <!-- Feature -->
                <div class="
                    pt-5
                    px-4
                    border-l border-[#ece7de]
                ">

                    <div class="
                        text-yellow-500
                        text-xl
                        mb-3
                    ">
                        <i class="fa-solid fa-fire"></i>
                    </div>

                    <h4 class="
                        text-sm
                        font-semibold
                        text-gray-900
                        mb-1
                    ">
                        Tradisional
                    </h4>

                    <p class="
                        text-xs
                        text-gray-500
                        leading-relaxed
                    ">
                        Budaya lokal tetap dilestarikan.
                    </p>

                </div>


                <!-- Feature -->
                <div class="
                    pt-5
                    pl-4
                    border-l border-[#ece7de]
                ">

                    <div class="
                        text-green-700
                        text-xl
                        mb-3
                    ">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <h4 class="
                        text-sm
                        font-semibold
                        text-gray-900
                        mb-1
                    ">
                        Edukatif
                    </h4>

                    <p class="
                        text-xs
                        text-gray-500
                        leading-relaxed
                    ">
                        Pengalaman belajar interaktif.
                    </p>

                </div>

            </div>

        </div>

    </div>

    @endforeach

</div>



<!-- CTA SECTION -->
<section class="relative mt-18 overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">

        <!-- Background Image -->
        <img 
            src="{{ asset('images/assets foto/CTA_Potensi.png') }}"
            alt="Agroeduwisata"
            class="w-full h-full object-cover"
        >

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Green Gradient -->
        <div class="
            absolute inset-0
            bg-gradient-to-r
            from-green-950/90
            via-green-900/60
            to-black/40
        "></div>

    </div>



    <!-- CONTENT -->
    <div class="
        relative z-8
        max-w-[4000px]
        mx-auto
        px-6 lg:px-12
        py-12 lg:py-14
    ">

        <div class="
            rounded-[34px]
            overflow-hidden
            border border-white/5
        ">

            <div class="
                grid
                lg:grid-cols-[1fr_1.4fr_0.8fr]
                items-center
                gap-10
                px-6
                lg:px-10
                py-1
            ">

                <!-- LEFT CONTENT -->
                <div>

                    <h3 class="
                        font-display
                        text-white/90
                        text-[30px]
                        leading-[1]
                        tracking-[-0.02em]
                        mb-5
                    ">
                        Agroeduwisata untuk Pengalaman yang Bermakna
                    </h3>

                    <p class="
                        text-white/70
                        text-sm
                        leading-[1.8]
                        font-thin
                        max-w-sm
                    ">
                        Kami berkomitmen memberikan pengalaman wisata yang tidak hanya menyenangkan, tetapi juga
                        edukatif, menginspirasi, dan memberi dampak positif bagi masyarakat desa.
                    </p>

                </div>

                <!-- STATS -->
                <div class="
                    grid
                    grid-cols-1
                    lg:grid-cols-4
                    gap-2
                ">

                    <!-- ITEM -->
                    <div class="
                        text-center
                        lg:border-r
                        border-white/15
                        lg:pr-6
                    ">

                        <div class="
                            text-white
                            text-2xl
                            mb-3
                        ">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <h4 
                        x-data="counter(15)"
                        x-init="init()"
                        class="
                            text-yellow-400
                            text-[45px]
                            font-bold
                            leading-none
                            mb-2
                        ">
                            <span x-text="count"></span>+
                        </h4>

                        <p class="
                            text-white
                            text-sm
                        ">
                            Potensi Wisata
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="
                        text-center
                        lg:border-r
                        border-white/15
                        lg:pr-6
                    ">

                        <div class="
                            text-white
                            text-2xl
                            mb-3
                        ">
                            <i class="fa-solid fa-book-open"></i>
                        </div>

                        <h4 
                        x-data="counter(10)"
                        x-init="init()"
                        class="
                            text-yellow-400
                            text-5xl
                            font-bold
                            leading-none
                            mb-2
                        ">
                            <span x-text="count"></span>+
                        </h4>

                        <p class="
                            text-white
                            text-sm
                        ">
                            Aktivitas Edukasi
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="
                        text-center
                        lg:border-r
                        border-white/15
                        lg:pr-6
                    ">

                        <div class="
                            text-white
                            text-2xl
                            mb-3
                        ">
                            <i class="fa-solid fa-leaf"></i>
                        </div>

                        <h4
                        x-data="counter(100, 15)"
                        x-init="init()"
                        class="
                            text-yellow-400
                            text-[42px]
                            font-bold
                            leading-none
                            mb-2
                        ">
                            <span x-text="count"></span>%
                        </h4>

                        <p class="
                            text-white
                            text-sm
                        ">
                            Alam Asri
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="text-center">

                        <div class="
                            text-white
                            text-2xl
                            mb-3
                        ">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </div>

                        <h4 class="
                            text-yellow-400
                            text-[45px]
                            font-bold
                            leading-none
                            mb-2
                        ">
                            10+
                        </h4>

                        <p class="
                            text-white
                            text-sm
                        ">
                            Produk Lokal
                        </p>

                    </div>

                </div>


                <!-- CTA BUTTON -->
                <div class="flex lg:justify-end">

                    <div>

                        <p class="
                            text-white/80
                            text-[20px]
                            font-semibold
                            leading-relaxed
                            mb-6
                            max-w-xs
                        ">
                            Jelajahi lebih banyak
                            potensi desa kami
                        </p>

                        <a href="{{ route('agro') }}"
                        class="
                            inline-flex
                            items-center
                            gap-4
                            bg-yellow-400
                            hover:bg-yellow-300
                            text-black
                            px-6
                            py-3
                            rounded-full
                            font-semibold
                            transition-all
                            duration-300
                            hover:scale-105
                            shadow-2xl
                        ">

                            Jelajahi Selengkapnya

                            <span class="
                                w-8 h-8
                                rounded-full
                                bg-black
                                text-white
                                flex items-center justify-center
                                text-sm
                            ">
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

    <!-- Decorative Background -->
    <div class="absolute left-0 top-0 opacity-[0.05] hidden lg:block pointer-events-none">
        <i class="fa-solid fa-leaf text-[220px] text-green-900 rotate-[-15deg]"></i>
    </div>

    <div class="absolute right-10 top-30 opacity-[0.04] hidden lg:block pointer-events-none">
        <i class="fa-solid fa-star text-[180px] text-yellow-700"></i>
    </div>



    <!-- CONTAINER -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-6 lg:px-10">

        <!-- ===================================================== -->
        <!-- SECTION HEADER -->
        <!-- ===================================================== -->
        <div class="text-center mb-12">

            <!-- Small Label -->
            <div class="flex items-center justify-center gap-3 mb-2">

                <div class="w-14 h-[2px] bg-yellow-500 rounded-full"></div>

                <span class="
                    uppercase
                    tracking-[0.2em]
                    text-sm
                    font-semibold
                    text-yellow-600
                ">
                    Produk Kami
                </span>

                <div class="w-14 h-[2px] bg-yellow-500 rounded-full"></div>

            </div>

            <!-- Title -->
            <h2 class="
                font-display
                text-[38px]
                md:text-[58px]
                lg:text-[55px]
                leading-[0.95]
                tracking-[-0.04em]
                text-[#183322]
                mb-3
                drop-shadow-sm
            ">
                Produk Unggulan Kami
            </h2>



            <!-- Description -->
            <p class="
                max-w-2xl
                mx-auto
                text-gray-600
                text-base
                md:text-[18px]
                leading-[1.2]
                font-thin
            ">
                Produk alami berkualitas hasil karya masyarakat desa,
                dibuat dengan cita rasa khas dan kearifan lokal
                Agroeduwisata Hargorojo.
            </p>

        </div>

        <!-- PRODUCT GRID -->
        <div class="
            grid
            grid-cols-1
            sm:grid-cols-2
            lg:grid-cols-4
            gap-5
        ">
            @foreach($produkUnggulan as $produk)

            <!-- PRODUCT CARD -->
            <div class="
                group
                relative
                bg-white/85
                backdrop-blur-MD
                rounded-[20px]
                overflow-hidden
                border border-[#ece7de]
                shadow-[0_20px_60px_rgba(0,0,0,0.12)]
                hover:-translate-y-3
                hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)]
                transition-all
                duration-700
                flex flex-col
            ">

                <!-- IMAGE -->

                <div class="
                    relative
                    overflow-hidden
                    h-[280px]
                
                ">

                    <img 
                        src="{{ $produk->gambar 
                            ? asset('images/produk/' . $produk->gambar) 
                            : asset('images/beranda.bg.jpeg') }}"
                        alt="{{ $produk->nama }}"
                        class="
                            w-full
                            h-full
                            object-cover
                            transition-transform
                            duration-700
                            group-hover:scale-105
                        "
                    >

                    <!-- Overlay -->
                    <div class="
                        absolute inset-0
                        bg-gradient-to-t
                        from-black/35
                        via-transparent
                        to-transparent
                    "></div>

                    <!-- Hover Stamp -->
                    <div class="
                        absolute inset-0
                        bg-black/30
                        backdrop-blur-[2px]
                        opacity-0
                        group-hover:opacity-100
                        transition-all
                        duration-300
                        flex items-center justify-center
                    ">

                        <span class="
                            bg-gradient-to-r
                            from-yellow-400
                            to-yellow-500
                            text-black
                            font-extrabold
                            text-[12px]
                            px-4 py-2
                            rounded-full
                            uppercase
                            tracking-wider
                            shadow-lg
                            flex items-center gap-2
                            scale-90
                            group-hover:scale-100
                            transition-transform
                            duration-500
                        ">
                            <i class="fas fa-award text-[16px]"></i>
                            Produk Unggulan
                        </span>

                    </div>

                </div>

                <!-- CONTENT -->
                <div class="
                    relative
                    px-6
                    pt-10
                    pb-8
                    flex flex-col flex-grow
                    text-center
                ">

                    <!-- Floating Icon -->
                    <div class="
                        absolute
                        -top-6
                        left-1/2
                        -translate-x-1/2
                        w-14 h-14
                        rounded-full
                        bg-gradient-to-br
                        from-[#1d4d3a]
                        to-[#2f7a5d]
                        border-2 border-white
                        flex items-center justify-center
                        text-white
                        text-xl
                        shadow-lg
                    ">

                        <i class="fa-solid fa-heart"></i>

                    </div>

                    <!-- Product Name -->
                    <h3 class="
                        font-bold
                        text-[20px]
                        leading-[1.1]
                        tracking-[-0.02em]
                        text-[#1b472b]
                        mb-4
                        line-clamp-2
                    ">
                        {{ strtoupper($produk->nama) }}
                    </h3>


                    <!-- Short Description -->
                    <p class="
                        text-gray-500
                        text-[14px]
                        leading-[1.4]
                        font-light
                        mb-2
                        min-h-[50px]
                    ">
                        {{ Str::limit($produk->deskripsi, 60) }}
                    </p>



                    <!-- Price -->
                    <div class="
                        text-[#d4af37]
                        text-[18px]
                        font-bold
                        leading-none
                        mb-5
                    ">
                        Rp{{ number_format($produk->harga, 0, ',', '.') }}

                        <span class="
                            text-[14px]
                            font-medium
                            text-[#7a7a7a]
                        ">
                            / pack
                        </span>

                    </div>



                    <!-- BUTTON -->
                    <a href="{{ route('ecommerce') }}"
                    class="
                        mt-auto
                        inline-flex
                        items-center
                        justify-center
                        gap-6
                        w-full
                        bg-gradient-to-r
                        from-green-800
                        to-green-700
                        hover:from-green-700
                        hover:to-green-600
                        text-white
                        max-w-[240px]
                        mx-auto
                        py-3
                        px-2
                        rounded-xl
                        font-semibold
                        shadow-md
                        transition-all
                        duration-500
                    ">

                        Pesan Sekarang

                        <span class="
                        
                            rounded-full
                            bg-white/15
                            flex items-center justify-center
                            text-md
                        ">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>

                    </a>

                </div>

            </div>

            @endforeach

        </div>


        <!-- ===================================================== -->
        <!-- CTA BUTTON -->
        <!-- ===================================================== -->
        <div class="text-center mt-15">

            <a href="{{ route('produk') }}"
            class="
                inline-flex
                items-center
                gap-5
                bg-gradient-to-r
                from-green-900
                to-green-700
                hover:scale-105
                text-white
                px-8 py-3
                rounded-full
                font-semibold
                text-lg
                shadow-lg
                transition-all
                duration-500
            ">

                Lihat Semua Produk

                <span class="
                    w-10 h-10
                    rounded-full
                    bg-white/70
                    text-black
                    flex items-center justify-center
                    text-sm
                ">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>

            </a>

        </div>

    </div>

</section>


<!-- 4. KATALOG DESA -->
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-16">
        <h2 class="font-bold text-xl md:text-2xl font-sans uppercase tracking-widest text-gray-900">
            Katalog Desa
        </h2>
    </div>

    <div class="space-y-6 max-w-4xl mx-auto">
        <!-- News 1 -->
        <div class="flex flex-col sm:flex-row gap-6 bg-white p-5 rounded-[2rem] shadow-sm border border-gray-100 items-center">
            <div class="w-full sm:w-48 aspect-square sm:aspect-auto sm:h-48 bg-gray-200 rounded-2xl overflow-hidden shrink-0 group hover:shadow-lg transition">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="flex-1 text-center sm:text-left py-2 px-2">
                <h3 class="font-bold text-xl text-green-900 mb-2 line-clamp-2">Mahasiswa Amikom Luncurkan Buku Profil Desa Hargorojo Purworejo, Kades: Beri Apresiasi</h3>
                <p class="text-sm text-gray-600 line-clamp-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <span class="text-xs font-bold text-yellow-600 uppercase tracking-widest drop-shadow-sm">INFORMASI TERBARU</span>
            </div>
        </div>

        <!-- News 2 -->
        <div class="flex flex-col sm:flex-row gap-6 bg-white p-5 rounded-[2rem] shadow-sm border border-gray-100 items-center">
            <div class="w-full sm:w-48 aspect-square sm:aspect-auto sm:h-48 bg-gray-200 rounded-2xl overflow-hidden shrink-0 group hover:shadow-lg transition">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="flex-1 text-center sm:text-left py-2 px-2">
                <h3 class="font-bold text-xl text-green-900 mb-2 line-clamp-2">Pengelolaan Informasi Dan Arsip Desa Hargorojo Untuk Meningkatkan Pelayanan Publik</h3>
                <p class="text-sm text-gray-600 line-clamp-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <span class="text-xs font-bold text-yellow-600 uppercase tracking-widest drop-shadow-sm">PUSTAKA DIGITAL & DOKUMEN DESA</span>
            </div>
        </div>

        <!-- News 3 -->
        <div class="flex flex-col sm:flex-row gap-6 bg-white p-5 rounded-[2rem] shadow-sm border border-gray-100 items-center">
            <div class="w-full sm:w-48 aspect-square sm:aspect-auto sm:h-48 bg-gray-200 rounded-2xl overflow-hidden shrink-0 group hover:shadow-lg transition">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="flex-1 text-center sm:text-left py-2 px-2">
                <h3 class="font-bold text-xl text-green-900 mb-2 line-clamp-2">Sejarah Desa Hargorojo Serta Perkembangannya Menjadi Desa Wisata</h3>
                <p class="text-sm text-gray-600 line-clamp-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <span class="text-xs font-bold text-yellow-600 uppercase tracking-widest drop-shadow-sm">ARSIP & SEJARAH DESA</span>
            </div>
        </div>
    </div>

    <div class="mt-12 text-center">
         <a href="{{ route('katalog') }}" class="inline-flex items-center gap-3 bg-gray-200 hover:bg-yellow-400 font-bold text-gray-900 text-sm md:text-base px-8 py-3.5 rounded-full transition-all shadow-md">
            Baca lebih banyak berita desa <i class="fas fa-arrow-right bg-black text-white p-1 rounded-full text-[10px]"></i>
        </a>
    </div>
</section>


<!-- TESTIMONI PENGUNJUNG -->
<section class="max-w-6xl mx-auto px-6 py-16 bg-green-50 rounded-[3rem] shadow-sm mb-16 relative">
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div class="text-center md:text-left">
            <h2 class="font-bold text-xl md:text-2xl font-sans uppercase tracking-widest text-gray-900">
                Ulasan Pengunjung
            </h2>
            <p class="text-gray-600 mt-2">Apa kata mereka tentang Desa Hargorojo?</p>
        </div>
        <button onclick="document.getElementById('modal-testimoni-public').classList.remove('hidden')" class="bg-yellow-500 hover:bg-yellow-600 outline-none text-white font-bold py-3 px-6 rounded-full shadow-md transition-transform hover:-translate-y-1">
            Berikan Ulasan
        </button>
    </div>

    @if(session('success_testimoni'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
            <span class="block sm:inline">{{ session('success_testimoni') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
            <span class="block sm:inline">Gagal mengirim ulasan:</span>
            <ul class="list-disc ml-5 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($testimonis as $testi)
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
            <div class="flex items-center gap-4 mb-4">
                @if($testi->foto)
                    <img src="{{ asset('images/testimoni/' . $testi->foto) }}" class="w-14 h-14 rounded-full object-cover border-2 border-gray-100">
                @else
                    <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold text-xl">{{ strtoupper(substr($testi->nama, 0, 1)) }}</div>
                @endif
                <div>
                    <h4 class="font-bold text-gray-900">{{ $testi->nama }}</h4>
                    <div class="text-yellow-400 text-sm">
                        {{ str_repeat('★', $testi->rating ?: 5) }}{{ str_repeat('☆', 5 - ($testi->rating ?: 5)) }}
                    </div>
                </div>
            </div>
            <p class="text-gray-600 text-sm italic leading-relaxed">"{{ $testi->isi_testimoni }}"</p>
        </div>
        @empty
        <div class="col-span-3 text-center text-gray-500 py-8">Belum ada ulasan. Jadilah yang pertama!</div>
        @endforelse
    </div>
</section>

<!-- 5. MANFAAT SISTEM KAMI -->
<section class="max-w-6xl mx-auto px-6 py-16 mb-12">
    <div class="mb-10 text-center md:text-left">
        <h2 class="font-bold text-xl md:text-2xl font-sans uppercase tracking-widest text-gray-900">
            Manfaat Sistem Kami
        </h2>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        <!-- Box 1 -->
        <div class="bg-gray-100 rounded-[2rem] overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition duration-300 p-4">
            <div class="aspect-square bg-gray-300 w-full rounded-2xl relative overflow-hidden mb-4 group hover:shadow-md">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                <div class="absolute inset-0 bg-green-900/10"></div>
            </div>
            <div class="text-center font-bold text-[10px] md:text-sm text-gray-900 tracking-wide">
                MUDAH TANPA<br>RIBET
            </div>
        </div>

        <!-- Box 2 -->
        <div class="bg-gray-100 rounded-[2rem] overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition duration-300 p-4">
            <div class="aspect-square bg-gray-300 w-full rounded-2xl relative overflow-hidden mb-4 group hover:shadow-md">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                <div class="absolute inset-0 bg-green-900/10"></div>
            </div>
            <div class="text-center font-bold text-[10px] md:text-sm text-gray-900 tracking-wide">
                AMAN & TERJAMIN<br>TRANSAKSI
            </div>
        </div>

        <!-- Box 3 -->
        <div class="bg-gray-100 rounded-[2rem] overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition duration-300 p-4">
            <div class="aspect-square bg-gray-300 w-full rounded-2xl relative overflow-hidden mb-4 group hover:shadow-md">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                <div class="absolute inset-0 bg-green-900/10"></div>
            </div>
            <div class="text-center font-bold text-[10px] md:text-sm text-gray-900 tracking-wide">
                UPDATE INFORMASI<br>TERBARU UMKM
            </div>
        </div>

        <!-- Box 4 -->
        <div class="bg-gray-100 rounded-[2rem] overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition duration-300 p-4">
            <div class="aspect-square bg-gray-300 w-full rounded-2xl relative overflow-hidden mb-4 group hover:shadow-md">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                <div class="absolute inset-0 bg-green-900/10"></div>
            </div>
            <div class="text-center font-bold text-[10px] md:text-sm text-gray-900 tracking-wide">
                MEMBANGUN<br>EKOSISTEM DIGITAL
            </div>
        </div>
    </div>
</section>

<!-- Modal Create Testimoni Public -->
<div id="modal-testimoni-public" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true" onclick="document.getElementById('modal-testimoni-public').classList.add('hidden')"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form action="{{ route('public.testimoni.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-xl font-bold text-gray-900 mb-6 text-center border-b pb-4">Beri Kami Ulasan</h3>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" type="text" name="nama" required placeholder="Contoh: Budi Santoso">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Rating <span class="text-xs text-gray-500">(Wajib)</span></label>
                <select name="rating" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="5">★★★★★ Sangat Memuaskan</option>
                    <option value="4">★★★★ Memuaskan</option>
                    <option value="3">★★★ Cukup</option>
                    <option value="2">★★ Kurang</option>
                    <option value="1">★ Sangat Kurang</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Komentar / Ulasan <span class="text-red-500">*</span></label>
                <textarea class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" name="isi_testimoni" rows="4" required placeholder="Ceritakan pengalaman Anda..."></textarea>
            </div>

            <div class="form-group mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Foto Profil Cepat <span class="text-xs text-gray-500">(Opsional)</span></label>
                <input class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" type="file" name="foto" accept="image/*">
                <p class="text-[10px] text-gray-500 mt-1">Maksimal 5MB. Mendukung format standar JPG, PNG, WEBP.</p>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-4 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-2 border-t">
            <button type="button" onclick="document.getElementById('modal-testimoni-public').classList.add('hidden')" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 focus:outline-none transition-colors">Batal</button>
            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-green-600 text-white text-sm font-bold rounded-lg hover:bg-green-700 focus:outline-none transition-colors shadow-sm">Kirim Ulasan</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection