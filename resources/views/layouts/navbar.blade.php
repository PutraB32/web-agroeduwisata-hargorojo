<nav class="bg-gradient-to-r from-green-900 via-green-800 to-black shadow-2xl fixed w-full z-50 border-b border-yellow-500/50 backdrop-blur-sm bg-opacity-95 text-white transition-all duration-300" x-data="{ open: false }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20"> <!-- Increased height for premium feel -->

        <!-- Logo -->
        <a href="{{ route('beranda') }}" class="flex items-center gap-2 group">
            <div class="w-12 h-12 overflow-hidden group-hover:scale-110 transition-all duration-300">
                <img src="{{ asset('images/assets foto/logo purworejo.png') }}" 
                alt="Logo Desa Wisata"
                class="w-full h-full object-contain">
            </div>
            <div class="font-playfair font-bold text-lg leading-tight tracking-wider">
                <span class="block w-full text-xs text-center drop-shadow-sm group-hover:text-white transition-colors">
                    DESA WISATA
                </span>
                <span class="block w-full text-center text-yellow-400 text-green-100 uppercase tracking-widest font-port lligat sans font-medium">
                    HARGOROJO
                </span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-8 text-sm font-bold uppercase tracking-wider">

            <li class="relative group">
                <a href="{{ route('beranda') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('beranda') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   Beranda
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('beranda') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative group">
                <a href="{{ route('profil') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('profil') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   Profil Desa
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('profil') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative group">
                <a href="{{ route('agro') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('agro') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   Agroeduwisata
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('agro') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative group">
                <a href="{{ route('produk') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('produk') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   Produk
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('produk') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative group">
                <a href="{{ route('ecommerce') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('ecommerce') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   E-Commerce
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('ecommerce') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative group">
                <a href="{{ route('katalog') }}"
                   class="block py-2 transition-colors {{ request()->routeIs('katalog') ? 'text-yellow-400' : 'text-gray-200 hover:text-white' }}">
                   Katalog Desa
                </a>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 {{ request()->routeIs('katalog') ? 'scale-x-100' : '' }}"></span>
            </li>

            <li class="relative flex items-center">
                <a href="{{ route('kontak') }}"
                   class="bg-green-500 text-black px-4 py-2 rounded-full font-bold shadow-lg hover:bg-yellow-500 hover:shadow-xl hover:-translate-y-0.5 transition-all {{ request()->routeIs('kontak') ? 'ring-2 ring-white ring-offset-2 ring-offset-green-900' : '' }}">
                   Kontak Kami
                </a>
            </li>

        </ul>

        <!-- Mobile Button -->
        <button @click="open = !open" 
                class="md:hidden flex flex-col justify-center items-center w-10 h-10 bg-white/10 rounded-lg border border-white/20 hover:bg-white/20 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400">
            <span class="w-5 h-0.5 bg-white mb-1.5 transition-transform duration-300 transform" :class="{'rotate-45 translate-y-2': open}"></span>
            <span class="w-5 h-0.5 bg-white mb-1.5 transition-opacity duration-300" :class="{'opacity-0': open}"></span>
            <span class="w-5 h-0.5 bg-white transition-transform duration-300 transform" :class="{'-rotate-45 -translate-y-2': open}"></span>
        </button>

    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.outside="open = false"
         class="md:hidden absolute w-full bg-gradient-to-b from-green-900 to-black shadow-2xl border-b-4 border-yellow-500 overflow-hidden text-sm uppercase tracking-widest font-bold">

        <div class="px-6 py-8 space-y-4">
            <a href="{{ route('beranda') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('beranda') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('profil') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">Profil Desa</a>
            <a href="{{ route('agro') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('agro') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">Agroeduwisata</a>
            <a href="{{ route('produk') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('produk') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">Produk</a>
            <a href="{{ route('ecommerce') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('ecommerce') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">E-Commerce</a>
            <a href="{{ route('katalog') }}" class="block px-4 py-3 rounded-xl transition-all {{ request()->routeIs('katalog') ? 'bg-yellow-500 text-black shadow-md' : 'text-gray-300 hover:bg-white/10 hover:text-white hover:translate-x-2' }}">Katalog Desa</a>
            
            <div class="pt-4 mt-4 border-t border-white/20">
                <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 w-full px-4 py-4 rounded-xl bg-green-700 text-black shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all">
                    Hubungi Kami <i class="fas fa-headset text-green-900"></i>
                </a>
            </div>
        </div>

    </div>

</nav>