@extends('layouts.master')

@section('title', 'Hubungi Kami - Desa Hargorojo')

@section('content')

<section class="relative py-24 px-4 text-center border-b border-green-900 overflow-hidden" style="background-image: url('{{ asset('images/beranda.bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-green-900/80 to-black/70"></div>
    
    <div class="absolute top-4 right-4 md:top-6 md:right-8 z-20">
        <a href="{{ route('login') }}" class="flex items-center gap-2.5 bg-black/40 backdrop-blur-md border border-yellow-500/30 hover:bg-green-800 hover:border-yellow-400 text-white font-bold text-xs md:text-sm px-5 py-2.5 md:py-3 rounded-full transition-all duration-300 shadow-lg hover:shadow-[0_4px_20px_rgba(234,179,8,0.3)] group overflow-hidden">
            <i class="fas fa-user-shield text-yellow-400 group-hover:scale-110 transition-transform duration-300 z-10"></i> 
            <span class="tracking-wide uppercase z-10">Login Admin</span>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
        </a>
    </div>

    <div class="max-w-2xl mx-auto relative z-10 mt-8">
        <h1 class="font-playfair text-4xl md:text-5xl font-bold text-white mb-6 drop-shadow-lg">Hubungi <span class="text-yellow-400">Kami</span></h1>
        <p class="text-sm md:text-base text-gray-200 leading-relaxed font-medium drop-shadow-md">
            Tertarik berkunjung atau ingin memesan produk gula kelapa asli Hargorojo?<br>
            Jangan ragu untuk menghubungi kami. Kami siap melayani Anda.
        </p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        
        <a href="#" class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-100 flex flex-col justify-center items-center text-center hover:-translate-y-2 hover:border-green-400 hover:shadow-xl transition-all duration-300 group">
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-green-600 group-hover:text-white transition-all"><i class="fab fa-whatsapp"></i></div>
            <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-green-700 transition">WhatsApp</h3>
            <p class="text-xs text-gray-500 mb-4 h-8">Chat langsung dengan admin kami</p>
            <p class="text-xs font-bold text-green-900 bg-green-50 px-4 py-2 rounded-full w-full border border-green-100">+62 888-6528-338</p>
        </a>

        <a href="#" class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-100 flex flex-col justify-center items-center text-center hover:-translate-y-2 hover:border-blue-400 hover:shadow-xl transition-all duration-300 group">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-blue-600 group-hover:text-white transition-all"><i class="fas fa-envelope"></i></div>
            <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-blue-700 transition">Email</h3>
            <p class="text-xs text-gray-500 mb-4 h-8">Kirim pertanyaan via email</p>
            <p class="text-xs font-bold text-blue-900 bg-blue-50 px-4 py-2 rounded-full w-full border border-blue-100">info@hargorojo.id</p>
        </a>

        <a href="#" class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-100 flex flex-col justify-center items-center text-center hover:-translate-y-2 hover:border-pink-400 hover:shadow-xl transition-all duration-300 group">
            <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-pink-500 group-hover:text-white transition-all"><i class="fab fa-instagram"></i></div>
            <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-pink-600 transition">Instagram</h3>
            <p class="text-xs text-gray-500 mb-4 h-8">Lihat galeri terbaru dari kami</p>
            <p class="text-xs font-bold text-pink-900 bg-pink-50 px-4 py-2 rounded-full w-full border border-pink-100">@desahargorojo</p>
        </a>

        <div class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-100 flex flex-col justify-center items-center text-center group cursor-default hover:-translate-y-2 hover:border-yellow-400 transition-all duration-300">
            <div class="w-16 h-16 bg-yellow-50 text-yellow-600 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-yellow-500 group-hover:text-white transition-all"><i class="fas fa-clock"></i></div>
            <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-yellow-700 transition">Kunjungan</h3>
            <p class="text-xs text-gray-500 mb-4 h-8">Senin - Jumat</p>
            <p class="text-xs font-bold text-yellow-900 bg-yellow-50 px-4 py-2 rounded-full w-full border border-yellow-100">08:00 - 16:00 WIB</p>
        </div>

    </div>

    <div class="bg-white rounded-[2rem] p-6 shadow-xl border-t-4 border-yellow-500 flex flex-col md:flex-row gap-6 items-center hover:shadow-2xl transition-all">
        <div class="w-full md:w-2/3 h-80 bg-green-50 rounded-2xl flex items-center justify-center relative overflow-hidden group border border-green-200">
             <span class="text-6xl text-green-400 drop-shadow-md z-10 opacity-70 group-hover:scale-110 transition-transform"><i class="fas fa-map-marked-alt"></i></span>
             <img src="{{ asset('images/beranda.bg.jpeg') }}" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-multiply filter blur-sm group-hover:blur-0 transition-all duration-500" alt="Map Area">
        </div>
        <div class="w-full md:w-1/3 flex flex-col p-4 pr-6">
            <span class="w-12 h-12 bg-green-100 text-green-700 rounded-xl flex items-center justify-center text-xl mb-4 shadow-sm"><i class="fas fa-map-marker-alt"></i></span>
            <h4 class="font-bold text-gray-900 text-xl font-playfair mb-3">Pusat Desa Wisata</h4>
            <p class="text-sm text-gray-600 leading-relaxed font-medium">
                Jalan Raya Krandekan Hargorojo Km 3.3, Hargorojo,<br>
                Bagelan, Ngargo, Hargorojo,<br>Kec. Purworejo,<br>
                Kabupaten Purworejo,<br>Jawa Tengah 54174
            </p>
            <a href="#" class="mt-6 text-xs font-bold uppercase tracking-widest text-green-800 border-b-2 border-green-800 self-start hover:text-yellow-600 hover:border-yellow-600 transition-colors pb-1">Buka di Google Maps</a>
        </div>
    </div>
