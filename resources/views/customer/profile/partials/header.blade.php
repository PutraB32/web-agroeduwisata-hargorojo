<div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
    <div class="max-w-2xl text-white">
        <p class="text-xs font-bold uppercase tracking-[0.35em] text-[#d8b15a]">Selamat Datang</p>
        <h1 class="mt-3 font-lora text-4xl font-bold leading-tight md:text-5xl">{{ $profile['customer']['name'] }}</h1>
        <p class="mt-3 text-sm leading-relaxed text-white/75 md:text-base">
            Kelola profil, pantau total belanja, dan buka detail pesanan produk Desa Hargorojo.
        </p>
    </div>

    <a
        href="{{ route('ecommerce') }}"
        class="inline-flex h-11 items-center justify-center gap-2 rounded-full border border-white/20 bg-white/10 px-5 text-sm font-semibold text-white backdrop-blur-md transition hover:bg-white hover:text-[#173121]"
    >
        <i class="fa-solid fa-cart-shopping"></i>
        Belanja Lagi
    </a>
</div>
