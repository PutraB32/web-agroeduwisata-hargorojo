@extends('layouts.master')

@section('title', 'Beranda - Desa Hargorojo')

@section('content')

<!-- 1. HERO SECTION -->
<section class="w-full h-[620px] relative bg-green-50 overflow-hidden">
    <!-- Full Background Image with Sharp Visibility -->
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ asset('images/assets foto/hero section.png') }}" class="w-full h-full object-cover object-center opacity-100">
        <!-- Gradient Overlay: solid green-50 on left for text readability, completely transparent on right for full image clarity -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-100 via-green-20/80 to-transparent"></div>
    </div>

    <!-- Content Container -->
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full pt-20 pb-16 md:pt-32 md:pb-24 flex flex-col md:flex-row justify-between items-end gap-12 md:gap-8">
        
        <!-- Top Left Text -->
        <div class="max-w-4xl w-full">
            <h1 class="text-4xl md:text-10xl lg:text-6xl font-black leading-none mb-7 text-gray-900 uppercase tracking-tight">
                Desa Agroeduwisata <br> 
                <span class="text-green-800">Gula Kelapa <br class="hidden md:block">Hargorojo</span>
            </h1>
            
            <p class="text-base md:text-lg text-gray-600 mb-8 font-medium leading-relaxed max-w-3xl border-l-4 border-yellow-500 pl-4">
                Menawarkan edukasi unik dan pengalaman natural wisata gula kelapa, didukung sistem monitoring terpadu desa pariwisata Hargorojo yang menghadirkan informasi real-time, pengelolaan destinasi yang lebih efektif, serta peningkatan kenyamanan dan kualitas layanan bagi wisatawan. 
            </p>

            <div class="flex gap-2.5 flex-wrap">
                <span class="border-2 border-yellow-500 text-yellow-700 bg-white/20 backdrop-blur-sm text-[11px] px-5 py-2 rounded-full font-bold uppercase tracking-wider shadow-sm">
                    Budaya & Tradisi
                </span>
                <span class="border-2 border-green-500 text-green-800 bg-white/20 backdrop-blur-sm text-[11px] px-5 py-2 rounded-full font-bold uppercase tracking-wider shadow-sm">
                    Agroeduwisata
                </span>
                <span class="border-2 border-green-500 text-green-800 bg-white/20 backdrop-blur-sm text-[11px] px-5 py-2 rounded-full font-bold uppercase tracking-wider shadow-sm">
                    Produk Gula Kelapa
                </span>
            </div>
        </div>

        <!-- Bottom Right Buttons -->
        <div class="absolute bottom-9 right-6 flex flex-col sm:flex-row gap-4 z-20">
            <a href="{{ route('profil') }}" class="flex items-center justify-center gap-3 bg-gray-200 hover:bg-yellow-500 font-bold text-green-900 text-xs md:text-sm px-6 py-2 md:py-3 rounded-full transition-all shadow-md hover:shadow-xl">
                Lihat Profil Desa
                <span class="w-5 h-5 bg-black text-white rounded-full flex items-center justify-center text-[10px]">➤</span>
            </a>
            <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-3 bg-green-500 border-green-200 font-bold text-gray-900 text-xs md:text-sm px-6 py-2 md:py-3 rounded-full hover:bg-yellow-500 hover:text-white hover:border-green-800 transition-all shadow-md hover:shadow-xl group">
                Hubungi Kami
                <span class="w-5 h-5 bg-black text-white rounded-full flex items-center justify-center text-[10px] group-hover:bg-white group-hover:text-black transition-colors">➤</span>
            </a>
        </div>

    </div>
</section>


