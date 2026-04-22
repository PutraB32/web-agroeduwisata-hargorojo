@extends('layouts.master')

@section('title', 'Cerita & Fakta - Produk Gula Kelapa')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-4 py-24 text-center relative">
    <div class="absolute inset-0 bg-gradient-to-b from-green-50 to-white -z-10 rounded-b-3xl"></div>
    <div class="max-w-3xl mx-auto">
        <h1 class="font-playfair text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
            Manis Alami dari <br><span class="text-green-800 italic">Jantung Desa Hargorojo</span>
        </h1>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed font-medium">
            Nikmati gula kelapa organik asli Desa Hargorojo yang diolah secara tradisional dan higienis,
            menghadirkan rasa manis alami berkualitas langsung dari petani lokal.
        </p>
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