</section>

<section class="bg-gradient-to-t from-green-50 to-white py-20 px-4 shadow-inner border-t border-green-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16">
        
        <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-xl border border-gray-100 hover:shadow-2xl transition duration-500 hover:border-green-300 relative group">
            <h2 class="font-playfair text-3xl font-bold text-gray-900 mb-8">Kirim Pesan Langsung</h2>
            <form action="#" method="POST" class="space-y-6 relative z-10">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
                        <input type="text" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all" placeholder="John Doe" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Email</label>
                        <input type="email" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all" placeholder="john@example.com" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Subjek Tujuan</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all appearance-none cursor-pointer">
                        <option>Pilih Tujuan...</option>
                        <option>Pertanyaan Umum</option>
                        <option>Pemesanan Grosir / Kerjasama</option>
                        <option>Reservasi Kunjungan Eduwisata</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Pesan Anda</label>
                    <textarea rows="5" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all resize-none" placeholder="Ceritakan tujuan Anda..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-black hover:bg-green-800 text-white text-sm font-bold py-4 rounded-xl mt-2 transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 flex justify-center items-center gap-2">
                    Kirim Pesan Sekarang <i class="fas fa-paper-plane text-yellow-400"></i>
                </button>
            </form>
        </div>

        <div class="flex flex-col justify-center">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-8 h-px bg-yellow-500"></span>
                <span class="text-xs font-bold tracking-widest text-green-800 uppercase">Bantuan</span>
            </div>
            <h2 class="font-playfair text-3xl font-bold text-gray-900 mb-8">Pertanyaan Umum</h2>
            <div class="space-y-4">
                <details class="bg-white border border-green-100 rounded-2xl p-5 cursor-pointer shadow-sm hover:shadow-md transition-all group">
                    <summary class="font-bold text-gray-900 flex justify-between items-center outline-none list-none text-sm group-hover:text-green-700 transition">
                        Apakah perlu reservasi untuk kunjungan?
                        <span class="transition-transform group-open:rotate-180 text-yellow-600"><i class="fas fa-chevron-down"></i></span>
                    </summary>
                    <p class="text-gray-600 mt-4 text-sm leading-relaxed border-t border-gray-100 pt-4">Ya, sangat disarankan untuk melakukan reservasi minimal H-3 agar kami dapat mempersiapkan fasilitas dan staf edukasi (penderes nira) khusus untuk mendampingi Anda melihat proses langsung.</p>
                </details>
                <details class="bg-white border border-green-100 rounded-2xl p-5 cursor-pointer shadow-sm hover:shadow-md transition-all group">
                    <summary class="font-bold text-gray-900 flex justify-between items-center outline-none list-none text-sm group-hover:text-green-700 transition">
                        Bagaimana cara memesan produk?
                        <span class="transition-transform group-open:rotate-180 text-yellow-600"><i class="fas fa-chevron-down"></i></span>
                    </summary>
                    <p class="text-gray-600 mt-4 text-sm leading-relaxed border-t border-gray-100 pt-4">Anda bisa memesan langsung via tombol WhatsApp yang langsung tertuju ke sentra produksi kami, atau menggunakan halaman E-Commerce jika keranjang belanja sudah aktif.</p>
                </details>
                <details class="bg-white border border-green-100 rounded-2xl p-5 cursor-pointer shadow-sm hover:shadow-md transition-all group">
                    <summary class="font-bold text-gray-900 flex justify-between items-center outline-none list-none text-sm group-hover:text-green-700 transition">
                        Apakah produk olahan Hargorojo bersertifikasi?
                        <span class="transition-transform group-open:rotate-180 text-yellow-600"><i class="fas fa-chevron-down"></i></span>
                    </summary>
                    <p class="text-gray-600 mt-4 text-sm leading-relaxed border-t border-gray-100 pt-4">Tentu, kami bernaung di bawah PIRT desa dan seluruh produksi gula kelapa diolah secara organik tanpa campuran bahan pengawet/najis, murni dari air aren.</p>
                </details>
            </div>
        </div>

    </div>
</section>

@endsection