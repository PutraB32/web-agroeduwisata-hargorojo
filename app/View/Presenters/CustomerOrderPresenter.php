<?php

namespace App\View\Presenters;

use App\Models\Order;
use Illuminate\Support\Collection;

class CustomerOrderPresenter
{
    public static function collection(Collection $orders, ?int $detailLimit = null, ?string $fallbackProductImageUrl = null): Collection
    {
        return $orders
            ->map(fn (Order $order) => self::make($order, $detailLimit, $fallbackProductImageUrl))
            ->values();
    }

    public static function make(Order $order, ?int $detailLimit = null, ?string $fallbackProductImageUrl = null): array
    {
        $fallbackProductImageUrl ??= asset('images/beranda.bg.jpeg');
        $details = self::details($order, $fallbackProductImageUrl);
        $visibleDetails = $detailLimit ? $details->take($detailLimit)->values() : $details;
        $remainingDetailsCount = max($details->count() - $visibleDetails->count(), 0);
        $hasShipment = $order->sudahDikirim();

        return [
            'id' => $order->id,
            'domId' => 'customer-order-'.$order->id,
            'displayId' => $order->midtrans_order_id ?: '#'.$order->id,
            'createdAtLabel' => self::formatDate($order->created_at),
            'customerName' => $order->nama_pemesan,
            'phone' => $order->no_hp,
            'address' => $order->alamat,
            'metodePenerimaanLabel' => $order->metode_penerimaan_label,
            'formattedTotal' => $order->formatted_total,
            'formattedProdukSubtotal' => $order->formatted_produk_subtotal,
            'statusOrderLabel' => $order->status_order_label,
            'statusOrderClass' => $order->status_order_badge_class,
            'paymentStatusLabel' => $order->payment_status_label,
            'paymentStatusClass' => $order->payment_status_badge_class,
            'details' => $details,
            'visibleDetails' => $visibleDetails,
            'remainingDetailsCount' => $remainingDetailsCount,
            'remainingDetailsLabel' => '+'.$remainingDetailsCount.' produk lainnya',
            'hasRemainingDetails' => $remainingDetailsCount > 0,
            'hasDetails' => $details->isNotEmpty(),
            'shipment' => [
                'available' => $hasShipment,
                'kurir' => $order->kurir ?: '-',
                'nomorResi' => $order->nomor_resi ?: '-',
                'tanggalDikirimLabel' => self::formatDate($order->tanggal_dikirim),
                'hasTanggalDikirim' => filled($order->tanggal_dikirim),
            ],
        ];
    }

    private static function details(Order $order, string $fallbackProductImageUrl): Collection
    {
        return $order->orderDetails
            ->map(function ($detail) use ($fallbackProductImageUrl) {
                $produk = $detail->produk;

                return [
                    'name' => $produk->nama ?? 'Produk Terhapus',
                    'imageUrl' => $produk?->gambar_url ?? $fallbackProductImageUrl,
                    'formattedUnitPrice' => $detail->formatted_harga_satuan,
                    'quantity' => $detail->jumlah,
                    'formattedSubtotal' => $detail->formatted_detail_subtotal,
                ];
            })
            ->values();
    }

    private static function formatDate($date): string
    {
        return $date ? $date->format('d M Y, H:i') : '-';
    }
}
