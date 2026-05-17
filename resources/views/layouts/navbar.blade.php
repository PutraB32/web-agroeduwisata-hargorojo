 <!-- NAVBAR -->
   <nav 
   x-data="{ open: false, scrolled: false }"@scroll.window="scrolled = window.pageYOffset > 80"
   :class="scrolled ? 'top-0 px-0' : 'top-4 px-4'"
   class="
    fixed
    left-0
    w-full
    z-50
    text-white
    transition-all
    duration-500
    ">
    
    <!-- Container -->
     <div
    :class="scrolled
        ? 'max-w-full rounded-none bg-black/20 backdrop-blur-2xl h-20'
        : 'max-w-[98%] rounded-[25px] bg-white/10 backdrop-blur-2xl h-20'"
        class="
        mx-auto
        border border-white/20
        px-8
        flex items-center justify-between
        shadow-2xl
        transition-all duration-500
        ">

            <!-- Logo -->
            <a href="{{ route('beranda') }}" class="flex items-center">
                <div class="w-36 overflow-hidden">
                    <img 
                        src="{{ asset('images/assets foto/logo hargorojo.png') }}"
                        alt="Logo Desa"
                        class="w-full object-contain
                        drop drop-shadow-[0_0_20px_rgba(255,255,255,0)]
                        hover:scale-105
                        transition-all duration-300">
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-10 text-[15px] font-light">

                <!-- Beranda -->
                <li class="relative">
                    <a href="{{ route('beranda') }}"
                    class="{{ request()->routeIs('beranda') 
                        ? 'text-white font-bold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Beranda
                    </a>

                    @if(request()->routeIs('beranda'))
                        <span class="absolute -bottom-2 left-0 w-full h-[2px] rounded-full bg-yellow-600"></span>
                    @endif
                </li>

                <!-- Profil Desa -->
                <li class="relative">
                    <a href="{{ route('profil') }}"
                    class="{{ request()->routeIs('profil') 
                        ? 'text-white font-semibold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Profil Desa
                    </a>

                    @if(request()->routeIs('profil'))
                        <span class="absolute -bottom-3 left-0 w-full h-[3px] rounded-full bg-yellow-300"></span>
                    @endif
                </li>

                <!-- Agroeduwisata -->
                <li class="relative">
                    <a href="{{ route('agro') }}"
                    class="{{ request()->routeIs('agro') 
                        ? 'text-white font-semibold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Agroeduwisata
                    </a>

                    @if(request()->routeIs('agro'))
                        <span class="absolute -bottom-3 left-0 w-full h-[3px] rounded-full bg-yellow-300"></span>
                    @endif
                </li>

                <!-- Produk -->
                <li class="relative">
                    <a href="{{ route('produk') }}"
                    class="{{ request()->routeIs('produk') 
                        ? 'text-white font-semibold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Produk
                    </a>

                    @if(request()->routeIs('produk'))
                        <span class="absolute -bottom-3 left-0 w-full h-[3px] rounded-full bg-yellow-300"></span>
                    @endif
                </li>

                <!-- E-Commerce -->
                <li class="relative">
                    <a href="{{ route('ecommerce') }}"
                    class="{{ request()->routeIs('ecommerce') 
                        ? 'text-white font-semibold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        E-Commerce
                    </a>

                    @if(request()->routeIs('ecommerce'))
                        <span class="absolute -bottom-3 left-0 w-full h-[3px] rounded-full bg-yellow-300"></span>
                    @endif
                </li>

                <!-- Katalog Desa -->
                <li class="relative">
                    <a href="{{ route('katalog') }}"
                    class="text-white/90 hover:text-white transition-all duration-300">
                        Katalog Desa
                    </a>
                </li>
            </ul>

            <!-- Contact Button -->
            <div class="hidden lg:block">
                <a href="{{ route('kontak') }}"
                class="
                    bg-white/10
                    text-white
                    border border-white/20
                    px-5 py-2.5
                    rounded-full
                    font-medium
                    backdrop-blur-md
                    hover:bg-white
                    hover:text-black
                    transition-all duration-300
                ">
                    Kontak
                </a>
            </div>

            <!-- Mobile Button -->
            <button 
                @click="open = !open"
                class="lg:hidden text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div 
            x-show="open"
            x-transition
            class="
                lg:hidden
                mt-4
                mx-4
                bg-black/80
                backdrop-blur-2xl
                border border-white/10
                rounded-3xl
                p-6
                text-white
                space-y-5
            ">

            <a href="{{ route('beranda') }}" class="block hover:text-yellow-300">
                Beranda
            </a>

            <a href="{{ route('profil') }}" class="block hover:text-yellow-300">
                Profil Desa
            </a>

            <a href="{{ route('agro') }}" class="block hover:text-yellow-300">
                Agroeduwisata
            </a>

            <a href="{{ route('produk') }}" class="block hover:text-yellow-300">
                Produk
            </a>

            <a href="{{ route('ecommerce') }}" class="block hover:text-yellow-300">
                E-Commerce
            </a>

            <a href="#" class="block hover:text-yellow-300">
                Katalog Desa
            </a>

            <a href="#kontak"
            class="
                block
                text-center
                bg-white
                text-black
                py-3
                rounded-full
                font-semibold
            ">
                Kontak
            </a>
        </div>
    </nav>