<div id="panel-katalog" class="crud-panel mt-8 mb-6 hidden">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b border-gray-200 pb-4 gap-4">
        <h2 class="text-2xl font-black text-gray-800">Manajemen Katalog Desa</h2>
        
        <div class="flex gap-2 w-full md:w-auto flex-wrap md:flex-nowrap justify-end">
            <!-- Form Pencarian & Filter -->
            <form action="{{ url()->current() }}" method="GET" class="flex gap-2 w-full md:w-auto">
                <select name="filter_kat_katalog" onchange="this.form.submit()" class="shadow-sm border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriKatalogs as $kat)
                        <option value="{{ $kat->id }}" {{ request('filter_kat_katalog') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                <div class="flex w-full md:w-auto">
                    <input type="text" name="search_katalog" value="{{ request('search_katalog') }}" placeholder="Cari judul..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <!-- Tombol Tambah Data -->
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
    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full leading-normal">
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
                            @php
                                $fotoUrl = asset('images/beranda.bg.jpeg');
                                if (\Illuminate\Support\Facades\Storage::disk('public')->exists('katalog/' . $katalog->gambar)) {
                                    $fotoUrl = asset('storage/katalog/' . $katalog->gambar);
                                } else {
                                    $fotoUrl = file_exists(public_path('images/katalog/' . $katalog->gambar)) ? asset('images/katalog/' . $katalog->gambar) : asset('images/' . $katalog->gambar);
                                }
                            @endphp
                            <img src="{{ $fotoUrl }}" alt="Gambar" class="h-16 w-16 object-cover rounded border" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
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
                        <button onclick="openEditModalKatalog({{ $katalog->id }}, '{{ $katalog->kategori_id }}', '{{ addslashes($katalog->judul) }}', '{{ addslashes($katalog->deskripsi) }}', '{{ addslashes($katalog->Url) }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">Edit</button>
                        <form action="{{ route('admin.katalog.destroy', $katalog->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition-colors">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($katalogs->isEmpty())
                <tr><td colspan="6" class="px-5 py-10 text-center text-gray-500 italic">Belum ada data katalog.</td></tr>
                @endif
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white border-t">
            {{ $katalogs->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL CREATE KATALOG DESA -->
<!-- ========================================== -->
<div id="modal-create-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-create-katalog')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-xl font-bold text-white uppercase tracking-wider">Tambah Katalog Desa</h3>
            <button type="button" onclick="closeModal('modal-create-katalog')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar Katalog</label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer" type="file" name="gambar" accept="image/*">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="kategori_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoriKatalogs as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
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
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-edit-katalog')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl flex flex-col max-h-full overflow-hidden">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-xl font-bold text-gray-900 uppercase tracking-wider">Edit Katalog Desa</h3>
            <button type="button" onclick="closeModal('modal-edit-katalog')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="form-edit-katalog" action="" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-4 text-center border border-dashed border-gray-300 p-4 rounded-lg bg-gray-50">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar Katalog</label>
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 cursor-pointer" type="file" name="gambar" accept="image/*">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" id="edit-katalog-kategori" name="kategori_id" required>
                        @foreach($kategoriKatalogs as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
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

<script>
    function openEditModalKatalog(id, kategori_id, judul, deskripsi, url) {
        openModal('modal-edit-katalog');
        document.getElementById('form-edit-katalog').action = '/admin/katalog/' + id;
        document.getElementById('edit-katalog-kategori').value = kategori_id;
        document.getElementById('edit-katalog-judul').value = judul;
        document.getElementById('edit-katalog-deskripsi').value = deskripsi;
        document.getElementById('edit-katalog-url').value = url;
    }
</script>