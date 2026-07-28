<article
    id="{{ $order['domId'] }}"
    class="customer-order-card rounded-2xl border border-[#ece6da] bg-[#fffdf8] p-4"
>
    <div class="grid gap-4 lg:grid-cols-[1fr_auto] lg:items-start">
        <div>
            <div class="flex flex-wrap items-center gap-2">
                <p class="break-all font-lora text-lg font-bold text-[#173121]">{{ $order['displayId'] }}</p>
                <span class="inline-flex rounded-full border px-3 py-1 text-[11px] font-bold {{ $order['paymentStatusClass'] }}">
                    {{ $order['paymentStatusLabel'] }}
                </span>
                <span class="inline-flex rounded-full border px-3 py-1 text-[11px] font-bold {{ $order['statusOrderClass'] }}">
                    {{ $order['statusOrderLabel'] }}
                </span>
            </div>
            <p class="mt-1 text-xs text-[#6b736d]">{{ $order['createdAtLabel'] }}</p>

            <div class="mt-4 grid gap-2 text-sm text-[#6b736d] md:grid-cols-2">
                <p>
                    <i class="fa-solid fa-user mr-2 text-[#d8b15a]"></i>
                    {{ $order['customerName'] }}
                </p>
                <p>
                    <i class="fa-solid fa-phone mr-2 text-[#d8b15a]"></i>
                    {{ $order['phone'] }}
                </p>
                <p class="md:col-span-2">
                    <i class="fa-solid fa-location-dot mr-2 text-[#d8b15a]"></i>
                    {{ $order['address'] }}
                </p>
                <p class="md:col-span-2">
                    <i class="fa-solid fa-handshake mr-2 text-[#d8b15a]"></i>
                    {{ $order['metodePenerimaanLabel'] }}
                </p>
            </div>

            @if($order['isAmbilDiTempat'])
                @if($order['pickup']['available'])
                    <div class="mt-4 w-full max-w-md rounded-2xl border border-amber-200 bg-amber-50/70 px-4 py-3 text-sm text-amber-900 shadow-sm">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-xs font-bold text-amber-800 border border-amber-200/80">
                                <i class="fa-solid fa-store"></i>
                                Siap Diambil
                            </span>
                        </div>
                        <p class="mt-3 font-semibold text-amber-950">
                            <i class="fa-solid fa-calendar-check mr-1.5 text-amber-700"></i>
                            Jadwal: {{ $order['pickup']['tanggalAmbilLabel'] }}
                        </p>
                        @if($order['pickup']['hasCatatanAdmin'])
                            <div class="mt-2 rounded-xl bg-white/90 p-2.5 text-xs text-amber-900 border border-amber-200/60 leading-relaxed">
                                <span class="font-bold block mb-0.5 text-amber-950"><i class="fa-solid fa-message mr-1"></i> Pesan dari Admin:</span>
                                {!! $order['pickup']['catatanAdmin'] !!}
                            </div>
                        @endif
                    </div>
                @else
                    <p class="mt-4 inline-flex rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-[11px] font-bold text-amber-800">
                        <i class="fa-solid fa-clock mr-1.5"></i>
                        Jadwal pengambilan sedang disiapkan oleh Admin
                    </p>
                @endif
            @else
                @if($order['shipment']['available'])
                    <div class="mt-4 w-full max-w-md rounded-2xl border border-sky-100 bg-sky-50 px-4 py-3 text-sm text-sky-800 shadow-sm">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1 rounded-full bg-white px-3 py-1 text-xs font-bold text-sky-700">
                                <i class="fa-solid fa-truck-fast"></i>
                                {{ $order['shipment']['kurir'] }}
                            </span>
                        </div>
                        <p class="mt-3 break-all">
                            <span class="font-bold">Nomor resi:</span>
                            {{ $order['shipment']['nomorResi'] }}
                        </p>
                        @if($order['shipment']['hasTanggalDikirim'])
                            <p class="mt-1 text-xs text-sky-700/80">
                                Dikirim pada {{ $order['shipment']['tanggalDikirimLabel'] }}
                            </p>
                        @endif
                    </div>
                @else
                    <p class="mt-4 inline-flex rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-[11px] font-bold text-amber-700">
                        Resi transaksi belum tersedia
                    </p>
                @endif
            @endif
        </div>

        <div class="rounded-2xl bg-white px-5 py-4 text-right shadow-sm">
            <p class="text-xs font-bold uppercase tracking-widest text-[#6b736d]">Total Belanja</p>
            <p class="mt-2 font-lora text-2xl font-bold text-[#173121]">
                {{ $order['formattedTotal'] }}
            </p>
        </div>
    </div>

    <div class="mt-5 overflow-hidden rounded-2xl border border-[#ece6da] bg-white">
        <div class="border-b border-[#ece6da] px-4 py-3">
            <p class="text-xs font-bold uppercase tracking-widest text-[#6b736d]">Produk Dipesan</p>
        </div>

        <div class="divide-y divide-[#f1eadf]">
            @forelse($order['details'] as $detail)
                <div class="grid gap-3 px-4 py-4 md:grid-cols-[1fr_auto] md:items-center">
                    <div class="flex min-w-0 items-center gap-3">
                        <img
                            src="{{ $detail['imageUrl'] }}"
                            alt="{{ $detail['name'] }}"
                            class="h-14 w-14 rounded-xl object-cover"
                            onerror="this.src='{{ $profile['fallbackProductImageUrl'] }}'"
                        >
                        <div class="min-w-0">
                            <p class="font-semibold text-[#173121]">{{ $detail['name'] }}</p>
                            <p class="mt-1 text-xs text-[#6b736d]">
                                {{ $detail['formattedUnitPrice'] }}
                                &times;
                                {{ $detail['quantity'] }}
                            </p>
                        </div>
                    </div>

                    <p class="text-right font-bold text-[#173121]">
                        {{ $detail['formattedSubtotal'] }}
                    </p>
                </div>
            @empty
                <div class="px-4 py-5 text-center text-sm text-[#6b736d]">
                    Detail produk pesanan belum tersedia.
                </div>
            @endforelse
        </div>

        <div class="space-y-2 border-t border-[#ece6da] bg-[#f8f6f1] px-4 py-4 text-sm">
            <div class="flex items-center justify-between gap-3">
                <span class="text-[#6b736d]">Subtotal produk</span>
                <span class="font-bold text-[#173121]">{{ $order['formattedProdukSubtotal'] }}</span>
            </div>
        </div>
    </div>
</article>