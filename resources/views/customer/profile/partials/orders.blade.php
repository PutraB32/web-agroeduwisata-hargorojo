<div
    x-show="activePanel === 'orders'"
    x-transition
    x-cloak
    class="rounded-2xl border border-[#ece6da] bg-white p-5 shadow-[0_20px_60px_rgba(0,0,0,0.08)]"
>
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="font-lora text-2xl font-bold text-[#173121]">Transaksi Terakhir</h2>
            <p class="mt-1 text-sm text-[#6b736d]">
                Detail pesanan terbaru, semua produk yang dipesan, dan total belanja.
            </p>
        </div>

        <div class="inline-flex items-center gap-2 rounded-full bg-[#f8f6f1] px-4 py-2 text-xs font-bold text-[#173121]">
            <i class="fa-solid fa-receipt text-[#d8b15a]"></i>
            {{ $profile['summary']['shownOrdersLabel'] }}
        </div>
    </div>

    @if($profile['summary']['hasOrders'])
        <div class="mt-5 space-y-4">
            @foreach($profile['orders'] as $order)
                @include('customer.profile.partials.order-card', ['order' => $order])
            @endforeach
        </div>
    @else
        <div class="mt-5 rounded-2xl border border-dashed border-[#d8d0c1] bg-[#f8f6f1] p-10 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-white text-[#d8b15a]">
                <i class="fa-solid fa-receipt text-xl"></i>
            </div>
            <p class="mt-4 font-semibold text-[#173121]">Belum ada transaksi.</p>
            <p class="mt-1 text-sm text-[#6b736d]">Pesanan customer akan tampil otomatis setelah checkout.</p>
            <a
                href="{{ route('ecommerce') }}"
                class="mt-5 inline-flex h-11 items-center justify-center gap-2 rounded-full bg-[#173121] px-5 text-sm font-semibold text-white transition hover:bg-[#21412f]"
            >
                <i class="fa-solid fa-cart-shopping"></i>
                Mulai Belanja
            </a>
        </div>
    @endif
</div>
