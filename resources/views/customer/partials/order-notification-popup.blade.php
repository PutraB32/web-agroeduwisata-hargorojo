<div
    x-show="notifOpen"
    x-transition
    x-cloak
    class="
        fixed
        left-4
        right-4
        top-[9.75rem]
        sm:top-[6.25rem]
        z-[140]
        flex
        flex-col
        w-auto
        max-w-none
        overflow-hidden
        rounded-[1.35rem]
        bg-[#fffdf8]
        text-[#173121]
        shadow-[0_28px_80px_rgba(0,0,0,0.28)]
        border
        border-[#ece6da]
        p-3
        lg:absolute
        lg:left-auto
        lg:right-0
        lg:top-[3rem]
        lg:w-[22rem]
        lg:max-w-[calc(100vw-2rem)]
        lg:p-4
    "
    style="display: none; max-height: min(520px, calc(100vh - 11.25rem));"
>
    <div class="
        flex
        shrink-0
        items-center
        justify-between
        px-1
        pb-3
        border-b
        border-[#ece6da]
    ">
        <div>
            <h4 class="font-lora text-lg font-bold leading-none">Notifikasi Pesanan</h4>
            <p class="text-xs text-[#6b736d]">Klik untuk melihat riwayat pesanan</p>
        </div>

        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#fff4df] text-[#d8b15a]">
            <i class="fa-regular fa-bell"></i>
        </span>
    </div>

    <div class="cart-panel-scroll mt-3 min-h-0 flex-1 overflow-y-auto pr-1">
        <div class="space-y-2.5">
            @forelse($navbarOrders as $order)
            <button type="button" @click.stop="openOrderHistoryFromNotification({{ \Illuminate\Support\Js::from($order['domId']) }})" data-order-notification-link class="w-full text-left rounded-xl
                border
                border-[#ece6da]
                bg-[#f8f6f1]
                p-3.5
                block
                transition
                hover:-translate-y-0.5
                hover:border-[#d8b15a]
                hover:bg-white
            ">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0 flex-1">
                        <p class="break-words text-sm font-bold leading-snug">Pesanan {{ $order['displayId'] }}</p>
                        <p class="text-[11px] text-[#6b736d]">
                            {{ $order['createdAtLabel'] }}
                        </p>
                    </div>

                    <span class="
                        rounded-full
                        bg-white
                        px-2.5
                        py-1
                        text-[10px]
                        font-bold
                        text-[#173121]
                        border
                        border-[#ece6da]
                        shrink-0
                    ">
                        {{ $order['statusOrderLabel'] }}
                    </span>
                </div>

                <div class="mt-3 space-y-1 rounded-xl bg-white/45 px-3 py-2">
                    @foreach($order['visibleDetails'] as $detail)
                        <p class="text-xs text-[#4d5a51]">
                            {{ $detail['name'] }}
                            <span class="font-semibold">x{{ $detail['quantity'] }}</span>
                        </p>
                    @endforeach

                    @if($order['hasRemainingDetails'])
                        <p class="text-xs italic text-[#6b736d]">
                            {{ $order['remainingDetailsLabel'] }}
                        </p>
                    @endif
                </div>

                <div class="
                    mt-3
                    grid
                    grid-cols-[1fr_auto]
                    items-center
                    gap-3
                    text-xs
                ">
                    <span class="min-w-0 text-[#6b736d]">
                        Pembayaran:
                        <span class="font-bold text-[#173121]">
                            {{ $order['paymentStatusLabel'] }}
                        </span>
                    </span>

                    <span class="shrink-0 font-bold text-[#173121]">
                        {{ $order['formattedTotal'] }}
                    </span>
                </div>
                <span class="mt-2 inline-flex text-xs font-bold text-[#b47a22]">Lihat Riwayat Pesanan</span>
            </button>
            @empty
            <div class="
                rounded-xl
                border
                border-dashed
                border-[#d8d0c1]
                bg-[#f8f6f1]
                p-5
                text-center
            ">
                <i class="fa-solid fa-bag-shopping text-[#d8b15a] mb-2"></i>
                <p class="text-sm font-semibold">Belum ada pesanan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
