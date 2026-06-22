@extends('layouts.master')

@section('title', 'Cerita & Fakta - Produk Gula Kelapa')

@section('content')


{{-- =========================================================== --}}
{{-- HERO SECTION                                                  --}}
{{-- =========================================================== --}}
{{-- Tambah bg-black --}}
<section class="relative isolate min-h-[620px] overflow-hidden bg-black sm:min-h-[700px]">

    {{-- Background Image --}}
    <div class="absolute inset-0">

        {{-- Tambah id + animate-kenburns + scale-110 --}}
        <img
            id="hero-produk-bg"
            src="{{ asset('images/assets foto/hero section_produk.png') }}"
            alt="Produk Gula Kelapa"
            class="w-full h-full object-cover object-center scale-100 animate-kenburns"
        >

        {{-- Dark Overlay — tambah animate-vignette --}}
        <div class="absolute inset-0 bg-black animate-vignette"></div>

        {{-- Left Gradient — tambah animate-slide-gradient --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#07150f]/40 via-[#07150f]/10 to-transparent animate-slide-gradient"></div>

        {{-- Bottom Gradient — tidak diubah --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>

    </div>

    {{-- Content Container --}}
    <div class="relative z-20 mx-auto flex min-h-[620px] max-w-7xl items-center px-4 pb-12 pt-28 sm:min-h-[700px] sm:px-6 lg:px-8">

        <div class="max-w-3xl">

            {{-- Title — stagger delay 1 & 2 --}}
            <h1 class="hero-fade-up delay-100 mb-5 font-lora text-[38px] font-bold leading-[0.98] tracking-[-0.01em] text-white sm:text-[52px] sm:leading-[0.92] lg:text-[68px] lg:leading-[0.9]">
                Manis Alami dari
                <span class="font-display block text-[#e29f10] italic hero-fade-up delay-200">
                    Jantung Desa Hargorojo
                </span>
            </h1>

            {{-- Description — stagger delay 3 --}}
            <p class="hero-fade-up delay-300 mb-6 max-w-2xl text-sm font-thin leading-[1.7] text-[#ececec] sm:mb-8 sm:text-base sm:leading-[1.6] lg:text-[18px] lg:leading-[1.5]">
                Nikmati gula kelapa organik asli Desa Hargorojo yang diolah secara
                tradisional dan higienis, menghadirkan rasa manis alami berkualitas
                langsung dari petani lokal.
            </p>

            {{-- Buttons — stagger delay 4 --}}
            <div class="hero-fade-up delay-450 flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center sm:gap-4">

                {{-- Primary Button --}}
                
                <a href="{{ route('ecommerce') }}"
                    class="group inline-flex w-full items-center justify-between gap-4 rounded-full bg-[#173121] px-5 py-3 text-sm text-white sm:w-auto sm:justify-center sm:px-8 sm:text-base
                           shadow-[0_15px_40px_rgba(0,0,0,0.30)] hover:bg-[#214a36] hover:-translate-y-1
                           transition-all duration-500"
                >
                    <span class="font-medium">Belanja Sekarang</span>
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#d8b15a]
                                group-hover:rotate-[-12deg] transition-all duration-500">
                        <i class="fa-solid fa-cart-shopping text-[#173121] text-sm"></i>
                    </div>
                </a>

                {{-- Secondary Button --}}
                
                    <a href="#produk-unggulan"
                    class="group inline-flex w-full items-center justify-between gap-4 rounded-full bg-white/12 px-5 py-3 text-sm sm:w-auto sm:justify-center sm:px-8 sm:text-base
                           backdrop-blur-xl text-white hover:bg-white/20 hover:-translate-y-1
                           transition-all duration-500"
                >
                    <span class="font-medium">Jelajahi Produk</span>
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10
                                group-hover:translate-x-1 transition-all duration-500">
                        <i class="fa-solid fa-arrow-right text-[#d8b15a] text-sm"></i>
                    </div>
                </a>

            </div>

        </div>

    </div>

</section>


    {{-- =========================================================== --}}
    {{-- PRODUK UNGGULAN                                               --}}
    {{-- =========================================================== --}}
    <section id="produk-unggulan" class="relative overflow-hidden bg-[#f8f6f1] py-14 sm:py-16 lg:py-20">

    <div class="absolute left-[-120px] top-[10%] w-[320px] h-[320px] rounded-full bg-[#173121]/10 blur-[120px]"></div>
    <div class="absolute right-[-100px] bottom-[0%] w-[300px] h-[300px] rounded-full bg-[#c8ab6d]/10 blur-[120px]"></div>

    <div class="relative z-10 mx-auto max-w-[1500px] px-4 sm:px-6 lg:px-12">
        <div class="relative z-10 mx-auto max-w-[1400px] px-0 lg:px-10">

            {{-- Section Header --}}
            <div class="text-center mb-10">

                <div class="reveal reveal-delay-1 mb-2 flex items-center justify-center gap-3">
                    <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                    <span class="uppercase tracking-[0.2em] text-[14px] font-semibold text-[#b89b5e]">
                        Produk Kami
                    </span>
                    <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
                </div>

                <h2 class="reveal reveal-delay-2 mb-3 font-display text-[32px] leading-[0.98] tracking-[-0.02em] text-[#183322] drop-shadow-md sm:text-[38px] md:text-[58px] lg:text-[55px] lg:leading-[0.95]">
                    Produk Unggulan Kami
                </h2>

                <p class="reveal reveal-delay-3 mx-auto max-w-3xl text-sm font-thin leading-[1.6] text-gray-600 sm:text-base md:text-[18px] md:leading-[1.35]">
                    Produk alami berkualitas premium yang diolah secara tradisional oleh masyarakat lokal
                    untuk menghadirkan pengalaman rasa yang autentik dan berkesan.
                </p>

            </div>

            {{-- Product Loop --}}
            @foreach ($produkUnggulan as $index => $produk)

            {{-- Tambah produk-row --}}
            <div class="produk-row mx-auto mt-12 grid items-start gap-8 sm:mt-16 sm:gap-10 lg:mt-20 lg:grid-cols-[1fr_1fr] lg:gap-12 xl:gap-16">

                {{-- PRODUCT CONTENT --}}
                {{-- Ganjil: content dari kanan | Genap: content dari kiri --}}
                <div class="
                    {{ $index % 2 == 1 ? 'produk-content-left lg:order-1' : 'produk-content-right lg:order-2' }}
                    order-2 min-w-0
                ">

                    {{-- Organic Badge — tambah badge-organic --}}
                    <div class="badge-organic inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#173121]/5 mb-4">
                        <div class="w-2 h-2 rounded-full bg-[#b89b5e]"></div>
                        <span class="text-[#173121] text-xs font-semibold tracking-[0.15em] uppercase">
                            100% Organik
                        </span>
                    </div>

                    {{-- Product Title --}}
                    <h1 class="mb-1 font-lora text-[30px] font-bold leading-[1.05] tracking-[-0.02em] text-[#173121] sm:text-[36px] lg:text-[40px]">
                        {{ $produk->nama }}
                    </h1>

                    {{-- Tabs --}}
<div
    x-data="{
        tab: 'description',
        prevTab: null,
        switchTab(newTab) {
            if (newTab === this.tab) return
            this.prevTab = this.tab
            this.tab = newTab
        }
    }"
    class="mb-5 max-w-full"
>

    <div class="mb-4 flex items-center overflow-x-auto border-b border-[#e7e0d2]">
        <button
            @click="switchTab('description')"
            :class="tab === 'description' ? 'text-[#173121] border-[#b89b5e]' : 'text-[#7d847e] border-transparent'"
            class="mr-6 shrink-0 border-b-2 px-1 py-3 text-[15px] font-semibold transition-all duration-300 sm:mr-8 sm:px-2 sm:py-4 sm:text-[16px]"
        >
            Deskripsi
        </button>
        <button
            @click="switchTab('reviews')"
            :class="tab === 'reviews' ? 'text-[#173121] border-[#b89b5e]' : 'text-[#7d847e] border-transparent'"
            class="shrink-0 border-b-2 px-1 py-3 text-[15px] font-medium transition-all duration-300 sm:px-2 sm:py-4 sm:text-[17px]"
        >
            Reviews
        </button>
    </div>

    {{-- Wrapper --}}
<div class="tab-content-wrapper overflow-hidden">

    {{-- Description Tab --}}
    <div
        x-show="tab === 'description'"
        x-cloak
        :class="tab === 'description'
            ? (prevTab === 'reviews' ? 'tab-slide-enter-left' : '')
            : ''"
    >
        {{-- Tambah wrapper scroll pada deskripsi --}}
        <div class="max-h-[260px] overflow-y-auto pr-2 scrollbar-thin sm:max-h-[285px]">

            <p class="mb-4 font-lora text-[15px] font-light leading-[1.75] text-[#373d38] sm:text-[18px] sm:leading-[1.7]">
                {{ $produk->deskripsi }}
            </p>

            <div class="space-y-2">
                @foreach (explode('|', $produk->manfaat) as $manfaat)
                <div class="benefit-item flex items-start gap-3 sm:gap-4">
                    <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-[#173121] sm:h-7 sm:w-7">
                        <i class="fa-solid fa-check text-[11px] text-white sm:text-[13px]"></i>
                    </div>
                    <span class="font-lora text-[15px] leading-[1.7] text-[#4f5a53] sm:text-[17px] sm:leading-[1.8]">
                        {{ trim($manfaat) }}
                    </span>
                </div>
                @endforeach
            </div>

        </div>
    </div>

        {{-- Reviews Tab --}}
<div
    x-show="tab === 'reviews'"
    x-cloak
    :class="tab === 'reviews'
        ? (prevTab === 'description' ? 'tab-slide-enter-right' : '')
        : ''"
>
    {{-- Tambah max-h dan overflow-y-auto pada wrapper ini --}}
    <div class="max-h-[260px] space-y-4 overflow-y-auto pr-1 scrollbar-thin sm:max-h-[285px]">

        @forelse ($produk->testimoni as $testimoni)
        <div class="rounded-[20px] border border-[#ebe3d4] bg-white/70 p-4 shadow-[0_10px_30px_rgba(0,0,0,0.04)] sm:rounded-[24px] sm:p-6">
            <div class="mb-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-2">
                    <div class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-[#173121] font-semibold text-white sm:h-12 sm:w-12">
                        @if ($testimoni->foto)
                            <img src="{{ $testimoni->foto_url }}" alt="{{ $testimoni->nama }}" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($testimoni->nama, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <h4 class="font-semibold text-[#173121]">{{ $testimoni->nama }}</h4>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-sm text-[#d8b15a] sm:text-base">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa-star {{ $i <= $testimoni->rating ? 'fa-solid' : 'fa-regular' }}"></i>
                    @endfor
                </div>
            </div>
            <p class="text-sm leading-[1.6] text-[#5d675f] sm:text-base sm:leading-[1.5]">{{ $testimoni->isi_testimoni }}</p>
        </div>
        @empty
        <div class="text-center py-10 text-[#7d847e]">Belum ada testimoni untuk produk ini.</div>
        @endforelse

    </div>
</div>

    </div>

</div>

{{-- CTA Button --}}
<div class="mt-5 flex items-center gap-5">
    
        <a href="{{ route('ecommerce') }}"
        class="group inline-flex w-full items-center justify-between gap-4 rounded-full bg-[#173121] px-5 py-3 text-sm text-white shadow-[0_15px_40px_rgba(23,49,33,0.18)] transition-colors duration-300 hover:bg-[#214734] sm:w-auto sm:justify-center sm:px-6 sm:py-2 sm:text-base"
        style="will-change: transform; transition: background-color 0.3s ease, transform 0.3s ease;"
        onmouseenter="this.style.transform='translateY(-2px)'"
        onmouseleave="this.style.transform='translateY(0)'"
    >
        <span class="font-medium">Beli Sekarang Juga</span>
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#d8b15a] transition-transform duration-300 group-hover:translate-x-1">
            <i class="fa-solid fa-arrow-right text-[#173121] text-md"></i>
        </div>
    </a>
</div>

                </div>

                {{-- PRODUCT IMAGE --}}
                <div class="produk-img-reveal group relative order-1 w-full {{ $index % 2 == 1 ? 'lg:order-2' : 'lg:order-1' }}">

                    {{-- Glow Effect — tambah produk-glow --}}
                    <div class="produk-glow absolute inset-0 scale-90 rounded-[24px] bg-[#173121]/10 blur-[34px] sm:rounded-[36px] sm:blur-[40px]"></div>

                    {{-- Image Wrapper --}}
                    <div class="relative overflow-hidden rounded-[22px] shadow-[0_24px_60px_rgba(0,0,0,0.12)] sm:rounded-[30px] lg:shadow-[0_30px_80px_rgba(0,0,0,0.12)]">
                        <img
                            src="{{ $produk->gambar_url }}"
                            alt="{{ $produk->nama }}"
                            class="aspect-[4/3] w-full object-cover transition-transform duration-700 group-hover:scale-105 sm:aspect-[16/11] lg:h-[520px] lg:aspect-auto"
                            onerror="this.src='{{ asset('images/produk/1776927244.jpg') }}'"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>

                </div>

            </div>

            @endforeach

        </div>
    </div>

</section>


    {{-- =========================================================== --}}
    {{-- KEUNGGULAN PRODUK (WHY CHOOSE US)                             --}}
    {{-- =========================================================== --}}
    <section class="relative overflow-hidden bg-[#f8f6f1] py-12 sm:py-14 lg:py-16">

    <div class="absolute top-[-120px] left-[-100px] w-[320px] h-[320px] rounded-full bg-[#173121]/10 blur-[120px]"></div>
    <div class="absolute bottom-[-120px] right-[-100px] w-[320px] h-[320px] rounded-full bg-[#d4ae61]/10 blur-[120px]"></div>

    <div class="relative z-10 mx-auto max-w-[1350px] px-4 sm:px-6 lg:px-10">

        {{-- Section Header --}}
        <div class="mx-auto mb-10 max-w-4xl text-center">

            <div class="reveal reveal-delay-1 flex items-center justify-center gap-3 mb-2">
                <div class="line-expand h-[2px] bg-[#d4ae61] rounded-full"></div>
                <span class="uppercase tracking-[0.2em] text-[14px] font-semibold text-[#b89b5e]">
                    Keunggulan Produk
                </span>
                <div class="line-expand h-[2px] bg-[#d4ae61] rounded-full"></div>
            </div>

            <h2 class="reveal reveal-delay-2 mb-4 font-lora text-[28px] font-bold leading-[1.08] tracking-[-0.02em] text-[#173121] md:text-[32px] lg:text-[42px] lg:leading-[1.05]">
                Mengapa Harus Memilih Produk Kami?
            </h2>

            <p class="reveal reveal-delay-3 text-sm font-light leading-[1.7] text-[#5b665f] sm:text-base lg:text-[18px]">
                Setiap butir gula yang kami hasilkan merupakan bentuk komitmen masyarakat
                Desa Hargorojo terhadap kualitas, kesehatan, dan keberlanjutan lokal.
            </p>

        </div>

        {{-- Benefits Grid --}}
        <div class="mt-2 mb-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-6">

            @php
                $cardClass = 'keunggulan-card group relative bg-white/80 backdrop-blur-xl rounded-[24px] sm:rounded-[28px] border border-white
                              p-6 sm:p-8 text-center shadow-[0_20px_60px_rgba(0,0,0,0.05)]
                              hover:-translate-y-3 hover:shadow-[0_30px_80px_rgba(0,0,0,0.08)]
                              transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]';
                $iconWrapClass = 'icon-pop w-20 h-20 mx-auto mb-6 rounded-full border border-[#d8cfbb] bg-[#fdfbf7]
                                  flex items-center justify-center group-hover:scale-110 transition-all duration-500';
                $titleClass = 'font-lora font-bold text-[20px] text-[#173121] mb-3';
                $dividerClass = 'divider-grow h-[2px] rounded-full mx-auto bg-gradient-to-r from-[#d4ae61] to-transparent mb-3';
                $textClass = 'text-[#89918c] leading-[1.7] text-[16px] font-thin font-lora';
            @endphp

            {{-- Card 1 --}}
            <div class="{{ $cardClass }} keunggulan-card-delay-1">
                <div class="{{ $iconWrapClass }}">
                    <i class="fa-solid fa-seedling text-[#173121] text-2xl"></i>
                </div>
                <h3 class="{{ $titleClass }}">100% Organik</h3>
                <div class="{{ $dividerClass }}"></div>
                <p class="{{ $textClass }}">
                    Diproduksi tanpa bahan kimia dan pengawet untuk menjaga kualitas alami.
                </p>
            </div>

            {{-- Card 2 --}}
            <div class="{{ $cardClass }} keunggulan-card-delay-2">
                <div class="{{ $iconWrapClass }}">
                    <i class="fa-solid fa-user-group text-[#173121] text-2xl"></i>
                </div>
                <h3 class="{{ $titleClass }}">Pemberdayaan Petani</h3>
                <div class="{{ $dividerClass }}"></div>
                <p class="{{ $textClass }}">
                    Mendukung kesejahteraan petani nira Desa Hargorojo secara berkelanjutan.
                </p>
            </div>

            {{-- Card 3 --}}
            <div class="{{ $cardClass }} keunggulan-card-delay-3">
                <div class="{{ $iconWrapClass }}">
                    <i class="fa-solid fa-shield-heart text-[#173121] text-2xl"></i>
                </div>
                <h3 class="{{ $titleClass }}">Rasa Autentik</h3>
                <div class="{{ $dividerClass }}"></div>
                <p class="{{ $textClass }}">
                    Diproses higienis dengan metode tradisional untuk menghasilkan cita rasa autentik.
                </p>
            </div>

            {{-- Card 4 --}}
            <div class="{{ $cardClass }} keunggulan-card-delay-4">
                <div class="{{ $iconWrapClass }}">
                    <i class="fa-solid fa-heart-pulse text-[#173121] text-2xl"></i>
                </div>
                <h3 class="{{ $titleClass }}">Sehat & Bergizi</h3>
                <div class="{{ $dividerClass }}"></div>
                <p class="{{ $textClass }}">
                    Kaya mineral alami yang baik untuk kebutuhan konsumsi keluarga.
                </p>
            </div>

        </div>

    </div>

</section>

@endsection
