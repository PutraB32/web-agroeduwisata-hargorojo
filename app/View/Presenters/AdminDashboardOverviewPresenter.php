<?php

namespace App\View\Presenters;

class AdminDashboardOverviewPresenter
{
    public static function make(array $stats, bool $isSuperAdmin, array $chartData): array
    {
        $statusCounts = collect($stats['status_counts'] ?? []);
        $latestOrders = collect($stats['latest_orders'] ?? []);
        $lowStockProducts = collect($stats['low_stock_products'] ?? []);
        $totalOrders = max((int) ($stats['total_orders'] ?? 0), 1);

        return [
            'stats' => $stats,
            'statusRows' => self::statusRows($statusCounts, $totalOrders),
            'latestOrderRows' => self::latestOrderRows($latestOrders),
            'lowStockRows' => self::lowStockRows($lowStockProducts),
            'summaryCards' => self::summaryCards($stats, $isSuperAdmin),
            'taskCards' => self::taskCards($stats),
            'monthOmzet' => self::rupiah($stats['month_omzet'] ?? 0),
            'todayOmzet' => self::rupiah($stats['today_omzet'] ?? 0),
            'emptyStockCount' => (int) ($stats['empty_stock_count'] ?? 0),
            'hasSalesData' => collect($chartData)->sum() > 0,
            'todayLabel' => now()->format('d M Y'),
        ];
    }

    private static function summaryCards(array $stats, bool $isSuperAdmin): array
    {
        return [
            [
                'label' => 'Produk',
                'value' => self::number($stats['total_produk'] ?? 0),
                'caption' => 'Produk e-commerce',
                'icon' => 'fa-box',
                'iconClass' => 'bg-green-50 text-primary border-green-100',
            ],
            [
                'label' => $isSuperAdmin ? 'Katalog Desa' : 'Agroeduwisata',
                'value' => self::number($isSuperAdmin ? ($stats['total_katalog'] ?? 0) : ($stats['total_agro'] ?? 0)),
                'caption' => $isSuperAdmin ? 'Data informasi desa' : 'Konten wisata desa',
                'icon' => $isSuperAdmin ? 'fa-book-open' : 'fa-leaf',
                'iconClass' => 'bg-[#fff8e1] text-[#b28a24] border-[#ead79a]',
            ],
            [
                'label' => $isSuperAdmin ? 'Pengguna' : 'Katalog Desa',
                'value' => self::number($isSuperAdmin ? ($stats['total_users'] ?? 0) : ($stats['total_katalog'] ?? 0)),
                'caption' => $isSuperAdmin ? 'Akun admin sistem' : 'Data informasi desa',
                'icon' => $isSuperAdmin ? 'fa-users' : 'fa-book-open',
                'iconClass' => 'bg-blue-50 text-blue-700 border-blue-100',
            ],
            [
                'label' => 'Pesanan',
                'value' => self::number($stats['total_orders'] ?? 0),
                'caption' => 'Transaksi masuk',
                'icon' => 'fa-receipt',
                'iconClass' => 'bg-red-50 text-red-700 border-red-100',
            ],
        ];
    }

    private static function taskCards(array $stats): array
    {
        return [
            [
                'label' => 'Pesanan siap diproses',
                'description' => 'Cek pembayaran dan mulai proses pesanan.',
                'value' => self::number($stats['ready_to_process_count'] ?? 0),
                'panel' => 'order',
                'icon' => 'fa-clipboard-check',
                'class' => 'border-amber-100 bg-amber-50 text-amber-700',
            ],
            [
                'label' => 'Resi belum diinput',
                'description' => 'Lengkapi kurir dan nomor resi pengiriman.',
                'value' => self::number($stats['shipment_missing_count'] ?? 0),
                'panel' => 'order',
                'icon' => 'fa-truck-ramp-box',
                'class' => 'border-sky-100 bg-sky-50 text-sky-700',
            ],
            [
                'label' => 'Stok perlu dicek',
                'description' => 'Produk dengan stok rendah atau habis.',
                'value' => self::number($stats['low_stock_count'] ?? 0),
                'panel' => 'produk',
                'icon' => 'fa-boxes-stacked',
                'class' => 'border-red-100 bg-red-50 text-red-700',
            ],
        ];
    }

