<div id="panel-kategori" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        <x-admin.panel-summary 
            icon="fa-tags" 
            label="Master Kategori" 
            :count="$kategoriKatalogs->count()" 
            unit="kategori" 
            meta="Kelola kategori untuk pengelompokan katalog desa." 
        />

        <div class="admin-toolbar-actions">
            <button onclick="openModal('modal-create-kat-katalog')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah Kategori
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

    <div class="w-full">
        
        <!-- KATEGORI KATALOG DESA -->
        <div>
            <div class="flex items-center mb-3">
                <h3 class="font-bold text-lg text-gray-700"><i class="fas fa-book-open text-yellow-600 mr-2"></i> Kategori Katalog Desa</h3>
            </div>
            <x-admin.table class="admin-table-kategori">
                <x-slot name="header">
                    <x-admin.table.th class="bg-gray-50">Nama Kategori</x-admin.table.th>
                    <x-admin.table.th class="bg-gray-50 text-center w-32">Aksi</x-admin.table.th>
                </x-slot>

                @foreach($kategoriKatalogs as $kat)
                <tr class="hover:bg-gray-50 transition-colors">
                    <x-admin.table.td class="py-3 font-medium text-gray-900">{{ $kat->nama_kategori }}</x-admin.table.td>
                    <x-admin.table.td class="py-3 text-center">
                        <button onclick="openEditKatKatalog({{ $kat->id }}, '{{ addslashes($kat->nama_kategori) }}')" class="text-yellow-600 hover:text-yellow-700 mx-1" title="Edit kategori"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('admin.kategori_katalog.destroy', $kat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mx-1" title="Hapus kategori"><i class="fas fa-trash"></i></button>
                        </form>
                    </x-admin.table.td>
                </tr>
                @endforeach
            </x-admin.table>
        </div>


    </div>
</div>

<!-- ========================================== -->
<!-- MODAL CREATE KATALOG -->
<!-- ========================================== -->
<div id="modal-create-kat-katalog" class="fixed inset-0 z-[100] hidden items-center justify-center p-4" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-create-kat-katalog')"></div>
    <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-white tracking-wide">Tambah Kategori Katalog</h3>
            <button type="button" onclick="closeModal('modal-create-kat-katalog')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form action="{{ route('admin.kategori_katalog.store') }}" method="POST" class="p-6">
            @csrf
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
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-edit-kat-katalog')"></div>
    <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-900 tracking-wide">Edit Kategori Katalog</h3>
            <button type="button" onclick="closeModal('modal-edit-kat-katalog')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="form-edit-kat-katalog" method="POST" class="p-6">
            @csrf @method('PUT')
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
