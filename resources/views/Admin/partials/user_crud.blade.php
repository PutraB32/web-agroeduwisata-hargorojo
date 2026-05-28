<div id="panel-user" class="crud-panel mt-8 mb-6 hidden">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b border-gray-200 pb-4 gap-4">
        <h2 class="text-2xl font-black text-gray-800">Manajemen User System</h2>
        
        <div class="flex gap-2 w-full md:w-auto">
            <form action="{{ url()->current() }}" method="GET" class="flex w-full md:w-auto">
                <input type="text" name="search_user" value="{{ request('search_user') }}" placeholder="Cari nama/email..." class="shadow-sm border rounded-l w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-green-800">
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-r border border-l-0 border-gray-300"><i class="fas fa-search"></i></button>
            </form>
            <button onclick="openModal('modal-create-user')" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Tambah User
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Nama</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Role</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Terdaftar</th>
                    <th class="px-5 py-3 border-b-2 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold">{{ $user->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="px-3 py-1 rounded-full font-bold text-[10px] uppercase {{ $user->role == 'super_admin' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ str_replace('_', ' ', $user->role) }}
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-500">
                        {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                        <button onclick="openEditModalUser({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ $user->role }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-xs mr-2 transition-colors">
                            <i class="fas fa-pen mr-1"></i> Edit
                        </button>
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL CREATE USER -->
<div id="modal-create-user" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-create-user')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col">
        <div class="bg-green-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-white tracking-wide">Tambah User Baru</h3>
            <button type="button" onclick="closeModal('modal-create-user')" class="text-white hover:text-yellow-400 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form action="{{ route('admin.user.store') }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="text" name="name" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                    <input class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="email" name="email" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-800 outline-none" type="password" name="password" required minlength="8">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role Akses</label>
                    <select class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-6 border-t mt-6">
                <button type="button" onclick="closeModal('modal-create-user')" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                <button type="submit" class="px-5 py-2 bg-green-800 text-white font-bold rounded-lg hover:bg-green-900 shadow-md transition-colors">Simpan User</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT USER -->
<div id="modal-edit-user" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm" onclick="closeModal('modal-edit-user')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col">
        <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg md:text-xl font-bold text-gray-900 tracking-wide">Edit Profile User</h3>
            <button type="button" onclick="closeModal('modal-edit-user')" class="text-gray-900 hover:text-white transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="form-edit-user" action="" method="POST" class="p-6">
            @csrf @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input id="edit-user-name" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" type="text" name="name" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                    <input id="edit-user-email" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" type="email" name="email" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password Baru <span class="text-[10px] text-gray-400 font-normal">(Kosongkan jika tetap)</span></label>
                    <input class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" type="password" name="password" minlength="8">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role Akses</label>
                    <select id="edit-user-role" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-6 border-t mt-6">
                <button type="button" onclick="closeModal('modal-edit-user')" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition-colors">Batal</button>
                <button type="submit" class="px-5 py-2 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 shadow-md transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModalUser(id, name, email, role) {
        openModal('modal-edit-user');
        document.getElementById('form-edit-user').action = '/admin/user/' + id;
        document.getElementById('edit-user-name').value = name;
        document.getElementById('edit-user-email').value = email;
        document.getElementById('edit-user-role').value = role;
    }
</script>
