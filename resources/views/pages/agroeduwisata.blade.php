@extends('layouts.master')

@section('title', 'Agroeduwisata - Desa Hargorojo')

@section('content')

{{-- NAVBAR --}}
@include('layouts.navbar')

{{-- Tambah bg-black --}}
<section class="relative h-screen overflow-hidden bg-black">

    {{-- BACKGROUND IMAGE --}}
    <div class="absolute inset-0">

        <img
            id="hero-agro-bg"
            src="{{ asset('images/assets foto/hero section_agroeduwisata1.png') }}"
            alt="Petani penyadap nira"
            class="w-full h-full object-cover scale-110 animate-kenburns"
        >

        <div class="absolute inset-0 bg-black animate-vignette"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-black/30"></div>

    </div>

    {{-- CONTENT --}}
    <div class="relative z-20 max-w-[1250px] mx-auto min-h-screen px-4 md:px-6 lg:px-8 flex items-center">

        <div class="max-w-[900px]">

            <span class="hero-fade-up delay-100 inline-flex px-4 py-2 rounded-full border border-[#d4b254] text-[#d4b254] tracking-[0.12em] uppercase text-sm font-medium mb-2">
                Agroeduwisata
            </span>

            <h1 class="hero-fade-up delay-300 font-lora text-white text-[50px] md:text-[65px] leading-[1.05] font-semibold mb-4">
                Cerita di Balik

                <span
                    class="hero-fade-up delay-200 block"
                    style="
                        font-style: italic;
                        color: #dcb445;
                        text-shadow:
                            -1px -1px 1px rgba(255, 220, 100, 0.5),
                            2px  2px 4px rgba(0, 0, 0, 0.5);
                    "
                >
                    Tradisi dan Kehidupan
                </span>

                Desa Hargorojo
            </h1>

            <div class="hero-fade-up delay-450 relative mb-4">
                <div class="w-80 h-[2px] bg-gradient-to-r from-[#d4b254] via-[#d4b254]/60 to-transparent"></div>
                <div class="absolute inset-0 w-56 h-[2px] bg-gradient-to-r from-[#d4b254]/50 to-transparent blur-sm"></div>
            </div>

            <p class="hero-fade-up delay-600 font-light md:text-lg text-gray-200 leading-relaxed max-w-2xl pl-1">
                Jelajahi perjalanan masyarakat
                Desa Hargorojo dalam menjaga tradisi,
                mengolah hasil alam, dan mewariskan
                pengetahuan lokal sebagai
                bagian dari kehidupan sehari-hari.
            </p>

        </div>

    </div>

    <div class="hero-fade-up delay-500 absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-20">
        <svg
            class="relative block w-full h-[70px] lg:h-[100px]"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 120"
            preserveAspectRatio="none"
        >
            <path
                d="M0,90 C360,20 720,20 1080,80 C1260,100 1350,90 1440,70 L1440,120 L0,120 Z"
                fill="#ffffff"
            />
        </svg>
    </div>

</section>


@php
    $prosesProduksi = $menusUtama->firstWhere('judul', 'Proses Pembuatan Gula');
@endphp

