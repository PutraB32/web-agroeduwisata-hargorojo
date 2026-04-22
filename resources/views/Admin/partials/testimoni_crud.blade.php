<div id="panel-testimoni" class="crud-panel mt-8 mb-6" style="display: none;">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Testimoni</h2>
        <button onclick="document.getElementById('modal-create-testimoni').classList.remove('hidden')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow">
            + Tambah Testimoni
        </button>
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

    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Foto</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rating</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Isi Testimoni</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonis as $testimoni)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($testimoni->foto)
                            <img src="{{ asset('images/testimoni/' . $testimoni->foto) }}" alt="Foto" class="h-12 w-12 object-cover rounded-full border">
                        @else
                            <div class="h-12 w-12 bg-gray-100 text-gray-400 flex items-center justify-center text-xs rounded-full border">Kosong</div>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap font-bold">{{ $testimoni->nama }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-yellow-500 whitespace-no-wrap font-bold text-xs">{{ $testimoni->rating ? str_repeat('★', $testimoni->rating) . str_repeat('☆', 5 - $testimoni->rating) : '-' }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm max-w-xs">
                        <p class="text-gray-900 whitespace-no-wrap text-xs truncate">{{ $testimoni->isi_testimoni }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center min-w-[150px]">
                        <button onclick="openEditModalTestimoni({{ $testimoni->id }}, '{{ addslashes($testimoni->nama) }}', '{{ addslashes($testimoni->isi_testimoni) }}', '{{ $testimoni->rating }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2">Edit</button>
                        <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($testimonis->isEmpty())
                <tr>
                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">Belum ada data.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            <div class="w-full">
                {{ $testimonis->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Testimoni -->
<div id="modal-create-testimoni" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('modal-create-testimoni').classList.add('hidden')"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah Testimoni</h3>
            <div class="form-group mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold mb-2">Upload Foto Profil <span class="text-xs text-gray-500">(Opsional)</span></label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="foto" accept="image/*">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text" name="nama" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="number" name="rating" min="1" max="5">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Isi Testimoni</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" name="isi_testimoni" rows="3" required></textarea>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-800 text-base font-medium text-white hover:bg-green-900 sm:ml-3 sm:w-auto sm:text-sm">Simpan</button>
            <button type="button" onclick="document.getElementById('modal-create-testimoni').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Testimoni -->
<div id="modal-edit-testimoni" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('modal-edit-testimoni').classList.add('hidden')"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form id="form-edit-testimoni" action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Testimoni</h3>
            <div class="form-group mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto Profil <span class="text-xs text-gray-500">(Opsional)</span></label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="foto" accept="image/*">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="edit-testimoni-nama" type="text" name="nama" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="edit-testimoni-rating" type="number" name="rating" min="1" max="5">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Isi Testimoni</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="edit-testimoni-isi" name="isi_testimoni" rows="3" required></textarea>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Simpan Perubahan</button>
            <button type="button" onclick="document.getElementById('modal-edit-testimoni').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    function openEditModalTestimoni(id, nama, isi, rating) {
        document.getElementById('modal-edit-testimoni').classList.remove('hidden');
        document.getElementById('form-edit-testimoni').action = '/admin/testimoni/' + id;
        document.getElementById('edit-testimoni-nama').value = nama;
        document.getElementById('edit-testimoni-isi').value = isi;
        document.getElementById('edit-testimoni-rating').value = rating;
    }
</script>
