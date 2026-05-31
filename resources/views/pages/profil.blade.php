@extends('layouts.master')

@section('title', 'Profil Desa Hargorojo')

@section('content')

{{-- NAVBAR --}}
@include('layouts.navbar')

<!-- ===================================================== -->
<!-- HERO SECTION -->
<!-- ===================================================== -->
<section
    class="
        relative
        h-[650px]
        overflow-hidden
    "
>
    <!-- NAVBAR -->
    @include('layouts.navbar')

    <!-- ===================================================== -->
    <!-- BACKGROUND -->
    <!-- ===================================================== -->
    <div class="absolute inset-0">

        <!-- IMAGE -->
        <img
            src="{{ asset('images/assets foto/hero_profil desa.png') }}"
            alt="Hero Desa"
            class="
                w-full
                h-full
                object-cover
                object-center
                scale-105
            "
        >

        <!-- DARK OVERLAY -->
        <div
            class="
                absolute
                inset-0
                bg-black/30
            "
        ></div>

        <!-- CINEMATIC GRADIENT -->
        <div
            class="
                absolute
                inset-0
                bg-gradient-to-b
                from-black/20
                via-black/20
                to-black/40
            "
        ></div>
        <!-- SIDE SHADOW -->
        <div
            class="
                absolute
                inset-0
                bg-gradient-to-r
                from-[#0d1f17]/20
                via-transparent
                to-[#0d1f17]/40
            "
        ></div>

    </div>

    <!-- ===================================================== -->
    <!-- CONTENT -->
    <!-- ===================================================== -->
    <div
        class="
            relative
            z-20
            h-full
            flex
            items-center
            justify-center
            px-6
            text-center
        "
    >

        <div class="max-w-6xl mx-auto">

            <!-- ===================================================== -->
            <!-- TOP LABEL -->
            <!-- ===================================================== -->
            <div
                class="
                    flex
                    items-center
                    justify-center
                    gap-3
                    mb-1
                "
            >
                <!-- LEFT LINE -->
                <div
                    class="
                        w-14
                        h-[2px]
                        bg-white/60
                    "
                ></div>

                <!-- TEXT -->
                <span
                    class="
                        text-yellow-400
                        uppercase
                        tracking-[0.35em]
                        text-sm
                        md:text-base
                        font-medium
                    "
                >
                    Mengenal Lebih Dekat
                </span>

                <!-- RIGHT LINE -->
                <div
                    class="
                        w-14
                        h-[2px]
                        bg-white/60
                    "
                ></div>
            </div>

            <!-- ===================================================== -->
            <!-- MAIN TITLE -->
            <!-- ===================================================== -->
            <h1
                class="
                    font-lora
                    text-[35px]
                    md:text-[60px]
                    lg:text-[65px]
                    leading-[0.95]
                    tracking-[-0.03em]
                    font-bold
                    text-white
                    drop-shadow-[0_10px_40px_rgba(0,0,0,0.45)]
                "
            >
                PROFIL DESA HARGOROJO
            </h1>

            <!-- ===================================================== -->
            <!-- DESCRIPTION -->
            <!-- ===================================================== -->
            <p
                class="
                    mt-4
                    max-w-2xl
                    mx-auto
                    text-white/75
                    text-base
                    md:text-xl
                    leading-relaxed
                    font-light
                    italic
                "
            >
                Desa agroeduwisata yang memadukan
                kearifan lokal, potensi alam,
                dan inovasi untuk mewujudkan masyarakat
                yang mandiri, sejahtera,
                dan berkelanjutan.
            </p>

        </div>

    </div>

    <!-- EFEK CURVE -->
    <div
        class="
            absolute
            -bottom-[2px]
            left-0
            z-80
            w-full
            overflow-hidden
            leading-none
        "
    >
        <svg
            class="
                relative
                block
                w-full
                h-[90px]
            "
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 120"
            preserveAspectRatio="none"
        >
            <path
                d="M0,96C360,30,1090,140,1440,80L1440,120L0,120Z"
                fill="#ffffff"
            ></path>
        </svg>
    </div>

</section>

<!-- ===================================================== -->
<!-- SEJARAH DESA -->
<!-- ===================================================== -->
<section class="
    relative
    py-17
    overflow-hidden
    bg-[#ffffff]
">

    <!-- BACKGROUND PATTERN -->
    <div class="
        absolute inset-0

        opacity-[0.04]

        bg-[url('/images/pattern/pattern-line.png')]
        bg-repeat
    "></div>

    <!-- CONTAINER -->
    <div class="
        relative
        z-10
        max-w-7xl
        mx-auto
        px-6
        lg:px-10
    ">

        <!-- GRID -->
        <div class="
            grid
            lg:grid-cols-[0.95fr_1.05fr]
            gap-16
            items-center
        ">

            <!-- ===================================================== -->
            <!-- LEFT CONTENT -->
            <!-- ===================================================== -->
            <div>

                <!-- LABEL -->
                <div class="
                    inline-flex
                    items-center
                    px-6
                    py-2
                    rounded-full
                    border
                    border-[#d8cfbb]
                    bg-white/70
                    backdrop-blur-md
                    mb-2
                ">
                    <!-- TEXT -->
                    <span class="
                        text-[#4b4b42]
                        uppercase
                        tracking-[0.22em]
                        text-[12px]
                        font-semibold
                    ">
                        Tentang Desa
                    </span>

                </div>

                <!-- TITLE -->
                <h2 class="
                    font-lora
                    text-[48px]
                    md:text-[50px]
                    leading-[1]
                    tracking-[-0.03em]
                    font-bold
                    text-[#173121]
                    mb-5
                ">
                    Mengenal Desa Wisata
                    <br>
                    Hargorojo
                </h2>

                <!-- DESCRIPTION -->
                <div class="
                    space-y-7
                ">
                    <p class="
                        font-inter
                        text-[#3f4a43]
                        text-[17px]
                        leading-[1.8]
                    ">
                       Terletak di kawasan Pegunungan Menoreh, Desa Hargorojo merupakan desa bersejarah di Kecamatan Bagelen, 
                       Kabupaten Purworejo, yang dikenal akan keindahan alam, budaya lokal, serta kehidupan masyarakatnya yang harmonis. 
                       Dengan suasana pedesaan yang sejuk dan asri, masyarakat Desa Hargorojo tetap menjaga tradisi, nilai gotong royong, dan kearifan lokal yang diwariskan secara turun-temurun. 
                       Desa ini juga dikenal sebagai sentra penghasil gula kelapa khas Bagelen yang menjadi salah satu potensi unggulan masyarakat. 
                       Didukung panorama alam, perkebunan rakyat, dan budaya desa yang tetap lestari, Hargorojo tumbuh sebagai desa agroeduwisata yang menghadirkan pengalaman wisata alam, budaya, dan edukasi dalam harmoni yang autentik dan berkelanjutan. 
                       Keindahan alam yang berpadu dengan keramahan masyarakat menjadikan Desa Hargorojo tidak hanya sebagai tempat untuk dikunjungi, 
                       tetapi juga ruang untuk mengenal lebih dekat kehidupan desa yang penuh nilai, tradisi, dan kehangatan.
                    </p>
                </div>

            </div>

            <!-- ===================================================== -->
            <!-- RIGHT IMAGE -->
            <!-- ===================================================== -->
            <div class="
                relative
            ">
                <!-- DOT DECOR -->
                <div class="
                    absolute
                    -right-10
                    top-20
                    w-32
                    h-32
                    opacity-40
                    bg-[radial-gradient(#b9ab83_1.5px,transparent_1.5px)]
                    [background-size:16px_16px]
                "></div>

                <!-- IMAGE WRAPPER -->
                <div class="
                    relative
                    rounded-[30px]
                    overflow-hidden
                    shadow-[0_30px_80px_rgba(0,0,0,0.12)]
                    group
                ">
                    <!-- IMAGE -->
                    <img
                        src="{{ asset('images/assets foto/section_sejarah desa.jpeg') }}"
                        alt="Sejarah Desa"
                        class="
                            w-full
                            h-[620px]
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
                        from-black/50
                        via-black/10
                        to-transparent
                    "></div>

                </div>

                <!-- FLOATING CARD -->
                <div class="
                    absolute
                    -bottom-10
                    -right-8
                    w-[290px]
                    rounded-[25px]
                    bg-gradient-to-br
                    from-[#173121]
                    to-[#1c4932]
                    p-7
                    border
                    border-white/10
                    backdrop-blur-xl
                    shadow-[0_20px_50px_rgba(0,0,0,0.25)]
                ">

                    <!-- TITLE -->
                    <h3 class="
                        text-white
                        text-[28px]
                        leading-[1.2]
                        font-semibold
                        mb-3
                    ">
                        Cerita dari Tradisi Desa
                    </h3>
                    <!-- TEXT -->
                    <p class="
                        font-lora
                        text-white/70
                        text-[15px]
                        leading-[1.5]
                        italic
                    ">
                        "Kearifan lokal dalam mengolah nira kelapa, menjadi 
                        bagian penting dari kehidupan 
                        dan tradisi masyarakat Hargorojo."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================================================== -->
<!-- VISI MISI -->
<!-- ===================================================== -->
<section class="
    relative
    py-13
    overflow-hidden
    bg-[#f8f6f1]
">

    <!-- BACKGROUND PATTERN -->
    <div class="
        absolute inset-0
        opacity-[0.0]
        bg-[url('/images/pattern/pattern-line.png')]
        bg-repeat
    "></div>

    <!-- CONTAINER -->
    <div class="
        relative
        z-10
        max-w-6xl
        mx-auto
        px-6
        lg:px-10
    ">

        <!-- ===================================================== -->
        <!-- SECTION HEADER -->
        <!-- ===================================================== -->
        <div class="
            text-center
            mb-8
        ">

            <!-- TITLE -->
            <h2 class="
                font-lora
                text-[50px]
                md:text-[50px]
                leading-[0.95]
                tracking-[-0.03em]
                font-bold
                text-[#173121]
                mb-3
            ">
                Visi & Misi Kami
            </h2>

            <!-- DECOR LINE -->
            <div class="
                w-30
                h-[3px]
                rounded-full
                bg-[#ff0000]
                mx-auto
            "></div>

        </div>

        <!-- ===================================================== -->
        <!-- GRID -->
        <!-- ===================================================== -->
        <div class="
            grid
            lg:grid-cols-2
            gap-10
            
            
        ">

            <!-- ===================================================== -->
            <!-- VISI CARD -->
            <!-- ===================================================== -->
            <div class="
                relative
                bg-white
                rounded-[30px]
                overflow-hidden
                border
                border-[#f1ede4]
                shadow-[0_20px_60px_rgba(0,0,0,0.06)]
                hover:-translate-y-2
                hover:shadow-[0_30px_100px_rgba(0,0,0,0.08)]
                transition-all
                duration-500
            ">

                <!-- TOP BAR -->
                 <div class="
                 flex
                 items-center
                 px-10
                 py-5
                 bg-gradient-to-r
                 from-[#173121]
                 to-[#205239]
                 ">
                 
                 <!-- TITLE -->
                  <h3 class="
                  font-lora
                  text-[32px]
                  font-bold
                  text-white
                  tracking-[-0.01em]
                  ">
                  Visi
                </h3>
            </div>
            
            <!-- CONTENT -->
             <div class="
             px-8
             py-25

             min-h-(500px)
             flex
             flex-col
             items-center
             justify-center
             text-center
             
             ">
                    <!-- TEXT -->
                    <p class="
                    font-lora
                    italic
                        text-[#3f4a43]
                        text-[18px]
                        leading-[2]
                    ">

                        "Terwujudnya Desa Hargorojo sebagai
                        desa agroeduwisata unggulan yang
                        mandiri, berbudaya, berkelanjutan,
                        dan sejahtera dalam harmoni alam
                        Menoreh."

                    </p>

                    <!-- ACCENT -->
                    <div class="
                        w-30
                        h-[3px]

                        rounded-full

                        bg-[#c8ab6d]

                        mt-4
                    "></div>

                </div>

            </div>

            <!-- ===================================================== -->
            <!-- MISI CARD -->
            <!-- ===================================================== -->
            <div class="
                relative
                bg-white
                rounded-[30px]
                overflow-hidden
                border
                border-[#ece6da]
                shadow-[0_20px_100px_rgba(0,0,0,0.06)]
                hover:-translate-y-2
                hover:shadow-[0_30px_100px_rgba(0,0,0,0.08)]
                transition-all
                duration-500
            ">

                <!-- TOP BAR -->
                 <div class="
                 flex
                 px-10
                 py-5
                 bg-gradient-to-r
                 from-[#8d784c]
                 to-[#bda061]

                 ">
                 
                 <!-- TITLE -->
    
                 <h3 class="
                 font-lora
                 text-[32px]
                 font-bold
                 text-white
                 tracking-[-0.01em]
                 
                 ">
                 Misi
                </h3>
            
            </div>
            
            <!-- CONTENT -->
             <div class="
             px-10
             py-12
             ">
                    <!-- LIST -->
                    <ul class="
                        space-y-3.5
                        font-lora
                        text-[18px]
                    ">
                        <!-- ITEM -->
                        <li class="
                            flex
                            items-start
                            gap-5
                        ">
                        <div class="
                            w-7 h-7
                            rounded-full
                            bg-[#fff7e8]
                            border
                            border-[#ead7aa]
                            flex
                            items-center
                            justify-center
                            mt-[3px]
                            flex-shrink-0
                            ">
                            <i class="
                            fa-solid fa-check
                            text-[#b89b5e]
                            text-[15px]
                            "></i>
                        
                        </div>

                            <span class="
                                text-[#3f4a43]

                                leading-[1.8]
                            ">
                                Mengembangkan potensi
                                agroeduwisata berbasis kelapa.
                            </span>

                        </li>

                        <!-- ITEM -->
                        <li class="
                            flex
                            items-start
                            gap-5
                        ">
                        <div class="
                            w-7 h-7
                            rounded-full
                            bg-[#fff7e8]
                            border
                            border-[#ead7aa]
                            flex
                            items-center
                            justify-center
                            mt-[3px]
                            flex-shrink-0
                            ">
                            <i class="
                            fa-solid fa-check
                            text-[#b89b5e]
                            text-[15px]
                            "></i>
                        
                        </div>

                            <span class="
                                text-[#3f4a43]
                                leading-[1.8]
                            ">
                                Meningkatkan kualitas SDM
                                masyarakat desa.
                            </span>

                        </li>

                        <!-- ITEM -->
                        <li class="
                            flex
                            items-start
                            gap-5
                        ">
                        <div class="
                            w-7 h-7
                            rounded-full
                            bg-[#fff7e8]
                            border
                            border-[#ead7aa]
                            flex
                            items-center
                            justify-center
                            mt-[3px]
                            flex-shrink-0
                            ">
                            <i class="
                            fa-solid fa-check
                            text-[#b89b5e]
                            text-[15px]
                            "></i>
                        
                        </div>

                            <span class="
                                text-[#3f4a43]
                                leading-[1.8]
                            ">
                                Melestarikan budaya dan
                                kearifan lokal.
                            </span>

                        </li>

                        <!-- ITEM -->
                        <li class="
                            flex
                            items-start
                            gap-5
                        ">
                        <div class="
                            w-7 h-7
                            rounded-full
                            bg-[#fff7e8]
                            border
                            border-[#ead7aa]
                            flex
                            items-center
                            justify-center
                            mt-[3px]
                            flex-shrink-0
                            ">
                            <i class="
                            fa-solid fa-check
                            text-[#b89b5e]
                            text-[15px]
                            "></i>
                        
                        </div>

                            <span class="
                                text-[#3f4a43]
                                leading-[1.8]
                            ">
                                Mendorong inovasi produk
                                unggulan desa.
                            </span>

                        </li>

                        <!-- ITEM -->
                        <li class="
                            flex
                            items-start
                            gap-5
                        ">
                        <div class="
                            w-7 h-7
                            rounded-full
                            bg-[#fff7e8]
                            border
                            border-[#ead7aa]
                            flex
                            items-center
                            justify-center
                            mt-[3px]
                            flex-shrink-0
                            ">
                            <i class="
                            fa-solid fa-check
                            text-[#b89b5e]
                            text-[15px]
                            "></i>
                        
                        </div>

                            <span class="
                                text-[#3f4a43]
                                leading-[1.8]
                            ">
                                Mewujudkan tata kelola desa
                                yang transparan dan partisipatif.
                            </span>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- FONDASI DESA -->
<!-- ===================================================== -->
<section class="
    relative
    py-15
    overflow-hidden
    bg-[#f5f3ea]
">

    <!-- ===================================================== -->
    <!-- BACKGROUND ORNAMENT -->
    <!-- ===================================================== -->

    <!-- LEFT BLUR -->
    <div class="
        absolute
        left-[-120px]
        top-[20%]
        w-[320px]
        h-[320px]
        rounded-full
        bg-[#1d4d3a]/10
        blur-[100px]
    "></div>

    <!-- RIGHT BLUR -->
    <div class="
        absolute
        right-[-120px]
        bottom-[10%]
        w-[360px]
        h-[360px]
        rounded-full
        bg-[#c8ab6d]/10

        blur-[120px]
    "></div>

    <!-- PALM DECOR -->
    <img
        src="{{ asset('images/dekor/palm-left.png') }}"
        alt="Palm"

        class="
            absolute
            left-0
            top-20
            w-[180px]
            opacity-[0.04]
        "
    >

    <!-- PALM DECOR -->
    <img
        src="{{ asset('images/dekor/palm-right.png') }}"
        alt="Palm"

        class="
            absolute
            right-0
            top-0
            w-[220px]
            opacity-[0.04]
        "
    >
    <!-- PATTERN -->
    <div class="
        absolute inset-0
        opacity-[0.03]
        bg-[url('/images/pattern/pattern-line.png')]
        bg-repeat
    "></div>

    <!-- ===================================================== -->
    <!-- CONTAINER -->
    <!-- ===================================================== -->
    <div class="
        relative
        z-10
        max-w-7xl
        mx-auto
        px-5
        lg:px-5
    ">

        <!-- ===================================================== -->
        <!-- SECTION HEADER -->
        <!-- ===================================================== -->
        <div class="
            text-center
            max-w-4xl
            mx-auto
            mb-10
        ">

            <!-- LABEL -->
            <div class="
                inline-flex
                items-center
                px-7
                py-2
                rounded-full
                border
                border-[#d8cfbb]
                bg-white/20
                backdrop-blur-md
                mb-3
            ">
                <!-- TEXT -->
                <span class="
                    uppercase
                    tracking-[0.17em]
                    text-sm
                    font-semibold
                    text-[#4b4b42]
                ">
                    Fondasi Desa
                </span>
            </div>

            <!-- TITLE -->
            <h2 class="
                font-lora
                text-[36px]
                md:text-[48px]
                leading-[0.95]
                tracking-[-0.03em]
                font-bold
                text-[#173121]
                mb-4
            ">

                Alam & Tradisi yang Menjadi
                <br>
                Kekuatan Kami

            </h2>

            <!-- SUBTITLE -->
            <p class="
                max-w-3xl
                mx-auto
                text-[#52605a]
                text-base
                md:text-[18px]
                leading-[1.5]
                font-light
            ">
                Potensi alam, budaya, dan inovasi lokal
                yang tumbuh bersama masyarakat Desa Hargorojo.
            </p>

        </div>

        <!-- ===================================================== -->
        <!-- CARD GRID -->
        <!-- ===================================================== -->
        <div class="
            grid
            md:grid-cols-2
            xl:grid-cols-3
            gap-5
        ">
            <!-- ===================================================== -->
            <!-- CARD -->
            <!-- ===================================================== -->
            <a href="#"
                class="
                    group
                    relative
                    bg-white/90
                    backdrop-blur-xl
                    rounded-[30px]
                    overflow-hidden
                    border
                    border-white/50
                    shadow-[0_20px_70px_rgba(0,0,0,0.06)]
                    hover:-translate-y-3
                    hover:shadow-[0_35px_100px_rgba(0,0,0,0.10)]
                    transition-all
                    duration-700
                "
            >
                <!-- IMAGE WRAPPER -->
                <div class="
                    relative
                    overflow-hidden
                ">

                    <!-- IMAGE -->
                    <img
                        src="{{ asset('images/assets foto/content_pohon kelapa.png') }}"
                        alt="Fondasi Desa 1"

                        class="
                            w-full
                            h-[260px]
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
                        from-black/60
                        via-black/10
                        to-transparent
                    "></div>

                </div>

                <!-- FLOATING ICON -->
                <div class="
                    absolute
                    top-[225px]
                    left-8
                    w-16
                    h-16
                    rounded-full
                    bg-[#173121]
                    border-[3px]
                    border-[#f8f6f1]
                    shadow-[0_10px_30px_rgba(0,0,0,0.15)]
                    flex
                    items-center
                    justify-center
                ">
                    <i class="
                        fa-solid fa-tree
                        text-white
                        text-xl
                    "></i>

                </div>

                <!-- CONTENT -->
                <div class="
                    relative
                    px-8
                    pt-12
                    pb-8
                ">
                    <!-- TITLE -->
                    <h3 class="
                        font-lora
                        text-[20px]
                        leading-[1.1]
                        font-bold
                        text-[#173121]
                        mb-4
                    ">

                        Kelestarian
                        Ekosistem Kelapa

                    </h3>

                    <!-- TEXT -->
                    <p class="
                        text-[#4f5b55]
                        text-[15px]
                        leading-[1.9]

                        mb-8
                    ">

                        Hutan kelapa yang terjaga dengan baik
                        menjadi sumber kehidupan utama
                        masyarakat Hargorojo.

                    </p>

                    <!-- CTA -->
                    <div class="
                        inline-flex
                        items-center
                        gap-3

                        text-[#173121]

                        font-semibold

                        tracking-[0.04em]

                        group-hover:gap-4

                        transition-all
                        duration-300
                    ">

                        <span>
                            Lihat Selengkapnya
                        </span>

                        <i class="
                            fa-solid fa-arrow-right
                            text-md
                        "></i>

                    </div>

                </div>

            </a>

            <!-- ===================================================== -->
            <!-- CARD -->
            <!-- ===================================================== -->
            <a href="#"
                class="
                    group
                    relative
                    bg-white/90
                    backdrop-blur-xl
                    rounded-[30px]
                    overflow-hidden
                    border
                    border-white/50
                    shadow-[0_20px_70px_rgba(0,0,0,0.06)]
                    hover:-translate-y-3
                    hover:shadow-[0_35px_100px_rgba(0,0,0,0.10)]
                    transition-all
                    duration-700
                "
            >

                <!-- IMAGE -->
                <div class="
                    relative
                    overflow-hidden
                ">

                    <img
                        src="{{ asset('images/assets foto/content_inovasi gula.png') }}"
                        alt="Fondasi Desa 2"
                        class="
                            w-full
                            h-[260px]
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
                        from-black/60
                        via-black/10
                        to-transparent
                    "></div>
                </div>

                <!-- FLOATING ICON -->
                <div class="
                    absolute
                    top-[225px]
                    left-8
                    w-16
                    h-16
                    rounded-full
                    bg-[#b89b5e]
                    border-[3px]
                    border-[#f8f6f1]
                    shadow-[0_10px_30px_rgba(0,0,0,0.15)]
                    flex
                    items-center
                    justify-center
                ">

                    <i class="
                        fa-solid fa-wheat-awn
                        text-white
                        text-xl
                    "></i>

                </div>

                <!-- CONTENT -->
                <div class="
                    relative

                    px-8
                    pt-12
                    pb-8
                ">

                    <!-- TITLE -->
                    <h3 class="
                        font-lora
                        text-[20px]
                        leading-[1.1]
                        font-bold
                        text-[#173121]
                        mb-4
                    ">
                        Inovasi Gula
                        Kelapa Organik
                    </h3>

                    <!-- TEXT -->
                    <p class="
                        text-[#4f5b55]
                        text-[15px]
                        leading-[1.9]
                        mb-8
                    ">
                        Pengolahan tradisional dengan standar
                        higienis menghasilkan gula kelapa
                        organik berkualitas tinggi.

                    </p>

                    <!-- CTA -->
                    <div class="
                        inline-flex
                        items-center
                        gap-3
                        text-[#173121]
                        font-semibold
                        tracking-[0.04em]
                        group-hover:gap-4
                        transition-all
                        duration-300
                    ">
                        <span>
                            Lihat Selengkapnya
                        </span>

                        <i class="
                            fa-solid fa-arrow-right
                            text-md
                        "></i>
                    </div>
                </div>
            </a>

            <!-- ===================================================== -->
            <!-- CARD -->
            <!-- ===================================================== -->
            <a href="#"
                class="
                    group
                    relative
                    bg-white/90
                    backdrop-blur-xl
                    rounded-[30px]
                    overflow-hidden
                    border
                    border-white/50
                    shadow-[0_20px_70px_rgba(0,0,0,0.06)]
                    hover:-translate-y-3
                    hover:shadow-[0_35px_100px_rgba(0,0,0,0.10)]
                    transition-all
                    duration-700
                "
            >
                <!-- IMAGE -->
                <div class="
                    relative
                    overflow-hidden
                ">
                    <img
                        src="{{ asset('images/assets foto/content_pendampingan petani.png') }}"
                        alt="Fondasi Desa 3"
                        class="
                            w-full
                            h-[260px]
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
                        from-black/60
                        via-black/10
                        to-transparent
                    "></div>
                </div>

                <!-- FLOATING ICON -->
                <div class="
                    absolute
                    top-[225px]
                    left-8
                    w-16
                    h-16
                    rounded-full
                    bg-[#173121]
                    border-[3px]
                    border-[#f8f6f1]
                    shadow-[0_10px_30px_rgba(0,0,0,0.15)]
                    flex
                    items-center
                    justify-center
                ">
                    <i class="
                        fa-solid fa-users
                        text-white
                        text-xl
                    "></i>

                </div>

                <!-- CONTENT -->
                <div class="
                    relative
                    px-8
                    pt-12
                    pb-8
                ">

                    <!-- TITLE -->
                    <h3 class="
                        font-lora
                        text-[20px]
                        leading-[1.1]
                        font-bold
                        text-[#173121]
                        mb-4
                    ">

                        Kesejahteraan
                        Penderes Nira

                    </h3>

                    <!-- TEXT -->
                    <p class="
                        text-[#4f5b55]
                        text-[15px]
                        leading-[1.9]
                        mb-8
                    ">

                        Meningkatkan taraf hidup petani nira
                        melalui pendampingan, pelatihan,
                        dan akses pasar yang berkelanjutan.

                    </p>

                    <!-- CTA -->
                    <div class="
                        inline-flex
                        items-center
                        gap-3
                        text-[#173121]
                        font-semibold
                        tracking-[0.04em]
                        group-hover:gap-4
                        transition-all
                        duration-300
                    ">
                        <span>
                            Lihat Selengkapnya
                        </span>
                        <i class="
                            fa-solid fa-arrow-right
                            text-md
                        "></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- ===================================================== -->
<!-- LOKASI DESA -->
<!-- ===================================================== -->
<section class="
    relative
    py-20
    overflow-hidden
    bg-[#f8f6f1]
">

    <!-- ===================================================== -->
    <!-- BACKGROUND ORNAMENT -->
    <!-- ===================================================== -->

    <!-- LEFT BLUR -->
    <div class="
        absolute
        left-[-120px]
        top-[10%]
        w-[320px]
        h-[320px]
        rounded-full
        bg-[#1d4d3a]/10
        blur-[100px]
    "></div>

    <!-- RIGHT BLUR -->
    <div class="
        absolute
        right-[-100px]
        bottom-[0%]
        w-[320px]
        h-[320px]
        rounded-full
        bg-[#c8ab6d]/10
        blur-[120px]
    "></div>

    <!-- PATTERN -->
    <div class="
        absolute inset-0
        opacity-[0.50]
        bg-[url('/images/pattern/pattern-line.png')]
        bg-repeat
    "></div>

    <!-- ===================================================== -->
    <!-- CONTAINER -->
    <!-- ===================================================== -->
    <div class="
        relative
        z-10
        max-w-7xl
        mx-auto
        px-5
        lg:px-10
    ">
        <!-- ===================================================== -->
        <!-- GRID -->
        <!-- ===================================================== -->
        <div class="
            grid
            lg:grid-cols-[0.8fr_1.2fr]
            gap-8
            items-start
        ">
            <!-- ===================================================== -->
            <!-- LEFT CONTENT -->
            <!-- ===================================================== -->
            <div>
                <!-- LABEL -->
                <div class="
                    inline-flex
                    items-center
                    gap-3
                    px-6
                    py-2
                    rounded-full
                    border
                    border-[#d8cfbb]
                    bg-white/20
                    backdrop-blur-sm
                    shadow-[0_8px_30px_rgba(0,0,0,0.04)]
                    mb-3
                ">
                    <!-- TEXT -->
                    <span class="
                        uppercase
                        tracking-[0.22em]
                        text-xs
                        font-semibold
                        text-[#4b4b42]
                    ">
                        Peta Desa
                    </span>

                </div>

                <!-- TITLE -->
                <h2 class="
                    font-lora
                    text-[38px]
                    md:text-[52px]
                    lg:text-[45px]
                    leading-[0.95]
                    tracking-[-0.03em]
                    font-bold
                    text-[#173121]
                    mb-5
                ">
                    Lokasi Desa
                    Hargorojo
                </h2>

                <!-- SUBTITLE -->
                <p class="
                    font-sans
                    max-w-xl
                    text-[#52605a]
                    text-[15px]
                    md:text-[16px]
                    leading-[1.5]
                    font-thin
                    mb-8
                ">
                    Terletak di Kecamatan Bagelen,
                    Kabupaten Purworejo, Jawa Tengah.
                    Dikelilingi keindahan alam
                    perbukitan Menoreh yang asri
                    dan menenangkan.
                </p>

                <!-- BUTTON -->
                <a href="https://maps.app.goo.gl/6LBBxyF7zEw3X1uV7"
                    target="_blank"
                    class="
                        group
                        inline-flex
                        items-center
                        gap-4
                        px-6
                        py-3
                        rounded-full
                        bg-[#173121]
                        text-white
                        shadow-[0_15px_40px_rgba(23,49,33,0.25)]
                        hover:bg-[#204732]
                        hover:-translate-y-1
                        transition-all
                        duration-500
                    "
                >
                    <!-- ICON -->
                    <div class="
                        w-10
                        h-10
                        rounded-full
                        bg-white/10
                        flex
                        items-center
                        justify-center
                    ">
                        <i class="
                            fa-solid fa-location-dot
                            text-[#d8c08a]
                        "></i>
                    </div>

                    <!-- TEXT -->
                    <span class="
                        font-medium
                        tracking-[0.02em]
                    ">
                        Lihat di Google Maps
                    </span>

                    <!-- ARROW -->
                    <i class="
                        fa-solid fa-arrow-right
                        text-md
                        group-hover:translate-x-1
                        transition-all
                        duration-300
                    "></i>
                </a>
            </div>

            <!-- ===================================================== -->
            <!-- RIGHT MAP -->
            <!-- ===================================================== -->
            <div class="
                relative
            ">

                <!-- MAP WRAPPER -->
                <div class="
                    relative
                    rounded-[38px]
                    overflow-hidden
                    border
                    border-white/40
                    shadow-[0_30px_100px_rgba(0,0,0,0.08)]
                    bg-white
                ">

                <!-- ===================================================== -->
                <!-- MAP WRAPPER -->
                <!-- ===================================================== -->
                <div class="
                relative
                rounded-[38px]
                overflow-hidden
                border
                border-white/40
                shadow-[0_30px_100px_rgba(0,0,0,0.08)]
                bg-white
                ">
                <!-- GOOGLE MAPS -->
                <iframe
                src="https://www.google.com/maps?q=Desa+Hargorojo+Bagelen+Purworejo&output=embed"
                class="
                w-full
                h-[400px]
                border-0
                "
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </div>
</div>
</section>

<!-- ===================================================== -->
<!-- GALERI DESA -->
<!-- ===================================================== -->
<section class="
    relative
    py-15
    overflow-hidden
    bg-[#f8f6f1]
">

    <!-- ===================================================== -->
    <!-- BACKGROUND ORNAMENT -->
    <!-- ===================================================== -->

    <!-- LEFT BLUR -->
    <div class="
        absolute
        left-[-120px]
        top-[10%]
        w-[320px]
        h-[320px]
        rounded-full
        bg-[#1d4d3a]/10
        blur-[100px]
    "></div>

    <!-- RIGHT BLUR -->
    <div class="
        absolute
        right-[-100px]
        bottom-[0%]

        w-[320px]
        h-[320px]

        rounded-full

        bg-[#c8ab6d]/10

        blur-[120px]
    "></div>

    <!-- PATTERN -->
    <div class="
        absolute inset-0

        opacity-[0.03]

        bg-[url('/images/pattern/pattern-line.png')]
        bg-repeat
    "></div>

    <!-- ===================================================== -->
    <!-- CONTAINER -->
    <!-- ===================================================== -->
    <div class="
        relative
        z-10

        max-w-7xl
        mx-auto

        px-5
        lg:px-10
    ">

        <!-- ===================================================== -->
        <!-- SECTION HEADER -->
        <!-- ===================================================== -->
        <div class="
            text-center
            max-w-4xl
            mx-auto

            mb-10
        ">

            <!-- LABEL -->
            <div class="
                inline-flex
                items-center
                gap-3
                px-6
                py-2
                rounded-full
                border
                border-[#d8cfbb]
                bg-white/20
                backdrop-blur-sm
                shadow-[0_8px_30px_rgba(0,0,0,0.04)]
                mb-4
            ">
                <!-- TEXT -->
                <span class="
                    uppercase
                    tracking-[0.22em]
                    text-xs
                    font-semibold
                    text-[#4b4b42]
                ">
                    Galeri Desa
                </span>

            </div>

            <!-- TITLE -->
            <h2 class="
                font-lora
                text-[38px]
                md:text-[52px]
                lg:text-[48px]
                leading-[1.1]
                tracking-[-0.03em]
                font-bold
                text-[#173121]
                mb-5
            ">

                Cerita yang Terekam Dalam 
                <br>Setiap Momen

            </h2>

            <!-- SUBTITLE -->
            <p class="
                max-w-6xl
                mx-auto
                text-[#52605a]
                text-[15px]
                md:text-[18px]
                leading-[1.4]
                font-light
            ">
                Dokumentasi kegiatan masyarakat,
                keindahan alam, budaya lokal,
                dan perjalanan Desa Hargorojo
                dalam membangun desa wisata yang berkelanjutan.
            </p>

        </div>

        <!-- ===================================================== -->
        <!-- GALLERY GRID -->
        <!-- ===================================================== -->
        <div class="
            grid
            grid-cols-1
            md:grid-cols-2
            lg:grid-cols-4

            gap-3
        ">

            <!-- ===================================================== -->
            <!-- LARGE IMAGE -->
            <!-- ===================================================== -->
            <div
                class="
                    group
                    relative
                    lg:col-span-2
                    lg:row-span-2
                    overflow-hidden
                    rounded-[20px]
                    shadow-[0_25px_100px_rgba(0,0,0,0.08)]
                "
            >

                <!-- IMAGE -->
                <img
                    src="{{ asset('images/assets foto/galeri desa_tradisi.png') }}"
                    alt="Galeri Desa"

                    class="
                        w-full
                        h-full
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
                    from-black/70
                    via-black/30
                    to-transparent
                "></div>

                <!-- CONTENT -->
                <div class="
                    absolute
                    bottom-0
                    left-0
                    p-8
                ">
                    
                </div>

            </div>

            <!-- ===================================================== -->
            <!-- SMALL IMAGE -->
            <!-- ===================================================== -->
            <div class="
                    group
                    relative

                    overflow-hidden

                    rounded-[30px]

                    shadow-[0_20px_60px_rgba(0,0,0,0.06)]
                "
            >

                <!-- IMAGE -->
                <img
                    src="{{ asset('images/assets foto/masak gula_galeri.png') }}"
                    alt="Galeri Desa"

                    class="
                        w-full
                        h-[260px]

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
                    from-black/60
                    to-transparent
                "></div>
            </div>

            <!-- ===================================================== -->
            <!-- SMALL IMAGE -->
            <!-- ===================================================== -->
            <a href="#"
                class="
                    group
                    relative

                    overflow-hidden

                    rounded-[30px]

                    shadow-[0_20px_60px_rgba(0,0,0,0.06)]
                "
            >

                <!-- IMAGE -->
                <img
                    src="{{ asset('images/assets foto/galeri desa_pengabdian.png') }}"
                    alt="Galeri Desa"

                    class="
                        w-full
                        h-[260px]

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
                    from-black/60
                    to-transparent
                ">

                

                </div>

            </a>

            <!-- ===================================================== -->
            <!-- WIDE IMAGE -->
            <!-- ===================================================== -->
            <a href="#"
                class="
                    group
                    relative
                    lg:col-span-2
                    overflow-hidden
                    rounded-[20px]
                    shadow-[0_20px_60px_rgba(0,0,0,0.06)]
                "
            >

                <!-- IMAGE -->
                <img
                    src="{{ asset('images/assets foto/galeri desa_gotong royong.png') }}"
                    alt="Galeri Desa"

                    class="
                        w-full
                        h-[260px]

                        object-cover

                        group-hover:scale-105

                        transition-transform
                        duration-700
                    "
                >

                <!-- OVERLAY -->
                <div class="
                    absolute inset-0

                    bg-gradient-to-r
                    from-black/40
                    to-transparent
                ">

                </div>

            </a>

        </div>

    </div>

</section>

@endsection
