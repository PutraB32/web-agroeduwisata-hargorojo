<div id="panel-kategori" class="crud-panel mt-8 mb-6 hidden">
    <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4">
        <h2 class="text-2xl font-black text-gray-800">Manajemen Master Kategori</h2>
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

    <div class="w-full">
        
        <!-- KATEGORI KATALOG DESA -->
        <div>
            <div class="flex justify-between items-center mb-3">
                <h3 class="font-bold text-lg text-gray-700"><i class="fas fa-book-open text-yellow-600 mr-2"></i> Kategori Katalog Desa</h3>
                <button onclick="openModal('modal-create-kat-katalog')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-1 px-3 text-sm rounded shadow transition-colors">
                    <i class="fas fa-plus mr-1"></i> Tambah
                </button>
            </div>
            <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">Nama Kategori</th>
                            <th class="px-5 py-3 border-b-2 bg-gray-50 text-center text-xs font-semibold text-gray-600 uppercase w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoriKatalogs as $kat)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-3 border-b border-gray-200 text-sm font-medium text-gray-900">{{ $kat->nama_kategori }}</td>
                            <td class="px-5 py-3 border-b border-gray-200 text-sm text-center">
                                <button onclick="openEditKatKatalog({{ $kat->id }}, '{{ addslashes($kat->nama_kategori) }}')" class="text-yellow-600 hover:text-yellow-700 mx-1"><i class="fas fa-edit"></i></button>
                                <form action="{{ route('admin.kategori_katalog.destroy', $kat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mx-1"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


</div>

<!-- ========================================== -->
<!-- MODAL CREATE KATALOG -->
<!-- ========================================== -->
<div id="modal-create-kat-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-create-kat-katalog')"></div>
    <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden border-t-4 border-green-800">
        <form action="{{ route('admin.kategori_katalog.store') }}" method="POST" class="p-6">
            @csrf
            <h3 class="text-xl font-bold text-gray-900 mb-4 font-serif">Tambah Kategori Katalog</h3>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
                <input class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="nama_kategori" required placeholder="Contoh: Dokumen Publik">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal('modal-create-kat-katalog')" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                <button type="submit" class="px-5 py-2 bg-green-800 text-white font-bold rounded-lg hover:bg-green-900 shadow-md transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT KATALOG -->
<!-- ========================================== -->
<div id="modal-edit-kat-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-edit-kat-katalog')"></div>
    <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden border-t-4 border-yellow-500">
        <form id="form-edit-kat-katalog" method="POST" class="p-6">
            @csrf @method('PUT')
            <h3 class="text-xl font-bold text-gray-900 mb-4 font-serif">Edit Kategori Katalog</h3>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
                <input id="edit-nama-katalog" class="w-full border border-gray-300 rounded-lg py-2.5 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" type="text" name="nama_kategori" required>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal('modal-edit-kat-katalog')" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                <button type="submit" class="px-5 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 shadow-md transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>



<script>
function openEditKatKatalog(id, nama) {
    openModal('modal-edit-kat-katalog');
    document.getElementById('form-edit-kat-katalog').action = '/admin/kategori-katalog/' + id;
    document.getElementById('edit-nama-katalog').value = nama;
}
</script>