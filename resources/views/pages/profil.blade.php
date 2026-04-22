@extends('layouts.master')

@section('title', 'Profil Desa Hargorojo')

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-24 px-4 text-center flex flex-col items-center justify-center min-h-[400px] border-b border-green-900" style="background-image: url('{{ asset('images/beranda.bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-green-900/80 to-black/60 z-0"></div>
    <h1 class="font-bold text-3xl md:text-5xl text-yellow-400 tracking-widest uppercase relative z-10 mb-4 drop-shadow-2xl">
        PROFIL DESA HARGOROJO
    </h1>
    <p class="text-white text-sm md:text-base max-w-2xl mx-auto relative z-10 drop-shadow-md font-medium leading-relaxed">
        Menelusuri jejak alam, tradisi, dan inovasi yang membangun kemandirian sejati dari lereng bukit Menoreh.
    </p>
    <div class="absolute inset-0 flex justify-center items-center opacity-10 text-yellow-500 z-0 mix-blend-overlay">
         <svg class="w-48 h-48" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
    </div>
</section>

<!-- Sejarah Kami -->
<section class="max-w-4xl mx-auto px-4 py-16 text-center">
    <span class="inline-block border border-yellow-500 bg-yellow-50 rounded-full px-4 py-1 text-xs font-bold uppercase tracking-widest mb-4 text-yellow-700 shadow-sm">
        Sejarah Kami
    </span>
    <h2 class="font-bold text-2xl md:text-3xl text-green-900 mb-6 font-serif">Akar Tradisi yang Kuat</h2>
    <p class="text-sm md:text-base text-gray-700 leading-loose">
        Desa Hargorojo berdiri sejak era kolonial Belanda, berawal dari sebuah permukiman kecil para petani di lereng bukit Menoreh. Nama "Hargorojo" sendiri diambil dari bahasa Jawa, "Hargo" yang berarti Gunung dan "rojo" yang berarti Raja, melambangkan kebesaran alam yang diwariskan leluhur kita berupa hutan dan ladang yang membujur dari lereng. Selama puluhan tahun, warga desa Hargorojo merawat erat tradisi dalam mengolah air nira kelapa menjadi gula kelapa organik. Kearifan lokal ini tak hanya menjadi mata pencaharian, tetapi juga identitas budaya yang tak lekang ditelan perubahan zaman ke desa wisata.
    </p>
</section>

<!-- Visi & Misi -->
<section class="max-w-5xl mx-auto px-4 pb-16">
    <div class="bg-gradient-to-b from-green-50 to-white rounded-3xl p-8 md:p-12 text-center shadow-lg border border-green-100 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-100 rounded-bl-full bg-opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-green-200 rounded-tr-full bg-opacity-30"></div>
        
        <h2 class="font-bold text-2xl md:text-3xl text-green-900 mb-8 relative z-10">Visi & Misi</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left relative z-10">
            <!-- Visi Card -->
            <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-yellow-400 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-2xl text-yellow-500 drop-shadow-sm">👁️</span>
                    <h3 class="font-bold text-xl text-black">Visi</h3>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed font-serif italic">
                    "Menjadikan Desa Hargorojo sebagai pusat edu-wisata inovatif yang memeluk erat tradisi, mencetak kemandirian masyarakat, merawat alam, dan membangun warisan ekonomi organik terbersih di Nusantara."
                </p>
            </div>
            
            <!-- Misi Card -->
             <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-green-600 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-2xl text-green-600 drop-shadow-sm">🎯</span>
                    <h3 class="font-bold text-xl text-black">Misi</h3>
                </div>
                <ul class="text-sm text-gray-700 leading-relaxed space-y-3">
                    <li class="flex items-start gap-2">
                        <span class="mt-0.5 font-bold text-yellow-500">✓</span>
                        Melestarikan kearifan lokal produksi gula kelapa murni tanpa henti.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-0.5 font-bold text-yellow-500">✓</span>
                        Memberdayakan penderes untuk meningkatkan skala ekonomi masyarakat secara merata.
                    </li>
                     <li class="flex items-start gap-2">
                        <span class="mt-0.5 font-bold text-yellow-500">✓</span>
                        Menjaga integrasi kelestarian alam dan menjadikannya sebagai sarana edukasi pariwisata bertaraf nasional.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Kondisi Desa -->
<section class="max-w-5xl mx-auto px-4 py-8 text-center">
    <span class="inline-block border border-yellow-500 bg-yellow-50 rounded-full px-4 py-1 text-xs font-bold uppercase tracking-widest mb-4 text-yellow-700 shadow-sm">
        Kondisi Desa
    </span>
    <h2 class="font-bold text-2xl md:text-3xl text-green-900 mb-6 font-serif">Alam & Tradisi</h2>
    <p class="text-sm text-gray-600 max-w-4xl mx-auto mb-12">
        Merasakan ketenangan yang sesungguhnya di tengah balutan kesejukan pepohonan kelapa yang menari mengikuti hembusan angin. Hargorojo menjanjikan kembali terjalinnya hubungan kita dengan keagungan alam dan kekayaan tradisi.
    </p>

    <div class="bg-white rounded-3xl p-6 md:p-10 text-left flex flex-col md:flex-row gap-10 items-center border border-gray-100 shadow-2xl relative overflow-hidden group hover:border-green-400 transition-all duration-500">
        <div class="w-full md:w-1/2 relative z-10">
            <div class="w-full aspect-square bg-gray-100 rounded-2xl overflow-hidden shadow-inner flex items-center justify-center relative border-4 border-yellow-400">
                 <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Alam dan Tradisi">
                 <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                 <svg class="w-20 h-20 absolute text-white opacity-40 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>
        <div class="w-full md:w-1/2 space-y-6 relative z-10">
            
            <div class="bg-green-50 p-4 rounded-xl border-l-4 border-green-600 shadow-sm hover:-translate-x-1 hover:shadow-md transition-all">
                <h3 class="font-bold text-black text-base mb-2">Kelestarian Ekosistem Kelapa</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Setiap jengkal kelestarian lereng dipetakan untuk menjaga kesuburan tanah, mencegah longsor, dan menjamin serapan air terbaik bagi pohon aren kita demi nira yang lezat.
                </p>
            </div>
            
             <div class="bg-yellow-50 p-4 rounded-xl border-l-4 border-yellow-500 shadow-sm hover:-translate-x-1 hover:shadow-md transition-all">
                <h3 class="font-bold text-black text-base mb-2">Inovasi Gula Kelapa Organik</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Memadukan metode memasak otentik kayu bakar dengan standarisasi sanitasi modern sehingga produk desa tervalidasi siap memasuki ranah pasar elit nasional maupun ritel masal.
                </p>
            </div>

             <div class="bg-green-50 p-4 rounded-xl border-l-4 border-green-600 shadow-sm hover:-translate-x-1 hover:shadow-md transition-all">
                <h3 class="font-bold text-black text-base mb-2">Kesejahteraan Penderes Nira</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Memutus rantai distribusi tengkulak yang panjang, desa membantu memberdayakan harga akhir untuk setiap tetes peluh perjuangan penderes nira secara lebih berkeadilan.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Peta Desa -->
<section class="max-w-5xl mx-auto px-4 py-20 text-center">
    <div class="inline-block border-2 border-yellow-500 rounded-full px-6 py-2 mb-10"><h2 class="font-bold text-xl md:text-2xl text-green-900 tracking-widest uppercase m-0">PETA DESA HARGOROJO</h2></div>
    
    <div class="max-w-3xl mx-auto flex justify-center p-8 bg-green-50 rounded-[3rem] shadow-xl border border-green-200 hover:shadow-2xl transition-shadow duration-500">
        <!-- Placeholder Isometric Map style based on the mockup -->
       <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Java_Island_stub.svg/1024px-Java_Island_stub.svg.png" class="w-full max-w-xl opacity-80 drop-shadow-2xl filter hover:scale-105 transition-transform duration-700" alt="Peta Desa Placeholder">
    </div>
</section>

@endsection