<section class="relative py-10 bg-[#ffffff] overflow-hidden">

    <div class="absolute top-0 right-0 w-[300px] h-[300px] rounded-full bg-[#d4b254]/5 blur-3xl"></div>

    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="text-center max-w-[800px] mx-auto mb-15">

            <div class="reveal reveal-delay-1 flex items-center justify-center gap-3 mb-2">
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                <span class="uppercase tracking-[0.2em] text-sm font-semibold text-yellow-600">
                    Proses Produksi Tradisional
                </span>
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
            </div>

            <h2 class="reveal reveal-delay-2 font-lora text-[#173121] text-[38px] md:text-[52px] tracking-[-0.04rem] leading-[1] font-bold mb-2">
                Perjalanan Nira Menjadi <br>
                <span class="text-[#ac8f40]">Gula Kelapa</span>
            </h2>

            <div class="reveal reveal-delay-2 mx-auto w-30 h-[2px] bg-gradient-to-r from-transparent via-[#d4b254] to-transparent mb-1"></div>

            <p class="reveal reveal-delay-3 mx-auto text-gray-600 text-base md:text-xl lg:text-[18px] leading-[1.5] font-thin">
                Di balik manisnya gula kelapa,
                terdapat proses panjang yang dijalani
                dengan ketelatenan, mulai dari penyadapan nira
                hingga menjadi produk berkualitas yang diwariskan
                dari generasi ke generasi.
            </p>

        </div>

        <div class="timeline-section relative">

            
            <div class="timeline-line hidden lg:block absolute left-1/2 top-0 bottom-0 -translate-x-1/2 w-[2px] bg-gradient-to-b from-transparent via-[#d4b254]/40 to-transparent"></div>

            @php
                $prosesProduksi = $menusUtama->firstWhere('judul', 'Proses Pembuatan Gula');
                $tahapan = $prosesProduksi?->children ?? collect();
            @endphp

            {{-- TAHAP 1 --}}
            <div class="timeline-row relative grid lg:grid-cols-2 gap-10 lg:gap-20 items-center mb-20">

                {{-- DOT --}}
                <div class="timeline-dot hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 rounded-full bg-white border-4 border-[#d4b254] shadow-lg items-center justify-center z-20">
                    <span class="font-lora text-[#173121] text-2xl font-bold">01</span>
                </div>

                {{-- CONTENT — slide dari kiri --}}
                <div class="timeline-row-left">
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 rounded-full bg-[#173121] shadow-lg flex items-center justify-center">
                            <i class="fa-solid fa-droplet text-white"></i>
                        </div>
                        <div>
                            <span class="block text-[14px] uppercase tracking-[0.15em] text-[#d4b254] font-semibold">Tahap Pertama</span>
                            <span class="text-[#6b736d] text-sm">Awal dari perjalanan Gula Kelapa</span>
                        </div>
                    </div>

                    @php
                        $judul = preg_replace('/^Tahap\s+\d+\s*-\s*/', '', $tahapan[0]->judul ?? '');
                        $kata = explode(' ', $judul);
                        $split = ceil(count($kata) / 3);
                        $bagian1 = implode(' ', array_slice($kata, 0, $split));
                        $bagian2 = implode(' ', array_slice($kata, $split));
                    @endphp

                    <h3 class="font-lora text-[#173121] text-[34px] md:text-[38px] font-bold leading-[1.1] mb-2">
                        {{ $bagian1 }} <span class="text-[#d4b254]">{{ $bagian2 }}</span>
                    </h3>

                    <p class="text-[#717773] text-[17px] leading-relaxed mb-3">{{ $tahapan[0]->deskripsi ?? '' }}</p>

                    <div class="relative pl-8 mb-5">
                        <i class="fa-solid fa-quote-left absolute left-3 top-0 text-[#d4b254]/40 text-lg"></i>
                        <p class="italic font-lora text-[17px] text-[#4c5550] leading-relaxed">
                            "Nira terbaik diperoleh saat pagi hari ketika kesegarannya masih terjaga sebelum diproses lebih lanjut."
                        </p>
                        <span class="block font-lora mt-2 text-md text-[#6b736d]">~ Petani Kelapa Hargorojo</span>
                    </div>
                </div>

                <div class="timeline-row-right relative">
                    <div class="overflow-hidden rounded-[30px] shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                        <img src="{{ asset('storage/' . $tahapan[0]->gambar) }}" alt="Penderesan Nira" class="w-full aspect-[4/3] object-cover hover:scale-105 transition-all duration-700">
                    </div>
                </div>

            </div>

            {{-- TAHAP 2 --}}
            <div class="timeline-row relative grid lg:grid-cols-2 gap-10 lg:gap-20 items-center mb-20">

                <div class="timeline-dot hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 rounded-full bg-white border-4 border-[#d4b254] shadow-lg items-center justify-center z-20">
                    <span class="font-lora text-[#173121] text-xl font-bold">02</span>
                </div>

                {{-- IMAGE — slide dari kiri --}}
                <div class="timeline-row-left relative lg:order-1 order-2">
                    <div class="overflow-hidden rounded-[30px] shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                        <img src="{{ asset('storage/' . $tahapan[1]->gambar) }}" alt="Pemasakan Nira" class="w-full aspect-[4/3] object-cover hover:scale-105 transition-all duration-700">
                    </div>
                </div>

                {{-- CONTENT — slide dari kanan --}}
                <div class="timeline-row-right lg:order-2 order-1">
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 rounded-full bg-[#173121] flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-fire text-white"></i>
                        </div>
                        <div>
                            <span class="block text-[14px] uppercase tracking-[0.15em] text-[#d4b254] font-semibold">Tahap Kedua</span>
                            <span class="text-[#6b736d] text-sm">Inti dari proses pembuatan gula kelapa</span>
                        </div>
                    </div>

                    @php
                        $judul = preg_replace('/^Tahap\s+\d+\s*-\s*/', '', $tahapan[1]->judul ?? '');
                        $kata = explode(' ', $judul);
                        $split = ceil(count($kata) / 3);
                        $bagian1 = implode(' ', array_slice($kata, 0, $split));
                        $bagian2 = implode(' ', array_slice($kata, $split));
                    @endphp

                    <h3 class="font-lora text-[#173121] text-[34px] md:text-[42px] font-bold leading-[1.1] mb-2">
                        {{ $bagian1 }} <span class="text-[#d4b254]">{{ $bagian2 }}</span>
                    </h3>

                    <p class="text-[#717773] text-[17px] leading-relaxed">{{ $tahapan[1]->deskripsi ?? '' }}</p>

                    <div class="bg-white rounded-[20px] p-4 md:p-6 shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                        <div class="overflow-hidden scale-105 rounded-[20px]">
                            <img src="{{ asset('images/assets foto/Proses Pemasakan Gula3.png') }}" alt="Ilustrasi proses pemasakan nira kelapa" class="w-full h-auto object-cover">
                        </div>
                    </div>
                </div>

            </div>

            {{-- TAHAP 3 — konten kiri, gambar kanan --}}
            <div class="timeline-row relative grid lg:grid-cols-2 gap-10 lg:gap-20 items-center mb-20">

                <div class="timeline-dot hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 rounded-full bg-white border-4 border-[#d4b254] shadow-lg items-center justify-center z-20">
                    <span class="font-lora text-[#173121] text-xl font-bold">03</span>
                </div>

                {{-- CONTENT — slide dari kiri --}}
                <div class="timeline-row-left">
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 rounded-full bg-[#173121] flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-hands text-white"></i>
                        </div>
                        <div>
                            <span class="block text-[14px] uppercase tracking-[0.15em] text-[#d4b254] font-semibold">Tahap Ketiga</span>
                            <span class="text-[#6b736d] text-sm">Ketelitian dalam membentuk kualitas</span>
                        </div>
                    </div>

                    @php
                        $judul = preg_replace('/^Tahap\s+\d+\s*-\s*/', '', $tahapan[2]->judul ?? '');
                        $kata = explode(' ', $judul);
                        $split = ceil(count($kata) / 3);
                        $bagian1 = implode(' ', array_slice($kata, 0, $split));
                        $bagian2 = implode(' ', array_slice($kata, $split));
                    @endphp

                    <h3 class="font-lora text-[#173121] text-[34px] md:text-[42px] font-bold leading-[1.1] mb-3">
                        {{ $bagian1 }} <span class="text-[#d4b254]">{{ $bagian2 }}</span>
                    </h3>

                    <p class="text-[#6b736d] leading-relaxed mb-5">{{ $tahapan[2]->deskripsi ?? '' }}</p>

                    <div class="relative p-5 rounded-[25px] bg-[#173121] overflow-hidden">
                        <div class="absolute bottom-0 -right-10 w-28 h-28 rounded-full bg-white/5"></div>
                        <div class="absolute top-0 -left-12 w-28 h-28 rounded-full bg-white/5"></div>
                        <div class="relative z-10">
                            <div class="inline-flex items-center gap-2 font-lora text-[#d4b254] font-semibold mb-2">Nilai yang Dijaga</div>
                            <p class="text-white/80 pl-2 font-lora leading-relaxed">
                                Proses pencetakan tidak hanya membentuk gula kelapa, tetapi juga mempertahankan warisan keterampilan yang telah diwariskan secara turun-temurun oleh masyarakat Desa Hargorojo.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- IMAGE — slide dari kanan --}}
                <div class="timeline-row-right relative">
                    <div class="overflow-hidden rounded-[30px] shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                        <img src="{{ asset('storage/' . $tahapan[2]->gambar) }}" alt="Pencetakan Gula Kelapa" class="w-full aspect-[4/3] object-cover hover:scale-105 transition-all duration-700">
                    </div>
                </div>

            </div>

            {{-- TAHAP 4 — gambar kiri, konten kanan --}}
            <div class="timeline-row relative grid lg:grid-cols-2 gap-10 lg:gap-20 items-center mb-20">

                <div class="timeline-dot hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 rounded-full bg-white border-4 border-[#d4b254] shadow-lg items-center justify-center z-20">
                    <span class="font-lora text-[#173121] text-xl font-bold">04</span>
                </div>

                {{-- IMAGE — slide dari kiri --}}
                <div class="timeline-row-left relative lg:order-1 order-2">
                    <div class="overflow-hidden rounded-[30px] shadow-[0_20px_50px_rgba(0,0,0,0.08)]">
                        <img src="{{ asset('storage/' . $tahapan[3]->gambar) }}" alt="Pengemasan Produk" class="w-full aspect-[4/3] object-cover hover:scale-105 transition-all duration-700">
                    </div>
                </div>

                {{-- CONTENT — slide dari kanan --}}
                <div class="timeline-row-right lg:order-2 order-1">
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 rounded-full bg-[#173121] flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-box-open text-white"></i>
                        </div>
                        <div>
                            <span class="block text-[15px] uppercase tracking-[0.15em] text-[#d4b254] font-semibold">Tahap Keempat</span>
                            <span class="text-[#6b736d] text-sm">Produk siap membawa cerita Hargorojo</span>
                        </div>
                    </div>

                    @php
                        $judul = preg_replace('/^Tahap\s+\d+\s*-\s*/', '', $tahapan[3]->judul ?? '');
                        $kata = explode(' ', $judul);
                        $split = ceil(count($kata) / 4);
                        $bagian1 = implode(' ', array_slice($kata, 0, $split));
                        $bagian2 = implode(' ', array_slice($kata, $split));
                    @endphp

                    <h3 class="font-lora text-[#173121] text-[34px] md:text-[40px] font-bold leading-[1.1] mb-2">
                        {{ $bagian1 }} <span class="text-[#d4b254]">{{ $bagian2 }}</span>
                    </h3>

                    <p class="text-[#6b736d] leading-relaxed mb-2">{{ $tahapan[3]->deskripsi ?? '' }}</p>

                    <div class="grid sm:grid-cols-2 gap-4 mb-3">
                        @foreach([
                            ['icon' => 'fa-shield-heart', 'title' => 'Higienis', 'desc' => 'Menjaga kebersihan produk.'],
                            ['icon' => 'fa-box', 'title' => 'Siap Distribusi', 'desc' => 'Memudahkan pengiriman.'],
                            ['icon' => 'fa-medal', 'title' => 'Kualitas Terjaga', 'desc' => 'Melindungi cita rasa gula.'],
                            ['icon' => 'fa-tag', 'title' => 'Nilai Produk', 'desc' => 'Meningkatkan daya tarik pasar.'],
                        ] as $item)
                        <div class="flex gap-3 p-2 rounded-[15px] bg-white shadow-[0_8px_25px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                            <div class="w-11 h-11 rounded-full bg-[#d4b254]/10 flex items-center justify-center shrink-0">
                                <i class="fa-solid {{ $item['icon'] }} text-[#d4b254]"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#173121] text-sm mb-1">{{ $item['title'] }}</h4>
                                <p class="text-xs text-[#6b736d] leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="relative p-5 rounded-[25px] bg-[#173121] overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-white/5"></div>
                        <div class="relative z-10">
                            <div class="inline-flex items-center gap-2 font-lora text-[#d4b254] font-semibold mb-1">
                                <i class="fa-solid fa-heart"></i> Dari Hargorojo untuk Anda
                            </div>
                            <p class="text-white/80 pl-3 leading-relaxed">
                                Di balik setiap manis yang tersaji, ada peluh yang jatuh, ada tradisi yang dijaga, dan ada harapan masyarakat Hargorojo yang terus tumbuh untuk masa depan yang lebih baik.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER QUOTE — quote-fade --}}
            <div class="quote-fade mt-25 max-w-4xl mx-auto text-center">
                <div class="w-18 h-18 mx-auto mb-5 rounded-full bg-[#173121]/5 flex items-center justify-center">
                    <i class="fa-solid fa-heart text-[#ff0000] text-4xl"></i>
                </div>
                <blockquote class="quote-blockquote font-lora italic text-[#173121] leading-[1.7] text-[20px] md:text-[30px]">
                    "Setiap tetes nira yang diolah bukan hanya menghasilkan gula kelapa, tetapi juga menjaga warisan, pengetahuan, dan kehidupan masyarakat Desa Hargorojo."
                </blockquote>
                <p class="reveal reveal-delay-1 mt-4 text-[#6b736d] font-medium mb-20">~ Agroeduwisata Hargorojo</p>
            </div>

        </div>

    </div>

</section>

{{-- Tambah edukasi-section --}}
<section class="edukasi-section relative py-8 lg:py-15 overflow-hidden">

    <div class="absolute inset-0">
        <img
            src="{{ asset('images/assets foto/section_edukasi pertanian1.png') }}"
            alt="Pemeliharaan Pohon Kelapa"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
    </div>

    <div class="relative z-10 max-w-[1400px] mx-auto px-4 lg:px-10">
        <div class="grid lg:grid-cols-[1fr_0.9fr] gap-8 lg:gap-1 items-end">

            {{-- LEFT CARD — tambah edukasi-left --}}
            <div class="edukasi-left w-full max-w-[600px] bg-white/80 backdrop-blur-lg rounded-[35px] p-5 md:p-10 lg:p-12 shadow-[0_20px_60px_rgba(0,0,0,0.12)]">

                <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-[#173121] text-white font-lora font-[17px] mb-5">
                    <i class="fa-solid fa-book-open text-[#d4b254]"></i>
                    Edukasi Pertanian
                </span>

                <h2 class="font-lora text-[#173121] text-[33px] md:text-[38px] font-bold leading-[1.05] mb-4">
                    Teknik Pemeliharaan
                    <span class="text-[#9d8646]">Pohon Kelapa</span>
                </h2>

                <p class="text-[#000000] max-w-xl font-lora text-[17px] leading-relaxed mb-4">
                    Di Hargorojo, kami tidak hanya memanen, tetapi merawat. Setiap pohon kelapa adalah investasi jangka panjang bagi ekosistem desa. Kami menerapkan standar pertanian organik yang ketat untuk memastikan kualitas nira terbaik.
                </p>

                {{-- TIPS — tambah tips-item tiap item --}}
                <div class="space-y-4">
                    @foreach([
                        ['icon' => 'fa-seedling', 'title' => 'Pemupukan Organik', 'desc' => 'Menggunakan kompos kotoran ternak dan limbah nira untuk mengembalikan nutrisi tanah secara alami tanpa bahan kimia.'],
                        ['icon' => 'fa-shield-heart', 'title' => 'Manajemen Hama Terpadu', 'desc' => 'Sanitasi mahkota pohon secara rutin untuk mencegah penumpukan kotoran yang dapat memicu pembusukan bunga nira.'],
                        ['icon' => 'fa-leaf', 'title' => 'Pengendalian Alami', 'desc' => 'Pengendalian kumbang kelapa menggunakan feromon dan agen hayati untuk menjaga keseimbangan predator alami.'],
                    ] as $item)

                    {{-- Tambah tips-item --}}
                    <div class="tips-item flex gap-3">
                        <div class="w-14 h-14 rounded-full bg-[#173121] flex items-center justify-center shrink-0">
                            <i class="fa-solid {{ $item['icon'] }} text-[#d4b254] text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-[#173121] font-lora font-bold text-[20px] mb-1">{{ $item['title'] }}</h3>
                            <p class="text-[#484e4b] font-lora leading-relaxed">{{ $item['desc'] }}</p>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>

            {{-- RIGHT SIDE — tambah edukasi-right --}}
            <div class="edukasi-right">

                <div class="mb-5 text-center lg:text-left drop-shadow-[0_10px_60px_rgba(0,0,0,0.2)]">
                    <div class="text-[#d4b254] text-3xl">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <blockquote class="font-lora italic max-w-xl text-white text-[20px] lg:text-[30px] leading-tight">
                        Merawat satu pohon hari ini, berarti menjaga masa depan esok hari.
                    </blockquote>
                </div>

                <div class="bg-[#173121]/50 max-w-[450px] backdrop-blur-md rounded-[25px] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.2)]">
                    <h3 class="font-lora text-white text-[20px] font-bold mb-4">
                        Mengapa Pemeliharaan Itu Penting?
                    </h3>
                    <div class="space-y-3">
                        @foreach([
                            ['icon' => 'fa-circle-check', 'title' => 'Menjaga Produktivitas', 'desc' => 'Pohon yang sehat menghasilkan nira berkualitas setiap hari.'],
                            ['icon' => 'fa-seedling', 'title' => 'Ramah Lingkungan', 'desc' => 'Metode alami menjaga kesuburan tanah dan kelestarian alam.'],
                            ['icon' => 'fa-users', 'title' => 'Warisan Untuk Generasi', 'desc' => 'Tradisi perawatan diwariskan turun-temurun oleh masyarakat Hargorojo.'],
                        ] as $item)
                        <div class="flex gap-4">
                            <div class="w-13 h-13 rounded-full border border-[#d4b254] flex items-center justify-center shrink-0">
                                <i class="fa-solid text-3xl {{ $item['icon'] }} text-[#d4b254]"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-lora font-semibold text-[16px]">{{ $item['title'] }}</h4>
                                <p class="text-white/85 text-[14px] font-lora leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        @if(!$loop->last)
                        <div class="border-t border-white/55"></div>
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-30 bg-gradient-to-t from-white to-transparent"></div>

</section>


<section class="py-16 lg:py-18 bg-[#f8f6f1]">
    <div class="max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="text-center mb-8">
            <div class="reveal reveal-delay-1 flex items-center justify-center gap-3 mb-2">
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                <span class="uppercase tracking-[0.2em] text-sm font-semibold text-yellow-600">WISATA ALAM</span>
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
            </div>

            <h2 class="reveal reveal-delay-2 font-lora text-[#173121] text-[38px] md:text-[42px] font-bold leading-[1.2]">
                Menyusuri Keindahan Alam <br> Hargorojo
            </h2>

            <div class="reveal reveal-delay-3 flex items-center justify-center gap-4 mt-1">
                <div class="w-20 h-px bg-gradient-to-l from-[#d4b254] to-transparent"></div>
                <div class="w-3 h-3 rotate-45 border-2 border-[#d4b254]"></div>
                <div class="w-20 h-px bg-gradient-to-r from-[#d4b254] to-transparent"></div>
            </div>
        </div>

        <!-- GRID 2 KOLOM -->
        <div class="grid lg:grid-cols-[1.3fr_0.8fr] gap-4">

            {{-- CARD BESAR — wisata-card-left --}}
            <a href="#" class="wisata-card-left relative h-[500px] rounded-[20px] overflow-hidden group">
                <img
                    src="{{ asset('images/assets foto/wisata alam_trekking.png') }}"
                    alt="Trekking Perbukitan Menoreh"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-[#173121]/95 via-[#173121]/40 to-transparent"></div>

                {{-- Caption — wisata-caption --}}
                <div class="wisata-caption absolute inset-x-0 bottom-0 p-8 lg:p-10">
                    <h3 class="font-lora text-white/80 text-[25px] lg:text-[35px] font-bold leading-tight mb-2">
                        Trekking Perbukitan Menoreh
                    </h3>
                    <p class="max-w-xl text-white/80 font-sans leading-relaxed mb-1">
                        Jalur setapak melintasi kebun kelapa dan hutan tropis dengan panorama perbukitan yang memanjakan mata.
                    </p>
                </div>
            </a>

            {{-- CARD KECIL — wisata-card-right --}}
            <a href="#" class="wisata-card-right relative h-[500px] rounded-[20px] overflow-hidden group">
                <img
                    src="{{ asset('images/assets foto/assets wisata panorama.png') }}"
                    alt="Jelajah Alam Hargorojo"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-[#173121]/95 via-[#173121]/40 to-transparent"></div>

                {{-- Caption — wisata-caption --}}
                <div class="wisata-caption absolute inset-x-0 bottom-0 p-6">
                    <h3 class="font-lora text-white/80 text-[26px] font-bold leading-tight mb-3">
                        Jelajah Panorama Alam
                    </h3>
                    <p class="text-white/80 leading-relaxed mb-6">
                        Menikmati bentang alam Hargorojo dari sudut pandang terbaik dengan suasana pedesaan yang asri.
                    </p>
                </div>
            </a>

        </div>

        {{-- CARD FULL WIDTH — wisata-card-full --}}
        <a href="#" class="wisata-card-full relative mt-5 h-[500px] rounded-[25px] overflow-hidden group block">
            <img
                src="{{ asset('images/assets foto/asset wisata keindahan.png') }}"
                alt="Keindahan Alam Hargorojo"
                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#173121]/95 via-[#173121]/30 to-transparent"></div>

            {{-- Caption — wisata-caption --}}
            <div class="wisata-caption absolute inset-x-0 bottom-0 p-8 lg:p-10">
                <h3 class="font-lora text-white/80 text-[32px] lg:text-[40px] font-bold leading-tight mb-2">
                    Menyatu Dengan Keindahan Hargorojo
                </h3>
                <p class="max-w-3xl text-white/80 leading-relaxed mb-2">
                    Dari hamparan kebun kelapa hingga aliran air yang menenangkan, setiap sudut Hargorojo menghadirkan pengalaman wisata alam yang autentik dan penuh ketenangan.
                </p>
            </div>
        </a>

    </div>
</section>

<section class="relative py-8 lg:py-10 bg-[#F8F5F0] overflow-hidden">

    <div class="absolute top-0 -left-2 opacity-[0.04] pointer-events-none">
        <i class="fa-solid fa-leaf text-[220px] text-[#173121]"></i>
    </div>

    <div class="relative z-10 max-w-[1400px] mx-auto px-4 md:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="text-center mb-16">
            <div class="reveal reveal-delay-1 flex items-center justify-center gap-3 mb-1">
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                <span class="uppercase tracking-[0.2em] text-sm font-semibold text-yellow-600">BUDAYA DESA</span>
                <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
            </div>
            <h2 class="reveal reveal-delay-2 font-lora text-[#173121] text-[38px] md:text-[48px] font-bold leading-[1.1] mb-3">
                Menjaga Tradisi,
                <span class="block text-[#d4b254]">Merawat Budaya</span>
            </h2>
            <p class="reveal reveal-delay-3 max-w-2xl mx-auto text-[#6b736d] leading-relaxed">
                Warisan leluhur yang terus dijaga, dilestarikan, dan diwariskan untuk generasi mendatang.
            </p>
        </div>

        <div class="grid lg:grid-cols-[1fr_0.95fr] gap-12 lg:gap-16">

            <!-- TIMELINE KIRI -->
            <div class="relative">

                <div class="hidden lg:block absolute top-12 left-[36px] w-px h-full bg-[#d4b254]/30"></div>

                {{-- ITEM 01 — budaya-item delay 1 --}}
                <div class="budaya-item budaya-item-delay-1 relative flex gap-5 mb-5">
                    <div class="relative z-10 w-[72px] h-[72px] rounded-full bg-[#173121] border-[6px] border-[#F8F5F0] shadow-lg flex items-center justify-center shrink-0">
                        <span class="font-lora text-white text-[26px] font-bold">01</span>
                    </div>
                    <div class="flex-1 p-5 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.06)]">
                        <div class="flex items-start gap-5 mb-5">
                            <div class="w-14 h-14 rounded-full bg-[#d4b254]/20 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-hand-holding-droplet text-[#d4b254] text-[34px]"></i>
                            </div>
                            <div>
                                <h3 class="font-lora text-[#173121] text-[25px] font-bold leading-tight">Filosofi Penderes</h3>
                                <span class="text-sm text-[#6b736d]">Nilai kehidupan masyarakat penderes</span>
                            </div>
                        </div>
                        <blockquote class="relative font-lora pl-6 italic text-[#173121] text-[18px] leading-relaxed mb-2">
                            <span class="absolute left-0 top-0 font-lora text-[#d4b254] text-[45px] leading-none">"</span>
                            Mangan seko nira, urip seko donga.
                        </blockquote>
                        <p class="text-[#4c5550] font-lora leading-relaxed">
                            Bagi penderes Hargorojo, memanjat pohon bukan sekadar bekerja, melainkan bentuk tawakal dan harmoni antara manusia dengan pemberi rezeki.
                        </p>
                    </div>
                </div>

                {{-- ITEM 02 — budaya-item delay 2 --}}
                <div class="budaya-item budaya-item-delay-2 relative flex gap-5 mb-5">
                    <div class="relative z-10 w-[72px] h-[72px] rounded-full bg-[#173121] border-[6px] border-[#F8F5F0] shadow-lg flex items-center justify-center shrink-0">
                        <span class="font-lora text-white text-[26px] font-bold">02</span>
                    </div>
                    <div class="flex-1 p-7 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.06)] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-5 mb-5">
                            <div class="w-14 h-14 rounded-full bg-[#d4b254]/20 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-people-group text-[#d4b254] text-[30px]"></i>
                            </div>
                            <div>
                                <h3 class="font-lora text-[#173121] text-[25px] font-bold leading-tight">Tradisi Gotong Royong</h3>
                                <span class="text-sm text-[#6b736d]">Semangat kebersamaan masyarakat</span>
                            </div>
                        </div>
                        <p class="text-[#4c5550] font-lora leading-relaxed mb-4">
                            Setiap panen raya dan proses pengolahan gula kelapa melibatkan banyak tangan. Semangat kolektif ini menjaga kualitas produk sekaligus mempererat persaudaraan antar warga.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['Kerja Bersama', 'Persaudaraan', 'Tolong Menolong'] as $item)
                            <span class="px-4 py-2 rounded-full bg-[#173121]/5 text-[#173121] text-sm font-medium">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ITEM 03 — budaya-item delay 3 --}}
                <div class="budaya-item budaya-item-delay-3 relative flex gap-5">
                    <div class="relative z-10 w-[72px] h-[72px] rounded-full bg-[#173121] border-[6px] border-[#F8F5F0] shadow-lg flex items-center justify-center shrink-0">
                        <span class="font-lora text-white text-[26px] font-bold">03</span>
                    </div>
                    <div class="flex-1 p-7 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.06)] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-5 mb-5">
                            <div class="w-14 h-14 rounded-full bg-[#d4b254]/20 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-masks-theater text-[#d4b254] text-[30px]"></i>
                            </div>
                            <div>
                                <h3 class="font-lora text-[#173121] text-[25px] font-bold leading-tight">Jathilan & Angguk</h3>
                                <span class="text-sm text-[#6b736d]">Ekspresi syukur dan identitas budaya</span>
                            </div>
                        </div>
                        <p class="text-[#4c5550] font-lora leading-relaxed mb-6">
                            Kesenian tradisional menjadi wujud rasa syukur masyarakat. Irama musik, gerak tari, dan kebersamaan para penampil mencerminkan ketangguhan serta kekayaan budaya lokal.
                        </p>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="p-4 rounded-[20px] bg-[#173121]/5">
                                <h4 class="font-semibold font-lora text-[#173121] mb-2">Jathilan</h4>
                                <p class="text-sm font-lora text-[#6b736d] leading-relaxed">Tari rakyat dengan unsur kepahlawanan dan semangat.</p>
                            </div>
                            <div class="p-4 rounded-[20px] bg-[#173121]/5">
                                <h4 class="font-semibold font-lora text-[#173121] mb-2">Angguk</h4>
                                <p class="text-sm font-lora text-[#6b736d] leading-relaxed">Kesenian bernuansa religius yang sarat nilai moral.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- KOLASE KANAN -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">

                    {{-- Foto utama — kolase-hero --}}
                    <div class="kolase-hero relative col-span-2 h-[500px] rounded-[36px] overflow-hidden group">
                        <img src="{{ asset('images/assets foto/asset filosofi penderes.png') }}" alt="Penderes Hargorojo" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#173121]/95 via-[#173121]/30 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-8 lg:p-10">
                            <blockquote class="font-lora text-white/90 text-[25px] lg:text-[35px] leading-tight italic">
                                ❝Mangan seko nira, urip seko donga.❝
                            </blockquote>
                            <p class="text-white/80 leading-relaxed">Filosofi hidup masyarakat penderes Desa Hargorojo.</p>
                        </div>
                    </div>

                    {{-- Gotong Royong — kolase-item delay 1 --}}
                    <div class="kolase-item kolase-item-delay-1 relative h-[250px] rounded-[28px] overflow-hidden group">
                        <img src="{{ asset('images/assets foto/asset budaya desa gotong royong.png') }}" alt="Gotong Royong" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 p-6">
                            <h4 class="font-lora text-white/90 text-[24px] font-bold">Gotong Royong</h4>
                            <p class="text-white/75 text-sm leading-relaxed">Kekuatan masyarakat dalam menjaga tradisi.</p>
                        </div>
                    </div>

                    {{-- Jathilan — kolase-item delay 2 --}}
                    <div class="kolase-item kolase-item-delay-2 relative h-[250px] rounded-[28px] overflow-hidden group">
                        <img src="{{ asset('images/assets foto/asset wisata jathilan.png') }}" alt="Jathilan" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 p-6">
                            <h4 class="font-lora text-white/90 text-[24px] font-bold">Jathilan</h4>
                            <p class="text-white/75 text-sm leading-relaxed">Tarian rakyat yang sarat makna dan energi.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- NILAI BUDAYA — tambah nilai-grid pada wrapper --}}
        <div class="nilai-grid mt-12 grid md:grid-cols-2 xl:grid-cols-4 gap-6">

            @foreach([
                ['icon' => 'fa-hands-holding-circle', 'title' => 'Lestarikan', 'desc' => 'Menjaga warisan leluhur tetap hidup.'],
                ['icon' => 'fa-people-group', 'title' => 'Libatkan', 'desc' => 'Kekuatan kebersamaan dalam setiap tradisi.'],
                ['icon' => 'fa-heart', 'title' => 'Hargai', 'desc' => 'Menghormati proses dan nilai budaya lokal.'],
                ['icon' => 'fa-hands-holding-child', 'title' => 'Wariskan', 'desc' => 'Mewariskan nilai baik untuk generasi mendatang.'],
            ] as $index => $item)

            {{-- Tambah nilai-card + delay --}}
            <div class="nilai-card nilai-card-delay-{{ $index + 1 }} p-6 rounded-[25px] bg-white shadow-[0_8px_25px_rgba(0,0,0,0.05)] text-center hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-[#173121] flex items-center justify-center">
                    <i class="fa-solid {{ $item['icon'] }} text-[#d4b254] text-3xl"></i>
                </div>
                <h3 class="font-lora text-[#173121] text-[20px] font-bold">{{ $item['title'] }}</h3>
                <p class="text-[#6b736d] leading-relaxed">{{ $item['desc'] }}</p>
            </div>

            @endforeach

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- MENGAPA TRADISIONAL -->
<!-- ===================================================== -->
{{-- Tambah tradisi-section --}}
<section class="tradisi-section relative py-10 lg:py-12 bg-[#f8f6f1] overflow-hidden">

    <div class="max-w-[1400px] mx-auto px-4 lg:px-8">

        <!-- HEADER -->
        <div class="text-start mb-15">
            <h2 class="reveal reveal-delay-1 font-lora text-[#173121] text-[30px] md:text-[42px] font-bold leading-[1.15] mb-3">
                Mengapa Tradisional adalah
                <span class="block text-[#d4b254]">Masa Depan?</span>
            </h2>
            <p class="reveal reveal-delay-2 max-w-3xl text-[#6b736d] leading-relaxed">
                Tradisi bukan sekadar warisan masa lalu, melainkan fondasi untuk membangun kehidupan yang lebih sehat, lestari, dan berkelanjutan.
            </p>
        </div>

        <div class="grid lg:grid-cols-[1fr_0.85fr] gap-8 lg:gap-12 items-start">

            <!-- LEFT CARDS -->
            <div class="space-y-5">

                {{-- Card 1 — tradisi-card delay 1 --}}
                <div class="tradisi-card tradisi-card-delay-1 p-7 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="flex gap-5">
                        <div class="w-16 h-16 rounded-[20px] bg-[#173121]/5 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-seedling text-[#d4b254] text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-lora text-[#173121] text-[20px] font-bold mb-2">100% Organik & Alami</h3>
                            <p class="text-[#6b736d] leading-relaxed">
                                Diproduksi tanpa bahan tambahan sehingga tetap mempertahankan cita rasa autentik dan kualitas terbaik dari alam.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card 2 — tradisi-card delay 2 --}}
                <div class="tradisi-card tradisi-card-delay-2 p-7 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="flex gap-5">
                        <div class="w-16 h-16 rounded-[20px] bg-[#173121]/5 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-recycle text-[#d4b254] text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-lora text-[#173121] text-[20px] font-bold mb-2">Ramah Lingkungan</h3>
                            <p class="text-[#6b736d] leading-relaxed">
                                Memanfaatkan sumber daya lokal dengan bijaksana untuk menjaga keseimbangan alam serta keberlanjutan lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card 3 — tradisi-card delay 3 --}}
                <div class="tradisi-card tradisi-card-delay-3 p-7 rounded-[30px] bg-white shadow-[0_10px_35px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                    <div class="flex gap-5">
                        <div class="w-16 h-16 rounded-[20px] bg-[#173121]/5 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-hands-holding-child text-[#d4b254] text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-lora text-[#173121] text-[20px] font-bold mb-2">Warisan Generasi</h3>
                            <p class="text-[#6b736d] leading-relaxed">
                                Pengetahuan tradisional yang diwariskan menjadi bekal berharga untuk generasi yang akan datang.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- QUOTE PANEL — tradisi-quote-panel --}}
            <div class="tradisi-quote-panel relative overflow-hidden rounded-[35px] min-h-[400px] bg-[#173121] shadow-[0_25px_60px_rgba(0,0,0,0.15)]">
                <img
                    src="{{ asset('images/assets foto/asset quote tradisional.png') }}"
                    alt="Pohon Kelapa"
                    class="absolute inset-0 w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-b from-[#173121]/80 via-[#173121]/88 to-[#173121]/95"></div>
                <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full border border-[#d4b254]/10"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#d4b254]/5"></div>

                <div class="relative z-10 h-full flex flex-col justify-center p-10 lg:p-12">
                    <div class="text-[#d4b254] text-[80px] leading-none">❝</div>
                    <blockquote class="font-lora text-white text-[25px] lg:text-[38px] font-medium leading-[1.3] mb-3">
                        Setiap Pohon Menyimpan Masa Depan,
                        <span class="block text-[#d4b254]">Setiap Nira Menghidupkan Harapan.</span>
                    </blockquote>
                    <p class="text-[#f1ecdd] text-sm tracking-[0.2em] uppercase">Agroeduwisata Hargorojo</p>
                    <div class="mt-3 pt-3 border-t border-white/10">
                        <p class="text-white/70 leading-relaxed">
                            Tradisi mengajarkan bahwa keberlanjutan dimulai dari cara kita memperlakukan alam, menghargai proses, dan menjaga warisan untuk masa depan.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- FOOTNOTE — tradisi-footnote --}}
        <div class="tradisi-footnote mt-23 text-center">
            <p class="font-lora text-[#173121] text-[22px] lg:text-[30px] italic leading-relaxed">
                "Tradisi bukan tentang bertahan di masa lalu, tetapi tentang menjaga masa depan."
            </p>
        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- TESTIMONI PENGUNJUNG -->
