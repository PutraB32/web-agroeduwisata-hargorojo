@extends('layouts.master')

@section('title', 'Profil Desa Hargorojo')

@section('content')

<!-- ===================================================== -->
<!-- HERO SECTION -->
<!-- ===================================================== -->
<section class="relative min-h-[560px] overflow-hidden bg-black sm:min-h-[630px]">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">

        <!-- IMAGE — tambah id + animate-kenburns + scale-110 -->
        <img
            id="hero-profil-bg"
            src="{{ asset('images/assets foto/hero_profil desa.png') }}"
            alt="Hero Desa"
            class="w-full h-full object-cover object-center scale-110 animate-kenburns">

        <!-- DARK OVERLAY — tambah animate-vignette -->
        <div class="absolute inset-0 bg-black animate-vignette"></div>

        <!-- CINEMATIC GRADIENT — tidak diubah -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/20 to-black/40"></div>

        <!-- SIDE SHADOW — tambah animate-slide-gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#0d1f17]/20 via-transparent to-[#0d1f17]/40 animate-slide-gradient"></div>

    </div>
    <!-- CONTENT -->
<div class="relative z-20 flex min-h-[560px] items-center justify-center px-4 text-center sm:min-h-[630px] sm:px-6">
    <div class="max-w-6xl mx-auto">

        <!-- TOP LABEL — fade-up seperti sebelumnya -->
        <div class="hero-fade-up delay-100 flex items-center justify-center gap-2 sm:gap-3 mb-1">
            <div class="h-[2px] w-10 sm:w-12 lg:sm-14 bg-white/60 rounded-full"></div>
            <span class="text-yellow-400 uppercase tracking-[0.35em] text-xs sm:text-sm lg:text-base font-medium text-center">
                Mengenal Lebih Dekat
            </span>
            <div class="h-[2px] w-10 sm:w-12 lg:sm-14 bg-white/60 rounded-full"></div>
        </div>

        <!-- MAIN TITLE — typewriter -->
        <h1 class="hero-fade-up delay-200 font-lora text-[30px] md:text-[60px] lg:text-[65px] leading-[0.95] tracking-[-0.03em] font-bold text-white drop-shadow-[0_10px_40px_rgba(0,0,0,0.45)]">
            <span id="typewriter-title" class="typewriter">
                PROFIL DESA HARGOROJO
            </span>
        </h1>

        <!-- DESCRIPTION — fade-up setelah title selesai -->
        <p class="hero-fade-up delay-300 mt-4 max-w-2xl mx-auto text-white/75 text-base md:text-xl leading-relaxed font-light italic">
            Desa agroeduwisata yang memadukan
            kearifan lokal, potensi alam,
            dan inovasi untuk mewujudkan masyarakat
            yang mandiri, sejahtera,
            dan berkelanjutan.
        </p>

    </div>
</div>

    <!-- EFEK CURVE -->
    <div class="absolute -bottom-[10px] left-0 z-50 w-full overflow-hidden leading-none pointer-events-none">
        <svg
            class="relative block w-full h-[96px] translate-y-px"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 120"
            preserveAspectRatio="none">
            <path d="M0,96C360,30,1090,140,1440,80L1440,120L0,120Z" fill="#ffffff"></path>
        </svg>
        <div class="-mt-px h-4 bg-white"></div>
    </div>

</section>

