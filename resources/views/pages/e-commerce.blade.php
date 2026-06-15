@extends('layouts.master')

@section('title', 'Belanja Produk - Desa Hargorojo')

@section('content')
@include('layouts.navbar')

<main x-data="cartApp({{ \Illuminate\Support\Js::from($page['cartConfig']) }})" class="bg-[#f8f6f1]">
    <section class="relative overflow-hidden px-4 pb-16 pt-32 sm:px-6 sm:pb-24 sm:pt-36 lg:px-10 lg:pb-28 lg:pt-40">
        <img src="{{ $page['assets']['heroImage'] }}" alt="Produk Desa Hargorojo" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-[#07150f]/50"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,.88)_0%,rgba(255,255,255,.70)_28%,rgba(255,255,255,.24)_58%,rgba(255,255,255,0)_100%)]"></div>

        <div class="relative z-10 mx-auto flex max-w-6xl flex-col items-center text-center">
            <span class="rounded-full border border-[#d4b254] bg-white/40 px-4 py-2 text-[11px] font-bold uppercase tracking-[.16em] text-[#173121] sm:text-sm">Produk lokal Desa Hargorojo</span>
            <h1 class="mt-5 max-w-4xl font-lora text-4xl font-bold leading-tight text-[#173121] drop-shadow-sm sm:text-5xl lg:text-[64px]">Belanja Produk Desa</h1>
            <p class="font-lobster mt-1 text-5xl leading-none text-[#c89a44] drop-shadow-sm sm:text-6xl lg:text-[76px]">Asli Hargorojo</p>
            <p class="mt-5 max-w-3xl text-sm leading-7 text-[#251f1f] sm:text-lg">Temukan produk pilihan dari kekayaan alam dan kearifan lokal Desa Hargorojo, lalu bayar praktis melalui Midtrans.</p>

        </div>
    </section>

    <section id="produk-katalog" class="relative px-4 py-10 sm:px-6 sm:py-12 lg:px-10">
        <div class="relative z-10 mx-auto max-w-[1350px] rounded-2xl border border-[#ece6da] bg-white p-5 shadow-[0_18px_55px_rgba(0,0,0,.07)] sm:p-7 lg:rounded-[32px] lg:p-10">
            @if(session('success') || session('error'))
                <div class="mb-5 rounded-lg border {{ session('success') ? 'border-green-200 bg-green-50 text-green-800' : 'border-red-200 bg-red-50 text-red-800' }} px-4 py-3 text-sm font-semibold">
                    {{ session('success') ?? session('error') }}
                </div>
            @endif

            <div class="mx-auto mb-9 flex max-w-3xl flex-col gap-3 sm:flex-row">
                <form action="{{ route('ecommerce') }}#produk-katalog" method="GET" class="relative flex flex-1 items-center rounded-xl border border-[#e6dece] bg-white p-1.5 shadow-sm transition focus-within:border-[#173121] focus-within:ring-2 focus-within:ring-[#173121]/10">
                    <i class="fa-solid fa-magnifying-glass ml-3 text-[#173121]"></i>
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk..." class="h-10 min-w-0 flex-1 bg-transparent px-3 text-sm outline-none">
                    <button type="submit" class="inline-flex h-10 shrink-0 items-center justify-center rounded-lg bg-[#173121] px-4 text-sm font-bold text-white transition hover:bg-[#244832]">
                        Cari
                    </button>
                </form>
                <button type="button" @click="cartOpen = true" class="relative inline-flex h-12 items-center justify-center gap-2 rounded-xl bg-[#173121] px-5 text-sm font-bold text-white shadow-sm transition hover:bg-[#244832] sm:min-w-44">
                    <i class="fa-solid fa-cart-shopping"></i> Keranjang
                    <span class="absolute -right-2 -top-2 flex h-6 min-w-6 items-center justify-center rounded-full border-2 border-white bg-[#d8b15a] px-1 text-xs font-bold text-[#173121]" x-text="cart.reduce((total, item) => total + item.qty, 0)"></span>
                </button>
            </div>

            @if($page['featuredProducts']->count())
                <div class="mb-10">
                    <div class="mb-5 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <h2 class="font-lora text-2xl font-bold text-[#173121] sm:text-3xl">Produk Unggulan</h2>
                            <p class="text-sm italic text-[#6b736d]">Geser untuk melihat produk unggulan lainnya</p>
                        </div>
                        <div class="hidden gap-2 sm:flex">
                            <button type="button" onclick="scrollProduk(-360)" class="h-10 w-10 rounded-full border border-[#ece6da] bg-white text-[#173121] shadow-sm transition hover:bg-[#173121] hover:text-white"><i class="fa-solid fa-chevron-left"></i></button>
                            <button type="button" onclick="scrollProduk(360)" class="h-10 w-10 rounded-full border border-[#ece6da] bg-white text-[#173121] shadow-sm transition hover:bg-[#173121] hover:text-white"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>

                    <div id="produkUnggulanSlider" class="flex snap-x gap-4 overflow-x-auto pb-4 scrollbar-hide">
                        @foreach($page['featuredProducts'] as $produk)
                            <article class="group relative h-[340px] w-[82vw] max-w-[380px] shrink-0 snap-start overflow-hidden rounded-2xl bg-[#173121] shadow-sm sm:w-[360px]">
                                <img src="{{ $produk['imageUrl'] }}" alt="{{ $produk['name'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/25 to-transparent"></div>
                                <span class="absolute left-4 top-4 rounded-full bg-[#d8b15a] px-3 py-1 text-xs font-bold text-[#173121]">BEST SELLER</span>
                                <div class="absolute inset-x-0 bottom-0 p-5 text-white">
                                    <h3 class="font-lora text-xl font-bold">{{ $produk['name'] }}</h3>
                                    <p class="mt-2 line-clamp-2 text-sm text-white/80">{{ $produk['featuredDescriptionExcerpt'] }}</p>
                                    <div class="mt-4 flex items-end justify-between gap-3">
                                        <div><p class="text-xl font-bold">{{ $produk['priceFormatted'] }}</p><p class="text-xs text-white/70">Stok {{ $produk['stock'] }} {{ $produk['unit'] }}</p></div>
                                        <button type="button" @click="addToCart({{ \Illuminate\Support\Js::from($produk['cartPayload']) }})" @disabled($produk['stock'] < 1) class="rounded-xl bg-[#d8b15a] px-4 py-2 text-sm font-bold text-[#173121] transition hover:bg-white disabled:cursor-not-allowed disabled:bg-gray-300">Tambah</button>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

            <div>
                <h2 class="font-lora text-2xl font-bold text-[#173121] sm:text-3xl">Semua Produk</h2>
                <p class="mb-6 mt-1 text-sm italic text-[#6b736d]">Pilihan lengkap produk berkualitas Desa Hargorojo</p>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse($page['products'] as $produk)
                        <article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-[#ece6da] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                            <div class="relative overflow-hidden">
                                <img src="{{ $produk['imageUrl'] }}" alt="{{ $produk['name'] }}" class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
                                @if($produk['isFeatured'])<span class="absolute left-3 top-3 rounded-full bg-[#d8b15a] px-3 py-1 text-[11px] font-bold text-[#173121]">BEST SELLER</span>@endif
                                @if($produk['stock'] < 1)<span class="absolute right-3 top-3 rounded-full bg-red-600 px-3 py-1 text-[11px] font-bold text-white">HABIS</span>@endif
                            </div>
                            <div class="flex flex-1 flex-col p-5 text-center">
                                <h3 class="font-lora text-lg font-bold text-[#173121]">{{ $produk['name'] }}</h3>
                                <p class="mt-2 flex-1 text-sm leading-6 text-[#6b736d]">{{ $produk['descriptionExcerpt'] }}</p>
                                <p class="mt-4 text-xl font-bold text-[#173121]">{{ $produk['priceFormatted'] }}</p>
                                <p class="mt-1 text-xs text-[#6b736d]">Stok {{ $produk['stock'] }} {{ $produk['unit'] }}</p>
                                <button type="button" @click="addToCart({{ \Illuminate\Support\Js::from($produk['cartPayload']) }})" @disabled($produk['stock'] < 1) class="mt-4 inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-[#173121] px-4 text-sm font-bold text-white transition hover:bg-[#244832] disabled:cursor-not-allowed disabled:bg-gray-300">
                                    <i class="fa-solid fa-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-2xl border border-dashed border-[#d8d0bf] p-8 text-center text-[#6b736d] sm:col-span-2 lg:col-span-3 xl:col-span-4">Belum ada produk yang tersedia.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <div x-cloak x-show="cartOpen" x-transition.opacity @click="cartOpen = false" class="fixed inset-0 z-[90] bg-black/45 backdrop-blur-sm"></div>
    <aside x-cloak x-show="cartOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="fixed right-0 top-0 z-[100] flex h-dvh w-full max-w-[460px] flex-col bg-white shadow-[-20px_0_60px_rgba(0,0,0,.16)]">
        <header class="flex items-center justify-between border-b border-[#ece6da] px-5 py-4">
            <div><h3 class="font-lora text-2xl font-bold text-[#173121]">Keranjang</h3><p class="text-sm text-[#6b736d]">Produk yang akan dibeli</p></div>
            <button type="button" @click="cartOpen = false" class="h-10 w-10 rounded-full bg-[#f8f6f1] transition hover:bg-[#ece6da]"><i class="fa-solid fa-xmark"></i></button>
        </header>

        <div class="cart-panel-scroll flex-1 overflow-y-auto p-4 sm:p-5">
            <template x-if="cart.length === 0">
                <div class="rounded-2xl border border-dashed border-[#d8d0bf] p-8 text-center">
                    <i class="fa-solid fa-basket-shopping text-3xl text-[#d8b15a]"></i>
                    <h4 class="mt-4 font-lora text-xl font-bold text-[#173121]">Keranjang kosong</h4>
                    <p class="mt-2 text-sm text-[#6b736d]">Tambahkan produk terlebih dahulu sebelum checkout.</p>
                </div>
            </template>

            <template x-for="item in cart" :key="item.id">
                <article class="mb-4 rounded-2xl border border-[#ece6da] p-4">
                    <div class="flex gap-4">
                        <img :src="item.gambar" :alt="item.nama" class="h-20 w-20 shrink-0 rounded-xl object-cover">
                        <div class="min-w-0 flex-1">
                            <h4 x-text="item.nama" class="truncate font-bold text-[#173121]"></h4>
                            <p class="mt-1 font-bold text-[#c6a949]"><span x-text="'Rp ' + Number(item.harga).toLocaleString('id-ID')"></span> / <span x-text="item.satuan"></span></p>
                            <div class="mt-3 flex items-center justify-between gap-3 text-sm">
                                <span class="text-[#6b736d]"><span x-text="item.qty"></span>x <span x-text="'Rp ' + Number(item.harga).toLocaleString('id-ID')"></span></span>
                                <b class="text-[#173121]" x-text="'Rp ' + (item.harga * item.qty).toLocaleString('id-ID')"></b>
                            </div>
                            <div class="mt-3 flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <button type="button" @click="decreaseQty(item.id)" class="h-9 w-9 rounded-lg bg-[#f8f6f1] font-bold text-[#173121]">-</button>
                                    <span x-text="item.qty" class="min-w-5 text-center font-bold"></span>
                                    <button type="button" @click="increaseQty(item.id)" class="h-9 w-9 rounded-lg bg-[#173121] font-bold text-white">+</button>
                                </div>
                                <button type="button" @click="productToDelete = item; confirmDeleteOpen = true" class="text-red-500 transition hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </article>
            </template>
        </div>

        <div class="border-t border-[#ece6da] p-4 sm:p-5">
            <div class="mb-3 flex items-center justify-between text-sm text-[#151515]"><span><b x-text="cart.reduce((total, item) => total + item.qty, 0)"></b> Item</span><b class="text-2xl text-[#173121]" x-text="'Rp' + subtotal().toLocaleString('id-ID')"></b></div>
            <div class="mb-4 grid gap-3">
                <input type="text" x-model="checkoutForm.nama" placeholder="Nama Lengkap" class="h-11 rounded-xl border border-[#ece6da] px-4 outline-none focus:border-[#173121]">
                <input type="text" x-model="checkoutForm.no_telepon" placeholder="Nomor WhatsApp" class="h-11 rounded-xl border border-[#ece6da] px-4 outline-none focus:border-[#173121]">
                <textarea rows="3" x-model="checkoutForm.alamat" placeholder="Alamat Lengkap" class="rounded-xl border border-[#ece6da] px-4 py-3 outline-none focus:border-[#173121]"></textarea>
            </div>
            <button type="button" @click="checkout" :disabled="checkoutLoading || cart.length === 0" class="h-12 w-full rounded-xl bg-[#173121] font-bold text-white transition hover:bg-[#244832] disabled:cursor-not-allowed disabled:opacity-60">
                <span x-text="checkoutLoading ? 'Memproses...' : 'Bayar via Midtrans'"></span>
            </button>
        </div>

        <div x-cloak x-show="confirmDeleteOpen" x-transition class="absolute inset-0 z-[200] flex items-center justify-center bg-white/80 p-6 backdrop-blur-sm">
            <div @click.stop class="w-full rounded-2xl border border-[#ece6da] bg-white p-6 text-center shadow-xl">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-xl text-red-500"><i class="fa-solid fa-trash"></i></div>
                <h3 class="font-lora text-xl font-bold text-[#173121]">Hapus Produk?</h3>
                <p class="mb-6 mt-2 text-sm leading-6 text-[#6b736d]"><b x-text="productToDelete ? productToDelete.nama : ''"></b> akan dihapus dari keranjang.</p>
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" @click="confirmDeleteOpen = false" class="rounded-xl bg-[#f8f6f1] py-3 font-bold text-[#173121]">Batal</button>
                    <button type="button" @click="removeItem(productToDelete.id); confirmDeleteOpen = false" class="rounded-xl bg-red-500 py-3 font-bold text-white">Hapus</button>
                </div>
            </div>
        </div>
    </aside>

    <div x-cloak x-show="showToast" x-transition class="fixed right-4 top-24 z-[9999] flex max-w-[calc(100vw-2rem)] items-center gap-3 rounded-2xl bg-[#173121] px-5 py-4 text-white shadow-xl sm:right-6">
        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-green-500"><i class="fa-solid fa-check"></i></span>
        <div><b class="text-sm">Info</b><p x-text="toastMessage" class="text-sm text-white/80"></p></div>
    </div>

    <section class="relative overflow-hidden bg-[#173121] py-14 text-white sm:py-20">
        <img src="{{ $page['assets']['ctaImage'] }}" alt="Produk Hargorojo" class="absolute inset-0 h-full w-full object-cover opacity-35">
        <div class="absolute inset-0 bg-[#07150f]/70"></div>
        <div class="relative z-10 mx-auto grid max-w-6xl gap-8 px-6 lg:grid-cols-[1fr_auto] lg:items-center lg:px-10">
            <div>
                <p class="text-sm font-bold uppercase tracking-[.18em] text-[#d8b15a]">Butuh pesanan grosir?</p>
                <h2 class="mt-3 font-lora text-3xl font-bold sm:text-4xl">Dapatkan harga terbaik untuk pembelian jumlah besar.</h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-white/75 sm:text-base">Hubungi admin untuk diskusi kebutuhan produk lokal Desa Hargorojo, stok, dan pengiriman.</p>
            </div>
            <a href="https://wa.me/6280000000000" target="_blank" class="inline-flex h-12 items-center justify-center gap-3 rounded-full bg-[#d8b15a] px-6 font-bold text-[#173121] transition hover:bg-white">
                <i class="fa-brands fa-whatsapp"></i> Hubungi Admin
            </a>
        </div>
    </section>

    <section class="bg-[#f8f6f1] px-5 py-14 sm:py-20">
        <div class="mx-auto max-w-4xl">
            <div class="mb-8 text-center">
                <p class="text-sm font-bold uppercase tracking-[.18em] text-[#b89b5e]">Informasi Tambahan</p>
                <h2 class="mt-2 font-lora text-3xl font-bold text-[#173121] sm:text-4xl">Pertanyaan yang Sering Diajukan</h2>
            </div>
            <div class="space-y-3">
                @foreach($page['faqItems'] as $faq)
                    <article x-data="{ open: false }" class="overflow-hidden rounded-2xl border border-[#ece6da] bg-white shadow-sm">
                        <button type="button" @click="open = !open" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left">
                            <span class="font-lora text-base font-bold text-[#173121] sm:text-lg">{{ $faq['question'] }}</span>
                            <i class="fa-solid fa-chevron-down shrink-0 transition" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition class="px-5 pb-5 text-sm leading-7 text-[#5d675f] sm:text-base">
                            <p>{{ $faq['answer'] }}</p>
                            @if(isset($faq['image']))
                                <img src="{{ $faq['image'] }}" alt="Alur pemesanan" class="mt-4 w-full rounded-2xl border border-[#ece8df]">
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-8 rounded-2xl border border-[#ece6da] bg-white p-6 text-center sm:flex sm:items-center sm:justify-between sm:text-left">
                <div><h3 class="font-lora text-2xl font-bold text-[#173121]">Masih ada pertanyaan lain?</h3><p class="mt-1 text-sm italic text-[#6b736d]">Jangan ragu untuk menghubungi admin kami.</p></div>
                <a href="https://wa.me/6280000000000" target="_blank" class="mt-5 inline-flex h-12 items-center justify-center gap-3 rounded-full bg-[#173121] px-6 font-bold text-white transition hover:bg-[#244832] sm:mt-0"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </section>
</main>

@if(filled($page['midtrans']['clientKey']))
    <script src="{{ $page['midtrans']['snapScriptUrl'] }}" data-client-key="{{ $page['midtrans']['clientKey'] }}"></script>
@endif
@endsection