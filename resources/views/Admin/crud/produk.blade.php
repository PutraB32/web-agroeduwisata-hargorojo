<div id="panel-produk" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        <x-admin.panel-summary 
            icon="fa-box" 
            label="Data Produk" 
            :count="$produks->total()" 
            unit="produk" 
            meta="Atur stok, harga, gambar, dan produk unggulan." 
        />

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="admin-search-control w-full md:w-[19rem]">
                <input type="hidden" name="panel" value="produk">
                <input type="text" name="search_produk" value="{{ request('search_produk') }}" placeholder="Cari produk..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
            </form>
            <button onclick="openModal('modal-create-produk')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">Terdapat kesalahan:</span>
            <ul class="list-disc ml-5 pointer-events-none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- TABEL LENGKAP -->
    <x-admin.table class="admin-table-produk">
        <x-slot name="header">
            <x-admin.table.th>Gambar</x-admin.table.th>
            <x-admin.table.th>Nama Produk</x-admin.table.th>
            <x-admin.table.th>Harga</x-admin.table.th>
            <x-admin.table.th>Stok</x-admin.table.th>
            <x-admin.table.th>Deskripsi</x-admin.table.th>
            <x-admin.table.th>Manfaat</x-admin.table.th>
            <x-admin.table.th class="text-center">Unggulan</x-admin.table.th>
            <x-admin.table.th class="text-center">Aksi</x-admin.table.th>
        </x-slot>

        @foreach($produks as $produk)
        <tr>
            <x-admin.table.td>
                @if($produk->gambar)
                    <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama }}" class="h-16 w-16 object-cover rounded border" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                @else
                    <div class="h-16 w-16 bg-gray-100 text-gray-400 flex items-center justify-center text-xs rounded border">Kosong</div>
                @endif
            </x-admin.table.td>
            <x-admin.table.td class="font-bold">{{ $produk->nama }}</x-admin.table.td>
            <x-admin.table.td>{{ $produk->harga_rupiah }}</x-admin.table.td>
            <x-admin.table.td>{{ $produk->stok }}</x-admin.table.td>
            <x-admin.table.td class="max-w-xs">
                <p class="text-gray-900 whitespace-no-wrap text-xs truncate">{{ $produk->deskripsi }}</p>
            </x-admin.table.td>
            <x-admin.table.td class="max-w-xs">
                <p class="text-gray-900 whitespace-no-wrap text-xs truncate">{{ $produk->manfaat }}</p>
            </x-admin.table.td>
            <x-admin.table.td class="text-center">
                @if($produk->is_unggulan)
                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-bold">Ya</span>
                @else
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">Tidak</span>
                @endif
            </x-admin.table.td>
            <x-admin.table.td class="text-center min-w-[150px]">
                <button onclick="openEditModal({{ $produk->id }}, '{{ addslashes($produk->nama) }}', {{ $produk->harga }}, {{ $produk->stok }}, '{{ addslashes($produk->deskripsi) }}', '{{ addslashes($produk->manfaat) }}', {{ $produk->is_unggulan ? 'true' : 'false' }})" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2">
                    <i class="fas fa-pen mr-1"></i> Edit
                </button>
                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                        <i class="fas fa-trash mr-1"></i> Hapus
                    </button>
                </form>
            </x-admin.table.td>
        </tr>
        @endforeach
        @if($produks->isEmpty())
        <tr>
            <x-admin.table.td colspan="8" class="text-center text-gray-500">Belum ada data produk.</x-admin.table.td>
        </tr>
        @endif
    </x-admin.table>

    @if ($produks->hasPages())
        @php
            $currentPage = $produks->currentPage();
            $lastPage = $produks->lastPage();
            $paginationPages = collect([1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage])
                ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
                ->unique()
                ->sort()
                ->values();
        @endphp

        <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-bold text-gray-800">{{ $produks->firstItem() }}</span>
                -
                <span class="font-bold text-gray-800">{{ $produks->lastItem() }}</span>
                dari
                <span class="font-bold text-gray-800">{{ $produks->total() }}</span>
                produk
            </p>

            <nav class="flex flex-wrap items-center gap-1" aria-label="Pagination Produk">
                @if ($produks->onFirstPage())
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $produks->previousPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman sebelumnya">
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
                        <a href="{{ $produks->url($page) }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($produks->hasMorePages())
                    <a href="{{ $produks->nextPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman berikutnya">
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
</div>

<!-- ========================================== -->
<!-- MODAL TAMBAH PRODUK BARU -->
<!-- ========================================== -->
<div id="modal-create-produk" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
    
    <!-- Latar Belakang Gelap (Backdrop) -->
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-create-produk')"></div>

    <!-- Kotak Form Utama -->
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        
        <!-- Header Pop-up -->
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-white tracking-wide">Tambah Produk Baru</h3>
            <button type="button" onclick="closeModal('modal-create-produk')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <!-- Isi Form -->
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar Produk <span class="text-red-500">*</span></label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk <span class="text-red-500">*</span></label>
                        <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="nama" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="number" name="harga" min="0" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Stok Awal <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="number" name="stok" min="0" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Manfaat</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="manfaat" rows="2"></textarea>
                </div>
                
                <div class="mb-6 flex items-center bg-yellow-50 p-3 rounded-lg border border-yellow-200">
                    <input type="checkbox" name="is_unggulan" value="1" id="create-unggulan" class="w-5 h-5 text-green-600 rounded">
                    <label for="create-unggulan" class="ml-3 text-sm font-bold text-gray-800 uppercase tracking-wide">Jadikan Produk Unggulan</label>
                </div>

                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-create-produk')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-green-800 text-white font-bold rounded-lg hover:bg-green-900 shadow-md transition-colors">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT PRODUK -->
<!-- ========================================== -->
<div id="modal-edit-produk" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-edit-produk')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-gray-900 tracking-wide">Edit Produk</h3>
            <button type="button" onclick="closeModal('modal-edit-produk')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form-edit" action="" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar Produk <span class="text-xs text-gray-500 font-normal">(Opsional)</span></label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk <span class="text-red-500">*</span></label>
                        <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-nama" type="text" name="nama" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-harga" type="number" name="harga" min="0" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Stok Tersedia <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-stok" type="number" name="stok" min="0" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-deskripsi" name="deskripsi" rows="2"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Manfaat</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-manfaat" name="manfaat" rows="2"></textarea>
                </div>
                <div class="mb-6 flex items-center bg-yellow-50 p-3 rounded-lg border border-yellow-200">
                    <input type="checkbox" id="edit-unggulan" name="is_unggulan" value="1" class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <label for="edit-unggulan" class="ml-3 text-sm font-bold text-gray-800 uppercase">Jadikan Produk Unggulan</label>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-edit-produk')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 shadow-md transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openEditModal(id, nama, harga, stok, deskripsi, manfaat, is_unggulan) {
        document.getElementById('form-edit').reset();document.getElementById('form-edit').reset();
        openModal('modal-edit-produk');
        document.getElementById('form-edit').action = '/admin/produk/' + id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-harga').value = harga;
        document.getElementById('edit-stok').value = stok;
        document.getElementById('edit-deskripsi').value = deskripsi;
        document.getElementById('edit-manfaat').value = manfaat;
        document.getElementById('edit-unggulan').checked = is_unggulan;
    }
</script>
