@extends('layouts.master')

@section('title', 'Belanja Produk - Desa Hargorojo')

@section('content')
{{-- NAVBAR --}}
@include('layouts.navbar')

<section class="
    relative
    h-[550px]
    overflow-hidden
">
    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">

        <img
            src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
            alt="Produk Desa Hargorojo"
            class="
                w-full
                h-full
                object-cover
            "
        >
        <!-- DARK OVERLAY -->
        <div class="
            absolute inset-0
            bg-[#07150f]/45
        "></div>

        <!-- LIGHT CENTER GLOW -->
        <div class="
            absolute inset-0
            bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.90)_0%,rgba(255,255,255,0.78)_30%,rgba(255,255,255,0.35)_60%,rgba(255,255,255,0)_100%)]
        "></div>

    </div>

    <!-- CONTENT -->
    <div class="
        relative
        z-20
        max-w-6xl
        mx-auto
        px-6
        min-h-[550px]
        flex
        flex-col
        items-center
        justify-center
        text-center
    ">

        <!-- TITLE -->
        <h1 class="
            font-lora
            text-[#1b3726]
            text-[56px]
            leading-[0.95]
            tracking-[-0.04em]
            font-bold
            drop-shadow-[0_3px_8px_rgba(0,0,0,0.20)]
        ">

            Belanja Produk Desa

        </h1>

        <!-- SUBTITLE -->
        <h2 class="
            font-lobster
            text-[#c89a44]
            text-[70px]
            leading-none
            mt-1
            mb-3
            drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]
        ">
            Asli Hargorojo
        </h2>

        <!-- DESCRIPTION -->
        <p class="
            max-w-4xl text-[#201b1b] text-[20px] leading-[1.3] font-light 
        ">
            Temukan produk-produk pilihan yang lahir dari kekayaan alam dan kearifan lokal Desa Hargorojo, 
            dibuat dengan ketelitian untuk menghadirkan kualitas terbaik.
        </p>


        <!-- STATS -->
        <div class="
            mt-3
            flex
            items-center
            justify-center
            gap-18
        ">

            <!-- ITEM -->
            <div class="
                flex
                items-center
                gap-4
            ">

                <div class="
                    w-15
                    h-15
                    rounded-full
                    bg-white/40

                    flex
                    items-center
                    justify-center
                ">
                    <i class="
                        fa-solid fa-bag-shopping
                        z-20
                        text-[#173121]
                        text-2xl
                    "></i>

                </div>

                <div class="text-left">

                    <div class="
                        text-[40px]
                        font-bold
                        text-[#173121]
                    ">
                        50+
                    </div>

                    <div class="
                        text-[#59645c]
                    ">
                        Produk Terjual
                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="
                flex
                items-center
                gap-4
            ">

                <div class="
                    w-15
                    h-15
                    rounded-full
                    bg-white/40
                    flex
                    items-center
                    justify-center
                ">

                    <i class="
                        fa-solid fa-star
                        z-20
                        text-[#c8ab6d]
                        text-2xl
                    "></i>

                </div>

                <div class="text-left">

                    <div class="
                        text-[40px]
                        font-bold
                        text-[#173121]
                    ">
                        4.9
                    </div>

                    <div class="
                        text-[#59645c]
                    ">
                        Rating Pelanggan
                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="
                flex
                items-center
                gap-4
            ">

                <div class="
                    w-15
                    h-15
                    rounded-full
                    bg-white/40
                    flex
                    items-center
                    justify-center
                ">

                    <i class="
                        fa-solid fa-leaf
                        z-20
                        text-[#173121]
                        text-2xl
                    "></i>

                </div>

                <div class="text-left">

                    <div class="
                        text-[40px]
                        font-bold
                        text-[#173121]
                    ">
                        100%
                    </div>

                    <div class="
                        text-[#59645c]
                    ">
                        Produk Lokal
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- KATALOG PRODUK -->
<!-- ===================================================== -->
<section class="
    relative
    py-20
    bg-[#f8f6f1]
">
    <!-- CONTAINER -->
    <div class="
    relative
    z-20
    max-w-[1350px]
    mx-auto
    pb-20
    px-6
    lg:px-10
    -mt-45
    bg-white
    rounded-[40px]
    shadow-[0_30px_80px_rgba(0,0,0,0.08)]
    border
    border-[#ece6da]
    ">
    
    
<!-- ===================================================== -->
<!-- SEARCH + CART -->
<!-- ===================================================== -->
<div class="
    flex
    justify-center
    mt-10
    mb-3
">

    <div class="
        flex
        items-center
        gap-4

        w-full
        max-w-3xl
    ">

        <!-- SEARCH -->
        <div class="
            relative
            flex-1
        ">

            <input
                type="text"
                placeholder="Cari produk..."
                class="
                    w-full
                    h-14
                    pl-14
                    pr-5
                    rounded-2xl
                    border
                    border-[#e6dece]
                    bg-white
                    shadow-md

                    focus:outline-none
                    focus:ring-1
                    focus:ring-[#173121]
                "
            >

            <i class="
                fa-solid fa-magnifying-glass
                absolute
                left-5
                top-1/2
                -translate-y-1/2
                text-[#173121]
            "></i>

            <!-- BUTTON -->
             <button
             class="
             absolute
             right-2
             top-1/2
             -translate-y-1/2
             h-11
             px-6
             rounded-2xl
             bg-[#173121]
             text-white
             font-medium
            hover:bg-[#234632]
            transition-all
            duration-300
            ">
            Cari
        </button>
    
    </div>

        <!-- CART -->
        <button class="
            relative
            w-14
            h-14
            flex
            items-center
            justify-center
            rounded-full
            bg-[#173121]
            text-white
            shadow-[0_10px_25px_rgba(23,49,33,0.25)]
            hover:bg-[#204732]
            hover:-translate-y-1
            transition-all
            duration-300
        ">

            <i class="
                fa-solid fa-cart-shopping
                text-lg
            "></i>

            <!-- BADGE -->
            <span class="
                absolute
                -top-2
                -right-2
                w-6
                h-6
                rounded-full
                bg-[#d8b15a]
                text-[#173121]
                text-[11px]
                font-bold
                flex
                items-center
                justify-center
                border-2
                border-white
            ">
                3
            </span>

        </button>

    </div>

</div>

        @php
            $unggulan = $produks->where('is_unggulan', true);
        @endphp

        <!-- ===================================================== -->
<!-- PRODUK UNGGULAN -->
<!-- ===================================================== -->
@if($unggulan->count())

<div class="mb-5">

    <!-- HEADER -->
    <div class="
        flex
        items-center
        justify-between
        mb-5
    ">

        <div>

            <h2 class="
                font-lora
                text-[30px]
                font-bold
                text-[#173121]
            ">
                Produk Unggulan
            </h2>

            <p class="
                font-light
                text-[#6b736d]
                text-[15px]
                italic
            ">
                Geser untuk melihat produk unggulan lainnya
            </p>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- SLIDER WRAPPER -->
    <!-- ===================================================== -->
    <div class="
    relative
    px-8
    ">

        <!-- PANAH KIRI -->
        <button
            onclick="scrollProduk(-400)"
            class="
                absolute
                left-[-24px]
                top-1/2
                -translate-y-1/2
                z-20
                w-12
                h-12
                rounded-full
                bg-white/80
                shadow-[0_10px_30px_rgba(0,0,0,0.12)]
                flex
                items-center
                justify-center
                hover:bg-[#173121]
                hover:text-white
                transition-all
                duration-300
            "
        >

            <i class="fa-solid fa-chevron-left text-lg"></i>

        </button>

        <!-- PANAH KANAN -->
        <button
            onclick="scrollProduk(400)"
            class="
                absolute
                right-[-24px]
                top-1/2

                -translate-y-1/2

                z-20

                w-12
                h-12

                rounded-full

                bg-white

                shadow-[0_10px_30px_rgba(0,0,0,0.12)]

                flex
                items-center
                justify-center

                hover:bg-[#173121]
                hover:text-white

                transition-all
                duration-300
            "
        >

            <i class="fa-solid fa-chevron-right text-lg"></i>

        </button>

        <!-- ===================================================== -->
        <!-- SCROLL CONTAINER -->
        <!-- ===================================================== -->
        <div
            id="produkUnggulanSlider"
            class="
                flex
                gap-6
                overflow-x-auto
                scrollbar-hide
                pb-6
                pt-4
                snap-x
                snap-mandatory
            "
        >

            @foreach($unggulan as $produk)

            <!-- CARD -->
            <div class="
                group
                relative
                flex-shrink-0
                w-[380px]
                overflow-hidden
                rounded-[25px]
                hover:-translate-y-1
                duration-500
                
                snap-start
            ">

                <!-- IMAGE -->
                <img
                    src="{{ $produk->gambar ? asset('images/produk/' . $produk->gambar) : asset('images/beranda.bg.jpeg') }}"
                    alt="{{ $produk->nama }}"
                    class="
                        w-full
                        h-[280px]

                        object-cover

                        group-hover:scale-105

                        transition-transform
                        duration-700
                    "
                >

                <!-- OVERLAY -->
                <div class="
                    absolute
                    inset-0

                    bg-gradient-to-t
                    from-black/90
                    via-black/20
                    to-transparent
                "></div>

                <!-- BADGE -->
                <div class="
                    absolute
                    top-4
                    left-4

                    px-3
                    py-1

                    rounded-full

                    bg-[#D4AF37]

                    text-[#173121]
                    text-[13px]
                    font-bold
                ">
                    BEST SELLER
                </div>

                <!-- CONTENT -->
                <div class="
                    absolute
                    bottom-0
                    left-0
                    right-0

                    p-5
                ">

                    <h3 class="
                        font-lora
                        text-white
                        font-bold
                        text-[20px]
                        mb-1
                    ">
                        {{ $produk->nama }}
                    </h3>

                    <p class="
                        text-white/80
                        text-[14px]
                        mb-4
                    ">
                        {{ Str::limit(explode('|', $produk->manfaat)[0], 45) }}
                    </p>

                    <div class="
                        flex
                        items-center
                        justify-between
                    ">

                        <div>

                            <div class="
                                text-white
                                font-bold
                                text-xl
                            ">
                                Rp{{ number_format($produk->harga,0,',','.') }}
                            </div>

                        </div>

                        <a href="#"
                            class="
                                px-4
                                py-2

                                rounded-xl

                                bg-[#d8b15a]

                                text-[#173121]
                                text-sm
                                font-semibold
                            "
                        >
                            Tambah ke Keranjang
                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endif

        <!-- ===================================================== -->
        <!-- SEMUA PRODUK -->
        <!-- ===================================================== -->
        <div>

            <h2 class="
                font-lora
                text-[30px]
                font-bold
                text-[#173121]
                
            ">
                Semua Produk
            </h2>

            <p class="
                font-light
                text-[#6b736d]
                text-[15px]
                italic
                mb-8
            ">
                Pilihan lengkap produk berkualitas Desa Hargorojo
            </p>

            <!-- GRID -->
            <div class="
                grid
                grid-cols-1
                sm:grid-cols-2
                lg:grid-cols-3
                xl:grid-cols-4
                gap-6
            ">

                @foreach($produks as $produk)

                <div class="
                    group

                    bg-white

                    rounded-[24px]

                    overflow-hidden

                    border
                    border-[#ece6da]

                    shadow-[0_15px_40px_rgba(0,0,0,0.05)]

                    hover:-translate-y-2
                    hover:shadow-[0_25px_60px_rgba(0,0,0,0.10)]

                    transition-all
                    duration-500
                ">

                    <!-- IMAGE -->
                    <div class="
                        relative
                        overflow-hidden
                    ">

                        <img
                            src="{{ $produk->gambar ? asset('images/produk/' . $produk->gambar) : asset('images/beranda.bg.jpeg') }}"
                            alt="{{ $produk->nama }}"
                            class="
                                w-full
                                h-[220px]

                                object-cover

                                group-hover:scale-105

                                transition-transform
                                duration-700
                            "
                        >

                        @if($produk->is_unggulan)

                        <div class="
                            absolute
                            top-3
                            left-3

                            px-3
                            py-1

                            rounded-full

                            bg-[#d8b15a]

                            text-[#173121]
                            text-[11px]
                            font-bold
                        ">
                            BEST SELLER
                        </div>

                        @endif

                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 text-center">

                        <h3 class="
                        font-lora
                            text-[18px]
                            font-bold
                            text-[#173121]
                            line-clamp-2
                            min-h-[52px]
                            mb-2
                            
                        ">
                            {{ $produk->nama }}
                        </h3>

                        <!-- HARGA -->
                        <div class="
                            text-[17px]
                            font-bold
                            text-[#c6a949]
                            mb-2
                        ">
                            Rp{{ number_format($produk->harga,0,',','.') }}
                        </div>

                        <!-- STOK -->
                        @if($produk->stok > 0)

                        <div class="
                            text-green-600
                            text-sm
                            mb-4
                        ">
                            ● Stok Tersedia
                        </div>

                        @else

                        <div class="
                            text-red-500
                            text-sm
                            mb-4
                        ">
                            ● Stok Habis
                        </div>

                        @endif

                        <!-- BUTTON -->
                        <button
                        class="
                        w-full
                        h-11
                        rounded-xl
                        bg-[#173121]     
                        text-white   
                        flex
                        items-center
                        justify-center
                        gap-2
                        text-sm
                        font-medium
                        hover:bg-[#204732]
                        transition-all
                        ">
                        
                        <i class="fa-solid fa-cart-plus"></i>
                         Tambah ke Keranjang
                        
                        </button>
                    </div>
                </div>             
            @endforeach
        </div>
    </div>
</div>

</section>


<!-- ===================================================== -->
<!-- CTA GROSIR -->
<!-- ===================================================== -->
<section class="
    relative
    overflow-hidden
    mb-2
">

    <!-- BACKGROUND IMAGE -->
    <img
        src="{{ asset('images/assets foto/CTA_ecommerceee.png') }}"
        alt="Produk Desa Hargorojo"
        class="
            absolute
            inset-0
            w-full
            h-full
            object-cover
        "
    >

    <!-- DARK OVERLAY -->
    <div class="
        absolute
        inset-0

        bg-gradient-to-r
        from-[#07150f]/95
        via-[#173121]/85
        to-[#173121]/40
    "></div>

    <!-- CONTENT -->
    <div class="
        relative
        z-10
        max-w-[1400px]
        mx-auto
        px-6
        lg:px-10

        py-16
        lg:py-8
    ">

    <!-- TRUST BADGE -->
     <div class="
    hidden
    lg:block
    absolute
    top-8
    right-10
    xl:top-1
    xl:right-2
    z-20
">

    <img
        src="{{ asset('/images/assets foto/label_produk.png') }}"
        alt="Produk Alami Desa Hargorojo"
        class="
            w-[140px]
            xl:w-[180px]

            drop-shadow-[0_20px_40px_rgba(0,0,0,0.30)]

            hover:scale-105

            transition-all
            duration-700
        "
    >

</div>

    
        <!-- TITLE -->
        <h2 class="
            max-w-2xl
            font-lora
            text-white
            text-[42px]
            md:text-[48px]

            leading-[1.05]

            font-bold

            mb-2
        ">

            Butuh Produk Kelapa
            <span class="text-[#d8b15a]">
                dalam Jumlah Besar?
            </span>

        </h2>

        <!-- DESCRIPTION -->
        <p class="
            max-w-4xl
            text-white/80
            text-[17px]
            italic
            leading-[1.3]
            mb-6
            font-thin
        ">

            Kami melayani pemesanan grosir untuk UMKM,
            reseller, toko oleh-oleh, dan distributor dari
            seluruh Indonesia dengan harga khusus dan
            kualitas terbaik langsung dari Desa Hargorojo.

        </p>

        <!-- FEATURES -->
        <div class="
            grid
            md:grid-cols-3

            

            max-w-4xl

            mb-5
        ">

            <!-- ITEM -->
            <div class="
                flex
                items-start
                gap-4
            ">

                <div class="
                    w-14
                    h-14

                    rounded-full

                    bg-[#d8b15a]/10

                    border
                    border-[#d8b15a]/20

                    flex
                    items-center
                    justify-center

                    text-[#d8b15a]
                ">
                    <i class="fa-solid fa-tags"></i>
                </div>

                <div>

                    <h4 class="
                        text-white
                        font-semibold
                        
                    ">
                        Harga Grosir
                    </h4>

                    <p class="
                        text-white/70
                        text-sm
                    ">
                        Harga terbaik untuk <br>
                        pembelian dalam jumlah besar.
                    </p>

                </div>

            </div>

            <!-- ITEM -->
            <div class="
                flex
                items-start
                gap-4
            ">

                <div class="
                    w-14
                    h-14

                    rounded-full

                    bg-[#d8b15a]/10

                    border
                    border-[#d8b15a]/20

                    flex
                    items-center
                    justify-center

                    text-[#d8b15a]
                ">
                    <i class="fa-solid fa-cube"></i>
                </div>

                <div>

                    <h4 class="
                        text-white
                        font-semibold
                        mb-1
                    ">
                        Produk Berkualitas
                    </h4>

                    <p class="
                        text-white/70
                        text-sm
                    ">
                        Diproduksi langsung oleh <br>
                        masyarakat Desa Hargorojo.
                    </p>

                </div>

            </div>

            <!-- ITEM -->
            <div class="
                flex
                items-start
                gap-4
            ">

                <div class="
                    w-14
                    h-14

                    rounded-full

                    bg-[#d8b15a]/10

                    border
                    border-[#d8b15a]/20

                    flex
                    items-center
                    justify-center

                    text-[#d8b15a]
                ">
                    <i class="fa-solid fa-truck"></i>
                </div>

                <div>

                    <h4 class="
                        text-white
                        font-semibold
                        mb-1
                    ">
                        Pengiriman Nasional
                    </h4>

                    <p class="
                        text-white/70
                        text-sm
                    ">
                        Melayani pengiriman ke <br>
                        seluruh wilayah Indonesia.
                    </p>

                </div>

            </div>

        </div>

        <!-- BUTTON AREA -->
        <div class="
            flex
            flex-col
            lg:flex-row

            items-start
            lg:items-center
            justify-end

            gap-6
        ">

            <!-- BUTTON -->
            <a href="https://wa.me/6280000000000"
                target="_blank"
                class="
                    group

                    inline-flex
                    items-center
                    gap-4

                    px-6
                    py-3

                    rounded-4xl

                    bg-[#d8b15a]

                    text-[#173121]

                    font-semibold

                    shadow-[0_20px_50px_rgba(216,177,90,0.30)]

                    hover:scale-[1.02]

                    transition-all
                    duration-500
                "
            >

                <i class="
                    fa-brands fa-whatsapp
                    text-xl
                "></i>

                Hubungi Admin

                <i class="
                    fa-solid fa-arrow-right

                    group-hover:translate-x-1

                    transition-all
                "></i>

            </a>

            

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- FAQ -->
<!-- ===================================================== -->
<section class="
    relative
    py-20
    bg-[#f8f6f1]
">

    <!-- CONTAINER -->
    <div class="
        max-w-4xl
        mx-auto
        px-6
        lg:px-10
    ">
    
    {{-- Small Label --}}
    <div class="
    flex 
    items-center 
    justify-center 
    gap-3 
    
    ">
        <div class="
        w-14 h-[2px] 
        bg-yellow-500 
        rounded-full">
    </div>
        <span class="
        uppercase 
        tracking-[0.2em] 
        text-[14px] 
        font-semibold 
        text-[#b89b5e]">
            Informasi Tambahan
        </span>

        <div class="
        w-14 h-[2px] 
        bg-yellow-500 
        rounded-full">
    </div>
    
    </div>

        <!-- TITLE -->
        <h2 class="
            text-center

            font-lora

            text-[40px]
            md:text-[45px]

            leading-[1]

            font-bold

            text-[#173121]

            mb-2
        ">

            Pertanyaan yang Sering diajukan

        </h2>

        <!-- DESC -->
        <p class="
            max-w-2xl
            mx-auto
            text-[#52605a]
            text-[15px]
            md:text-[18px]
            text-center
            leading-[1.4]
            font-light
            mb-10
        ">
            Berikut adalah beberapa pertanyaan yang sering diajukan
            oleh pelanggan kami. Temukan jawabannya di bawah ini.
        </p>

        <!-- FAQ LIST -->
        <div class="space-y-3">

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: true }"
                class="
                    bg-white

                    rounded-[20px]

                    border
                    border-[#ece6da]

                    overflow-hidden

                    shadow-[0_10px_30px_rgba(0,0,0,0.04)]
                "
            >

                <!-- QUESTION -->
                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between
                        px-6
                        py-5
                        text-left
                    "
                >

                    <div class="
                        flex
                        items-center
                        gap-2
                    ">

                        <span class="
                            text-[#173121]
                            font-semibold
                            text-[18px]
                            font-lora
                        ">
                            Bagaimana cara melakukan pemesanan?
                        </span>

                    </div>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <!-- ANSWER -->
                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >
                    Pilih produk yang diinginkan, masukkan ke keranjang,
                    lalu lanjutkan pemesanan melalui WhatsApp untuk
                    menghubungi admin. 

                    <img
                    src="{{ asset('images/assets foto/alur_pemesanan_FAQ.png') }}"
                    alt="Alur Pemesanan"
                    class="
                    w-full
                    max-w-4xl
                    mx-auto
                    rounded-2xl
                    border
                    border-[#ece8df]
                    ">
                </div>
            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white
                    rounded-[24px]
                    border
                    border-[#ece6da]
                    overflow-hidden
                "
            >

                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between

                        px-6
                        py-5
                    "
                >

                    <span class="
                        text-[#173121]
                        font-semibold
                        text-[18px]
                        font-lora
                    ">
                        Berapa minimal pemesanan untuk pembelian grosir?
                    </span>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >

                    Minimal pemesanan grosir dapat disesuaikan dengan
                    jenis produk yang dipilih. Silakan hubungi admin
                    untuk informasi lebih lanjut.

                </div>

            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white
                    rounded-[24px]
                    border
                    border-[#ece6da]
                    overflow-hidden
                "
            >

                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between

                        px-6
                        py-5
                    "
                >

                    <span class="
                        text-[#173121]
                        font-semibold
                        text-[18px]
                        font-lora
                    ">
                        Apakah produk dibuat langsung oleh masyarakat Desa Hargorojo?
                    </span>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    "
                >

                    Ya. Produk yang kami tawarkan merupakan hasil
                    olahan dan kerajinan masyarakat Desa Hargorojo.

                </div>

            </div>

            <!-- FAQ ITEM -->
            <div
                x-data="{ open: false }"
                class="
                    bg-white
                    rounded-[24px]
                    border
                    border-[#ece6da]
                    overflow-hidden
                "
            >

                <button
                    @click="open = !open"
                    class="
                        w-full
                        flex
                        items-center
                        justify-between

                        px-6
                        py-5
                    "
                >

                    <span class="
                        text-[#173121]
                        font-semibold
                        text-[18px]
                        font-lora
                    ">
                        Apakah produk dapat dikirim ke luar daerah?
                    </span>

                    <i
                        class="fa-solid fa-chevron-down transition duration-300"
                        :class="open ? 'rotate-180' : ''"
                    ></i>

                </button>

                <div
                    x-show="open"
                    x-transition
                    class="
                        font-lora
                        px-6
                        pb-6
                        text-[17px]
                        text-[#5d675f]
                        leading-[1.5]
                    ">

                    Ya, Kami melayani pengiriman ke berbagai wilayah
                    Indonesia menggunakan jasa ekspedisi terpercaya.

                </div>

            </div>

        </div>

        <!-- BOTTOM CTA -->
        <div class="
            mt-12

            bg-white

            rounded-[28px]

            border
            border-[#ece6da]

            p-6
            lg:p-8

            flex
            flex-col
            lg:flex-row

            items-center
            justify-between

            gap-6
        ">

            <div>

                <h3 class="
                    font-lora
                    text-[#173121]
                    font-bold
                    text-2xl
                    mb-2
                ">
                    Masih ada pertanyaan lain?
                </h3>

                <p class="
                    text-[#6b736d]
                    font-lora
                    text-light
                    italic
                ">
                    Jangan ragu untuk menghubungi admin kami.
                </p>

            </div>

            <a href="#"
                class="
                    inline-flex
                    items-center
                    gap-3

                    px-7
                    py-4

                    rounded-2xl

                    bg-[#173121]

                    text-white

                    font-medium

                    hover:bg-[#204732]

                    transition-all
                "
            >

                <i class="fa-brands fa-whatsapp"></i>

                Hubungi Admin via WhatsApp

            </a>

        </div>

    </div>

</section>


<script>
    function scrollProduk(amount)
    {
        document
            .getElementById('produkUnggulanSlider')
            .scrollBy({
                left: amount,
                behavior: 'smooth'
            });
    }
</script>

@endsection
