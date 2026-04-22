<div id="panel-user" class="crud-panel mt-8 mb-6" style="display: none;">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Users</h2>
        <button onclick="document.getElementById('modal-create-user').classList.remove('hidden')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow">
            + Tambah User
        </button>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Terdaftar</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap font-bold">{{ $user->name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-500 whitespace-no-wrap">{{ $user->email }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 {{ $user->role == 'super_admin' ? 'bg-red-200' : 'bg-green-200' }} opacity-50 rounded-full"></span>
                            <span class="relative">{{ $user->role == 'super_admin' ? 'Super Admin' : 'Admin' }}</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-500 whitespace-no-wrap text-xs">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center min-w-[150px]">
                        <button onclick="openEditModalUser({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ $user->role }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2">Edit</button>
                        @if(auth()->user()->id !== $user->id)
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                @if($users->isEmpty())
                <tr>
                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">Belum ada data user.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            <div class="w-full">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Create User -->
<div id="modal-create-user" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('modal-create-user').classList.add('hidden')"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form action="{{ route('admin.user.store') }}" method="POST">
          @csrf
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Tambah User Baru</h3>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text" name="name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="email" name="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="password" name="password" required minlength="8">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                <select class="shadow border rounded w-full py-2 px-3 text-gray-700" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-800 text-base font-medium text-white hover:bg-green-900 sm:ml-3 sm:w-auto sm:text-sm">Simpan</button>
            <button type="button" onclick="document.getElementById('modal-create-user').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit User -->
<div id="modal-edit-user" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('modal-edit-user').classList.add('hidden')"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form id="form-edit-user" action="" method="POST">
          @csrf
          @method('PUT')
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit User</h3>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="edit-user-name" type="text" name="name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="edit-user-email" type="email" name="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password (Opsional - Kosongkan jika tidak diubah)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="password" name="password" minlength="8">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                <select class="shadow border rounded w-full py-2 px-3 text-gray-700" id="edit-user-role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Simpan Perubahan</button>
            <button type="button" onclick="document.getElementById('modal-edit-user').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    function openEditModalUser(id, name, email, role) {
        document.getElementById('modal-edit-user').classList.remove('hidden');
        document.getElementById('form-edit-user').action = '/admin/user/' + id;
        document.getElementById('edit-user-name').value = name;
        document.getElementById('edit-user-email').value = email;
        document.getElementById('edit-user-role').value = role;
    }
</script>
