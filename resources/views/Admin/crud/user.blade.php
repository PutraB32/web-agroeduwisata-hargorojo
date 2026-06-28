<div id="panel-user" class="crud-panel mt-6 mb-6 hidden">
    <div class="admin-toolbar">
        @include('Admin.components.panel_toolbar_summary', [
            'icon' => 'fa-users-cog',
            'label' => 'Pengguna Sistem',
            'count' => $users->total(),
            'unit' => 'user',
            'meta' => 'Kelola akun admin, super admin, dan customer.',
        ])

        <div class="admin-toolbar-actions">
            <form action="{{ url()->current() }}" method="GET" class="admin-search-control w-full md:w-[19rem]">
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

    <div class="admin-table-scroll bg-white rounded-lg shadow border border-gray-200">
        <table class="admin-data-table admin-table-user min-w-full leading-normal">
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
                        <span class="inline-flex rounded-full border px-3 py-1 text-[10px] font-bold uppercase {{ $user->role_badge_class }}">
                            {{ $user->role_label }}
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

    @if ($users->hasPages())
    @php
        $currentPage = $users->currentPage();
        $lastPage = $users->lastPage();

        $paginationPages = collect([
            1,
            $currentPage - 1,
            $currentPage,
            $currentPage + 1,
            $lastPage,
        ])
            ->filter(fn ($page) => $page >= 1 && $page <= $lastPage)
            ->unique()
            ->sort()
            ->values();
    @endphp

    <div class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">

        <p class="text-sm text-gray-600">
            Menampilkan
            <span class="font-bold text-gray-800">{{ $users->firstItem() }}</span>
            -
            <span class="font-bold text-gray-800">{{ $users->lastItem() }}</span>
            dari
            <span class="font-bold text-gray-800">{{ $users->total() }}</span>
            akun pengguna
        </p>

        <nav class="flex flex-wrap items-center gap-1" aria-label="Navigasi Halaman Pengguna">

            @if ($users->onFirstPage())
                <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-gray-100 px-3 text-sm font-bold text-gray-400">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $users->previousPageUrl() }}"
                   class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            @foreach ($paginationPages as $index => $page)

                @if ($index > 0 && $page - $paginationPages[$index - 1] > 1)
                    <span class="inline-flex h-9 min-w-9 items-center justify-center px-2 text-sm font-bold text-gray-400">
                        ...
                    </span>
                @endif

                @if ($page === $currentPage)

                    <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-green-800 bg-green-800 px-3 text-sm font-bold text-white">
                        {{ $page }}
                    </span>

                @else

                    <a href="{{ $users->url($page) }}"
                       class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">
                        {{ $page }}
                    </a>

                @endif

            @endforeach

            @if ($users->hasMorePages())

                <a href="{{ $users->nextPageUrl() }}"
                   class="inline-flex h-9 min-w-9 items-center justify-center rounded-md border border-gray-200 bg-white px-3 text-sm font-bold text-gray-700 transition-colors hover:border-green-800 hover:bg-green-50 hover:text-green-800">

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

<!-- MODAL CREATE USER -->
<div id="modal-create-user" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6" role="dialog">
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-create-user')"></div>
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
                    <div class="admin-password-field flex items-center border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-green-800 w-full" style="border: 1px solid #D7E1D7; border-radius: 0.65rem; background-color: #FFFFFF; min-height: 2.55rem;">
                        <input id="create-user-password" type="password" name="password" required minlength="8" style="border: none !important; outline: none !important; box-shadow: none !important; background: transparent !important; flex: 1; width: 100%; min-height: auto; margin: 0; padding-left: 0.75rem; padding-right: 0.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-size: 0.9rem; color: #2C2C2C;">
                        <button type="button" onclick="return window.adminTogglePasswordField(this)" class="admin-password-toggle text-gray-400 hover:text-green-800 transition-colors" style="background: transparent; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; padding-left: 0.75rem; padding-right: 0.75rem; height: 100%; z-index: 20;" aria-label="Tampilkan password">
                            <i class="fas fa-eye" id="create-user-password-eye"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role Akses</label>
                    <select class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-800 outline-none" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="customer">Customer</option>
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
    <div class="absolute inset-0 bg-gray-900/75" onclick="closeModal('modal-edit-user')"></div>
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
                    <div class="admin-password-field flex items-center border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-yellow-500 w-full" style="border: 1px solid #D7E1D7; border-radius: 0.65rem; background-color: #FFFFFF; min-height: 2.55rem;">
                        <input id="edit-user-password" type="password" name="password" minlength="8" style="border: none !important; outline: none !important; box-shadow: none !important; background: transparent !important; flex: 1; width: 100%; min-height: auto; margin: 0; padding-left: 0.75rem; padding-right: 0.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-size: 0.9rem; color: #2C2C2C;">
                        <button type="button" onclick="return window.adminTogglePasswordField(this)" class="admin-password-toggle text-gray-400 hover:text-yellow-600 transition-colors" style="background: transparent; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; padding-left: 0.75rem; padding-right: 0.75rem; height: 100%; z-index: 20;" aria-label="Tampilkan password baru">
                            <i class="fas fa-eye" id="edit-user-password-eye"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role Akses</label>
                    <select id="edit-user-role" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 outline-none" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="customer">Customer</option>
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
