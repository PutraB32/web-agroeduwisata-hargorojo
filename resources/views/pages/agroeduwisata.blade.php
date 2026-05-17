@extends('layouts.master')

@section('title', 'Agroeduwisata - Desa Hargorojo')

@section('content')

<!-- Hero Section -->
<section class="relative w-full min-h-[500px] flex md:items-center py-20 px-4 shadow-sm overflow-hidden bg-green-900 text-center md:text-left">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover opacity-100">
        <!-- Masking Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-900 via-green-900/90 to-green-900/30"></div>
    </div>
    
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between text-left gap-12 relative z-10 w-full">
        <!-- Content Left -->
        <div class="md:w-1/2 w-full text-center md:text-left">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight text-white uppercase tracking-tight">
                AGROEDUWISATA<br><span class="text-yellow-400">DESA HARGOROJO</span>
            </h1>
            <p class="text-base md:text-lg text-green-50 mb-8 leading-relaxed max-w-lg mx-auto md:mx-0 border-l-4 border-yellow-500 pl-4 font-medium">
                Menengok sisi edukatif pariwisata yang tak terlupakan. Dapatkan pengalaman tak terlupakan melalui kunjungan wisata lokal di Hargorojo.
            </p>
        </div>
        <!-- Right Image Decoration -->
        <div class="md:w-1/2 flex justify-center w-full">
            <div class="w-72 h-72 lg:w-96 lg:h-96 bg-green-800 rounded-full overflow-hidden shadow-2xl relative group border-4 border-yellow-500">
                <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Hero Agroeduwisata">
                <div class="absolute inset-0 border-[1rem] border-green-900/40 rounded-full z-10 pointer-events-none"></div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas Wisata Edukasi -->