<!-- ===================================================== -->
<!-- SEJARAH DESA -->
<!-- ===================================================== -->
<section class="sejarah-section relative -mt-px py-12 sm:py-[4.25rem] overflow-hidden bg-[#ffffff]">

    <div class="absolute inset-x-0 top-0 z-[1] h-12 bg-white"></div>
    <div class="absolute inset-x-0 top-12 bottom-0 opacity-[0.04] bg-[url('/images/pattern/pattern-line.png')] bg-repeat"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-[0.95fr_1.05fr] gap-16 items-center">

            <!-- LEFT CONTENT -->
            <div>

                {{-- Label — slide-left delay 1 --}}
                <div class="slide-left slide-left-delay-1 inline-flex items-center px-6 py-2 rounded-full border border-[#d8cfbb] bg-white/70 backdrop-blur-md mb-2">
                    <span class="text-[#4b4b42] uppercase tracking-[0.22em] text-[12px] font-semibold">
                        Tentang Desa
                    </span>
                </div>

                {{-- Title — slide-left delay 2 --}}
                <h2 class="slide-left slide-left-delay-2 font-lora text-[34px] sm:text-[42px] md:text-[50px] leading-[1] tracking-[-0.03em] font-bold text-[#173121] mb-5">
                    Mengenal Desa Wisata
                    <br>
                    Hargorojo
                </h2>

                {{-- Description — slide-left delay 3 --}}
                <div class="slide-left slide-left-delay-3 space-y-7">
                    <p class="font-inter text-[#3f4a43] text-[17px] leading-[1.8]">
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

            <!-- RIGHT IMAGE -->
            <div class="relative">

                {{-- Dot decor — tambah dot-float --}}
                <div class="dot-float absolute -right-10 top-20 hidden w-32 h-32 lg:block opacity-40 bg-[radial-gradient(#b9ab83_1.5px,transparent_1.5px)] [background-size:16px_16px]"></div>

                {{-- Image wrapper — tambah img-reveal-overlay --}}
                <div class="relative rounded-[30px] overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.12)] group">
                    <img
                        src="{{ asset('images/assets foto/section_sejarah desa.jpeg') }}"
                        alt="Sejarah Desa"
                        class="img-slide-right h-[360px] w-full sm:h-[480px] lg:h-[620px] object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

                </div>

                {{-- Floating card — tambah float-card-pop --}}
                <div class="float-card-pop relative z-10 ml-auto mt-[-4rem] w-[min(100%,290px)] sm:absolute sm:-bottom-10 sm:-right-8 sm:mt-0 rounded-[25px] bg-gradient-to-br from-[#173121] to-[#1c4932] p-7 border border-white/10 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.25)]">
                    <h3 class="text-white text-[28px] leading-[1.2] font-semibold mb-3">
                        Cerita dari Tradisi Desa
                    </h3>
                    <p class="font-lora text-white/70 text-[15px] leading-[1.5] italic">
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
<section class="visimisi-section relative py-12 sm:py-[3.25rem] overflow-hidden bg-[#f8f6f1]">

    <div class="absolute inset-0 opacity-[0.0] bg-[url('/images/pattern/pattern-line.png')] bg-repeat"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-10">

        <!-- SECTION HEADER -->
        <div class="text-center mb-8">

            {{-- Title — reveal --}}
            <h2 class="reveal reveal-delay-1 font-lora text-[36px] sm:text-[44px] md:text-[50px] leading-[0.95] tracking-[-0.03em] font-bold text-[#173121] mb-3">
                Visi & Misi Kami
            </h2>

            {{-- Garis merah — line-expand --}}
            <div class="reveal reveal-delay-2 flex justify-center">
                <div class="line-expand h-[3px] rounded-full bg-[#ff0000]"></div>
            </div>

        </div>

        <!-- GRID -->
        <div class="grid lg:grid-cols-2 gap-10">

            {{-- VISI CARD — tambah visi-card --}}
            <div class="visi-card relative bg-white rounded-[30px] overflow-hidden border border-[#f1ede4] shadow-[0_20px_60px_rgba(0,0,0,0.06)] hover:-translate-y-2 hover:shadow-[0_30px_100px_rgba(0,0,0,0.08)] transition-all duration-500">

                {{-- TOP BAR — tambah bar-expand, hilangkan rounded agar expand smooth --}}
                <div class="overflow-hidden">
                    <div class="bar-expand flex items-center px-6 py-5 sm:px-10 bg-gradient-to-r from-[#173121] to-[#205239]">
                        <h3 class="font-lora text-[28px] font-bold sm:text-[32px] text-white tracking-[-0.01em]">Visi</h3>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="flex min-h-[280px] flex-col items-center justify-center px-6 py-10 text-center sm:min-h-[360px] sm:px-8 sm:py-12">
                    <p class="font-lora italic text-[#3f4a43] text-[18px] leading-[1.85]">
                        "Terwujudnya Desa Hargorojo sebagai
                        desa agroeduwisata unggulan yang
                        mandiri, berbudaya, berkelanjutan,
                        dan sejahtera dalam harmoni alam
                        Menoreh."
                    </p>

                    {{-- Garis emas — visi-line --}}
                    <div class="visi-line h-[3px] rounded-full bg-[#c8ab6d] mt-4"></div>
                </div>

            </div>

            {{-- MISI CARD — tambah misi-card --}}
            <div class="misi-card relative bg-white rounded-[30px] overflow-hidden border border-[#ece6da] shadow-[0_20px_100px_rgba(0,0,0,0.06)] hover:-translate-y-2 hover:shadow-[0_30px_100px_rgba(0,0,0,0.08)] transition-all duration-500">

                {{-- TOP BAR — tambah bar-expand --}}
                <div class="overflow-hidden">
                    <div class="bar-expand flex px-6 py-5 sm:px-10 bg-gradient-to-r from-[#8d784c] to-[#bda061]">
                        <h3 class="font-lora text-[28px] font-bold sm:text-[32px] text-white tracking-[-0.01em]">Misi</h3>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="px-6 py-8 sm:px-10 sm:py-10">
                    <ul class="space-y-3 font-lora text-[16px] sm:text-[18px]">

                        @php
                            $misiItems = [
                                'Mengembangkan potensi agroeduwisata berbasis kelapa.',
                                'Meningkatkan kualitas SDM masyarakat desa.',
                                'Melestarikan budaya dan kearifan lokal.',
                                'Mendorong inovasi produk unggulan desa.',
                                'Mewujudkan tata kelola desa yang transparan dan partisipatif.',
                            ];
                        @endphp

                        @foreach($misiItems as $item)
                        {{-- Tambah misi-item pada setiap li --}}
                        <li class="misi-item flex items-start gap-5">
                            <div class="w-7 h-7 rounded-full bg-[#fff7e8] border border-[#ead7aa] flex items-center justify-center mt-[3px] flex-shrink-0">
                                <i class="fa-solid fa-check text-[#b89b5e] text-[15px]"></i>
                            </div>
                            <span class="text-[#3f4a43] leading-[1.8]">{{ $item }}</span>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- FONDASI DESA -->
