@extends('layouts.master')

@section('title', 'Cerita & Fakta - Produk Gula Kelapa')

@section('content')

    {{-- =========================================================== --}}
    {{-- NAVBAR                                                        --}}
    {{-- =========================================================== --}}
    @include('layouts.navbar')


    {{-- =========================================================== --}}
    {{-- HERO SECTION                                                  --}}
    {{-- =========================================================== --}}
    <section class="relative h-[700px] isolate overflow-hidden">

        {{-- Background Image --}}
        <div class="absolute inset-0">

            <img
                src="{{ asset('images/assets foto/hero section_produk.png') }}"
                alt="Produk Gula Kelapa"
                class="w-full h-full object-cover"
            >

            {{-- Dark Overlay --}}
            <div class="absolute inset-0 bg-black/45"></div>

            {{-- Left Gradient --}}
            <div class="absolute inset-0 bg-gradient-to-r from-[#07150f]/40 via-[#07150f]/10 to-transparent"></div>

            {{-- Bottom Gradient --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>

        </div>

        {{-- Content Container --}}
        <div class="relative z-20 max-w-7xl mx-auto px-8 lg:px-4 min-h-screen flex items-start pt-55">

            <div class="max-w-3xl">

                {{-- Title --}}
                <h1 class="font-lora text-[68px] leading-[0.9] tracking-[-0.04em] font-bold text-white mb-5">
                    Manis Alami dari
                    <span class="font-display block text-[#e29f10] italic">
                        Jantung Desa Hargorojo
                    </span>
                </h1>

                {{-- Description --}}
                <p class="max-w-2xl text-[#ececec] text-[18px] leading-[1.5] font-thin mb-8">
                    Nikmati gula kelapa organik asli Desa Hargorojo yang diolah secara
                    tradisional dan higienis, menghadirkan rasa manis alami berkualitas
                    langsung dari petani lokal.
                </p>

                {{-- Buttons --}}
                <div class="flex items-center gap-4">

                    {{-- Primary Button --}}
                    <a
                        href="{{ route('ecommerce') }}"
                        class="group inline-flex items-center gap-4 px-8 py-3 rounded-full bg-[#173121] text-white
                               shadow-[0_15px_40px_rgba(0,0,0,0.30)] hover:bg-[#214a36] hover:-translate-y-1
                               transition-all duration-500"
                    >
                        <span class="font-medium">Belanja Sekarang</span>
                        <div class="w-9 h-9 rounded-full bg-[#d8b15a] flex items-center justify-center
                                    group-hover:rotate-[-12deg] transition-all duration-500">
                            <i class="fa-solid fa-cart-shopping text-[#173121] text-sm"></i>
                        </div>
                    </a>

                    {{-- Secondary Button --}}
                    <a
                        href="##"
                        class="group inline-flex items-center gap-4 px-8 py-3 rounded-full bg-white/12
                               backdrop-blur-xl text-white hover:bg-white/20 hover:-translate-y-1
                               transition-all duration-500"
                    >
                        <span class="font-medium">Jelajahi Produk</span>
                        <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center
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
    <section class="relative py-20 overflow-hidden bg-[#f8f6f1]">

        {{-- Background Effects --}}
        <div class="absolute left-[-120px] top-[10%] w-[320px] h-[320px] rounded-full bg-[#173121]/10 blur-[120px]"></div>
        <div class="absolute right-[-100px] bottom-[0%] w-[300px] h-[300px] rounded-full bg-[#c8ab6d]/10 blur-[120px]"></div>

        {{-- Container --}}
        <div class="relative z-10 max-w-[1500px] mx-auto px-6 lg:px-12">
            <div class="relative z-10 max-w-[1400px] mx-auto px-6 lg:px-10">

                {{-- Section Header --}}
                <div class="text-center mb-10">

                    {{-- Small Label --}}
                    <div class="flex items-center justify-center gap-3 mb-2">
                        <div class="w-14 h-[2px] bg-yellow-500 rounded-full"></div>
                        <span class="uppercase tracking-[0.2em] text-[14px] font-semibold text-[#b89b5e]">
                            Produk Kami
                        </span>
                        <div class="w-14 h-[2px] bg-yellow-500 rounded-full"></div>
                    </div>

                    {{-- Title --}}
                    <h2 class="font-display text-[38px] md:text-[58px] lg:text-[55px] leading-[0.95]
                                tracking-[-0.03em] text-[#183322] mb-3 drop-shadow-md">
                        Produk Unggulan Kami
                    </h2>

                    {{-- Description --}}
                    <p class="max-w-3xl mx-auto text-gray-600 text-base md:text-[18px] leading-[1.2] font-thin">
                        Produk alami berkualitas premium yang diolah secara tradisional oleh masyarakat lokal
                        untuk menghadirkan pengalaman rasa yang autentik dan berkesan.
                    </p>

                </div>

                {{-- Product Loop --}}
                @foreach ($produkUnggulan as $index => $produk)

                    <div class="mt-20 lg:w-7xl mx-auto grid lg:grid-cols-[1fr_1fr] gap-13 items-start">

                        {{-- ======================================================= --}}
                        {{-- PRODUCT CONTENT                                          --}}
                        {{-- ======================================================= --}}
                        <div class="order-2 {{ $index % 2 == 1 ? 'lg:order-1' : 'lg:order-2' }}">

                            {{-- Organic Badge --}}
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#173121]/5 mb-4">
                                <div class="w-2 h-2 rounded-full bg-[#b89b5e]"></div>
                                <span class="text-[#173121] text-xs font-semibold tracking-[0.15em] uppercase">
                                    100% Organik
                                </span>
                            </div>

                            {{-- Product Title --}}
                            <h1 class="font-lora text-[#173121] text-[40px] md:text-[35px] leading-[1.05]
                                        tracking-[-0.03em] font-bold mb-1">
                                {{ $produk->nama }}
                            </h1>

                            {{-- Tabs --}}
                            <div x-data="{ tab: 'description' }" class="mb-5">

                                {{-- Tab Navigation --}}
                                <div class="flex items-center border-b border-[#e7e0d2] mb-4">

                                    <button
                                        @click="tab = 'description'"
                                        :class="tab === 'description'
                                            ? 'text-[#173121] border-[#b89b5e]'
                                            : 'text-[#7d847e] border-transparent'"
                                        class="px-2 py-4 mr-8 border-b-2 font-semibold text-[16px] transition-all duration-300"
                                    >
                                        Deskripsi
                                    </button>

                                    <button
                                        @click="tab = 'reviews'"
                                        :class="tab === 'reviews'
                                            ? 'text-[#173121] border-[#b89b5e]'
                                            : 'text-[#7d847e] border-transparent'"
                                        class="px-2 py-4 border-b-2 font-medium text-[17px] transition-all duration-300"
                                    >
                                        Reviews
                                    </button>

                                </div>

                                {{-- Description Tab --}}
                                <div x-show="tab === 'description'" x-transition>

                                    <p class="font-lora text-[#373d38] text-[18px] leading-[1.7] font-light mb-4">
                                        {{ $produk->deskripsi }}
                                    </p>

                                    {{-- Benefits List --}}
                                    <div class="space-y-2">
                                        @foreach (explode('|', $produk->manfaat) as $manfaat)
                                            <div class="flex items-start gap-4">

                                                <div class="w-7 h-7 rounded-full bg-[#173121] flex items-center
                                                            justify-center flex-shrink-0">
                                                    <i class="fa-solid fa-check text-white text-[13px]"></i>
                                                </div>

                                                <span class="text-[#4f5a53] font-lora text-[17px] leading-[1.8]">
                                                    {{ trim($manfaat) }}
                                                </span>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                {{-- Reviews Tab --}}
                                <div x-show="tab === 'reviews'" x-transition>
                                    <div class="space-y-4">

                                        @forelse ($produk->testimoni as $testimoni)

                                            <div class="bg-white/70 border border-[#ebe3d4] rounded-[24px] p-6
                                                        shadow-[0_10px_30px_rgba(0,0,0,0.04)]">

                                                {{-- Review Header --}}
                                                <div class="flex items-center justify-between mb-3">

                                                    {{-- User Info --}}
                                                    <div class="flex items-center gap-4">

                                                        {{-- Avatar --}}
                                                        <div class="w-12 h-12 rounded-full overflow-hidden bg-[#173121]
                                                                    flex items-center justify-center text-white font-semibold">
                                                            @if ($testimoni->foto)
                                                                <img
                                                                    src="{{ asset('images/testimoni/' . $testimoni->foto) }}"
                                                                    alt="{{ $testimoni->nama }}"
                                                                    class="w-full h-full object-cover"
                                                                >
                                                            @else
                                                                {{ strtoupper(substr($testimoni->nama, 0, 1)) }}
                                                            @endif
                                                        </div>

                                                        {{-- Name --}}
                                                        <div>
                                                            <h4 class="font-semibold text-[#173121]">
                                                                {{ $testimoni->nama }}
                                                            </h4>
                                                        </div>

                                                    </div>

                                                    {{-- Star Rating --}}
                                                    <div class="flex items-center gap-1 text-[#d8b15a]">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fa-star {{ $i <= $testimoni->rating ? 'fa-solid' : 'fa-regular' }}"></i>
                                                        @endfor
                                                    </div>

                                                </div>

                                                {{-- Review Comment --}}
                                                <p class="text-[#5d675f] leading-[1.9]">
                                                    {{ $testimoni->isi_testimoni }}
                                                </p>

                                            </div>

                                        @empty
                                            <div class="text-center py-10 text-[#7d847e]">
                                                Belum ada testimoni untuk produk ini.
                                            </div>
                                        @endforelse

                                    </div>
                                </div>

                            </div>

                            {{-- CTA Button --}}
                            <div class="flex items-center gap-5">
                                <a
                                    href="#"
                                    class="group inline-flex items-center gap-4 px-6 py-2 rounded-full bg-[#173121]
                                           text-white shadow-[0_15px_40px_rgba(23,49,33,0.18)] hover:bg-[#214734]
                                           hover:-translate-y-1 transition-all duration-500"
                                >
                                    <span class="font-medium">Beli Sekarang Juga</span>
                                    <div class="w-8 h-8 rounded-full bg-[#d8b15a] flex items-center justify-center
                                                group-hover:translate-x-1 transition-all duration-300">
                                        <i class="fa-solid fa-arrow-right text-[#173121] text-md"></i>
                                    </div>
                                </a>
                            </div>

                        </div>

                        {{-- ======================================================= --}}
                        {{-- PRODUCT IMAGE                                             --}}
                        {{-- ======================================================= --}}
                        <div class="relative group order-1">

                            {{-- Glow Effect --}}
                            <div class="absolute inset-0 rounded-[36px] bg-[#173121]/10 blur-[40px] scale-90"></div>

                            {{-- Image Wrapper --}}
                            <div class="relative overflow-hidden rounded-[30px] shadow-[0_30px_80px_rgba(0,0,0,0.12)]">

                                <img
                                    src="{{ asset('images/produk/1776927244.jpg') }}"
                                    alt="Produk Gula Kelapa"
                                    class="w-[800px] h-full lg:h-[520px] object-cover group-hover:scale-105
                                           transition-transform duration-700"
                                >

                                {{-- Image Overlay --}}
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
    <section class="relative overflow-hidden py-13 bg-[#f8f6f1]">

        {{-- Background Effects --}}
        <div class="absolute top-[-120px] left-[-100px] w-[320px] h-[320px] rounded-full bg-[#173121]/10 blur-[120px]"></div>
        <div class="absolute bottom-[-120px] right-[-100px] w-[320px] h-[320px] rounded-full bg-[#d4ae61]/10 blur-[120px]"></div>

        {{-- Container --}}
        <div class="relative z-10 max-w-[1350px] mx-auto px-6 lg:px-10">

            {{-- Section Header --}}
            <div class="text-center max-w-4xl mx-auto mb-10">

                {{-- Small Label --}}
                <div class="flex items-center justify-center gap-3 mb-2">
                    <div class="w-16 h-[2px] bg-[#d4ae61] rounded-full"></div>
                    <span class="uppercase tracking-[0.2em] text-[14px] font-semibold text-[#b89b5e]">
                        Keunggulan Produk
                    </span>
                    <div class="w-16 h-[2px] bg-[#d4ae61] rounded-full"></div>
                </div>

                {{-- Title --}}
                <h2 class="font-lora text-[24px] md:text-[32px] lg:text-[42px] leading-[1.05]
                            tracking-[-0.03em] font-bold text-[#173121] mb-4">
                    Mengapa Harus Memilih Produk Kami?
                </h2>

                {{-- Subtitle --}}
                <p class="text-[#5b665f] text-[18px] leading-[1.7] font-light">
                    Setiap butir gula yang kami hasilkan merupakan bentuk komitmen masyarakat
                    Desa Hargorojo terhadap kualitas, kesehatan, dan keberlanjutan lokal.
                </p>

            </div>

            {{-- Benefits Grid --}}
            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-5 mt-2">

                {{-- Card Base Classes (repeated) --}}
                @php
                    $cardClass = 'group relative bg-white/80 backdrop-blur-xl rounded-[28px] border border-white
                                  p-8 text-center shadow-[0_20px_60px_rgba(0,0,0,0.05)]
                                  hover:-translate-y-3 hover:shadow-[0_30px_80px_rgba(0,0,0,0.08)]
                                  transition-all duration-500';
                    $iconWrapClass = 'w-20 h-20 mx-auto mb-6 rounded-full border border-[#d8cfbb] bg-[#fdfbf7]
                                      flex items-center justify-center group-hover:scale-110 transition-all duration-500';
                    $titleClass = 'font-lora font-bold text-[20px] text-[#173121] mb-3';
                    $dividerClass = 'w-30 h-[2px] rounded-full mx-auto bg-gradient-to-r from-[#d4ae61] to-transparent mb-3';
                    $textClass = 'text-[#89918c] leading-[1.7] text-[16px] font-thin font-lora';
                @endphp

                {{-- Card: 100% Organik --}}
                <div class="{{ $cardClass }}">
                    <div class="{{ $iconWrapClass }}">
                        <i class="fa-solid fa-seedling text-[#173121] text-2xl"></i>
                    </div>
                    <h3 class="{{ $titleClass }}">100% Organik</h3>
                    <div class="{{ $dividerClass }}"></div>
                    <p class="{{ $textClass }}">
                        Diproduksi tanpa bahan kimia dan pengawet untuk menjaga kualitas alami.
                    </p>
                </div>

                {{-- Card: Pemberdayaan Petani --}}
                <div class="{{ $cardClass }}">
                    <div class="{{ $iconWrapClass }}">
                        <i class="fa-solid fa-user-group text-[#173121] text-2xl"></i>
                    </div>
                    <h3 class="{{ $titleClass }}">Pemberdayaan Petani</h3>
                    <div class="{{ $dividerClass }}"></div>
                    <p class="{{ $textClass }}">
                        Mendukung kesejahteraan petani nira Desa Hargorojo secara berkelanjutan.
                    </p>
                </div>

                {{-- Card: Rasa Autentik --}}
                <div class="{{ $cardClass }}">
                    <div class="{{ $iconWrapClass }}">
                        <i class="fa-solid fa-shield-heart text-[#173121] text-2xl"></i>
                    </div>
                    <h3 class="{{ $titleClass }}">Rasa Autentik</h3>
                    <div class="{{ $dividerClass }}"></div>
                    <p class="{{ $textClass }}">
                        Diproses higienis dengan metode tradisional untuk menghasilkan cita rasa autentik.
                    </p>
                </div>

                {{-- Card: Sehat & Bergizi --}}
                <div class="{{ $cardClass }}">
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