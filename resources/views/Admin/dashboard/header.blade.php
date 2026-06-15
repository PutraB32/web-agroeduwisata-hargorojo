<div id="admin-page-header" class="mb-5 overflow-hidden rounded-2xl border border-[#dfe8df] bg-white shadow-[0_18px_45px_rgba(0,77,64,0.08)] md:mb-7">
    <div class="relative flex flex-col gap-5 p-5 md:p-6 lg:flex-row lg:items-center lg:justify-between">
        <div class="pointer-events-none absolute right-0 top-0 h-28 w-28 rounded-bl-full bg-[#f3ead2] opacity-70"></div>
        <div class="pointer-events-none absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-primary via-[#d4af37] to-transparent"></div>

        <div class="relative min-w-0">
            <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#b28a24]">{{ $eyebrow ?? 'Panel Operasional' }}</p>
            <h1 id="page-title" class="mt-2 font-serif text-2xl font-black leading-tight text-primary sm:text-3xl md:text-4xl">Dashboard Utama</h1>
            <p id="page-description" class="mt-2 max-w-3xl text-sm leading-relaxed text-gray-500">{{ $description ?? 'Kelola data dashboard dengan cepat.' }}</p>
        </div>

        <div class="relative inline-flex w-full items-center gap-3 rounded-2xl border {{ $roleBorder ?? 'border-green-100' }} bg-[#fbfcfa] px-4 py-3 shadow-sm sm:w-auto">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-white bg-white shadow-sm {{ $roleIconClass ?? 'bg-green-50 text-primary' }}">
                <i class="fas {{ $roleIcon ?? 'fa-user-shield' }}"></i>
            </div>
            <div class="min-w-0 leading-tight">
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">Role Aktif</p>
                <p class="mt-1 text-sm font-black text-primary">{{ $roleLabel ?? 'Admin' }}</p>
            </div>
        </div>
    </div>
</div>
