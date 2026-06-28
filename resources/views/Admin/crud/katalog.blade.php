<div id="panel-katalog" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        @include('Admin.components.panel_toolbar_summary', [
            'icon' => 'fa-book-open',
            'label' => 'Katalog Desa',
            'count' => $katalogs->total(),
            'unit' => 'katalog',
            'meta' => 'Kelola kategori, dokumen, gambar, dan tautan.',
        ])

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col gap-2 w-full md:w-auto md:flex-row">
                <input type="hidden" name="panel" value="katalog">
                <select name="filter_kat_katalog" onchange="this.form.submit()" class="shadow-sm border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800 md:w-[13.5rem]">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriKatalogs as $kat)
                        <option value="{{ $kat->id }}" {{ request('filter_kat_katalog') == $kat->id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::limit($kat->nama_kategori, 22) }}</option>
                    @endforeach
                </select>
                <div class="admin-search-control w-full md:w-[18rem]">
                    <input type="text" name="search_katalog" value="{{ request('search_katalog') }}" placeholder="Cari judul..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <button onclick="openModal('modal-create-katalog')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah Data
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
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

    <!-- Tabel Data Katalog -->
    <div class="admin-table-scroll bg-white rounded-lg shadow border border-gray-200">
        <table class="admin-data-table admin-table-katalog min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">URL</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($katalogs as $katalog)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($katalog->gambar)
                            <img src="{{ $katalog->gambar_url }}" alt="Gambar" class="h-16 w-16 object-cover rounded border" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                        @else
                            <div class="h-16 w-16 bg-gray-100 text-gray-400 flex items-center justify-center text-xs rounded border">Kosong</div>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="px-2 py-1 bg-green-50 text-green-700 rounded-md font-bold text-xs">{{ $katalog->kategoriKatalog->nama_kategori ?? 'Tanpa Kategori' }}</span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold">{{ $katalog->judul }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm max-w-xs">
                        <p class="text-gray-600 text-xs truncate">{{ $katalog->deskripsi }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-green-600 text-xs truncate max-w-[100px]">{{ $katalog->Url ?: '-' }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center min-w-[150px]">
                        <button onclick="openEditModalKatalog({{ $katalog->id }}, '{{ $katalog->kategori_id }}', '{{ addslashes($katalog->judul) }}', '{{ addslashes($katalog->deskripsi) }}', '{{ addslashes($katalog->Url) }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <form action="{{ route('admin.katalog.destroy', $katalog->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition-colors">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($katalogs->isEmpty())
                <tr><td colspan="6" class="px-5 py-10 text-center text-gray-500 italic">Belum ada data katalog.</td></tr>
                @endif
            </tbody>
        </table>
    </div>

    @if ($katalogs->hasPages())
        @php
            $currentPage = $katalogs->currentPage();
            $lastPage = $katalogs->lastPage();
            $paginationPages = collect([1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage])
                ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
                ->unique()
                ->sort()
                ->values();
        @endphp

        <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-bold text-gray-800">{{ $katalogs->firstItem() }}</span>
                -
                <span class="font-bold text-gray-800">{{ $katalogs->lastItem() }}</span>
                dari
                <span class="font-bold text-gray-800">{{ $katalogs->total() }}</span>
                katalog
            </p>

            <nav class="flex flex-wrap items-center gap-1" aria-label="Pagination Katalog">
                @if ($katalogs->onFirstPage())
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $katalogs->previousPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman sebelumnya">
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
                        <a href="{{ $katalogs->url($page) }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($katalogs->hasMorePages())
                    <a href="{{ $katalogs->nextPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman berikutnya">
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
<!-- MODAL CREATE KATALOG DESA -->
<!-- ========================================== -->
<div id="modal-create-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-create-katalog')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-white tracking-wide">Tambah Katalog Desa</h3>
            <button type="button" onclick="closeModal('modal-create-katalog')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar Katalog</label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="kategori_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoriKatalogs as $kat)
                            <option value="{{ $kat->id }}">{{ \Illuminate\Support\Str::limit($kat->nama_kategori, 22) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Katalog <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="judul" required placeholder="Contoh: Dokumen RPJMDes">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">URL Akses / Link File</label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="url" placeholder="https://google-drive.com/link-file">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Ringkas</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="deskripsi" rows="3" placeholder="Jelaskan isi katalog ini..."></textarea>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-create-katalog')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-green-800 text-white font-bold rounded-lg hover:bg-green-900 shadow-md transition-colors">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT KATALOG DESA -->
<!-- ========================================== -->
<div id="modal-edit-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-edit-katalog')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-gray-900 tracking-wide">Edit Katalog Desa</h3>
            <button type="button" onclick="closeModal('modal-edit-katalog')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form-edit-katalog" action="" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar Katalog</label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 cursor-pointer" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-katalog-kategori" name="kategori_id" required>
                        @foreach($kategoriKatalogs as $kat)
                            <option value="{{ $kat->id }}">{{ \Illuminate\Support\Str::limit($kat->nama_kategori, 22) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Katalog <span class="text-red-500">*</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-katalog-judul" type="text" name="judul" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">URL Akses / Link File</label>
                    <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-katalog-url" type="text" name="url">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Ringkas</label>
                    <textarea class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-katalog-deskripsi" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button type="button" onclick="closeModal('modal-edit-katalog')" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 shadow-md transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
