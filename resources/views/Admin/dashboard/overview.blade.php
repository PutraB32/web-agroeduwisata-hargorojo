<div class="admin-dashboard-overview space-y-5 md:space-y-7">
    <section class="overflow-hidden rounded-2xl border border-[#dfe8df] bg-white shadow-[0_18px_45px_rgba(0,77,64,0.07)]">
        <div class="grid gap-0 xl:grid-cols-[1.45fr_0.75fr]">
            <div class="p-5 md:p-6">
                <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                    <div class="max-w-2xl">
                        <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Ringkasan Operasional</p>
                        <h2 class="mt-2 font-serif text-2xl font-black leading-tight text-primary md:text-3xl">
                            Daftar kerja admin Hargorojo
                        </h2>
                        <p class="mt-2 text-sm leading-relaxed text-gray-500">
                            Pantau pesanan, pengiriman, stok produk, dan performa penjualan dari satu halaman.
                        </p>
                    </div>

                    <div class="grid w-full grid-cols-1 overflow-hidden rounded-2xl border border-[#ead79a] bg-[#fffaf0] shadow-sm sm:grid-cols-2 lg:w-auto lg:min-w-[20rem]">
                        <div class="px-4 py-3.5">
                            <p class="text-[10px] font-black uppercase tracking-[0.18em] text-[#9f7b20]">Omzet Bulan Ini</p>
                            <p class="mt-2 break-words font-serif text-2xl font-black leading-none text-primary">
                                {{ $dashboardOverview['monthOmzet'] ?? 'Rp0' }}
                            </p>
                        </div>
                        <div class="border-t border-[#ead79a] px-4 py-3.5 sm:border-l sm:border-t-0">
                            <p class="text-[10px] font-black uppercase tracking-[0.18em] text-[#9f7b20]">Hari Ini</p>
                            <p class="mt-2 break-words font-serif text-2xl font-black leading-none text-primary">
                                {{ $dashboardOverview['todayOmzet'] ?? 'Rp0' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach(($dashboardOverview['summaryCards'] ?? []) as $card)
                        <div class="group rounded-2xl border border-gray-100 bg-[#fbfcfa] p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-[#cfdccf] hover:shadow-[0_16px_36px_rgba(0,77,64,0.08)]">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <p class="text-[11px] font-black uppercase tracking-widest text-gray-400">{{ $card['label'] }}</p>
                                    <p class="mt-3 break-words text-3xl font-black leading-none text-gray-900">{{ $card['value'] }}</p>
                                </div>
                                <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border {{ $card['iconClass'] }}">
                                    <i class="fas {{ $card['icon'] }}"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-xs font-medium text-gray-500">{{ $card['caption'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t border-[#e6eee6] bg-[#f8faf7] p-5 xl:border-l xl:border-t-0 md:p-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Prioritas</p>
                        <h3 class="mt-2 font-serif text-xl font-black text-primary">Yang perlu dibereskan</h3>
                    </div>
                    <span class="rounded-full border border-green-100 bg-white px-3 py-1 text-xs font-black text-green-700 shadow-sm">
                        {{ $dashboardOverview['todayLabel'] ?? '-' }}
                    </span>
                </div>

                <div class="mt-5 space-y-3">
                    @foreach(($dashboardOverview['taskCards'] ?? []) as $task)
                        <button type="button" onclick="tampilkanPanel('{{ $task['panel'] }}')" class="group flex w-full items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 text-left shadow-sm transition hover:-translate-y-0.5 hover:border-[#cfdccf] hover:shadow-[0_14px_30px_rgba(0,77,64,0.08)] sm:p-4">
                            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border {{ $task['class'] }}">
                                <i class="fas {{ $task['icon'] }}"></i>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block font-black text-gray-800">{{ $task['label'] }}</span>
                                <span class="mt-0.5 block text-xs leading-relaxed text-gray-500">{{ $task['description'] }}</span>
                            </span>
                            <span class="inline-flex min-w-10 shrink-0 items-center justify-center rounded-full bg-primary px-3 py-1 text-sm font-black text-white">
                                {{ $task['value'] }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="grid gap-6 xl:grid-cols-[0.95fr_1.25fr]">
        <section class="rounded-2xl border border-[#dfe8df] bg-white p-5 shadow-[0_16px_36px_rgba(0,77,64,0.06)] md:p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Alur Transaksi</p>
                    <h3 class="mt-2 font-serif text-xl font-black text-primary">Status pesanan</h3>
                    <p class="mt-1 text-sm text-gray-500">Komposisi pesanan berdasarkan proses terakhir.</p>
                </div>
                <button type="button" onclick="tampilkanPanel('order')" class="inline-flex items-center gap-2 rounded-xl border border-green-100 bg-green-50 px-3 py-2 text-xs font-black text-primary transition hover:bg-green-100">
                    Kelola <i class="fas fa-arrow-right text-[10px]"></i>
                </button>
            </div>

            <div class="mt-6 space-y-4">
                @foreach(($dashboardOverview['statusRows'] ?? []) as $row)
                    <div class="rounded-xl border border-gray-100 bg-[#fbfcfa] p-3">
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <span class="inline-flex min-w-0 items-center gap-2 text-sm font-black text-gray-700">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg border {{ $row['class'] }}">
                                    <i class="fas {{ $row['icon'] }}"></i>
                                </span>
                                {{ $row['label'] }}
                            </span>
                            <span class="shrink-0 font-serif text-lg font-black text-primary">{{ $row['countDisplay'] }}</span>
                        </div>
                        <progress class="admin-progress admin-progress-{{ $row['status'] }}" value="{{ $row['percent'] }}" max="100" aria-label="Persentase status {{ $row['label'] }}"></progress>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="rounded-2xl border border-[#dfe8df] bg-white p-5 shadow-[0_16px_36px_rgba(0,77,64,0.06)] md:p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Transaksi Terakhir</p>
                    <h3 class="mt-2 font-serif text-xl font-black text-primary">Pesanan terbaru</h3>
                    <p class="mt-1 text-sm text-gray-500">Pantau transaksi masuk tanpa membuka tabel utama.</p>
                </div>
                <button type="button" onclick="tampilkanPanel('order')" class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm font-black text-primary transition hover:bg-gray-50">
                    Lihat semua <i class="fas fa-arrow-right text-[10px]"></i>
                </button>
            </div>

            <div class="mt-5 space-y-3">
                @forelse(($dashboardOverview['latestOrderRows'] ?? []) as $row)
                    <article class="rounded-2xl border border-gray-100 bg-[#fbfcfa] p-4 shadow-sm">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <p class="font-serif text-lg font-black text-primary">#{{ $row['order']->id }}</p>
                                    <span class="text-sm font-bold text-gray-800">{{ $row['order']->nama_pemesan }}</span>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">{{ $row['createdAt'] }}</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span class="inline-flex rounded-full border px-2.5 py-1 text-[11px] font-bold {{ $row['paymentMeta']['class'] }}">{{ $row['paymentMeta']['label'] }}</span>
                                    <span class="inline-flex rounded-full border px-2.5 py-1 text-[11px] font-bold {{ $row['statusMeta']['class'] }}">{{ $row['statusMeta']['label'] }}</span>
                                    @if($row['order']->sudahDikirim())
                                        <span class="inline-flex rounded-full border border-sky-200 bg-sky-50 px-2.5 py-1 text-[11px] font-bold text-sky-700">{{ $row['order']->kurir }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full rounded-xl border border-white bg-white px-4 py-3 shadow-sm md:w-auto md:text-right">
                                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Total</p>
                                <p class="mt-1 font-serif text-xl font-black text-gray-900">{{ $row['total'] }}</p>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-[#d8d0bd] bg-[#fffdf8] px-4 py-10 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-white text-[#b28a24] shadow-sm">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <p class="mt-3 font-black text-primary">Belum ada pesanan</p>
                        <p class="mt-1 text-sm text-gray-500">Pesanan customer akan muncul di sini setelah checkout.</p>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    <div class="grid gap-6 xl:grid-cols-[0.82fr_1.38fr]">
        <section class="rounded-2xl border border-[#dfe8df] bg-white p-5 shadow-[0_16px_36px_rgba(0,77,64,0.06)] md:p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Perlu Dicek</p>
                    <h3 class="mt-2 font-serif text-xl font-black text-primary">Stok produk</h3>
                    <p class="mt-1 text-sm text-gray-500">Produk dengan stok rendah, aman, atau habis.</p>
                </div>
                <span class="rounded-full border border-red-100 bg-red-50 px-3 py-1 text-xs font-black text-red-700">
                    {{ $dashboardOverview['emptyStockCount'] ?? 0 }} habis
                </span>
            </div>

            <div class="mt-5 space-y-3">
                @forelse(($dashboardOverview['lowStockRows'] ?? []) as $row)
                    <div class="rounded-2xl border border-gray-100 bg-[#fbfcfa] px-4 py-3">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="min-w-0">
                                <p class="truncate font-black text-gray-800">{{ $row['product']->nama }}</p>
                                <p class="mt-1 text-xs text-gray-500">{{ $row['price'] }}</p>
                            </div>
                            <div class="shrink-0 text-left sm:text-right">
                                <span class="inline-flex rounded-full border px-3 py-1 text-xs font-black {{ $row['stockClass'] }}">{{ $row['stockLabel'] }}</span>
                                <p class="mt-1 text-xs font-bold text-gray-500">{{ $row['stock'] }} stok</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-green-100 bg-green-50 px-4 py-8 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-white text-green-700 shadow-sm">
                            <i class="fas fa-circle-check"></i>
                        </div>
                        <p class="mt-3 font-black text-green-800">Stok produk aman</p>
                        <p class="mt-1 text-sm text-green-700/80">Tidak ada produk dengan stok rendah saat ini.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="rounded-2xl border border-[#dfe8df] bg-white p-5 shadow-[0_16px_36px_rgba(0,77,64,0.06)] md:p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">Penjualan Produk</p>
                    <h3 class="mt-2 font-serif text-xl font-black text-primary">Produk yang sudah terjual</h3>
                    <p class="mt-1 text-sm text-gray-500">Dihitung dari produk pada pesanan yang pembayarannya sudah dibayar.</p>
                </div>
                <span class="inline-flex rounded-full border border-gray-200 bg-gray-50 px-3 py-1 text-xs font-bold text-gray-500">Unit terjual</span>
            </div>

            @if($dashboardOverview['hasSalesData'] ?? false)
                <div class="admin-chart-scroll mt-5">
                    <div class="admin-sales-chart admin-chart-panel w-full rounded-2xl border border-gray-100 bg-[#fbfcfa] p-3">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            @else
                <div class="mt-5 rounded-2xl border border-dashed border-[#d8d0bd] bg-[#fffdf8] px-4 py-12 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-white text-[#b28a24] shadow-sm">
                        <i class="fas fa-chart-column text-xl"></i>
                    </div>
                    <p class="mt-4 font-serif text-xl font-black text-primary">Belum ada data penjualan</p>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-gray-500">
                        Grafik akan muncul setelah ada pesanan dibayar dan produk terjual.
                    </p>
                </div>
            @endif
        </section>
    </div>
</div>
