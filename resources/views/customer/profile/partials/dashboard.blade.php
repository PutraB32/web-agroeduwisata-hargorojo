<div
    x-show="activePanel === 'dashboard'"
    x-transition
    class="grid gap-5 lg:grid-cols-[1.1fr_0.9fr]"
>
    <div class="rounded-2xl border border-[#ece6da] bg-white p-6 shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="font-lora text-2xl font-bold text-[#173121]">Ringkasan Belanja</h2>
                <p class="mt-1 text-sm text-[#6b736d]">Data dihitung dari pesanan yang sudah dibayar.</p>
            </div>
            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#173121] text-[#d8b15a]">
                <i class="fa-solid fa-wallet"></i>
            </span>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl bg-[#f8f6f1] p-5">
                <p class="text-xs font-bold uppercase tracking-widest text-[#6b736d]">Total Belanja</p>
                <p class="mt-3 font-lora text-3xl font-bold text-[#173121]">{{ $profile['summary']['totalBelanjaFormatted'] }}</p>
            </div>
            <div class="rounded-2xl bg-[#f8f6f1] p-5">
                <p class="text-xs font-bold uppercase tracking-widest text-[#6b736d]">Total Pesanan</p>
                <p class="mt-3 font-lora text-3xl font-bold text-[#173121]">{{ $profile['summary']['totalOrders'] }}</p>
            </div>
        </div>

        <div class="mt-5 flex flex-col gap-3 sm:flex-row">
            <button
                type="button"
                @click="activePanel = 'orders'"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-[#173121] px-5 text-sm font-semibold text-white transition hover:bg-[#21412f]"
            >
                <i class="fa-solid fa-receipt"></i>
                Buka Total Pesanan
            </button>
        </div>
    </div>

    <div class="rounded-3xl border border-[#ece6da] bg-white p-6 shadow-[0_22px_55px_rgba(23,49,33,0.08)]">
        <div class="flex items-center gap-3">
            <h3 class="font-lora text-2xl font-bold text-[#06251a]">Pesanan Terbaru</h3>
            @if($profile['latestOrder'])
                <span class="rounded-full bg-[#fff4df] px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#8a5f16]">
                    Aktif
                </span>
            @endif
        </div>

        @if($profile['latestOrder'])
            <div class="mt-7 overflow-hidden rounded-2xl border border-[#ece6da] bg-[#fbfaf6] shadow-[0_14px_35px_rgba(23,49,33,0.06)]">
                <div class="flex">
                    <div class="w-1.5 bg-[#8a6517]"></div>
                    <div class="flex-1 p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="break-all text-sm font-extrabold uppercase tracking-[0.01em] text-[#06251a]">
                                    {{ $profile['latestOrder']['displayId'] }}
                                </p>
                                <p class="mt-1 flex items-center gap-2 text-xs font-semibold text-[#2f3f36]">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $profile['latestOrder']['createdAtLabel'] }}
                                </p>
                            </div>
                            <a
                                href="{{ route('customer.profile', ['panel' => 'orders', 'order' => $profile['latestOrder']['id']]) }}"
                                class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-[#7b817a] transition hover:bg-white hover:text-[#173121]"
                                aria-label="Lihat detail pesanan {{ $profile['latestOrder']['displayId'] }}"
                            >
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>

                        <div class="mt-4 border-t border-[#ece6da] pt-4">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm font-semibold text-[#2f3f36]">Total pembayaran</span>
                                <span class="font-lora text-lg font-bold text-[#8a6517]">
                                    {{ $profile['latestOrder']['formattedTotal'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button
                type="button"
                @click="activePanel = 'orders'"
                class="mt-5 flex w-full flex-col items-center justify-center gap-2 rounded-2xl border border-dashed border-[#e5ded1] bg-white/70 px-5 py-6 text-center transition hover:border-[#d8b15a] hover:bg-[#fffaf0]"
            >
                <span class="flex h-10 w-10 items-center justify-center rounded-full text-[#8b928b]">
                    <i class="fa-solid fa-clock-rotate-left text-2xl"></i>
                </span>
                <span class="text-[11px] font-extrabold uppercase tracking-[0.22em] text-[#8b928b]">
                    Lihat Riwayat Belanja Lainnya
                </span>
            </button>
        @else
            <div class="mt-7 rounded-2xl border border-dashed border-[#d8d0c1] bg-[#f8f6f1] p-8 text-center">
                <i class="fa-solid fa-receipt text-2xl text-[#d8b15a]"></i>
                <p class="mt-2 text-sm font-semibold text-[#173121]">Belum ada pesanan.</p>
            </div>
        @endif
    </div>
</div>
