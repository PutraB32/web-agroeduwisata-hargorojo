@extends('layouts.master')

@section('title', 'Belanja Produk - Desa Hargorojo')

@section('content')


<main x-data="cartApp({{ \Illuminate\Support\Js::from($page['cartConfig']) }})" x-effect="document.documentElement.style.overflow = cartOpen ? 'hidden' : ''; document.body.style.overflow = cartOpen ? 'hidden' : ''" @keydown.escape.window="cartOpen = false; notifOpen = false; totalOrdersOpen = false; profileOpen = false; confirmDeleteOpen = false" class="overflow-hidden bg-[#f8f6f1] text-[#173121]">
    <section class="ecommerce-hero relative min-h-[520px] overflow-hidden px-4 pb-28 pt-28 sm:min-h-[620px] sm:px-6 sm:pb-32 sm:pt-36 lg:px-10 lg:pb-40 lg:pt-40">
        <img src="{{ $page['assets']['heroImage'] }}" alt="Produk Desa Hargorojo" class="ecommerce-hero__image absolute inset-0 h-full w-full object-cover">
        <div class="ecommerce-hero__scrim absolute inset-0 bg-[#07150f]/50"></div>
        <div class="ecommerce-hero__soft-light absolute inset-0"></div>
        <div class="ecommerce-hero__bottom-fade absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#f8f6f1] to-transparent"></div>

        <div class="ecommerce-hero__content relative z-10 mx-auto flex max-w-5xl flex-col items-center text-center">
            <h1 class="mt-5 max-w-4xl font-lora text-[42px] font-bold leading-[1.08] text-[#173121] drop-shadow-sm sm:text-6xl lg:text-[60px]">Belanja Produk Desa</h1>
            <p class="font-lobster mt-1 text-[48px] leading-none text-[#c89a44] drop-shadow-sm sm:text-7xl lg:text-[77px]">Asli Hargorojo</p>
            <p class="mt-5 max-w-3xl text-sm leading-7 text-[#251f1f] sm:text-lg sm:leading-8">Temukan produk pilihan dari kekayaan alam dan kearifan lokal Desa Hargorojo, lalu bayar praktis melalui Midtrans.</p>

            @if(! $activeCustomer)
                <div class="mt-7 flex w-full flex-row items-center justify-center gap-3">
                    <a href="{{ route('customer.login') }}" class="inline-flex h-12 min-w-0 flex-1 max-w-[10.5rem] items-center justify-center rounded-xl bg-[#173121] px-4 text-sm font-extrabold uppercase tracking-[0.12em] text-white shadow-[0_16px_35px_rgba(23,49,33,0.22)] transition hover:-translate-y-0.5 hover:bg-[#244832] sm:max-w-[13rem] sm:px-6 sm:tracking-[0.14em]">Masuk</a>
                    <a href="{{ route('customer.register') }}" class="inline-flex h-12 min-w-0 flex-1 max-w-[10.5rem] items-center justify-center rounded-xl border border-[#173121]/25 bg-white/70 px-4 text-sm font-extrabold uppercase tracking-[0.12em] text-[#173121] shadow-[0_16px_35px_rgba(23,49,33,0.12)] transition hover:-translate-y-0.5 hover:bg-white sm:max-w-[13rem] sm:px-6 sm:tracking-[0.14em]">Daftar</a>
                </div>
            @endif

        </div>
    </section>

    <section id="produk-katalog" class="ecommerce-catalog-section relative -mt-20 px-4 pb-14 sm:-mt-24 sm:px-6 sm:pb-16 lg:px-10 lg:pb-20">
        <div class="ecommerce-catalog-panel relative z-10 mx-auto max-w-[1400px] rounded-[26px] border border-[#ece6da] bg-white p-4 shadow-[0_18px_55px_rgba(23,49,33,.10)] sm:p-7 lg:rounded-[34px] lg:p-10">
            @if(session('success') || session('error'))
                <div class="mb-5 rounded-lg border {{ session('success') ? 'border-green-200 bg-green-50 text-green-800' : 'border-red-200 bg-red-50 text-red-800' }} px-4 py-3 text-sm font-semibold">
                    {{ session('success') ?? session('error') }}
                </div>
            @endif

            <div class="ecommerce-catalog-toolbar mx-auto mb-9 max-w-[1400px]">
                <div class="grid gap-3 xl:grid-cols-[minmax(18rem,1fr)_auto] xl:items-center">
                    <div class="flex min-w-0 items-center gap-3">
                        <form action="{{ route('ecommerce') }}#produk-katalog" method="GET" class="ecommerce-search-form relative flex min-w-0 flex-1 items-center rounded-2xl border border-[#e6dece] bg-white p-1.5 shadow-sm transition focus-within:border-[#173121] focus-within:ring-2 focus-within:ring-[#173121]/10">
                            <i class="fa-solid fa-magnifying-glass ml-3 text-[#173121]"></i>
                            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk..." class="h-9 min-w-0 flex-1 bg-transparent px-3 text-sm outline-none">
                            <button type="submit" class="inline-flex h-10 shrink-0 items-center justify-center rounded-xl bg-[#173121] px-4 text-sm font-bold text-white transition hover:bg-[#244832] sm:px-6">
                                Cari
                            </button>
                        </form>


                        <button type="button" @click="cartOpen = true; notifOpen = false; totalOrdersOpen = false; profileOpen = false" aria-label="Buka keranjang" class="ecommerce-cart-shortcut relative flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white text-[#2f6f1f] shadow-[0_10px_24px_rgba(23,49,33,0.12)] ring-1 ring-[#e6dece] transition-all duration-300 hover:-translate-y-0.5 hover:text-[#173121] sm:h-14 sm:w-14">
                            <i class="fa-solid fa-cart-shopping text-base sm:text-lg"></i>
                            <span x-text="cart.reduce((total, item) => total + item.qty, 0)" class="absolute -right-1 -top-1 flex h-6 min-w-6 items-center justify-center rounded-full bg-[#d8b15a] px-1 text-xs font-bold text-white"></span>
                        </button>
                    </div>

                    <div class="ecommerce-customer-actions">
                    @if($page['customerActions'])
                        <div class="relative" @click.outside="notifOpen = false">
                            <button type="button" @click="notifOpen = !notifOpen; totalOrdersOpen = false; profileOpen = false; cartOpen = false" data-order-notification-trigger class="ecommerce-customer-action">
                                <i class="fa-regular fa-bell text-sm text-[#2f6f1f]"></i><span>Notifikasi</span>
                                <span data-order-notification-badge data-show-zero="true" class="ecommerce-customer-action__badge">0</span>
                            </button>

                            @include('customer.partials.order-notification-popup', ['navbarOrders' => $page['customerActions']['notificationOrders']])
                        </div>

                        <div class="relative" @click.outside="totalOrdersOpen = false">
                            <button type="button" @click="totalOrdersOpen = !totalOrdersOpen; notifOpen = false; profileOpen = false; cartOpen = false" class="ecommerce-customer-action">
                                <i class="fa-regular fa-clipboard text-sm text-[#2f6f1f]"></i>
                                <span>Riwayat Pesanan</span>
                            </button>

                            <div x-cloak x-show="totalOrdersOpen" x-transition class="ecommerce-customer-popup ecommerce-customer-popup--orders fixed left-4 right-4 top-[9.75rem] z-[140] flex max-h-[min(620px,calc(100vh-11.25rem))] w-auto max-w-none flex-col overflow-hidden rounded-[1.35rem] bg-[#fffdf8] p-3 text-[#173121] shadow-[0_28px_80px_rgba(0,0,0,0.28)] sm:top-[6.25rem] sm:max-h-[min(620px,calc(100vh-7.5rem))] lg:absolute lg:left-auto lg:right-0 lg:top-[3rem] lg:w-[30rem] lg:max-w-[calc(100vw-2rem)] lg:p-4">
                                <div class="flex shrink-0 items-center justify-between px-1 pb-3">
                                    <div>
                                        <h4 class="font-lora text-lg font-bold leading-none">Detail Pesanan</h4>
                                        <p class="text-xs text-[#6b736d]">{{ $page['customerActions']['totalOrders'] }} pesanan tersimpan</p>
                                    </div>
                                    <span class="rounded-full bg-[#fff4df] px-3 py-1.5 text-xs font-bold text-[#b47a22]">Invoice</span>
                                </div>

                                <div class="cart-panel-scroll mt-3 min-h-0 flex-1 overflow-y-auto pr-1">
                                    <div class="space-y-3">
                                        @forelse($page['customerActions']['orders'] as $order)
                                            <article id="{{ $order['domId'] }}" data-customer-order-row="{{ $order['id'] }}" class="customer-order-history-item rounded-xl bg-[#f8f6f1] p-3.5">
                                                <div class="flex items-start justify-between gap-3">
                                                    <div class="min-w-0 flex-1">
                                                        <p class="break-words text-sm font-bold leading-snug">Pesanan {{ $order['displayId'] }}</p>
                                                        <p class="text-[11px] text-[#6b736d]">{{ $order['createdAtLabel'] }}</p>
                                                    </div>
                                                    <span class="shrink-0 rounded-full bg-white px-2.5 py-1 text-[10px] font-bold text-[#173121]">{{ $order['statusOrderLabel'] }}</span>
                                                </div>

                                                <div class="mt-3 grid gap-2 rounded-xl bg-white/70 px-3 py-2 text-xs text-[#516057] sm:grid-cols-2">
                                                    <p><span class="font-bold text-[#173121]">Penerima:</span> {{ $order['customerName'] }}</p>
                                                    <p><span class="font-bold text-[#173121]">Metode:</span> {{ $order['metodePenerimaanLabel'] }}</p>
                                                    <p><span class="font-bold text-[#173121]">Pembayaran:</span> {{ $order['paymentStatusLabel'] }}</p>
                                                    <p><span class="font-bold text-[#173121]">Total:</span> {{ $order['formattedTotal'] }}</p>
                                                </div>

                                                @if($order['hasDetails'])
                                                    <div class="mt-3 overflow-hidden rounded-xl bg-white">
                                                        <div class="px-3 py-2 text-xs font-bold uppercase tracking-[0.12em] text-[#6b736d]">Detail Produk</div>
                                                        <div class="divide-y divide-[#f1eadf]">
                                                            @foreach($order['details'] as $detail)
                                                                <div class="flex items-center gap-3 px-3 py-3">
                                                                    <img src="{{ $detail['imageUrl'] }}" alt="{{ $detail['name'] }}" class="h-11 w-11 shrink-0 rounded-lg object-cover" onerror="this.src='{{ $page['assets']['fallbackProductImage'] ?? asset('images/beranda.bg.jpeg') }}'">
                                                                    <div class="min-w-0 flex-1">
                                                                        <p class="truncate text-sm font-semibold text-[#173121]">{{ $detail['name'] }}</p>
                                                                        <p class="mt-0.5 text-xs text-[#6b736d]">{{ $detail['quantity'] }} x {{ $detail['formattedUnitPrice'] }}</p>
                                                                    </div>
                                                                    <p class="shrink-0 text-right text-xs font-bold text-[#173121]">{{ $detail['formattedSubtotal'] }}</p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="mt-3 flex flex-col gap-2 text-xs text-[#516057] sm:flex-row sm:items-center sm:justify-between">
                                                    @if($order['shipment']['available'])
                                                        <span class="rounded-full bg-green-50 px-3 py-1 font-semibold text-green-800">{{ $order['shipment']['kurir'] }} - {{ $order['shipment']['nomorResi'] }}</span>
                                                    @else
                                                        <span class="rounded-full bg-amber-50 px-3 py-1 font-semibold text-amber-700">Menunggu pengiriman</span>
                                                    @endif
                                                    <button type="button" onclick="window.printCustomerInvoice('customer-invoice-order-{{ $order['id'] }}')" class="font-bold text-[#b47a22] transition hover:text-[#173121]">Simpan Invoice</button>
                                                </div>
                                            </article>
                                            @include('customer.partials.order-invoice-print', ['order' => $order, 'invoiceId' => 'customer-invoice-order-'.$order['id']])
                                        @empty
                                            <div class="rounded-xl bg-[#f8f6f1] p-5 text-center">
                                                <i class="fa-solid fa-bag-shopping mb-2 text-[#d8b15a]"></i>
                                                <p class="text-sm font-semibold">Belum ada pesanan.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative" @click.outside="profileOpen = false">
                            <button type="button" @click="profileOpen = !profileOpen; notifOpen = false; totalOrdersOpen = false; cartOpen = false" class="ecommerce-customer-action">
                                <i class="fa-regular fa-user text-sm text-[#2f6f1f]"></i>
                                <span>Profil</span>
                            </button>

                            <div x-cloak x-show="profileOpen" x-transition class="ecommerce-customer-popup ecommerce-customer-popup--profile fixed left-4 right-4 top-[9.75rem] z-[140] w-auto max-w-none overflow-hidden rounded-[1.35rem] bg-[#fffdf8] p-4 text-[#173121] shadow-[0_28px_80px_rgba(0,0,0,0.28)] sm:top-[6.25rem] lg:absolute lg:left-auto lg:right-0 lg:top-[3rem] lg:w-[26rem] lg:max-w-[calc(100vw-2rem)]">
                                <div class="flex items-start gap-3">
                                    <span class="inline-flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border border-[#d8b15a]/60 bg-white">
                                        @if($page['customerActions']['profilePhotoUrl'])
                                            <img src="{{ $page['customerActions']['profilePhotoUrl'] }}" alt="Foto {{ $page['customerActions']['profileLabel'] }}" class="h-full w-full object-cover" onerror="this.style.display='none';">
                                        @endif
                                    </span>
                                    <div class="min-w-0 flex-1">
                                        <h4 class="truncate font-lora text-xl font-bold leading-none">{{ $page['customerActions']['profileName'] }}</h4>
                                        <p class="mt-1 truncate text-sm text-[#6b736d]">{{ $page['customerActions']['profileEmail'] }}</p>
                                    </div>
                                </div>

                                <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-3">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label class="mb-1.5 block text-[11px] font-bold uppercase tracking-[0.12em] text-[#173121]">Foto Profil</label>
                                        <input type="file" name="foto" accept="image/*" class="w-full rounded-xl border border-[#ece6da] bg-white px-3 py-2 text-xs text-[#6b736d] file:mr-3 file:rounded-full file:border-0 file:bg-[#173121] file:px-3 file:py-1.5 file:text-xs file:font-bold file:text-white focus:outline-none focus:ring-2 focus:ring-[#173121]/20">
                                    </div>

                                    <div class="grid gap-3 sm:grid-cols-2">
                                        <div>
                                            <label class="mb-1.5 block text-[11px] font-bold uppercase tracking-[0.12em] text-[#173121]">Nama</label>
                                            <input type="text" name="name" value="{{ old('name', $checkoutCustomer->name) }}" class="h-10 w-full rounded-xl border border-[#ece6da] px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]/20" required>
                                        </div>
                                        <div>
                                            <label class="mb-1.5 block text-[11px] font-bold uppercase tracking-[0.12em] text-[#173121]">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $checkoutCustomer->email) }}" class="h-10 w-full rounded-xl border border-[#ece6da] px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]/20" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="mb-1.5 block text-[11px] font-bold uppercase tracking-[0.12em] text-[#173121]">No. HP</label>
                                        <input type="text" name="no_hp" value="{{ old('no_hp', $checkoutCustomer->no_hp) }}" class="h-10 w-full rounded-xl border border-[#ece6da] px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]/20" placeholder="08123456789">
                                    </div>

                                    <div>
                                        <label class="mb-1.5 block text-[11px] font-bold uppercase tracking-[0.12em] text-[#173121]">Alamat</label>
                                        <textarea name="alamat" rows="3" class="w-full rounded-xl border border-[#ece6da] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]/20" placeholder="Alamat pengiriman utama">{{ old('alamat', $checkoutCustomer->alamat) }}</textarea>
                                    </div>

                                    <button type="submit" class="inline-flex h-10 w-full items-center justify-center rounded-xl bg-[#173121] px-4 text-sm font-bold text-white transition hover:bg-[#244832]">
                                        Simpan Profil
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('customer.login') }}" class="ecommerce-customer-action"><i class="fa-regular fa-bell text-sm text-[#2f6f1f]"></i><span>Notifikasi</span></a>
                        <a href="{{ route('customer.login') }}" class="ecommerce-customer-action"><i class="fa-regular fa-clipboard text-sm text-[#2f6f1f]"></i><span>Riwayat Pesanan</span></a>
                        <a href="{{ route('customer.login') }}" class="ecommerce-customer-action"><i class="fa-regular fa-user text-sm text-[#2f6f1f]"></i><span>Profil</span></a>
                    @endif
                    </div>
                </div>
            </div>
            @if($page['featuredProducts']->count())
                <div class="ecommerce-featured-block mb-10">
                    <div class="ecommerce-section-heading mb-5 flex flex-col gap-1">
                        <div>
                            <h2 class="font-lora text-2xl font-bold text-[#173121] sm:text-3xl">Produk Unggulan</h2>
                            <p class="text-sm italic text-[#6b736d]">Geser untuk melihat produk unggulan lainnya</p>
                        </div>
                    </div>

                    <div class="relative lg:px-14">
                        <button type="button" onclick="scrollProduk(-380)" aria-label="Geser produk unggulan ke kiri" class="absolute -left-2 top-1/2 z-10 hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-[#ece6da] bg-white/95 text-[#173121] shadow-[0_12px_30px_rgba(0,0,0,0.12)] transition hover:-translate-x-0.5 hover:bg-[#173121] hover:text-white lg:flex"><i class="fa-solid fa-chevron-left"></i></button>
                        <div id="produkUnggulanSlider" class="flex snap-x gap-4 overflow-x-auto py-4 scrollbar-hide">
                            @foreach($page['featuredProducts'] as $produk)
                                <article class="ecommerce-feature-card group relative h-[320px] w-[82vw] max-w-[420px] lg:w-[400px] lg:h-[320px] shrink-0 snap-start overflow-hidden rounded-2xl bg-[#173121] shadow-sm sm:h-[350px] sm:w-[360px]">
                                    <img src="{{ $produk['imageUrl'] }}" alt="{{ $produk['name'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/25 to-transparent"></div>
                                    <span class="absolute left-4 top-4 rounded-full bg-[#d8b15a] px-3 py-1 text-xs font-bold text-[#173121]">BEST SELLER</span>
                                    <div class="absolute inset-x-0 bottom-0 p-5 text-white">
                                        <h3 class="font-lora text-xl font-bold min-h-[45px]">{{ $produk['name'] }}</h3>
                                        <p class="line-clamp-2 text-sm text-white/80">{{ $produk['featuredDescriptionExcerpt'] }}</p>
                                        <div class="mt-1 flex items-end justify-between gap-3">
                                            <div><p class="text-xl font-bold">{{ $produk['priceFormatted'] }}<span class="text-sm font-medium text-[#dbdbdb]"> / {{ $produk['unit'] }}</span></p><p class="text-xs text-white/70">Stok {{ $produk['stock'] }} {{ $produk['unit'] }}</p></div>
                                            <button type="button" @click="addToCart({{ \Illuminate\Support\Js::from($produk['cartPayload']) }})" @disabled($produk['stock'] < 1) class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#d8b15a] px-3 sm:px-4 py-2 text-xs sm:text-sm font-bold text-[#173121] whitespace-nowrap transition hover:bg-white disabled:cursor-not-allowed disabled:bg-gray-300"><i class="fa-solid fa-cart-plus text-lg"></i><span class="sm:hidden">+ Keranjang</span><span class="hidden sm:inline">Tambah ke Keranjang</span></button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <button type="button" onclick="scrollProduk(450)" aria-label="Geser produk unggulan ke kanan" class="absolute -right-2 top-1/2 z-10 hidden h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full border border-[#ece6da] bg-white/95 text-[#173121] shadow-[0_12px_30px_rgba(0,0,0,0.12)] transition hover:translate-x-0.5 hover:bg-[#173121] hover:text-white lg:flex"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            @endif

            <div class="ecommerce-products-block">
                <div class="ecommerce-section-heading mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h2 class="font-lora text-2xl font-bold text-[#173121] sm:text-3xl">Semua Produk</h2>
                        <p class="mt-1 text-sm italic text-[#6b736d]">
                            @if(request('q'))
                                Hasil pencarian untuk "{{ request('q') }}"
                            @else
                                Pilihan lengkap produk berkualitas Desa Hargorojo
                            @endif
                        </p>
                    </div>
                    @if(request('q'))
                        <a href="{{ route('ecommerce') }}#produk-katalog" class="inline-flex h-10 items-center justify-center rounded-xl border border-[#e6dece] px-4 text-sm font-bold text-[#173121] transition hover:bg-[#f8f6f1]">
                            Tampilkan semua
                        </a>
                    @endif
                </div>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse($page['products'] as $produk)
                        <article class="ecommerce-product-card group flex h-full flex-col overflow-hidden rounded-2xl border border-[#ece6da] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                            <div class="relative overflow-hidden">
                                <img src="{{ $produk['imageUrl'] }}" alt="{{ $produk['name'] }}" class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-105">
                                @if($produk['isFeatured'])<span class="absolute left-3 top-3 rounded-full bg-[#d8b15a] px-3 py-1 text-[11px] font-bold text-[#173121]">BEST SELLER</span>@endif
                                @if($produk['stock'] < 1)<span class="absolute right-3 top-3 rounded-full bg-red-600 px-3 py-1 text-[11px] font-bold text-white">HABIS</span>@endif
                            </div>
                            <div class="flex flex-1 flex-col p-6 text-left">
                                <h3 class="font-lora text-center text-xl lg:text-[18px] font-extrabold text-[#173121] line-clamp-2 min-h-[54px] mb-1 ">{{ $produk['name']}}</h3>
                                <p class=" text-xl text-center font-bold text-[#c6a949]">{{ $produk['priceFormatted'] }} <span class="text-sm font-medium text-[#717772]"> /{{ $produk['unit'] }}</span></p>
                                <div class="text-center text-sm font-medium text-green-600"> ● Stok Tersedia </div>
                                <button type="button" @click="addToCart({{ \Illuminate\Support\Js::from($produk['cartPayload']) }})" @disabled($produk['stock'] < 1) class="mt-4 inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-[#173121] px-4 text-sm font-bold text-white transition hover:bg-[#244832] disabled:cursor-not-allowed disabled:bg-gray-300">
                                    <i class="fa-solid fa-cart-plus text-lg"></i> Tambah ke Keranjang
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

    <div x-cloak x-show="cartOpen" x-transition.opacity @click="cartOpen = false" @wheel.prevent @touchmove.prevent class="fixed inset-0 z-[90] bg-black/45 backdrop-blur-sm"></div>
    <aside x-cloak x-show="cartOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="fixed right-0 top-0 z-[100] flex h-dvh w-full max-w-[460px] flex-col overflow-hidden bg-white shadow-[-20px_0_60px_rgba(0,0,0,.16)]">
        <header class="flex shrink-0 items-center justify-between border-b border-[#ece6da] px-5 py-4">
            <div><h3 class="font-lora text-2xl font-bold text-[#173121]">Keranjang</h3><p class="text-sm text-[#6b736d]">Produk yang akan dibeli</p></div>
            <button type="button" @click="cartOpen = false" class="h-10 w-10 rounded-full bg-[#f8f6f1] transition hover:bg-[#ece6da]"><i class="fa-solid fa-xmark"></i></button>
        </header>

        <div class="cart-panel-scroll min-h-0 flex-1 overflow-y-auto">
            <div class="p-4 sm:p-5">
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
                <div class="grid gap-2">
                    <p class="text-sm font-bold text-[#173121]">Metode penerimaan</p>
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#ece6da] p-3 text-sm transition" :class="checkoutForm.metode_penerimaan === 'ambil_di_tempat' ? 'border-[#173121] bg-[#f8f6f1]' : 'bg-white'">
                        <input type="radio" x-model="checkoutForm.metode_penerimaan" value="ambil_di_tempat" class="accent-[#173121]">
                        <span><b>Ambil di tempat</b><br><small class="text-[#6b736d]">Pesanan diambil langsung di lokasi.</small></span>
                    </label>
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#ece6da] p-3 text-sm transition" :class="checkoutForm.metode_penerimaan === 'cod_bayar_di_tempat' ? 'border-[#173121] bg-[#f8f6f1]' : 'bg-white'">
                        <input type="radio" x-model="checkoutForm.metode_penerimaan" value="cod_bayar_di_tempat" class="accent-[#173121]">
                        <span><b>COD / Bayar di tempat</b><br><small class="text-[#6b736d]">Bayar saat pesanan diterima.</small></span>
                    </label>
                </div>
            </div>
            <button type="button" @click="checkout" :disabled="checkoutLoading || cart.length === 0" class="h-12 w-full rounded-xl bg-[#173121] font-bold text-white transition hover:bg-[#244832] disabled:cursor-not-allowed disabled:opacity-60">
                <span x-text="checkoutLoading ? 'Memproses...' : 'Bayar via Midtrans'"></span>
            </button>
        </div>
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


<section class="ecommerce-bulk-cta relative w-full overflow-hidden py-6 mb-0">
    <img src="{{ asset('images/assets foto/CTA_ecommerceee.png') }}" alt="Produk Desa Hargorojo" class="ecommerce-bulk-cta__image absolute inset-0 w-full h-full object-cover">
    <div class="ecommerce-bulk-cta__overlay absolute inset-0 bg-gradient-to-r from-[#07150f]/95 via-[#173121]/85 to-[#173121]/40"></div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-6 lg:px-10 py-16 lg:py-8">

        <!-- TRUST BADGE -->
        <div class="ecommerce-bulk-cta__badge hidden lg:block absolute top-8 right-10 xl:top-1 xl:right-2 z-20">
            <img src="{{ asset('/images/assets foto/label_produk.png') }}" alt="Produk Alami Desa Hargorojo" class="w-[140px] xl:w-[180px] drop-shadow-[0_20px_40px_rgba(0,0,0,0.30)] hover:scale-105 transition-all duration-700">
        </div>

        <!-- TITLE -->
        <h2 class="ecommerce-bulk-cta__title max-w-2xl font-lora text-white text-[42px] md:text-[48px] leading-[1.05] font-bold mb-2">
            Butuh Produk Kelapa
            <span class="text-[#d8b15a]">dalam Jumlah Besar?</span>
        </h2>

        <!-- DESCRIPTION -->
        <p class="ecommerce-bulk-cta__lead max-w-4xl text-white/80 text-[17px] italic leading-[1.3] mb-6 font-thin">
            Kami melayani pemesanan grosir untuk UMKM, reseller, toko oleh-oleh, dan distributor dari seluruh Indonesia dengan harga khusus dan kualitas terbaik langsung dari Desa Hargorojo.
        </p>

        <!-- FEATURES -->
        <div class="grid md:grid-cols-3 max-w-4xl mb-10">

            <!-- ITEM -->
            <div class="ecommerce-bulk-cta__feature flex items-start gap-4">
                <div class="w-14 h-14 rounded-full bg-[#d8b15a]/10 border border-[#d8b15a]/20 flex items-center justify-center text-[#d8b15a]">
                    <i class="fa-solid fa-tags"></i>
                </div>

                <div>
                    <h4 class="text-white font-semibold">Harga Grosir</h4>
                    <p class="text-white/70 text-sm">
                        Harga terbaik untuk <br> pembelian dalam jumlah besar.
                    </p>
                </div>
            </div>

            <!-- ITEM -->
            <div class="ecommerce-bulk-cta__feature flex items-start gap-4">
                <div class="w-14 h-14 rounded-full bg-[#d8b15a]/10 border border-[#d8b15a]/20 flex items-center justify-center text-[#d8b15a]">
                    <i class="fa-solid fa-cube"></i>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-1">Produk Berkualitas</h4>
                    <p class="text-white/70 text-sm">
                        Diproduksi langsung oleh <br> masyarakat Desa Hargorojo.
                    </p>
                </div>
            </div>

            <!-- ITEM -->
            <div class="ecommerce-bulk-cta__feature flex items-start gap-4">
                <div class="w-14 h-14 rounded-full bg-[#d8b15a]/10 border border-[#d8b15a]/20 flex items-center justify-center text-[#d8b15a]">
                    <i class="fa-solid fa-truck"></i>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-1">Pengiriman Nasional</h4>
                    <p class="text-white/70 text-sm">
                        Melayani pengiriman ke <br> seluruh wilayah Indonesia.
                    </p>
                </div>
            </div>

        </div>

        <!-- BUTTON AREA -->
        <div class="ecommerce-bulk-cta__action flex flex-col lg:flex-row items-start lg:items-center gap-6">
            <a href="https://wa.me/6280000000000" target="_blank" class="group inline-flex items-center gap-4 px-6 py-3 rounded-4xl bg-[#d8b15a] text-[#173121] font-semibold shadow-[0_20px_50px_rgba(216,177,90,0.30)] hover:scale-[1.02] transition-all duration-500">
                <i class="fa-brands fa-whatsapp text-xl"></i>
                Hubungi Admin
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-all"></i>
            </a>
        </div>

    </div>

</section>


<section class="py-20 bg-[#faf8f4]">
    <div class="max-w-4xl mx-auto px-6 lg:px-10">
        <!-- SMALL LABEL -->
        <div class="ecommerce-faq-label reveal reveal-delay-1 flex items-center justify-center gap-3 mb-4">
            <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
            <span class="shrink-0 text-center uppercase tracking-[0.2em] text-[14px] font-semibold text-[#b89b5e]">
                Informasi Tambahan
            </span>
            <div class="line-expand h-[2px] bg-yellow-500 rounded-full"></div>
        </div>

        <!-- TITLE -->
        <h2 class="reveal reveal-delay-2 text-center font-lora text-[40px] md:text-[45px] leading-[1] font-bold text-[#173121] mb-2">
            Pertanyaan yang Sering Diajukan
        </h2>
        <!-- DESCRIPTION -->
        <p class="reveal reveal-delay-3 max-w-2xl mx-auto text-[#52605a] text-[15px] md:text-[18px] text-center leading-[1.4] font-light mb-10">
            Berikut adalah beberapa pertanyaan yang sering diajukan oleh pelanggan kami.
            Temukan jawabannya di bawah ini.
        </p>

        <!-- FAQ LIST -->
        <div class="space-y-3">
            @foreach($page['faqItems'] as $faq)
                <article
                    x-data="{ open: false }"
                    class="faq-item bg-white rounded-[24px] border border-[#ece6da] overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.04)]"
                >
                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-6 py-5 text-left"
                    >
                        <span class="text-[#173121] font-semibold text-[18px] font-lora">
                            {{ $faq['question'] }}
                        </span>
                        <i
                            class="fa-solid fa-chevron-down transition duration-300"
                            :class="open ? 'rotate-180' : ''"
                        ></i>
                    </button>

                    <div
                        x-show="open"
                        x-transition
                        class="font-lora px-6 pb-6 text-[17px] text-[#5d675f] leading-[1.5]"
                    >
                        <p>
                            {{ $faq['answer'] }}
                        </p>
                        @if(isset($faq['image']))
                            <img
                                src="{{ $faq['image'] }}"
                                alt="Alur Pemesanan"
                                class="w-full max-w-4xl mx-auto rounded-2xl border border-[#ece8df] mt-4"
                            >
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        <!-- BOTTOM CTA -->
        <div class="faq-cta mt-12 bg-white rounded-[28px] border border-[#ece6da] p-6 lg:p-8 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="font-lora text-[#173121] font-bold text-2xl mb-2">
                    Masih ada pertanyaan lain?
                </h3>
                <p class="text-[#6b736d] font-lora italic">
                    Jangan ragu untuk menghubungi admin kami.
                </p>
            </div>
            <a
                href="https://wa.me/6280000000000"
                target="_blank"
                class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl bg-[#173121] text-white font-medium hover:bg-[#204732] transition-all"
            >
                <i class="fa-brands fa-whatsapp"></i>
                Hubungi Admin via WhatsApp
            </a>
        </div>
    </div>
</section>
</main>

@if(filled($page['midtrans']['clientKey']))
    <script src="{{ $page['midtrans']['snapScriptUrl'] }}" data-client-key="{{ $page['midtrans']['clientKey'] }}"></script>
@endif
@endsection