<!-- ===================================================== -->
<section class="relative py-12 sm:py-[3.75rem] overflow-hidden bg-[#f5f3ea]">

    <div class="absolute left-[-120px] top-[20%] w-[320px] h-[320px] rounded-full bg-[#1d4d3a]/10 blur-[100px]"></div>
    <div class="absolute right-[-120px] bottom-[10%] w-[360px] h-[360px] rounded-full bg-[#c8ab6d]/10 blur-[120px]"></div>
    <img src="{{ asset('images/dekor/palm-left.png') }}" alt="Palm" class="absolute left-0 top-20 hidden w-[180px] opacity-[0.04] sm:block">
    <img src="{{ asset('images/dekor/palm-right.png') }}" alt="Palm" class="absolute right-0 top-0 hidden w-[220px] opacity-[0.04] sm:block">
    <div class="absolute inset-0 opacity-[0.03] bg-[url('/images/pattern/pattern-line.png')] bg-repeat"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-5">

        <!-- SECTION HEADER -->
        <div class="text-center max-w-4xl mx-auto mb-10">

            <div class="reveal reveal-delay-1 inline-flex items-center px-7 py-2 rounded-full border border-[#d8cfbb] bg-white/20 backdrop-blur-md mb-3">
                <span class="uppercase tracking-[0.17em] text-sm font-semibold text-[#4b4b42]">Fondasi Desa</span>
            </div>

            <h2 class="reveal reveal-delay-2 font-lora text-[32px] sm:text-[36px] md:text-[48px] leading-[0.95] tracking-[-0.03em] font-bold text-[#173121] mb-4">
                Alam & Tradisi yang Menjadi
                <br>
                Kekuatan Kami
            </h2>

            <p class="reveal reveal-delay-3 max-w-3xl mx-auto text-[#52605a] text-base md:text-[18px] leading-[1.5] font-light">
                Potensi alam, budaya, dan inovasi lokal
                yang tumbuh bersama masyarakat Desa Hargorojo.
            </p>

        </div>

        <!-- CARD GRID -->
