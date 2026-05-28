@php
    $eyebrow = $eyebrow ?? 'Panel Operasional';
    $description = $description ?? 'Kelola data dashboard dengan cepat.';
    $roleLabel = $roleLabel ?? 'Admin';
    $roleIcon = $roleIcon ?? 'fa-user-shield';
    $roleBorder = $roleBorder ?? 'border-green-100';
    $roleIconClass = $roleIconClass ?? 'bg-green-50 text-primary';
@endphp

<div class="admin-page-header mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
    <div>
        <p class="text-[11px] font-black uppercase tracking-[0.16em] text-secondary">{{ $eyebrow }}</p>
        <h1 id="page-title" class="font-serif text-2xl md:text-3xl font-black text-primary mt-1">Dashboard Utama</h1>
        <p class="text-sm text-gray-500 mt-1">{{ $description }}</p>
    </div>
    <div class="inline-flex items-center gap-3 rounded-lg border {{ $roleBorder }} bg-white px-4 py-3 shadow-sm">
        <div class="admin-stat-icon {{ $roleIconClass }}">
            <i class="fas {{ $roleIcon }}"></i>
        </div>
        <div class="leading-tight">
            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">Role Aktif</p>
            <p class="text-sm font-black text-primary">{{ $roleLabel }}</p>
        </div>
    </div>
</div>