<!-- 2. POTENSI AGROEDUWISATA KAMI -->
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-16">
        <h2 class="font-poppins text-3xl md:text-[35px] tracking-tight font-bold text-gray-900 tracking-normal">
            POTENSI AGROEDUWISATA KAMI
        </h2>
        <br>
        <p class="text-sm md:text-base text-gray-700 leading-loose">
        Desa Hargorojo menghadirkan potensi agroeduwisata yang memadukan kekayaan alam, proses produksi gula kelapa tradisional, edukasi pertanian, serta budaya lokal yang tetap lestari. Setiap pengalaman dirancang untuk memberi nilai belajar, rekreasi, dan kedekatan dengan kehidupan desa.
    </p>
    </div>

    <div class="space-y-16 md:space-y-20">
        @foreach($agroeduwisata as $index => $agro)
        <div class="flex flex-col {{ $index % 2 == 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-8 md:gap-12 items-center">
            <div class="w-full md:w-5/12 aspect-[4/3] rounded-[2rem] overflow-hidden bg-gray-200 shadow-xl group border-4 border-yellow-500/30">
                <img src="{{ $agro->gambar ? asset('images/agroeduwisata/' . $agro->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $agro->judul }}">
            </div>
            <div class="flex-1 text-center md:text-left {{ $index % 2 == 1 ? 'md:pr-10' : '' }}">
                <h3 class="font-bold text-xl md:text-2xl text-green-900 mb-4 font-playfair">{{ $agro->judul }}</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed font-medium">
                    {{ $agro->deskripsi }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mt-16 text-center">
        <a href="{{ route('agro') }}" class="inline-flex items-center gap-3 bg-gray-200 hover:bg-yellow-400 font-bold text-gray-900 text-sm md:text-base px-8 py-3.5 rounded-full transition-all shadow-md">
            Lihat Selengkapnya <i class="fas fa-arrow-right bg-black text-white p-1 rounded-full text-[10px]"></i>
        </a>
    </div>
</section>


<!-- 3. PRODUK UNGGULAN KAMI -->
<section class="bg-gray-50 py-20 border-y border-gray-200 shadow-inner">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="font-bold text-xl md:text-2xl font-sans uppercase tracking-widest text-gray-900">
                Produk Unggulan Kami
            </h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
            @foreach($produkUnggulan as $produk)
            <div class="bg-white p-5 rounded-3xl text-center border border-gray-100 hover:border-green-500 shadow-lg hover:-translate-y-2 transition duration-300 group flex flex-col justify-between relative overflow-hidden">
                 <div class="w-full aspect-square bg-gray-100 rounded-2xl mb-4 overflow-hidden relative shadow-inner">
                     <img src="{{ $produk->gambar ? asset('images/produk/' . $produk->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $produk->nama }}">
                     
                     <!-- Stempel Hover Khusus Unggulan -->
                     <div class="absolute inset-0 bg-green-900/40 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center pointer-events-none">
                         <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-black text-[10px] px-3 py-1.5 rounded-full uppercase tracking-widest shadow-2xl flex items-center gap-1.5 transform scale-75 group-hover:scale-100 transition-transform duration-500 border border-yellow-300">
                             <i class="fas fa-crown"></i> Unggulan
                         </span>
                     </div>
                 </div>
                 <div class="flex-grow flex flex-col justify-center">
                     <h3 class="font-bold text-gray-900 text-[13px] sm:text-sm mb-1 leading-snug line-clamp-2">{{ strtoupper($produk->nama) }}</h3>
                     <p class="text-green-700 font-bold text-sm mb-4">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                 </div>
                 <a href="{{ route('ecommerce') }}" class="inline-block w-full bg-gray-100 hover:bg-green-800 hover:text-white text-gray-900 text-xs font-bold px-4 py-2.5 rounded-full transition-all shadow-sm">
                     Belanja Sekarang
                 </a>
            </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('produk') }}" class="inline-flex items-center gap-3 bg-white border-2 border-gray-200 hover:bg-yellow-400 font-bold text-gray-900 text-sm md:text-base px-8 py-3.5 rounded-full transition-all shadow-sm">
                Lihat Detail <i class="fas fa-arrow-right bg-black text-white p-1 rounded-full text-[10px]"></i>
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