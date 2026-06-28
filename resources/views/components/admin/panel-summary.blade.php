@props([
    'icon' => 'fa-table',
    'label' => 'Data',
    'count' => 0,
    'unit' => 'data',
    'meta' => 'Kelola data pada panel ini.'
])

<div class="admin-toolbar-summary">
    <div class="admin-toolbar-icon">
        <i class="fas {{ $icon }}"></i>
    </div>
    <div class="min-w-0">
        <p class="admin-toolbar-label">{{ $label }}</p>
        <p class="admin-toolbar-count">
            <span>{{ $count }}</span>
            {{ $unit }}
        </p>
        <p class="admin-toolbar-meta">{{ $meta }}</p>
    </div>
</div>