<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">

    @php
        $fondasiCards = [
            [
                'image'   => 'images/assets foto/content_pohon kelapa.png',
                'alt'     => 'Fondasi Desa 1',
                'icon'    => 'fa-tree',
                'color'   => '#173121',
                'title'   => 'Kelestarian Ekosistem Kelapa',
                'text'    => 'Hutan kelapa yang terjaga dengan baik menjadi sumber kehidupan utama masyarakat Hargorojo.',
            ],
            [
                'image'   => 'images/assets foto/content_inovasi gula.png',
                'alt'     => 'Fondasi Desa 2',
                'icon'    => 'fa-wheat-awn',
                'color'   => '#b89b5e',
                'title'   => 'Inovasi Gula Kelapa Organik',
                'text'    => 'Pengolahan tradisional dengan standar higienis menghasilkan gula kelapa organik berkualitas tinggi.',
            ],
            [
                'image'   => 'images/assets foto/content_pendampingan petani.png',
                'alt'     => 'Fondasi Desa 3',
                'icon'    => 'fa-users',
                'color'   => '#173121',
                'title'   => 'Kesejahteraan Penderes Nira',
                'text'    => 'Meningkatkan taraf hidup petani nira melalui pendampingan, pelatihan, dan akses pasar yang berkelanjutan.',
            ],
        ];
    @endphp

    @foreach($fondasiCards as $index => $card)

    <a href="#" class="
        fondasi-card fondasi-card-delay-{{ $index + 1 }}
        group relative bg-white/90 backdrop-blur-xl
        rounded-[30px] overflow-hidden
        border border-white/50
        shadow-[0_20px_70px_rgba(0,0,0,0.06)]
        hover:-translate-y-3
        hover:shadow-[0_35px_100px_rgba(0,0,0,0.10)]
        transition-all duration-700
        ease-[cubic-bezier(0.22,1,0.36,1)]
    ">

        <!-- IMAGE WRAPPER -->
        <div class="relative overflow-hidden">
            <img
                src="{{ asset($card['image']) }}"
                alt="{{ $card['alt'] }}"
                class="fondasi-img w-full h-[260px] object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
        </div>

        <!-- FLOATING ICON -->
        <div
            class="fondasi-icon absolute top-[225px] left-8 w-16 h-16 rounded-full border-[3px] border-[#f8f6f1] shadow-[0_10px_30px_rgba(0,0,0,0.15)] flex items-center justify-center"
            style="background-color: {{ $card['color'] }}">
            <i class="fa-solid {{ $card['icon'] }} text-white text-xl"></i>
        </div>

        <!-- CONTENT -->
        <div class="relative px-8 pt-12 pb-8">
            <h3 class="font-lora text-[20px] leading-[1.1] font-bold text-[#173121] mb-4">
                {{ $card['title'] }}
            </h3>
            <p class="text-[#4f5b55] text-[15px] leading-[1.9] mb-8">
                {{ $card['text'] }}
            </p>
            <div class="inline-flex items-center gap-3 text-[#173121] font-semibold tracking-[0.04em] group-hover:gap-4 transition-all duration-300">
                <span>Lihat Selengkapnya</span>
                <i class="fondasi-arrow fa-solid fa-arrow-right text-md"></i>
            </div>
        </div>
    </a>
    @endforeach
