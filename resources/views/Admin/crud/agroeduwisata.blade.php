<div id="panel-agro" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        <x-admin.panel-summary 
            icon="fa-leaf" 
            label="Konten Agroeduwisata" 
            :count="$agroeduwisatas->total()" 
            unit="konten" 
            meta="Kelola menu utama dan tahapan aktivitas wisata." 
        />

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col gap-2 w-full md:w-auto md:flex-row">
                <input type="hidden" name="panel" value="agro">
                <select name="filter_kat_agro" onchange="this.form.submit()" class="shadow-sm border rounded py-2 px-3 bg-white text-gray-800 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800 md:w-[16rem]">
                    <option value="">Semua Data</option>
                    <option value="induk" {{ request('filter_kat_agro') == 'induk' ? 'selected' : '' }}>Induk</option>
                    <option value="anak" {{ request('filter_kat_agro') == 'anak' ? 'selected' : '' }}>Anak</option>
                </select>
                <div class="admin-search-control w-full md:w-[18rem]">
                    <input type="text" name="search_agro" value="{{ request('search_agro') }}" placeholder="Cari judul..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <button onclick="openModal('modal-create-agro')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah Baru
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Tabel Data Agro -->
    <x-admin.table class="admin-table-agro">
        <x-slot name="header">
            <x-admin.table.th>Gambar</x-admin.table.th>
            <x-admin.table.th>Status</x-admin.table.th>
            <x-admin.table.th>Judul</x-admin.table.th>
            <x-admin.table.th>Deskripsi</x-admin.table.th>
            <x-admin.table.th class="text-center">Aksi</x-admin.table.th>
        </x-slot>

        @foreach($agroeduwisatas as $agro)
        <tr>
            <x-admin.table.td>
                @if($agro->gambar)
                    <img src="{{ $agro->gambar_url }}" alt="Gambar" class="h-16 w-16 object-cover rounded border" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                @else
                    <div class="h-16 w-16 bg-gray-100 text-gray-400 flex items-center justify-center text-xs rounded border">Kosong</div>
                @endif
            </x-admin.table.td>
            <x-admin.table.td>
                @if($agro->parent_id)
                    <span class="px-2 py-1 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-md font-bold text-xs">Tahapan dari: {{ $agro->parent->judul ?? 'Induk' }}</span>
                @else
                    <span class="px-2 py-1 bg-green-50 text-green-700 border border-green-200 rounded-md font-bold text-xs">(Menu Utama)</span>
                @endif
            </x-admin.table.td>
            <x-admin.table.td class="font-bold">{{ $agro->judul }}</x-admin.table.td>
            <x-admin.table.td class="max-w-xs">
                <p class="text-gray-600 text-xs truncate">{{ $agro->deskripsi }}</p>
            </x-admin.table.td>
            <x-admin.table.td class="text-center min-w-[150px]">
                <button onclick="openEditModalAgro({{ $agro->id }}, '{{ $agro->parent_id ?? '' }}', '{{ addslashes($agro->judul) }}', '{{ addslashes($agro->deskripsi) }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">
                    <i class="fas fa-pen mr-1"></i> Edit
                </button>
                <form action="{{ route('admin.agro.destroy', $agro->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition-colors">
                        <i class="fas fa-trash mr-1"></i> Hapus
                    </button>
                </form>
            </x-admin.table.td>
        </tr>
        @endforeach
        @if($agroeduwisatas->isEmpty())
        <tr>
            <x-admin.table.td colspan="5" class="py-10 text-center text-gray-500 italic">Belum ada data ditemukan.</x-admin.table.td>
        </tr>
        @endif
    </x-admin.table>

    @if ($agroeduwisatas->hasPages())
        @php
            $currentPage = $agroeduwisatas->currentPage();
            $lastPage = $agroeduwisatas->lastPage();
            $paginationPages = collect([1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage])
                ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
                ->unique()
                ->sort()
                ->values();
        @endphp

        <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-bold text-gray-800">{{ $agroeduwisatas->firstItem() }}</span>
                -
                <span class="font-bold text-gray-800">{{ $agroeduwisatas->lastItem() }}</span>
                dari
                <span class="font-bold text-gray-800">{{ $agroeduwisatas->total() }}</span>
                konten
            </p>

            <nav class="flex flex-wrap items-center gap-1" aria-label="Pagination Agroeduwisata">
                @if ($agroeduwisatas->onFirstPage())
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $agroeduwisatas->previousPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman sebelumnya">
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
                        <a href="{{ $agroeduwisatas->url($page) }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($agroeduwisatas->hasMorePages())
                    <a href="{{ $agroeduwisatas->nextPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman berikutnya">
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
<!-- MODAL CREATE AGROEDUWISATA -->
<!-- ========================================== -->
<div id="modal-create-agro" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-create-agro')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-white tracking-wide">Tambah Agroeduwisata</h3>
            <button type="button" onclick="closeModal('modal-create-agro')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.agro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Menu Induk (Opsional) <span class="text-xs text-gray-400">Pilih jika ini adalah Tahapan/Anak</span></label>
                        <select class="w-full bg-white text-gray-800 border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="parent_id">
                            <option value="">-- Induk --</option>
                            @foreach($parentAgros as $parent)
                                <option value="{{ $parent->id }}">{{ \Illuminate\Support\Str::limit($parent->judul, 22) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Konten <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="judul" required placeholder="Contoh: Proses Penderesan Nira">
                </div>
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar <span class="text-xs text-gray-400">(Format: JPG, PNG, WEBP)</span></label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="deskripsi" rows="4" placeholder="Ceritakan detail aktivitas atau fasilitas ini..."></textarea>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-create-agro')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-green-800 text-white font-bold rounded-lg hover:bg-green-900 shadow-md transition-colors">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT AGROEDUWISATA -->
<!-- ========================================== -->
<div id="modal-edit-agro" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-edit-agro')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-gray-900 tracking-wide">Edit Agroeduwisata</h3>
            <button type="button" onclick="closeModal('modal-edit-agro')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form-edit-agro" action="" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Menu Induk (Opsional) <span class="text-xs text-gray-400">Pilih jika ini adalah Tahapan/Anak</span></label>
                        <select class="w-full bg-white text-gray-800 border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-agro-parent" name="parent_id">
                            <option value="">-- Induk --</option>
                            @foreach($parentAgros as $parent)
                                <option value="{{ $parent->id }}">{{ \Illuminate\Support\Str::limit($parent->judul, 22) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Konten <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-agro-judul" type="text" name="judul" required>
                </div>
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar <span class="text-xs text-gray-400">(Biarkan kosong jika tidak diubah)</span></label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-agro-deskripsi" name="deskripsi" rows="4"></textarea>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-edit-agro')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 shadow-md transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