<!-- ===================================================== -->
<section class="
    py-18
    lg:py-10

    bg-[#F8F6F1]
">

    <div class="
        max-w-[1400px]
        mx-auto

        px-4
        lg:px-8
    ">

        <!-- HEADER -->
        <div class="
            flex
            flex-col
            lg:flex-row

            items-center
            justify-between

            gap-5

            mb-15
        ">

            <div class="
                text-center
                lg:text-left
            ">

                <div class="
                    inline-flex
                    items-center

                    gap-3

                    mb-2
                ">

                    <div class="
                        w-16
                        h-px

                        bg-gradient-to-r
                        from-transparent
                        to-[#d4b254]
                    "></div>

                    <span class="
                        uppercase

                        tracking-[0.25em]

                        text-sm
                        font-semibold

                        text-[#d4b254]
                    ">
                        Cerita Pengunjung
                    </span>

                    <div class="
                        w-16
                        h-px

                        bg-gradient-to-l
                        from-transparent
                        to-[#d4b254]
                    "></div>

                </div>

                <h2 class="
                    font-lora

                    text-[#173121]

                    text-[30px]
                    lg:text-[42px]

                    font-bold

                    leading-[1.1]

                    mb-2
                ">

                    Kesan yang Tertinggal
                    dari Hargorojo

                </h2>

                <p class="
                    max-w-2xl

                    text-[#6B736D]

                    leading-relaxed
                ">

                    Setiap kunjungan menghadirkan
                    cerita yang berbeda. Dengarkan
                    pengalaman mereka yang telah
                    menikmati Agroeduwisata Hargorojo.

                </p>

            </div>

            <!-- BUTTON -->
            <button
                onclick="document.getElementById('modal-testimoni-public').classList.remove('hidden')"

                class="
                    inline-flex
                    items-center

                    gap-3

                    px-7
                    py-4

                    rounded-full

                    bg-[#173121]

                    text-white

                    font-semibold

                    hover:bg-[#244933]

                    transition-all
                    duration-300
                "
            >

                Bagikan Cerita Anda

                <i class="
                    fa-solid
                    fa-pen-to-square
                "></i>

            </button>

        </div>
        <div class="
    grid

    lg:grid-cols-2

    gap-8
">
@forelse($testimoni as $testi)

<div class="
    bg-[#FFFDF9]

    rounded-[35px]

    border
    border-[#ECE7DE]

    p-8

    shadow-[0_10px_35px_rgba(0,0,0,0.04)]

    hover:-translate-y-1
    hover:border-[#d4b254]/30
    hover:shadow-[0_20px_50px_rgba(0,0,0,0.06)]

    transition-all
    duration-500
">

    <div class="
        flex
        flex-col
        sm:flex-row

        gap-7
    ">

        <!-- FOTO -->
        <div class="
            flex
            justify-center
        ">

            @if($testi->foto)

                <img
                    src="{{ asset('images/testimoni/' . $testi->foto) }}"
                    alt="{{ $testi->nama }}"

                    class="
                        w-20
                        h-20

                        rounded-full

                        object-cover

                        border-4
                        border-[#F3EEE6]

                        shadow-md
                    "
                >

            @else

                <div class="
                    w-28
                    h-28

                    rounded-full

                    bg-[#EEF5EB]

                    border-4
                    border-[#F3EEE6]

                    flex
                    items-center
                    justify-center

                    text-[#173121]

                    text-4xl
                    font-bold
                ">

                    {{ strtoupper(substr($testi->nama, 0, 1)) }}

                </div>

            @endif

        </div>

        <!-- CONTENT -->
        <div class="flex-1">

            <!-- QUOTE -->
            <div class="
                text-[#d4b254]

                text-5xl

                leading-none

                
            ">
                ❝
            </div>

            <!-- TESTIMONI -->
            <p class="
                font-lora

                text-[#5F6D63]

                italic

                leading-[1.9]

                mb-4
            ">

                {{ Str::limit($testi->isi_testimoni, 250) }}

            </p>

            <!-- FOOTER -->
            <div class="
                flex
                flex-wrap

                items-center
                justify-between

                gap-3

                pt-3

                border-t
                border-[#ECE7DE]
            ">

                <div>

                    <h3 class="
                        
                        font-bold

                        text-[#173121]

                        
                    ">

                        {{ $testi->nama }}

                    </h3>

                    <p class="
                        text-sm

                        text-[#6B736D]
                    ">

                        Pengunjung Agroeduwisata

                    </p>

                </div>

                <!-- RATING -->
                <div class="
                    flex
                    items-center

                    gap-2
                ">

                    <div class="
                        text-[#d4b254]

                        tracking-[0.1em]
                    ">

                        @for($s = 1; $s <= 5; $s++)

                            {{ $s <= ($testi->rating ?: 5) ? '★' : '☆' }}

                        @endfor

                    </div>

                    <span class="
                        text-sm

                        font-medium

                        text-[#173121]
                    ">

                        {{ number_format($testi->rating ?: 5, 1) }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@empty
<div class="
    col-span-full

    text-center

    py-20
">

    <div class="
        w-24
        h-24

        mx-auto
        mb-6

        rounded-full

        bg-[#EEF5EB]

        flex
        items-center
        justify-center
    ">

        <i class="
            fa-regular
            fa-comments

            text-[#173121]

            text-4xl
        "></i>

    </div>

    <h3 class="
        font-lora

        text-[#173121]

        text-3xl

        font-bold

        mb-3
    ">

        Belum Ada Cerita

    </h3>

    <p class="
        text-[#6B736D]

        mb-8
    ">

        Jadilah pengunjung pertama yang
        membagikan pengalaman Anda.

    </p>

    <button
        onclick="document.getElementById('modal-testimoni-public').classList.remove('hidden')"

        class="
            inline-flex
            items-center

            gap-3

            px-6
            py-3

            rounded-full

            bg-[#173121]

            text-white

            font-semibold
        "
    >

        Tulis Cerita

        <i class="
            fa-solid
            fa-pen-to-square
        "></i>

    </button>
@endforelse
</div>
</div>

</div>

</section>

<!-- ===================================================== -->
<!-- FAQ -->
<!-- ===================================================== -->
<section class="
    relative
    py-15
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
                x-data="{ open: false }"
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
                            Apa itu Agroeduwisata Desa Hargorojo?
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
                    Agroeduwisata Desa Hargorojo merupakan kegiatan 
                    wisata berbasis edukasi yang mengajak pengunjung 
                    mengenal proses pembuatan gula kelapa, pertanian kelapa, 
                    budaya lokal, serta kehidupan masyarakat desa secara langsung.

                    
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
                        Apa saja kegiatan yang dapat dilakukan pengunjung?
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

                    Pengunjung dapat menyaksikan proses penyadapan nira, 
                    pengolahan gula kelapa, menjelajahi wisata alam, 
                    mempelajari pertanian kelapa, serta mengenal 
                    tradisi dan budaya masyarakat Hargorojo.

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
                       Apakah pengunjung dapat melihat proses pembuatan gula kelapa secara langsung?
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

                    Ya. Pengunjung dapat melihat tahapan pembuatan gula kelapa, 
                    mulai dari penyadapan nira hingga proses pemasakan 
                    dan pencetakan yang masih dilakukan secara tradisional.

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
                        Bagaimana cara melakukan reservasi kunjungan?
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

                    Pengunjung dapat menghubungi pengelola melalui 
                    kontak yang tersedia pada website untuk memperoleh 
                    informasi jadwal, paket wisata, dan kebutuhan kunjungan lainnya.

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



<!-- Modal Create Testimoni Public -->
<div id="modal-testimoni-public" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!-- Latar Belakang Hitam Transparan & Efek Blur -->
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity" aria-hidden="true" onclick="document.getElementById('modal-testimoni-public').classList.add('hidden')"></div>
    
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
    <!-- Kontainer Putih Form (Sudah ditambahkan relative z-10) -->
    <div class="relative z-10 inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form action="{{ route('public.testimoni.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-xl font-bold text-gray-900 mb-6 text-center border-b pb-4">Beri Kami Ulasan</h3>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" type="text" name="nama" required placeholder="Contoh: Budi Santoso">
            </div>

<!-- ===================================================== -->
<!-- JENIS ULASAN -->
<!-- ===================================================== -->
<div
    x-data="{ jenis: 'wisata' }"
    class="mb-4"
>

    <label class="
        block
        text-gray-700
        text-sm
        font-bold
        mb-3
    ">
        Jenis Ulasan
    </label>

    <div class="
        flex
        gap-5
        mb-4
    ">

        <!-- WISATA -->
        <label class="
            flex
            items-center
            gap-2
            cursor-pointer
        ">
            <input
                type="radio"
                name="jenis_ulasan"
                value="wisata"
                x-model="jenis"
                checked
            >

            <span>
                Ulasan Umum
            </span>
        </label>

        <!-- PRODUK -->
        <label class="
            flex
            items-center
            gap-2
            cursor-pointer
        ">
            <input
                type="radio"
                name="jenis_ulasan"
                value="produk"
                x-model="jenis"
            >

            <span>
                Produk Desa
            </span>
        </label>

    </div>

    <!-- DROPDOWN PRODUK -->
    <div
        x-show="jenis === 'produk'"
        x-transition
    >

        <label class="
            block
            text-gray-700
            text-sm
            font-bold
            mb-2
        ">
            Pilih Produk
        </label>

        <select
            name="produk_id"
            class="
                w-full
                px-4
                py-3

                rounded-lg

                bg-gray-50

                border
                border-gray-300

                focus:border-green-500
                focus:bg-white
                focus:outline-none

                transition
            "
        >

            <option value="">
                -- Pilih Produk --
            </option>

            @foreach($produkUnggulan as $p)

                <option value="{{ $p->id }}">
                    {{ $p->nama }}
                </option>

            @endforeach

        </select>

    </div>

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