<section class="py-16 bg-white mx-auto px-4 border-b border-theme-light">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="font-bold text-2xl md:text-3xl font-playfair mb-2 text-green-900">FASILITAS PARIWISATA EDUKASI</h2>
            <div class="inline-block border border-yellow-500 rounded-full px-4 py-1.5"><p class="text-xs font-bold text-yellow-600 tracking-widest uppercase">Eksplorasi Tak Terbatas</p></div>
        </div>

        <div class="space-y-10 max-w-5xl mx-auto">
            @foreach($menusUtama as $index => $menu)
            <div class="flex flex-col md:flex-row items-center border border-gray-200 bg-white rounded-3xl p-6 md:p-8 shadow-lg {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} gap-8 hover:-translate-y-1 hover:shadow-xl transition duration-500 relative overflow-hidden group">
                <div class="absolute w-2 h-full top-0 {{ $index % 2 == 1 ? 'right-0' : 'left-0' }} bg-gradient-to-b from-green-500 to-green-800"></div>
                <div class="w-full md:w-56 h-48 bg-gray-100 rounded-2xl overflow-hidden shrink-0 relative p-1 shadow-inner ring-1 ring-gray-100">
                    <img src="{{ $menu->gambar ? asset('images/agroeduwisata/'.$menu->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover rounded-xl group-hover:scale-110 transition duration-700" alt="{{ $menu->judul }}">
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="font-bold text-xl md:text-2xl font-playfair text-black mb-3">{{ $menu->judul }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-lg mx-auto md:mx-0">{{ $menu->deskripsi }}</p>
                    <button onclick="openAgroModal('modal-{{ Str::slug($menu->judul) }}')" class="mt-5 text-sm font-bold bg-green-50 text-green-800 uppercase tracking-widest hover:bg-green-800 hover:text-yellow-400 py-2.5 px-6 rounded-xl transition-all shadow-sm border border-green-200 flex items-center justify-center gap-2 {{ $index % 2 == 1 ? 'mx-auto md:ml-auto md:mr-0' : 'mx-auto md:mx-0' }}">
                        <span>Lihat Detail Wisata</span> <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>

<!-- Produk Unggulan -->
<section class="py-16 bg-[#fafafa]">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="font-bold text-2xl md:text-3xl font-playfair mb-2 text-green-900">PRODUK UNGGULAN DESA</h2>
            <div class="inline-block border border-yellow-500 rounded-full px-4 py-1.5"><p class="text-xs font-bold text-yellow-600 tracking-widest uppercase">Cendera Mata Autentik</p></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            @foreach($unggulan as $item)
            <div class="bg-white rounded-3xl p-5 flex flex-col items-center shadow-lg border border-gray-100 group hover:-translate-y-2 hover:shadow-2xl hover:border-green-500 transition duration-300 relative z-10">
                <div class="w-full aspect-square bg-gray-50 rounded-2xl mb-5 overflow-hidden relative shadow-inner">
                    <img src="{{ $item->gambar ? asset($item->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $item->nama }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-4">
                        <button class="bg-yellow-500 text-black text-xs font-bold py-2 px-4 rounded-full translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 shadow-md">
                            Lihat Detail
                        </button>
                    </div>
                </div>
                <h3 class="font-bold text-black text-sm text-center mb-1 line-clamp-1">{{ strtoupper($item->nama) }}</h3>
                <p class="text-sm font-semibold text-green-700 mb-4 drop-shadow-sm">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                <button class="bg-black hover:bg-green-800 text-white text-xs font-bold px-6 py-2.5 rounded-full transition-all w-full shadow-md flex justify-center items-center gap-2">
                    <i class="fas fa-shopping-cart"></i> Ke Keranjang
                </button>
            </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
             <a href="{{ route('ecommerce') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-green-700 to-green-900 text-white text-sm font-bold px-8 py-3.5 rounded-full hover:from-green-800 hover:to-black shadow-lg transition hover:-translate-y-1">
                Lihat Semua Produk <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ============================================== -->
<!-- KUMPULAN MODAL INTERAKTIF (Tersembunyi Awalnya) -->
<!-- ============================================== -->
@foreach($menusUtama as $menu)
<div id="modal-{{ Str::slug($menu->judul) }}" class="fixed inset-0 z-[100] hidden bg-black/80 backdrop-blur-sm items-center justify-center p-4 sm:p-6 overflow-y-auto w-full h-full opacity-0 transition-opacity duration-300">
    <div class="bg-gray-50 rounded-3xl w-full max-w-6xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300 modal-content my-auto relative flex flex-col max-h-[90vh]">
        
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-green-900 to-green-800 p-6 sm:p-8 flex flex-row justify-between items-center relative border-b-4 border-yellow-500 shrink-0">
            <div class="absolute w-32 h-32 bg-white/5 rounded-full -top-16 -left-16 pointer-events-none"></div>
            <div>
                <h2 class="text-2xl md:text-3xl font-black font-playfair text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">{{ strtoupper($menu->judul) }}</h2>
                <p class="text-green-50 text-sm mt-1 border-l-2 border-yellow-500 pl-2">Detail Langkah & Cerita Wisata Edukatif</p>
            </div>
            <button onclick="closeAgroModal('modal-{{ Str::slug($menu->judul) }}')" class="text-white hover:text-red-500 bg-white/10 hover:bg-white/20 rounded-full p-2 w-10 h-10 flex items-center justify-center transition-all shrink-0">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <!-- Modal Body (Grid of Steps) - Scrollable -->
        <div class="p-6 sm:p-8 overflow-y-auto w-full h-full flex-grow custom-scroll">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if(isset($tahapan[$menu->judul]) && count($tahapan[$menu->judul]) > 0)
                    @foreach($tahapan[$menu->judul] as $index => $tahap)
                    <div class="bg-white rounded-2xl p-5 shadow-lg border border-gray-100 hover:-translate-y-2 hover:shadow-2xl hover:border-yellow-400 transition-all duration-300 group flex flex-col">
                        <div class="w-full aspect-[4/3] bg-gray-100 rounded-xl mb-4 overflow-hidden relative shadow-inner ring-1 ring-gray-200">
                            <img src="{{ $tahap->gambar ? asset('images/agroeduwisata/'.$tahap->gambar) : asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $tahap->judul }}">
                            <div class="absolute top-3 left-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black text-xs font-black px-3 py-1.5 rounded-lg shadow-md border border-yellow-400">
                                PART {{ $index + 1 }}
                            </div>
                        </div>
                        <h4 class="font-bold text-green-900 text-[15px] mb-3 line-clamp-2 leading-tight uppercase tracking-tight">{{ $tahap->judul }}</h4>
                        <p class="text-sm text-gray-600 leading-relaxed text-justify flex-grow">{{ $tahap->deskripsi }}</p>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full flex flex-col items-center justify-center text-center text-gray-500 py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <i class="fas fa-box-open text-5xl text-gray-300 mb-4"></i>
                        <p class="font-bold text-lg text-gray-700">Belum Ada Detail Proses</p>
                        <p class="text-sm">Admin belum menambahkan langkah-langkah untuk menu ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
/* Kustomisasi Scrollbar agar rapi di dalam modal (Khusus Chrome/Edge/Safari) */
.custom-scroll::-webkit-scrollbar { width: 8px; }
.custom-scroll::-webkit-scrollbar-track { background: #f3f4f6; border-radius: 10px; }
.custom-scroll::-webkit-scrollbar-thumb { background: #166534; border-radius: 10px; }
.custom-scroll::-webkit-scrollbar-thumb:hover { background: #14532d; }
</style>

<!-- Script Fungsionalitas Modal -->
<script>
    function openAgroModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('.modal-content');
        
        // Tampilkan modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Trigger animasi reflow (setTimeout trick)
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
        
        // Kunci scroll halaman belakang
        document.body.style.overflow = 'hidden';
    }

    function closeAgroModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('.modal-content');
        
        // Mulai animasi tutup
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        
        // Sembunyikan sepenuhnya setelah animasi (300ms sesuai class duration-300)
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Kembalikan scroll
        }, 300); 
    }
    
    // Tutup jika user nge-klik luar area kotak putih modal
    window.addEventListener('click', function(event) {
        const modals = document.querySelectorAll('[id^="modal-"]');
        modals.forEach(modal => {
            if (event.target === modal) {
                closeAgroModal(modal.id);
            }
        });
    });
</script>

@endsection