    private static function statusRows($statusCounts, int $totalOrders): array
    {
        return collect(self::statusMeta())->map(function (array $meta, string $status) use ($statusCounts, $totalOrders) {
            $count = (int) ($statusCounts[$status] ?? 0);

            return array_merge($meta, [
                'status' => $status,
                'count' => $count,
                'countDisplay' => self::number($count),
                'percent' => min(100, round(($count / $totalOrders) * 100)),
            ]);
        })->values()->all();
    }

    private static function latestOrderRows($orders): array
    {
        return collect($orders)->map(function ($order) {
            $statusMeta = self::statusMeta();
            $paymentMeta = self::paymentMeta();
            $status = $order->status_order ?? 'pending';
            $paymentStatus = $order->payment_status ?? 'pending';

            return [
                'order' => $order,
                'statusMeta' => $statusMeta[$status] ?? $statusMeta['pending'],
                'paymentMeta' => $paymentMeta[$paymentStatus] ?? [
                    'label' => ucfirst((string) $paymentStatus),
                    'class' => 'bg-gray-50 text-gray-700 border-gray-200',
                ],
                'createdAt' => $order->created_at ? $order->created_at->format('d M Y, H:i') : '-',
                'total' => self::rupiah($order->total ?? 0),
            ];
        })->all();
    }

    private static function lowStockRows($products): array
    {
        return collect($products)->map(function ($product) {
            $stock = (int) ($product->stok ?? 0);

            return [
                'product' => $product,
                'stock' => $stock,
                'stockLabel' => $stock <= 0 ? 'Habis' : ($stock <= 5 ? 'Menipis' : 'Aman'),
                'stockClass' => $stock <= 0
                    ? 'bg-red-50 text-red-700 border-red-200'
                    : ($stock <= 5 ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-green-50 text-green-700 border-green-200'),
                'price' => self::rupiah($product->harga ?? 0),
            ];
        })->all();
    }

    private static function statusMeta(): array
    {
        return [
            'pending' => [
                'label' => 'Pending',
                'icon' => 'fa-clock',
                'class' => 'bg-amber-50 text-amber-700 border-amber-200',
                'bar' => 'bg-amber-500',
            ],
            'diproses' => [
                'label' => 'Diproses',
                'icon' => 'fa-gears',
                'class' => 'bg-blue-50 text-blue-700 border-blue-200',
                'bar' => 'bg-blue-500',
            ],
            'dikirim' => [
                'label' => 'Dikirim',
                'icon' => 'fa-truck-fast',
                'class' => 'bg-sky-50 text-sky-700 border-sky-200',
                'bar' => 'bg-sky-500',
            ],
            'selesai' => [
                'label' => 'Selesai',
                'icon' => 'fa-circle-check',
                'class' => 'bg-green-50 text-green-700 border-green-200',
                'bar' => 'bg-green-600',
            ],
            'dibatalkan' => [
                'label' => 'Dibatalkan',
                'icon' => 'fa-ban',
                'class' => 'bg-red-50 text-red-700 border-red-200',
                'bar' => 'bg-red-500',
            ],
        ];
    }

    private static function paymentMeta(): array
    {
        return [
            'paid' => ['label' => 'Dibayar', 'class' => 'bg-green-50 text-green-700 border-green-200'],
            'pending' => ['label' => 'Pending', 'class' => 'bg-amber-50 text-amber-700 border-amber-200'],
            'expired' => ['label' => 'Expired', 'class' => 'bg-orange-50 text-orange-700 border-orange-200'],
            'cancel' => ['label' => 'Cancel', 'class' => 'bg-red-50 text-red-700 border-red-200'],
            'failed' => ['label' => 'Failed', 'class' => 'bg-red-50 text-red-700 border-red-200'],
            'refund' => ['label' => 'Refund', 'class' => 'bg-purple-50 text-purple-700 border-purple-200'],
        ];
    }

    private static function rupiah(mixed $value): string
    {
        return 'Rp'.self::number($value);
    }

    private static function number(mixed $value): string
    {
        return number_format((float) $value, 0, ',', '.');
    }
}
