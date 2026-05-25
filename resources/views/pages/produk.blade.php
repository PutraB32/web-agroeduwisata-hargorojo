@extends('layouts.master')

@section('title', 'Cerita & Fakta - Produk Gula Kelapa')

@section('content')
{{-- NAVBAR --}}
@include('layouts.navbar')


<!-- HERO PRODUK -->
<section class="
    relative
    h-[700px]
    isolate
    overflow-hidden
">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
        <!-- IMAGE -->
        <img
            src="{{ asset('images/assets foto/hero section_produk.png') }}"
            alt="Produk Gula Kelapa"
            class="
                w-full
                h-full
                object-cover
            "
        >

        <!-- DARK OVERLAY -->
        <div class="
            absolute inset-0
            bg-black/45
        "></div>

        <!-- LEFT GRADIENT -->
        <div class="
            absolute inset-0
            bg-gradient-to-r
            from-[#07150f]/40
            via-[#07150f]/10
            to-transparent
        "></div>

        <!-- BOTTOM GRADIENT -->
        <div class="
            absolute inset-0
            bg-gradient-to-t
            from-black/20
            via-transparent
            to-transparent
        "></div>

    </div>

    <!-- CONTAINER -->
    <div class="
        relative
        z-20
        max-w-7xl
        mx-auto
        px-8
        lg:px-4
        min-h-screen
        flex
        items-start
        pt-55
        translate-y
    ">

        <!-- CONTENT -->
        <div class="
            max-w-3xl
        ">
            <!-- TITLE -->
            <h1 class="
                font-lora
                text-[68px]
                leading-[0.9]
                tracking-[-0.04em]
                font-bold
                text-white
                mb-5
            ">
                Manis Alami dari
                <span class="
                    font-dsiplay
                    block
                    text-[#e29f10]
                    italic
                ">
                    Jantung Desa Hargorojo
                </span>

            </h1>

            <!-- DESCRIPTION -->
            <p class="
                max-w-2xl
                text-[#ececec]
                text-[18px]
                leading-[1.5]
                font-thin
                mb-8
            ">

                Nikmati gula kelapa organik asli
                Desa Hargorojo yang diolah secara
                tradisional dan higienis,
                menghadirkan rasa manis alami
                berkualitas langsung dari petani lokal.

            </p>

            <!-- BUTTON WRAPPER -->
            <div class="
                flex
                items-center
                gap-4
            ">

                <!-- PRIMARY BUTTON -->
                <a href="{{ route('ecommerce') }}"
                    class="
                        group
                        inline-flex
                        items-center
                        gap-4
                        px-8
                        py-3
                        rounded-full
                        bg-[#173121]
                        text-white
                        shadow-[0_15px_40px_rgba(0,0,0,0.30)]
                        hover:bg-[#214a36]
                        hover:-translate-y-1
                        transition-all
                        duration-500
                    "
                >
                    <!-- TEXT -->
                    <span class="
                        font-medium
                    ">
                        Belanja Sekarang
                    </span>

                    <!-- ICON -->
                    <div class="
                        w-9
                        h-9
                        rounded-full
                        bg-[#d8b15a]
                        flex
                        items-center
                        justify-center
                        group-hover:rotate-[-12deg]
                        transition-all
                        duration-500
                    ">

                        <i class="
                            fa-solid fa-cart-shopping
                            text-[#173121]
                            text-sm
                        "></i>

                    </div>

                </a>
                <!-- SECONDARY BUTTON -->
                <a href="##"
                    class="
                        group
                        inline-flex
                        items-center
                        gap-4
                        px-8
                        py-3
                        rounded-full
                        bg-white/12
                        backdrop-blur-xl
                        text-white
                        hover:bg-white/20
                        hover:-translate-y-1
                        transition-all
                        duration-500
                    "
                >
                    <!-- TEXT -->
                    <span class="
                        font-medium
                    ">
                        Jelajahi Produk
                    </span>

                    <!-- ICON -->
                    <div class="
                        w-9
                        h-9
                        rounded-full
                        bg-white/10
                        flex
                        items-center
                        justify-center
                        group-hover:translate-x-1
                        transition-all
                        duration-500
                    ">

                        <i class="
                            fa-solid fa-arrow-right
                            text-[#d8b15a]
                            text-sm
                        "></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ===================================================== -->
<!-- PRODUK UNGGULAN -->
<!-- ===================================================== -->
<section class="
    relative
    py-20
    overflow-hidden
    bg-[#f8f6f1]
">

    <!-- ===================================================== -->
    <!-- BACKGROUND EFFECT -->
    <!-- ===================================================== -->

    <!-- GREEN BLUR -->
<div class="
    absolute
    left-[-120px]
    top-[10%]

    w-[320px]
    h-[320px]

    rounded-full

    bg-[#173121]/10

    blur-[120px]
"></div>

<!-- GOLD BLUR -->
<div class="
    absolute
    right-[-100px]
    bottom-[0%]

    w-[300px]
    h-[300px]

    rounded-full

    bg-[#c8ab6d]/10

    blur-[120px]
"></div>

    <!-- ===================================================== -->
    <!-- CONTAINER -->
    <!-- ===================================================== -->
    <div class="
        relative
        z-10
        max-w-[1500px]
        mx-auto
        px-6
        lg:px-12
    ">

        <!-- CONTAINER -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-6 lg:px-10">

        <!-- ===================================================== -->
        <!-- SECTION HEADER -->
        <!-- ===================================================== -->
        <div class="text-center mb-10">

            <!-- Small Label -->
            <div class="flex items-center justify-center gap-3 mb-2">

                <div class="w-14 h-[2px] bg-yellow-500 rounded-full"></div>

                <span class="
                    uppercase
                    tracking-[0.2em]
                    text-[14px]
                    font-semibold
                    text-[#b89b5e]
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
                tracking-[-0.03em]
                text-[#183322]
                mb-3
                drop-shadow-md
            ">
                Produk Unggulan Kami
            </h2>

            <!-- Description -->
            <p class="
                max-w-3xl
                mx-auto
                text-gray-600
                text-base
                md:text-[18px]
                leading-[1.2]
                font-thin
            ">
                Produk alami berkualitas premium yang diolah 
                secara tradisional oleh masyarakat lokal 
                untuk menghadirkan pengalaman rasa yang autentik dan berkesan.
            </p>

        </div>

        <!-- ===================================================== -->
        <!-- PRODUCT LAYOUT -->
        <!-- ===================================================== -->
        <div class="
            mt-20
            lg:w-5/6
            mx-auto
            grid
            lg:grid-cols-[1fr_1fr]
            gap-15
            items-start
        ">

            <!-- ===================================================== -->
            <!-- CONTENT -->
            <!-- ===================================================== -->
            <div class="
                order-2
                lg:order-1
            ">

                <!-- MINI LABEL -->
                <div class="
                    inline-flex
                    items-center
                    gap-2
                    px-4
                    py-2
                    rounded-full
                    bg-[#173121]/5
                   
                    mb-4
                ">

                    <div class="
                        w-2
                        h-2
                        rounded-full
                        bg-[#b89b5e]
                    "></div>
                    <span class="
                        text-[#173121]
                        text-xs
                        font-semibold
                        tracking-[0.15em]
                        uppercase
                    ">
                        100% Organik
                    </span>

                </div>

                <!-- TITLE -->
                <h1 class="
                    font-lora
                    text-[#173121]
                    text-[40px]
                    md:text-[38px]
                    leading-[1.05]
                    tracking-[-0.04em]
                    font-bold
                    mb-1
                ">

                    Gula Kelapa
                    Cetak Asli

                </h1>

                <!-- ===================================================== -->
                <!-- PRODUCT TAB -->
                <!-- ===================================================== -->
                <div
                    x-data="{ tab: 'description' }"

                    class="
                        mb-5
                    "
                >

                    <!-- ===================================================== -->
                    <!-- TAB NAVIGATION -->
                    <!-- ===================================================== -->
                    <div class="
                        flex
                        items-center
                        border-b
                        border-[#e7e0d2]
                        mb-4
                    ">

                        <!-- DESCRIPTION -->
                        <button
                            @click="tab = 'description'"

                            :class="
                                tab === 'description'
                                ? 'text-[#173121] border-[#b89b5e]'
                                : 'text-[#7d847e] border-transparent'
                            "

                            class="
                                px-2
                                py-4
                                mr-8
                                border-b-2
                                font-semibold
                                text-[16px]
                                transition-all
                                duration-300
                            "
                        >
                            Deskripsi
                        </button>

                        <!-- REVIEWS -->
                        <button
                            @click="tab = 'reviews'"

                            :class="
                                tab === 'reviews'
                                ? 'text-[#173121] border-[#b89b5e]'
                                : 'text-[#7d847e] border-transparent'
                            "

                            class="
                                px-2
                                py-4
                                border-b-2
                                font-medium
                                text-[17px]
                                transition-all
                                duration-300
                            "
                        >
                            Reviews
                        </button>

                    </div>

                    <!-- ===================================================== -->
                    <!-- DESCRIPTION CONTENT -->
                    <!-- ===================================================== -->
                    <div
                        x-show="tab === 'description'"
                        x-transition
                    >

                        <!-- DESCRIPTION -->
                        <p class="
                            font-lora
                            text-[#5d675f]
                            text-[17px]
                            leading-[2]
                            font-light

                            mb-4
                        ">

                            Gula kelapa cetak khas Desa Hargorojo
                            dibuat dari nira pilihan yang dimasak
                            secara tradisional tanpa bahan pengawet,
                            menghasilkan rasa manis alami
                            dengan aroma khas kelapa asli.

                        </p>

                        <!-- LIST -->
                        <div class="
                            space-y-2
                        ">

                            <!-- ITEM -->
                            <div class="
                                flex
                                items-start
                                gap-4
                            ">

                                <!-- ICON -->
                                <div class="
                                    w-7
                                    h-7

                                    rounded-full

                                    bg-[#173121]

                                    flex
                                    items-center
                                    justify-center

                                    flex-shrink-0
                                ">

                                    <i class="
                                        fa-solid fa-check

                                        text-white
                                        text-[11px]
                                    "></i>

                                </div>

                                <!-- TEXT -->
                                <span class="
                                    text-[#4f5a53]
                                    

                                    leading-[1.8]
                                ">
                                    Tanpa bahan pengawet
                                </span>

                            </div>

                            <!-- ITEM -->
                            <div class="
                                flex
                                items-start
                                gap-4
                            ">

                                <div class="
                                    w-7
                                    h-7

                                    rounded-full

                                    bg-[#173121]

                                    flex
                                    items-center
                                    justify-center

                                    flex-shrink-0
                                ">

                                    <i class="
                                        fa-solid fa-check

                                        text-white
                                        text-[11px]
                                    "></i>

                                </div>

                                <span class="
                                    text-[#4f5a53]

                                    leading-[1.8]
                                ">
                                    Diproses secara higienis
                                </span>

                            </div>

                            <!-- ITEM -->
                            <div class="
                                flex
                                items-start
                                gap-4
                            ">

                                <div class="
                                    w-7
                                    h-7

                                    rounded-full

                                    bg-[#173121]

                                    flex
                                    items-center
                                    justify-center

                                    flex-shrink-0
                                ">

                                    <i class="
                                        fa-solid fa-check

                                        text-white
                                        text-[11px]
                                    "></i>

                                </div>

                                <span class="
                                    text-[#4f5a53]

                                    leading-[1.8]
                                ">
                                    Rasa manis alami khas kelapa
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- ===================================================== -->
                    <!-- REVIEW CONTENT -->
                    <!-- ===================================================== -->
                    <div
                        x-show="tab === 'reviews'"
                        x-transition
                    >
                        <div class="
                            bg-white/70
                            border
                            border-[#ebe3d4]
                            rounded-[24px]
                            p-6
                            shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                        ">

                            <!-- TOP -->
                            <div class="
                                flex
                                items-center
                                justify-between
                                mb-3
                            ">

                                <!-- USER -->
                                <div class="
                                    flex
                                    items-center
                                    gap-4
                                ">

                                    <!-- AVATAR -->
                                    <div class="
                                        w-12
                                        h-12

                                        rounded-full

                                        bg-[#173121]

                                        flex
                                        items-center
                                        justify-center

                                        text-white

                                        font-semibold
                                    ">
                                        A
                                    </div>

                                    <!-- INFO -->
                                    <div>

                                        <h4 class="
                                            font-semibold

                                            text-[#173121]
                                        ">
                                            Andi Saputra
                                        </h4>

                                        <p class="
                                            text-sm
                                            text-[#7d847e]
                                        ">
                                            Mahasiswa
                                        </p>

                                    </div>

                                </div>

                                <!-- STARS -->
                                <div class="
                                    flex
                                    items-center
                                    gap-1

                                    text-[#d8b15a]
                                ">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                            </div>

                            <!-- COMMENT -->
                            <p class="
                                text-[#5d675f]

                                leading-[1.9]
                            ">

                                Rasanya alami dan tidak terlalu manis.
                                Aroma kelapanya juga sangat khas.
                                Cocok untuk minuman dan masakan tradisional.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- ===================================================== -->
                <!-- BUTTON -->
                <!-- ===================================================== -->
                <div class="flex items-center gap-5">

                    <!-- BUTTON -->
                    <a href="#"
                        class="
                            group

                            inline-flex
                            items-center
                            gap-4

                            px-6
                            py-2

                            rounded-full

                            bg-[#173121]

                            text-white

                            shadow-[0_15px_40px_rgba(23,49,33,0.18)]

                            hover:bg-[#214734]
                            hover:-translate-y-1

                            transition-all
                            duration-500
                        "
                    >

                        <!-- TEXT -->
                        <span class="
                            font-medium
                        ">
                            Lihat Detail
                        </span>

                        <!-- ICON -->
                        <div class="
                            w-8
                            h-8
                            rounded-full
                            bg-[#d8b15a]

                            flex
                            items-center
                            justify-center

                            group-hover:translate-x-1

                            transition-all
                            duration-300
                        ">

                            <i class="
                                fa-solid fa-arrow-right

                                text-[#173121]
                                text-sm
                            "></i>

                        </div>

                    </a>

                </div>

            </div>

            <!-- ===================================================== -->
            <!-- IMAGE -->
            <!-- ===================================================== -->
            <div class="
                relative
                group

                order-1
                lg:order-2
            ">

                <!-- GLOW -->
                <div class="
                    absolute
                    inset-0

                    rounded-[36px]

                    bg-[#173121]/10

                    blur-[40px]

                    scale-90
                "></div>

                <!-- IMAGE WRAPPER -->
                <div class="
                    relative

                    overflow-hidden

                    rounded-[30px]

                    shadow-[0_30px_80px_rgba(0,0,0,0.12)]
                ">

                    <!-- IMAGE -->
                    <img
                        alt="Produk Gula Kelapa"

                        src="{{ asset('images/produk/1776927244.jpg') }}"

                        class="
                            w-[800px]
                            h-full
                            lg:h-[520px]

                            object-cover

                            group-hover:scale-105

                            transition-transform
                            duration-700
                        "
                    >

                    <!-- OVERLAY -->
                    <div class="
                        absolute inset-0

                        bg-gradient-to-t
                        from-black/20
                        to-transparent
                    "></div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Produk Unggulan Kami -->
<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="text-center mb-16">
        <h2 class="font-playfair text-3xl md:text-4xl font-bold text-gray-900">
            Produk <span class="border-b-4 border-yellow-500 text-green-900">Unggulan</span> Kami
        </h2>
    </div>

    <div class="space-y-16 md:space-y-24">
        @foreach($produkUnggulan as $index => $produk)
        <div class="flex flex-col {{ $index % 2 == 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-10 md:gap-16">
            <div class="w-full md:w-1/2 rounded-[2rem] overflow-hidden shadow-xl bg-gray-100 aspect-[4/3] group relative border border-gray-100">
                <img src="{{ $produk->gambar ? asset('images/produk/' . $produk->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition duration-300"></div>
            </div>
            <div class="w-full md:w-1/2">
                <h3 class="font-playfair font-bold text-3xl text-gray-900 mb-4">{{ $produk->nama }}</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                    {{ $produk->deskripsi }}
                </p>
                <div class="bg-green-50 rounded-2xl p-4 md:p-5 border border-green-100">
                    <h4 class="text-green-800 font-bold mb-2 text-sm flex items-center gap-2"><i class="fas fa-star text-yellow-500"></i> Nilai Tambah / Manfaat:</h4>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $produk->manfaat }}</p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>

<!-- Mengapa Memilih Produk Kami -->
<section class="bg-gray-100 py-16 text-center mt-12 border-t border-gray-200 shadow-inner">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-playfair font-bold text-3xl md:text-4xl text-gray-900 mb-4">Mengapa Memilih Produk Kami?</h2>
        <p class="text-gray-600 italic mb-8">
            Setiap butir gula yang kami hasilkan adalah bentuk komitmen kami terhadap<br>kualitas, kesehatan, dan kesejahteraan petani lokal
        </p>
        <a href="{{ route('ecommerce') }}" class="inline-flex items-center gap-3 bg-green-800 hover:bg-yellow-500 text-white hover:text-black font-bold px-10 py-4 text-sm md:text-base rounded-full transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1">
            Beli Semua Produk Ini di E-Commerce <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</section>

<!-- 3 Features -->
<section class="max-w-6xl mx-auto px-4 py-16 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="bg-gray-100 rounded-3xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-gray-200 group hover:border-yellow-500">
            <div class="w-12 h-12 mx-auto bg-black rounded-full flex items-center justify-center mb-4 group-hover:bg-yellow-500 transition-colors">
                <i class="fas fa-leaf text-white text-lg"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-900 mb-2">100% Organik & Alami</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>

        <div class="bg-gray-100 rounded-3xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-gray-200 group hover:border-green-600">
            <div class="w-12 h-12 mx-auto bg-black rounded-full flex items-center justify-center mb-4 group-hover:bg-green-700 transition-colors">
                <i class="fas fa-users text-white text-lg"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-900 mb-2">Pemberdayaan Petani</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>

        <div class="bg-gray-100 rounded-3xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-gray-200 group hover:border-yellow-500">
            <div class="w-12 h-12 mx-auto bg-black rounded-full flex items-center justify-center mb-4 group-hover:bg-yellow-500 transition-colors">
                <i class="fas fa-certificate text-white text-lg"></i>
            </div>
            <h3 class="font-bold text-lg text-gray-900 mb-2">Kualitas Terjamin</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>

    </div>
</section>

@endsection