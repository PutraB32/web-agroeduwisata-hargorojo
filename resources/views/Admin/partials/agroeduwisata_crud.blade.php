<div id="panel-agro" class="crud-panel mt-8 mb-6 hidden">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b border-gray-200 pb-4 gap-4">
        <h2 class="text-2xl font-black text-gray-800">Manajemen Agroeduwisata</h2>
        
        <div class="flex gap-2 w-full md:w-auto flex-wrap md:flex-nowrap justify-end">
            <!-- Form Pencarian & Filter -->
            <form action="{{ url()->current() }}" method="GET" class="flex gap-2 w-full md:w-auto">
                <select name="filter_kat_agro" onchange="this.form.submit()" class="shadow-sm border rounded py-2 px-3 bg-white text-gray-800 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <option value="">Semua Data</option>
                    <option value="induk" {{ request('filter_kat_agro') == 'induk' ? 'selected' : '' }}>Hanya Menu Utama (Induk)</option>
                </select>
                <div class="flex w-full md:w-auto">
                    <input type="text" name="search_agro" value="{{ request('search_agro') }}" placeholder="Cari judul..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <!-- Tombol Tambah Baru -->
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
    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agroeduwisatas as $agro)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($agro->gambar)
                            @php
                                $fotoUrl = asset('images/beranda.bg.jpeg');
                                if (\Illuminate\Support\Facades\Storage::disk('public')->exists('agroeduwisata/' . $agro->gambar)) {
                                    $fotoUrl = asset('storage/agroeduwisata/' . $agro->gambar);
                                } else {
                                    $fotoUrl = file_exists(public_path('images/agroeduwisata/' . $agro->gambar)) ? asset('images/agroeduwisata/' . $agro->gambar) : asset('images/' . $agro->gambar);
                                }
                            @endphp
                            <img src="{{ $fotoUrl }}" alt="Gambar" class="h-16 w-16 object-cover rounded border" onerror="this.src='{{ asset('images/beranda.bg.jpeg') }}'">
                        @else
                            <div class="h-16 w-16 bg-gray-100 text-gray-400 flex items-center justify-center text-xs rounded border">Kosong</div>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($agro->parent_id)
                            <span class="px-2 py-1 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-md font-bold text-xs">Tahapan dari: {{ $agro->parent->judul ?? 'Induk' }}</span>
                        @else
                            <span class="px-2 py-1 bg-green-50 text-green-700 border border-green-200 rounded-md font-bold text-xs">(Menu Utama)</span>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold">{{ $agro->judul }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm max-w-xs">
                        <p class="text-gray-600 text-xs truncate">{{ $agro->deskripsi }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center min-w-[150px]">
                        <button onclick="openEditModalAgro({{ $agro->id }}, '{{ $agro->parent_id ?? '' }}', '{{ addslashes($agro->judul) }}', '{{ addslashes($agro->deskripsi) }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        <form action="{{ route('admin.agro.destroy', $agro->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition-colors">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($agroeduwisatas->isEmpty())
                <tr><td colspan="5" class="px-5 py-10 text-center text-gray-500 italic">Belum ada data ditemukan.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL CREATE AGROEDUWISATA -->
<!-- ========================================== -->
<div id="modal-create-agro" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-create-agro')"></div>
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
                            <option value="">-- Jadikan Menu Utama (Bapak) --</option>
                            @foreach($parentAgros as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->judul }}</option>
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
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 cursor-pointer" type="file" name="gambar" accept="image/*">
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
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-edit-agro')"></div>
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
                            <option value="">-- Jadikan Menu Utama (Bapak) --</option>
                            @foreach($parentAgros as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->judul }}</option>
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
                    <input class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 cursor-pointer" type="file" name="gambar" accept="image/*">
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

<script>
    function openEditModalAgro(id, parent_id, judul, deskripsi) {
        openModal('modal-edit-agro');
        document.getElementById('form-edit-agro').action = '/admin/agroeduwisata/' + id;
        document.getElementById('edit-agro-parent').value = parent_id;
        document.getElementById('edit-agro-judul').value = judul;
        document.getElementById('edit-agro-deskripsi').value = deskripsi;
    }
</script>
