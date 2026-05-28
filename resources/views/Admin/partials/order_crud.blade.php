<div id="panel-order" class="crud-panel mt-8 mb-6" style="display: none;">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b border-gray-200 pb-4 gap-4">
        <h2 class="text-2xl font-black text-gray-800">Manajemen Pesanan</h2>
        
        <div class="flex gap-2 w-full md:w-auto">
            <form action="{{ url()->current() }}" method="GET" class="flex w-full md:w-auto">
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

    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Pembeli</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kontak</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total Harga</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($orders as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-bold">#{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $order->nama_pemesan }}</div>
                        <div class="text-xs text-gray-500">{{ $order->no_hp }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 line-clamp-2" title="{{ $order->alamat }}">{{ $order->alamat }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-green-600">Rp{{ number_format($order->total, 0, ',', '.') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($order->status == 'Pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">Pending</span>
                        @elseif($order->status == 'Sedang Diproses')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">Proses</span>
                        @elseif($order->status == 'Selesai')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">Selesai</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Batal</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <button onclick="bukaModalDetailOrder({{ $order->id }})" class="text-blue-600 hover:text-blue-900 bg-blue-50 border border-blue-200 hover:bg-blue-100 p-2 rounded mr-2 transition-colors" title="Lihat Detail & Update Status">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 border border-red-200 hover:bg-red-100 p-2 rounded transition-colors" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center italic">Tidak ada data pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->appends(['search_order' => request('search_order')])->links('vendor.pagination.tailwind') }}
    </div>

    <!-- Modals Detail Pesanan akan digenerate secara dinamis -->
    @foreach ($orders as $order)
    <div id="modal-detail-order-{{ $order->id }}"
         class="hidden"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-order-title-{{ $order->id }}"
         style="position:fixed;inset:0;z-index:9999;display:none;align-items:center;justify-content:center;padding:1rem;">

        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/70 backdrop-blur-sm" onclick="tutupModalDetailOrder({{ $order->id }})"></div>

        <!-- Panel -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto border border-gray-100">
            <!-- Header -->
            <div class="sticky top-0 bg-white flex justify-between items-center px-6 py-4 border-b border-gray-200 rounded-t-2xl z-10">
                <h3 class="text-xl font-black text-gray-900 font-serif" id="modal-order-title-{{ $order->id }}">
                    <i class="fas fa-receipt text-green-600 mr-2"></i>Detail Pesanan #{{ $order->id }}
                </h3>
                <button onclick="tutupModalDetailOrder({{ $order->id }})" class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="px-6 py-5">
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
                    </div>
                </div>

                <!-- Item List -->
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Daftar Barang</p>
                <div class="rounded-xl border border-gray-200 overflow-hidden mb-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">Produk</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-500 uppercase">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($order->orderDetails as $detail)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-semibold text-gray-900">{{ $detail->produk->nama ?? 'Produk Terhapus' }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">Rp{{ number_format($detail->harga_satuan, 0, ',', '.') }} &times; {{ $detail->jumlah }}</div>
                                </td>
                                <td class="px-4 py-3 text-right text-sm font-bold text-gray-800">
                                    Rp{{ number_format($detail->harga_satuan * $detail->jumlah, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-green-50">
                            <tr>
                                <th class="px-4 py-3 text-right text-sm font-bold text-gray-700">Total Pembayaran:</th>
                                <td class="px-4 py-3 text-right text-base font-black text-green-700">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Update Status Form -->
                <form action="{{ route('admin.order.update_status', $order->id) }}" method="POST" class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                    @csrf
                    @method('PUT')
                    <p class="text-blue-800 font-bold text-sm mb-3"><i class="fas fa-edit mr-1"></i> Update Status Pesanan</p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <select name="status" class="flex-1 bg-white text-gray-800 border border-blue-200 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>✅ Selesai (Diterima)</option>
                            <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan</option>
                        </select>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg shadow transition-colors text-sm whitespace-nowrap">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</div>

<script>
    function bukaModalDetailOrder(id) {
        const modal = document.getElementById('modal-detail-order-' + id);
        // Pindahkan modal ke <body> agar bebas dari overflow:hidden parent (hanya sekali)
        if (!modal.dataset.moved) {
            document.body.appendChild(modal);
            modal.dataset.moved = 'true';
        }
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function tutupModalDetailOrder(id) {
        const modal = document.getElementById('modal-detail-order-' + id);
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
    // Tutup dengan tombol Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="modal-detail-order-"]').forEach(function(modal) {
                if (modal.style.display === 'flex') {
                    modal.style.display = 'none';
                    document.body.style.overflow = '';
                }
            });
        }
    });
</script>
