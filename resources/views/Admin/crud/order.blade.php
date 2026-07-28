<div id="panel-order" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        <x-admin.panel-summary 
            icon="fa-shopping-cart" 
            label="Data Pesanan" 
            :count="$orders->total()" 
            unit="pesanan" 
            meta="Pantau pembayaran, pengiriman, dan proses order." 
        />

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="admin-search-control w-full md:w-[19rem]">
                <input type="hidden" name="panel" value="order">
                <input type="text" name="search_order" value="{{ request('search_order') }}" placeholder="Cari pembeli..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('order_success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('order_success') }}</span>
        </div>
    @endif
    
    <x-admin.table class="admin-table-order">
        <x-slot name="header">
            <x-admin.table.th>ID</x-admin.table.th>
            <x-admin.table.th>Tanggal</x-admin.table.th>
            <x-admin.table.th>Pembeli</x-admin.table.th>
            <x-admin.table.th>Kontak</x-admin.table.th>
            <x-admin.table.th>Total Harga</x-admin.table.th>
            <x-admin.table.th>Status Pesanan</x-admin.table.th>
            <x-admin.table.th>Pembayaran</x-admin.table.th>
            <x-admin.table.th class="text-center">Aksi</x-admin.table.th>
        </x-slot>

        @forelse ($orders as $order)
        <tr>
            <x-admin.table.td class="font-bold">#{{ $order->id }}</x-admin.table.td>
            <x-admin.table.td class="text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</x-admin.table.td>
            <x-admin.table.td>
                <div class="font-medium text-gray-900">{{ $order->nama_pemesan }}</div>
                <div class="text-xs text-gray-500">{{ $order->no_hp }}</div>
            </x-admin.table.td>
            <x-admin.table.td>
                <div class="line-clamp-2" title="{{ $order->alamat }}">{{ $order->alamat }}</div>
            </x-admin.table.td>
            <x-admin.table.td>
                <div class="font-bold text-green-600">{{ $order->formatted_total }}</div>
                <div class="text-xs text-gray-500">{{ $order->metode_penerimaan_label }}</div>
            </x-admin.table.td>
            <x-admin.table.td>
                <span class="px-2 inline-flex text-[10px] leading-5 font-bold uppercase rounded-full border {{ $order->status_order_badge_class }}">
                    {{ $order->status_order_label }}
                </span>
            </x-admin.table.td>
            <x-admin.table.td>
                <span class="px-2 inline-flex text-[10px] leading-5 font-bold uppercase rounded-full border {{ $order->payment_status_badge_class }}">
                    {{ $order->payment_status_badge_label }}
                </span>
                <div class="mt-1 text-xs text-gray-500">{{ $order->payment_type_label }}</div>
            </x-admin.table.td>
            <x-admin.table.td class="text-center min-w-[120px]">
                <button onclick="bukaModalDetailOrder({{ $order->id }})" class="text-primary hover:text-green-900 bg-green-50 border border-green-200 hover:bg-green-100 p-2 rounded mr-2 transition-colors" title="Lihat Detail & Update Status">
                    <i class="fas fa-eye"></i> Detail
                </button>
                <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini secara permanen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 border border-red-200 hover:bg-red-100 p-2 rounded transition-colors" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </x-admin.table.td>
        </tr>
        @empty
        <tr>
            <x-admin.table.td colspan="8" class="text-center text-gray-500 italic py-10">Tidak ada data pesanan.</x-admin.table.td>
        </tr>
        @endforelse
    </x-admin.table>

    @if ($orders->hasPages())
        @php
            $currentPage = $orders->currentPage();
            $lastPage = $orders->lastPage();
            $paginationPages = collect([1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage])
                ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
                ->unique()
                ->sort()
                ->values();
        @endphp

        <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-bold text-gray-800">{{ $orders->firstItem() }}</span>
                -
                <span class="font-bold text-gray-800">{{ $orders->lastItem() }}</span>
                dari
                <span class="font-bold text-gray-800">{{ $orders->total() }}</span>
                pesanan
            </p>

            <nav class="flex flex-wrap items-center gap-1" aria-label="Pagination Pesanan">
                @if ($orders->onFirstPage())
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $orders->previousPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman sebelumnya">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($paginationPages as $index => $page)
                    @if ($index > 0 && $page - $paginationPages[$index - 1] > 1)
                        <span class="inline-flex h-9 min-w-9 items-center justify-center px-2 text-sm font-bold text-gray-400">...</span>
                    @endif

                    @if ($page === $currentPage)
                        <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-green-800 bg-green-800 px-3 text-sm font-bold text-white" aria-current="page">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $orders->url($page) }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman berikutnya">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </nav>
        </div>
    @endif

    <!-- Modals Detail Pesanan akan digenerate secara dinamis -->
    @foreach ($orders as $order)
    <div id="modal-detail-order-{{ $order->id }}"
         class="admin-order-detail-modal admin-order-detail-product-style fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-order-title-{{ $order->id }}">

        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/70" onclick="tutupModalDetailOrder({{ $order->id }})"></div>

        <!-- Panel -->
        <div class="admin-order-detail-panel relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-white px-6 py-4 flex justify-between items-center shrink-0 border-b border-gray-200 rounded-t-2xl">
                <h3 class="text-xl font-black text-gray-900 font-serif" id="modal-order-title-{{ $order->id }}">
                    <i class="fas fa-receipt text-green-600 mr-2"></i>Detail Pesanan #{{ $order->id }}
                </h3>
                <button onclick="tutupModalDetailOrder({{ $order->id }})" class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="admin-order-detail-body p-6 overflow-y-auto min-h-0" tabindex="0">
                <!-- Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Informasi Pembeli</p>
                        <p class="font-bold text-gray-800 text-sm">{{ $order->nama_pemesan }}</p>
                        <p class="text-gray-500 text-sm mt-1"><i class="fas fa-phone text-green-600 mr-1"></i>{{ $order->no_hp }}</p>
                        <p class="text-gray-500 text-xs mt-1"><i class="fas fa-calendar text-gray-400 mr-1"></i>{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Pengiriman</p>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ $order->alamat }}</p>
                        <p class="text-gray-500 text-xs mt-2">
                            <i class="fas fa-handshake text-green-600 mr-1"></i>
                            {{ $order->metode_penerimaan_label }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-100">
                        <p class="text-[10px] font-bold text-yellow-700 uppercase tracking-widest mb-2">Status Pembayaran</p>
                        <p class="font-bold text-yellow-900 text-sm">{{ $order->payment_status_badge_label }}</p>
                        @if($order->payment_type)
                            <p class="text-yellow-700 text-xs mt-1">Metode: {{ $order->payment_type_label }}</p>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Referensi Pembayaran</p>
                        <p class="text-gray-700 text-xs break-all">{{ $order->midtrans_order_id ?? $order->metode_penerimaan_label }}</p>
                        @if($order->midtrans_transaction_id)
                            <p class="text-gray-500 text-xs mt-1 break-all">{{ $order->midtrans_transaction_id }}</p>
                        @endif
                    </div>
                </div>

                @if($order->isAmbilDiTempat())
                    <div class="mb-6 rounded-xl border border-amber-200/70 bg-amber-50/60 p-4">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                            <div>
                                <p class="text-amber-900 font-bold text-sm"><i class="fas fa-store mr-1"></i> Jadwal & Komunikasi Pengambilan</p>
                                <p class="mt-1 text-xs text-amber-800/80">Tentukan tanggal dan waktu pengambilan serta catatan instruksi untuk pembeli.</p>
                                @if($order->punya_jadwal_ambil)
                                    <div class="mt-3 flex flex-wrap gap-2 text-xs">
                                        <span class="inline-flex rounded-full border border-amber-200 bg-amber-100 px-3 py-1 font-bold text-amber-900">
                                            <i class="fas fa-calendar-check mr-1"></i>
                                            {{ $order->tanggal_ambil->format('d M Y, H:i') }} WIB
                                        </span>
                                        @if($order->catatan_admin)
                                            <span class="inline-flex rounded-full border border-amber-200 bg-white px-3 py-1 text-amber-800">
                                                {{ $order->catatan_admin }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if($order->boleh_input_pengiriman && ($order->status_order ?? 'pending') !== 'dibatalkan')
                            <form action="{{ route('admin.order.update_jadwal_ambil', $order->id) }}" method="POST" class="mt-4 grid gap-3">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-3 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1 block text-[11px] font-bold uppercase tracking-widest text-amber-900">Tanggal & Waktu Pengambilan</label>
                                        <input
                                            type="datetime-local"
                                            name="tanggal_ambil"
                                            value="{{ old('tanggal_ambil', $order->tanggal_ambil?->format('Y-m-d\TH:i')) }}"
                                            class="w-full rounded-lg border border-amber-200/80 bg-white/80 px-3 py-2 text-sm text-gray-800 focus:border-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-800"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[11px] font-bold uppercase tracking-widest text-amber-900">Catatan untuk Pembeli (Opsional)</label>
                                        <textarea
                                            name="catatan_admin"
                                            rows="2"
                                            placeholder="Contoh: Ambil di Rumah Produksi, Maps: https://... atau Hub WA: 0812..."
                                            class="w-full rounded-lg border border-amber-200/80 bg-white/80 px-3 py-2 text-sm text-gray-800 focus:border-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-800 resize-none"
                                        >{{ old('catatan_admin', $order->catatan_admin) }}</textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-amber-800 px-4 text-sm font-bold text-white shadow transition-colors hover:bg-amber-900">
                                        <i class="fas fa-save"></i>
                                        {{ $order->punya_jadwal_ambil ? 'Update Jadwal' : 'Simpan Jadwal' }}
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="mt-4 rounded-lg border border-yellow-100 bg-yellow-50 px-3 py-2 text-sm text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                {{ ($order->status_order ?? 'pending') === 'dibatalkan' ? 'Pesanan dibatalkan.' : 'Menunggu pembayaran sebelum input jadwal.' }}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="mb-6 rounded-xl border border-green-200/70 bg-green-50/60 p-4">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                            <div>
                                <p class="text-primary font-bold text-sm"><i class="fas fa-truck mr-1"></i> Pengiriman Transaksi</p>
                                <p class="mt-1 text-xs text-green-800/80">Satu kurir dan satu nomor resi berlaku untuk semua barang di pesanan ini.</p>
                                @if($order->punya_resi)
                                    <div class="mt-3 flex flex-wrap gap-2 text-xs">
                                        <span class="inline-flex rounded-full border border-green-200/80 bg-white/80 px-3 py-1 font-bold text-green-700">{{ $order->kurir }}</span>
                                        <span class="inline-flex rounded-full border border-green-200 bg-green-50 px-3 py-1 font-bold text-green-700">{{ $order->status_pengiriman_label }}</span>
                                        @if($order->tanggal_dikirim)
                                            <span class="inline-flex rounded-full border border-gray-200 bg-white px-3 py-1 text-gray-500">{{ $order->tanggal_dikirim->format('d M Y, H:i') }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if($order->boleh_input_pengiriman && ($order->status_order ?? 'pending') !== 'dibatalkan')
                            <form action="{{ route('admin.order.update_pengiriman', $order->id) }}" method="POST" class="mt-4 grid gap-3 md:grid-cols-[1fr_1fr_auto] md:items-end">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="mb-1 block text-[11px] font-bold uppercase tracking-widest text-green-900">Kurir</label>
                                    <input
                                        type="text"
                                        name="kurir"
                                        value="{{ old('kurir', $order->kurir) }}"
                                        placeholder="Contoh: JNE, J&T, Pos Indonesia, SiCepat"
                                        class="w-full rounded-lg border border-green-200/80 bg-white/80 px-3 py-2 text-sm text-gray-800 focus:border-green-800 focus:outline-none focus:ring-2 focus:ring-green-800"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="mb-1 block text-[11px] font-bold uppercase tracking-widest text-green-900">Nomor Resi</label>
                                    <input
                                        type="text"
                                        name="nomor_resi"
                                        value="{{ old('nomor_resi', $order->nomor_resi) }}"
                                        placeholder="Masukkan nomor resi"
                                        class="w-full rounded-lg border border-green-200/80 bg-white/80 px-3 py-2 text-sm text-gray-800 focus:border-green-800 focus:outline-none focus:ring-2 focus:ring-green-800"
                                        required
                                    >
                                </div>
                                <button type="submit" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-green-800 px-4 text-sm font-bold text-white shadow transition-colors hover:bg-green-900">
                                    <i class="fas fa-save"></i>
                                    {{ $order->punya_resi ? 'Update Resi' : 'Simpan Resi' }}
                                </button>
                            </form>
                        @else
                            <div class="mt-4 rounded-lg border border-yellow-100 bg-yellow-50 px-3 py-2 text-sm text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                {{ ($order->status_order ?? 'pending') === 'dibatalkan' ? 'Pesanan dibatalkan.' : 'Menunggu pembayaran sebelum input resi.' }}
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Item List -->
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Daftar Barang</p>
                <div class="admin-table-scroll rounded-xl border border-gray-200 mb-6">
                    <table class="admin-data-table admin-table-order-detail min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">Produk</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-500 uppercase">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($order->orderDetails as $detail)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 align-top">
                                    <div class="text-sm font-semibold text-gray-900">{{ $detail->produk->nama ?? 'Produk Terhapus' }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">{{ $detail->formatted_harga_satuan }} &times; {{ $detail->jumlah }}</div>
                                </td>
                                <td class="px-4 py-3 text-right text-sm font-bold text-gray-800 align-top">
                                    {{ $detail->formatted_detail_subtotal }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-green-50">
                            <tr>
                                <th class="px-4 py-3 text-right text-sm font-bold text-gray-700">Total Pembayaran:</th>
                                <td class="px-4 py-3 text-right text-base font-black text-green-700">{{ $order->formatted_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Update Status Form -->
                @if($order->boleh_input_pengiriman)
                    <form action="{{ route('admin.order.update_status', $order->id) }}" method="POST" class="bg-green-50 p-4 rounded-xl border border-green-100">
                        @csrf
                        @method('PUT')
                        <p class="text-primary font-bold text-sm mb-3"><i class="fas fa-edit mr-1"></i> Update Proses Pesanan</p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <select name="status_order" class="flex-1 bg-white text-gray-800 border border-green-200 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-green-800">
                                <option value="diproses" {{ ($order->status_order ?? 'pending') === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="dikirim" {{ ($order->status_order ?? 'pending') === 'dikirim' ? 'selected' : '' }} {{ ! $order->siapDiambilAtauDikirim() && ($order->status_order ?? 'pending') !== 'dikirim' ? 'disabled' : '' }}>
                                    {{ $order->isAmbilDiTempat() ? 'Siap Diambil' : 'Dikirim' }}{{ ! $order->siapDiambilAtauDikirim() ? ($order->isAmbilDiTempat() ? ' (atur jadwal dulu)' : ' (isi resi dulu)') : '' }}
                                </option>
                                <option value="selesai" {{ ($order->status_order ?? 'pending') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ ($order->status_order ?? 'pending') === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-5 rounded-lg shadow transition-colors text-sm whitespace-nowrap">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                        @unless($order->siapDiambilAtauDikirim())
                            <p class="mt-2 text-xs text-green-800">
                                {{ $order->isAmbilDiTempat() ? 'Status Siap Diambil akan otomatis aktif setelah tanggal dan waktu pengambilan disimpan.' : 'Status Dikirim akan otomatis aktif setelah transaksi memiliki kurir dan nomor resi.' }}
                            </p>
                        @endunless
                    </form>
                @else
                    <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-100 text-sm text-yellow-800">
                        <i class="fas fa-clock mr-1"></i> Menunggu konfirmasi pembayaran online.
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>