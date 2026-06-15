<div
    x-show="activePanel === 'profile'"
    x-transition
    x-cloak
    class="rounded-2xl border border-white/70 bg-white p-6 shadow-[0_20px_60px_rgba(0,0,0,0.12)]"
>
    <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
        <div class="flex items-start gap-4">
            @if($profile['customer']['photoUrl'])
                <img
                    src="{{ $profile['customer']['photoUrl'] }}"
                    alt="Foto {{ $profile['customer']['name'] }}"
                    class="h-20 w-20 shrink-0 rounded-full border-4 border-white object-cover shadow-[0_12px_30px_rgba(23,49,33,0.22)]"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >
                <div class="hidden h-20 w-20 shrink-0 items-center justify-center rounded-full bg-[#173121] text-2xl font-bold text-[#d8b15a] shadow-[0_12px_30px_rgba(23,49,33,0.22)]">
                    {{ $profile['customer']['initials'] }}
                </div>
            @else
                <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-full bg-[#173121] text-2xl font-bold text-[#d8b15a] shadow-[0_12px_30px_rgba(23,49,33,0.22)]">
                    {{ $profile['customer']['initials'] }}
                </div>
            @endif
            <div class="min-w-0">
                <p class="font-lora text-2xl font-bold text-[#173121]">{{ $profile['customer']['name'] }}</p>
                <p class="truncate text-sm text-[#6b736d]">{{ $profile['customer']['email'] }}</p>
                <span class="mt-3 inline-flex rounded-full border border-green-200 bg-green-50 px-3 py-1 text-[11px] font-bold text-green-700">
                    <i class="fa-solid fa-user mr-1"></i>
                    Customer
                </span>
            </div>
        </div>

        <button
            type="button"
            @click="editingProfile = !editingProfile"
            class="inline-flex h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-[#173121] px-5 text-sm font-semibold text-white transition hover:bg-[#21412f]"
        >
            <i class="fa-solid fa-pen-to-square"></i>
            <span x-text="editingProfile ? 'Tutup Edit' : 'Edit Profil'"></span>
        </button>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-2">
        <div class="rounded-2xl border border-[#ece6da] bg-[#f8f6f1] p-4">
            <p class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-[#173121]">
                <i class="fa-solid fa-phone text-[#d8b15a]"></i>
                Nomor HP
            </p>
            <p class="mt-2 break-words text-sm text-[#6b736d]">{{ $profile['customer']['phoneLabel'] }}</p>
        </div>

        <div class="rounded-2xl border border-[#ece6da] bg-[#f8f6f1] p-4">
            <p class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-[#173121]">
                <i class="fa-solid fa-location-dot text-[#d8b15a]"></i>
                Alamat
            </p>
            <p class="mt-2 break-words text-sm leading-relaxed text-[#6b736d]">{{ $profile['customer']['addressLabel'] }}</p>
        </div>
    </div>

    <form
        x-show="editingProfile"
        x-transition
        x-cloak
        action="{{ route('customer.profile.update') }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-6 grid gap-4 border-t border-[#ece6da] pt-5"
    >
        @csrf
        @method('PUT')

        <div>
            <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Tambah Foto</label>
            <input
                type="file"
                name="foto"
                accept="image/*"
                class="w-full rounded-2xl border border-[#ece6da] bg-white px-4 py-3 text-sm text-[#6b736d] file:mr-4 file:rounded-full file:border-0 file:bg-[#173121] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#21412f] focus:outline-none focus:ring-2 focus:ring-[#173121]"
            >
            <p class="mt-2 text-xs text-[#6b736d]">Opsional, format JPG, PNG, GIF, atau WEBP maksimal 5 MB.</p>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Nama</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $customer->name) }}"
                    class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                    required
                >
            </div>

            <div>
                <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $customer->email) }}"
                    class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                    required
                >
            </div>

            <div>
                <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Nomor HP</label>
                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp', $customer->no_hp) }}"
                    class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                    placeholder="08123456789"
                >
            </div>

            <div class="lg:col-span-2">
                <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Alamat</label>
                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full rounded-2xl border border-[#ece6da] px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                    placeholder="Alamat pengiriman utama"
                >{{ old('alamat', $customer->alamat) }}</textarea>
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
            <button
                type="button"
                @click="editingProfile = false"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-full border border-[#ece6da] px-5 text-sm font-semibold text-[#173121] transition hover:bg-[#f8f6f1]"
            >
                Batal
            </button>
            <button
                type="submit"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-[#173121] px-5 text-sm font-semibold text-white transition hover:bg-[#21412f]"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Simpan Profil
            </button>
        </div>
    </form>
</div>
