 @if($navbarCustomer)
    <div
        data-order-notification-config
        data-storage-key="hargorojo.orderNotifications.seen.{{ $navbarCustomer->id }}"
        data-order-ids='@json($navbarOrderIds)'
        data-new-order-id="{{ (int) session('navbar_new_order_id', 0) }}"
        hidden
    ></div>
@endif

 <!-- NAVBAR -->
   <nav
   x-data="{ open: false, scrolled: false, notifOpen: false }"
   @scroll.window="scrolled = window.pageYOffset > 80"
   :class="scrolled || open ? 'top-0 px-0' : 'top-4 px-4'"
   class="
    fixed
    left-0
    w-full
    z-[100]
    text-white
    transition-all
    duration-500
    ">
    
    <!-- Container -->
     <div
    :class="scrolled || open
        ? 'max-w-full rounded-none bg-[#243024]/30 backdrop-blur-2xl h-20'
        : 'max-w-[98%] rounded-[25px] bg-white/10 backdrop-blur-2xl h-20'"
        class="
        mx-auto
        relative
        border border-white/20
        px-5
        sm:px-8
        flex items-center justify-between
        shadow-2xl
        transition-all duration-500
        ">

            <!-- Logo -->
            <a href="{{ route('beranda') }}" class="flex items-center">
                <div class="w-32 overflow-hidden sm:w-36">
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
            <ul class="
                hidden
                lg:flex
                lg:absolute
                lg:left-1/2
                lg:-translate-x-1/2
                items-center
                gap-7
                xl:gap-10
                text-[15px]
                font-light
            ">

                <!-- Beranda -->
                <li class="relative">
                    <a href="{{ route('beranda') }}"
                    class="{{ request()->routeIs('beranda') 
                        ? 'text-white font-bold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Beranda
                    </a>

                    
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

                   
                </li>

                <!-- Katalog Desa -->
                <li class="relative">
                    <a href="{{ route('katalog') }}"
                    class="{{ request()->routeIs('katalog') 
                        ? 'text-white font-semibold' 
                        : 'text-white/90 hover:text-white' }}
                        transition-all duration-300">
                        Katalog Desa
                    </a>
                </li>
            </ul>

            @if($navbarCustomer)
            <!-- Customer Menu -->
            <div class="
                hidden
                lg:flex
                items-center
                gap-3
                ml-auto
                mr-5
            ">
                <!-- Profile -->
                <div class="relative">
                    <a
                        href="{{ route('customer.profile') }}"
                        class="
                            w-11
                            h-11
                            rounded-full
                            {{ request()->routeIs('customer.profile') ? 'bg-white text-black' : 'bg-white/10 text-white' }}
                            border
                            border-white/20
                            backdrop-blur-md
                            flex
                            items-center
                            justify-center
                            overflow-hidden
                            hover:bg-white
                            hover:text-black
                            transition-all
                            duration-300
                        "
                        title="Profil customer"
                    >
                        @if($navbarCustomerPhotoUrl)
                            <img
                                src="{{ $navbarCustomerPhotoUrl }}"
                                alt="Foto {{ $navbarCustomer->name }}"
                                class="h-full w-full object-cover"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <span class="hidden h-full w-full items-center justify-center">
                                <i class="fa-solid fa-user text-sm"></i>
                            </span>
                        @else
                            <i class="fa-solid fa-user text-sm"></i>
                        @endif
                    </a>
                </div>

                <!-- Notification -->
                <div class="relative" @click.away="notifOpen = false">
                    <button
                        type="button"
                        @click="notifOpen = !notifOpen"
                        data-order-notification-trigger
                        class="
                            relative
                            w-11
                            h-11
                            rounded-full
                            bg-white/10
                            border
                            border-white/20
                            backdrop-blur-md
                            flex
                            items-center
                            justify-center
                            text-white
                            hover:bg-white
                            hover:text-black
                            transition-all
                            duration-300
                        "
                        title="Notifikasi pesanan"
                    >
                        <i class="fa-solid fa-bell text-sm"></i>

                        @if($navbarOrderCount > 0)
                        <span
                            data-order-notification-badge
                            class="
                            absolute
                            -top-1
                            -right-1
                            min-w-5
                            h-5
                            px-1
                            rounded-full
                            bg-[#d8b15a]
                            text-[#173121]
                            text-[10px]
                            font-bold
                            flex
                            items-center
                            justify-center
                            border
                            border-white
                        ">
                            {{ $navbarOrderCount }}
                        </span>
                        @endif
                    </button>

                    @include('customer.partials.order-notification-popup')
                </div>

                <!-- Logout -->
                <form action="{{ route('customer.logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="
                            w-11
                            h-11
                            rounded-full
                            bg-white/10
                            border
                            border-white/20
                            backdrop-blur-md
                            flex
                            items-center
                            justify-center
                            text-white
                            hover:bg-white
                            hover:text-black
                            transition-all
                            duration-300
                        "
                        title="Logout"
                    >
                        <i class="fa-solid fa-right-from-bracket text-sm"></i>
                    </button>
                </form>
            </div>
            @endif

            <!-- Contact Button -->
            <div class="hidden lg:block {{ $navbarCustomer ? '' : 'ml-auto' }}">
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

            <div class="lg:hidden flex items-center gap-1.5">
                @if($navbarCustomer)
                <div class="relative" @click.away="notifOpen = false">
                    <button
                        type="button"
                        @click="notifOpen = !notifOpen; open = false"
                        data-order-notification-trigger
                        :class="notifOpen ? 'bg-white text-[#173121] border-white shadow-[0_10px_25px_rgba(0,0,0,0.16)]' : 'bg-white/10 text-white border-white/15'"
                        class="relative inline-flex h-10 w-10 items-center justify-center rounded-2xl border backdrop-blur-md transition hover:bg-white hover:text-[#173121]"
                        aria-label="Lihat notifikasi pesanan"
                    >
                        <i class="fa-solid fa-bell text-[15px]"></i>

                        @if($navbarOrderCount > 0)
                        <span
                            data-order-notification-badge
                            class="
                                absolute
                                -right-0.5
                                -top-0.5
                                flex
                                h-4
                                min-w-4
                                items-center
                                justify-center
                                rounded-full
                                border
                                border-white/80
                                bg-[#d8b15a]
                                px-1
                                text-[9px]
                                font-bold
                                text-[#173121]
                            "
                        >
                            {{ $navbarOrderCount }}
                        </span>
                        @endif
                    </button>

                    @include('customer.partials.order-notification-popup')
                </div>
                @endif

                <!-- Mobile Button -->
                <button
                    @click="open = !open; notifOpen = false"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-white/15 bg-white/10 text-white backdrop-blur-md transition hover:bg-white hover:text-[#173121]"
                    aria-label="Buka menu navigasi"
                    :aria-expanded="open.toString()">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path x-show="!open" stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" x-cloak stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div 
            x-show="open"
            x-transition
            x-cloak
            class="
                lg:hidden
                relative
                z-[110]
                -mt-1
                mx-5
                max-h-[calc(100dvh-6.5rem)]
                overflow-y-auto
                no-scrollbar
                bg-[#050806]/96
                backdrop-blur-2xl
                border border-white/10
                rounded-[1.35rem]
                shadow-[0_24px_60px_rgba(0,0,0,0.35)]
                px-6
                py-7
                text-white
                space-y-6
            ">

            <a href="{{ route('beranda') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                Beranda
            </a>

            <a href="{{ route('profil') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                Profil Desa
            </a>

            <a href="{{ route('agro') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                Agroeduwisata
            </a>

            <a href="{{ route('produk') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                Produk
            </a>

            <a href="{{ route('ecommerce') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                E-Commerce
            </a>

            <a href="{{ route('katalog') }}" class="block text-base font-semibold text-white/95 transition hover:text-[#d8b15a]">
                Katalog Desa
            </a>

            @if($navbarCustomer)
            <div class="
                rounded-2xl
                border
                border-white/10
                bg-white/10
                p-4
                space-y-4
                shadow-[inset_0_1px_0_rgba(255,255,255,0.08)]
            ">
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('customer.profile') }}" class="flex min-w-0 items-center gap-3 rounded-2xl transition hover:text-[#d8b15a]">
                        <div class="
                            h-11
                            w-11
                            rounded-full
                            bg-white/10
                            border
                            border-white/20
                            flex
                            items-center
                            justify-center
                            overflow-hidden
                        ">
                            @if($navbarCustomerPhotoUrl)
                                <img
                                    src="{{ $navbarCustomerPhotoUrl }}"
                                    alt="Foto {{ $navbarCustomer->name }}"
                                    class="h-full w-full object-cover"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >
                                <span class="hidden h-full w-full items-center justify-center">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            @else
                                <i class="fa-solid fa-user"></i>
                            @endif
                        </div>

                        <div class="min-w-0">
                            <p class="truncate text-base font-bold leading-tight">{{ $navbarCustomer->name }}</p>
                            <p class="mt-0.5 truncate text-xs font-medium text-white/55">{{ $navbarCustomer->email }}</p>
                        </div>
                    </a>

                    <a
                        href="{{ route('customer.profile', ['panel' => 'orders']) }}"
                        class="shrink-0 text-xs font-bold text-[#d8b15a] transition hover:text-white"
                    >
                        Riwayat
                    </a>
                </div>

                <a
                    href="{{ route('customer.profile') }}"
                    class="
                        block
                        rounded-xl
                        bg-white/10
                        px-4
                        py-3
                        text-center
                        text-sm
                        font-bold
                        transition
                        hover:bg-white
                        hover:text-black
                    "
                >
                    Profil Saya
                </a>
            </div>
            @endif

            <a href="{{ route('kontak') }}"
            class="
                block
                text-center
                bg-white
                text-black
                py-3
                rounded-full
                font-bold
                shadow-[0_18px_40px_rgba(0,0,0,0.20)]
            ">
                Kontak
            </a>

            @if($navbarCustomer)
                <form action="{{ route('customer.logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="
                            block
                            w-full
                            rounded-full
                            border
                            border-red-400/20
                            bg-red-500/10
                            py-3
                            text-center
                            font-bold
                            text-red-100
                            transition
                            hover:bg-red-500
                            hover:text-white
                        "
                    >
                        Log Out
                    </button>
                </form>
            @endif
        </div>
    </nav>

    @auth
        @if(in_array(auth()->user()->role ?? null, ['admin', 'super_admin'], true))
            <a href="{{ route('dashboard') }}" class="admin-return-button">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali ke Dashboard</span>
            </a>
        @endif
    @endauth