</div>
</section>

<!-- ===================================================== -->
<!-- LOKASI DESA -->
<!-- ===================================================== -->
<section class="lokasi-section relative py-20 overflow-hidden bg-[#f8f6f1]">

    <div class="absolute left-[-120px] top-[10%] w-[320px] h-[320px] rounded-full bg-[#1d4d3a]/10 blur-[100px]"></div>
    <div class="absolute right-[-100px] bottom-[0%] w-[320px] h-[320px] rounded-full bg-[#c8ab6d]/10 blur-[120px]"></div>
    <div class="absolute inset-0 opacity-[0.50] bg-[url('/images/pattern/pattern-line.png')] bg-repeat"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">
        <div class="grid lg:grid-cols-[0.8fr_1.2fr] gap-8 items-start">

            <!-- LEFT CONTENT -->
            <div>

                {{-- Label — slide-left delay 1 --}}
                <div class="slide-left slide-left-delay-1 inline-flex items-center gap-3 px-6 py-2 rounded-full border border-[#d8cfbb] bg-white/20 backdrop-blur-sm shadow-[0_8px_30px_rgba(0,0,0,0.04)] mb-3">
                    <span class="uppercase tracking-[0.22em] text-xs font-semibold text-[#4b4b42]">Peta Desa</span>
                </div>

                {{-- Title — slide-left delay 2 --}}
                <h2 class="slide-left slide-left-delay-2 font-lora text-[38px] md:text-[52px] lg:text-[45px] leading-[0.95] tracking-[-0.03em] font-bold text-[#173121] mb-5">
                    Lokasi Desa Hargorojo
                </h2>

                {{-- Subtitle — slide-left delay 3 --}}
                <p class="slide-left slide-left-delay-3 font-sans max-w-xl text-[#52605a] text-[16px] md:text-[17px] leading-[1.5] font-light mb-8">
                    Terletak di Kecamatan Bagelen,
                    Kabupaten Purworejo, Jawa Tengah.
                    Dikelilingi keindahan alam
                    perbukitan Menoreh yang asri
                    dan menenangkan.
                </p>

                {{-- Button — slide-left delay 4, location-pulse pada icon --}}
                <a href="https://maps.app.goo.gl/6LBBxyF7zEw3X1uV7"
                    target="_blank"
                    class="slide-left reveal-delay-4 group inline-flex items-center gap-4 px-6 py-3 rounded-full bg-[#173121] text-white shadow-[0_15px_40px_rgba(23,49,33,0.25)] hover:bg-[#204732] hover:-translate-y-1 transition-all duration-500">
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                        {{-- Tambah location-pulse --}}
                        <i class="location-pulse fa-solid fa-location-dot"></i>
                    </div>
                    <span class="font-medium tracking-[0.02em]">Lihat di Google Maps</span>
                    <i class="fa-solid fa-arrow-right text-md group-hover:translate-x-1 transition-all duration-300"></i>
                </a>

            </div>

            <!-- RIGHT MAP — tambah map-slide -->
            <div class="map-slide relative">
                {{-- Tambah map-glow pada wrapper dalam --}}
                <div class="map-glow relative rounded-[24px] sm:rounded-[38px] overflow-hidden border border-white/40 bg-white">
                    <iframe
                        src="https://www.google.com/maps?q=Desa+Hargorojo+Bagelen+Purworejo&output=embed"
                        class="h-[280px] w-full border-0 sm:h-[360px] lg:h-[400px]"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- ===================================================== -->
