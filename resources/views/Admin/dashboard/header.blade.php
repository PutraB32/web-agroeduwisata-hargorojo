<div id="admin-page-header" class="admin-page-header">
    <div class="admin-page-header-inner">
        <div class="admin-page-accent" aria-hidden="true"></div>

        <div class="admin-page-copy">
            <p class="admin-page-eyebrow">{{ $eyebrow ?? 'Panel Operasional' }}</p>
            <h1 id="page-title" class="admin-page-title">Dashboard Utama</h1>
            <p id="page-description" class="admin-page-description">{{ $description ?? 'Kelola data dashboard dengan cepat.' }}</p>
        </div>

        <div class="admin-role-card">
            <div class="admin-role-icon">
                <i class="fas {{ $roleIcon ?? 'fa-user-shield' }}"></i>
            </div>
            <div class="admin-role-copy">
                <p class="admin-role-kicker">Role Aktif</p>
                <p class="admin-role-title">{{ $roleLabel ?? 'Admin' }}</p>
            </div>
        </div>
    </div>
</div>
