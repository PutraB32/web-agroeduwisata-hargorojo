<div class="admin-toolbar-summary">
    <div class="admin-toolbar-icon">
        <i class="fas {{ $icon ?? 'fa-table' }}"></i>
    </div>
    <div class="min-w-0">
        <p class="admin-toolbar-label">{{ $label ?? 'Data' }}</p>
        <p class="admin-toolbar-count">
            <span>{{ $count ?? 0 }}</span>
            {{ $unit ?? 'data' }}
        </p>
        <p class="admin-toolbar-meta">{{ $meta ?? 'Kelola data pada panel ini.' }}</p>
    </div>
</div>