<!-- GALERI DESA -->
<!-- ===================================================== -->
<section class="galeri-section relative py-12 sm:py-[3.75rem] overflow-hidden bg-[#f8f6f1]">

    <div class="absolute left-[-120px] top-[10%] w-[320px] h-[320px] rounded-full bg-[#1d4d3a]/10 blur-[100px]"></div>
    <div class="absolute right-[-100px] bottom-[0%] w-[320px] h-[320px] rounded-full bg-[#c8ab6d]/10 blur-[120px]"></div>
    <div class="absolute inset-0 opacity-[0.03] bg-[url('/images/pattern/pattern-line.png')] bg-repeat"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">

        <!-- SECTION HEADER -->
        <div class="text-center max-w-4xl mx-auto mb-10">

            <div class="reveal reveal-delay-1 inline-flex items-center gap-3 px-6 py-2 rounded-full border border-[#d8cfbb] bg-white/20 backdrop-blur-sm shadow-[0_8px_30px_rgba(0,0,0,0.04)] mb-4">
                <span class="uppercase tracking-[0.22em] text-xs font-semibold text-[#4b4b42]">Galeri Desa</span>
            </div>

            <h2 class="reveal reveal-delay-2 font-lora text-[38px] md:text-[52px] lg:text-[48px] leading-[1.1] tracking-[-0.03em] font-bold text-[#173121] mb-5">
                Cerita yang Terekam Dalam
                <br>Setiap Momen
            </h2>

            <p class="reveal reveal-delay-3 max-w-6xl mx-auto text-[#52605a] text-[15px] md:text-[18px] leading-[1.4] font-light">
                Dokumentasi kegiatan masyarakat,
                keindahan alam, budaya lokal,
                dan perjalanan Desa Hargorojo
                dalam membangun desa wisata yang berkelanjutan.
            </p>

        </div>

        <!-- GALLERY GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">

            {{-- LARGE IMAGE — galeri-large + galeri-tint --}}
            <div class="galeri-large galeri-tint group relative lg:col-span-2 lg:row-span-2 overflow-hidden rounded-[20px] shadow-[0_25px_100px_rgba(0,0,0,0.08)]">
                <img
                    src="{{ asset('images/assets foto/galeri desa_tradisi.png') }}"
                    alt="Galeri Desa"
                    class="galeri-zoom h-[280px] w-full object-cover lg:h-full group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8"></div>
            </div>

            {{-- SMALL IMAGE 1 — galeri-item delay 1 + galeri-tint --}}
            <div class="galeri-item galeri-item-delay-1 galeri-tint group relative overflow-hidden rounded-[30px] shadow-[0_20px_60px_rgba(0,0,0,0.06)]">
                <img
                    src="{{ asset('images/assets foto/masak gula_galeri.png') }}"
                    alt="Galeri Desa"
                    class="galeri-zoom w-full h-[260px] object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>

            {{-- SMALL IMAGE 2 — galeri-item delay 2 + galeri-tint --}}
            <a href="#" class="galeri-item galeri-item-delay-2 galeri-tint group relative overflow-hidden rounded-[30px] shadow-[0_20px_60px_rgba(0,0,0,0.06)]">
                <img
                    src="{{ asset('images/assets foto/galeri desa_pengabdian.png') }}"
                    alt="Galeri Desa"
                    class="galeri-zoom w-full h-[260px] object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </a>

            {{-- WIDE IMAGE — galeri-item delay 3 + galeri-tint --}}
            <a href="#" class="galeri-item galeri-item-delay-3 galeri-tint group relative lg:col-span-2 overflow-hidden rounded-[20px] shadow-[0_20px_60px_rgba(0,0,0,0.06)]">
                <img
                    src="{{ asset('images/assets foto/galeri desa_gotong royong.png') }}"
                    alt="Galeri Desa"
                    class="galeri-zoom w-full h-[260px] object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>
            </a>

        </div>

    </div>

</section>

@endsection
