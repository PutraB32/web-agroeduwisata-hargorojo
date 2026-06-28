<div id="panel-testimoni" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        @include('Admin.components.panel_toolbar_summary', [
            'icon' => 'fa-comment-dots',
            'label' => 'Testimoni',
            'count' => $testimoni->total(),
            'unit' => 'testimoni',
            'meta' => 'Kelola rating dan cerita pengunjung.',
        ])

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="admin-search-control w-full md:w-[19rem]">
                <input type="hidden" name="panel" value="testimoni">
                <input type="text" name="search_testimoni" value="{{ request('search_testimoni') }}" placeholder="Cari nama..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
            </form>
            <button onclick="openModal('modal-create-testimoni')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah Manual
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-scroll bg-white rounded-lg shadow border border-gray-200">
        <table class="admin-data-table admin-table-testimoni min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Foto</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Nama</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Rating</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Isi Testimoni</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimoni as $itemTestimoni)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <img src="{{ $itemTestimoni->foto_url }}"
                             class="h-12 w-12 object-cover rounded-full border shadow-sm"
                             onerror="this.src='{{ $itemTestimoni->avatar_url }}'">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold">{{ $itemTestimoni->nama }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-yellow-500 font-bold">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="{{ $i <= $itemTestimoni->rating ? 'fas' : 'far' }} fa-star"></i>
                        @endfor
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm max-w-xs truncate">{{ $itemTestimoni->isi_testimoni }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center min-w-[150px]">
                        <button onclick="openEditModalTestimoni({{ $itemTestimoni->id }}, '{{ addslashes($itemTestimoni->nama) }}', '{{ addslashes($itemTestimoni->isi_testimoni) }}', '{{ $itemTestimoni->rating }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <form action="{{ route('admin.testimoni.destroy', $itemTestimoni->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus testimoni ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($testimoni->isEmpty())
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-gray-500 italic">Belum ada data testimoni.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if ($testimoni->hasPages())
        @php
            $currentPage = $testimoni->currentPage();
            $lastPage = $testimoni->lastPage();
            $paginationPages = collect([1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage])
                ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
                ->unique()
                ->sort()
                ->values();
        @endphp

        <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-bold text-gray-800">{{ $testimoni->firstItem() }}</span>
                -
                <span class="font-bold text-gray-800">{{ $testimoni->lastItem() }}</span>
                dari
                <span class="font-bold text-gray-800">{{ $testimoni->total() }}</span>
                testimoni
            </p>

            <nav class="flex flex-wrap items-center gap-1" aria-label="Pagination Testimoni">
                @if ($testimoni->onFirstPage())
                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $testimoni->previousPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman sebelumnya">
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
                        <a href="{{ $testimoni->url($page) }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($testimoni->hasMorePages())
                    <a href="{{ $testimoni->nextPageUrl() }}" class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800" aria-label="Halaman berikutnya">
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

<!-- MODAL CREATE -->
<div id="modal-create-testimoni" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 overflow-y-auto" role="dialog">
    <div class="fixed inset-0 bg-gray-900/75" onclick="closeModal('modal-create-testimoni')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden z-10">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center text-white">
            <h3 class="text-lg font-bold tracking-wide">Tambah Testimoni</h3>
            <button type="button" onclick="closeModal('modal-create-testimoni')"><i class="fas fa-times text-xl"></i></button>
        </div>
        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                <input type="file" name="foto" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="nama" class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-green-800" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5)</label>
                <input type="number" name="rating" min="1" max="5" value="5" class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-green-800">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Testimoni</label>
                <textarea name="isi_testimoni" rows="3" class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-green-800" required></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" onclick="closeModal('modal-create-testimoni')" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-800 text-white rounded-lg shadow-md">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="modal-edit-testimoni" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 overflow-y-auto" role="dialog">
    <div class="fixed inset-0 bg-gray-900/75" onclick="closeModal('modal-edit-testimoni')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden border-t-4 border-yellow-500 z-10">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center border-b">
             <h3 class="text-lg font-bold text-gray-900 tracking-wide">Edit Testimoni</h3>
             <button type="button" onclick="closeModal('modal-edit-testimoni')"><i class="fas fa-times text-gray-900 hover:text-white"></i></button>
        </div>
        <form id="form-edit-testimoni" action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto Profil</label>
                <input type="file" name="foto" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input id="edit-testimoni-nama" type="text" name="nama" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-yellow-500 outline-none" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Rating</label>
                <input id="edit-testimoni-rating" type="number" name="rating" min="1" max="5" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Testimoni</label>
                <textarea id="edit-testimoni-isi" name="isi_testimoni" rows="3" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-yellow-500 outline-none" required></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" onclick="closeModal('modal-edit-testimoni')" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
