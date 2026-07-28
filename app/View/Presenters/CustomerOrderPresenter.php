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

    public static function autoLinkText(?string $text): string
    {
        if (empty($text)) {
            return '';
        }

        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        // Link otomatis untuk URL
        $text = preg_replace(
            '/(https?:\/\/[^\s]+)/',
            '<a href="$1" target="_blank" class="text-amber-700 hover:text-amber-900 font-bold underline"><i class="fa-solid fa-link text-[10px]"></i> Link</a>',
            $text
        );

        // Link otomatis untuk nomor WA (contoh: 08x atau 628x)
        $text = preg_replace(
            '/(?<!href="tel:|href="https:\/\/wa\.me\/)(?:08|628|\+628)[0-9]{7,13}/',
            '<a href="https://wa.me/$0" target="_blank" class="text-green-700 hover:text-green-900 font-bold underline"><i class="fa-brands fa-whatsapp text-[12px]"></i> $0</a>',
            $text
        );

        // Perbaiki jika wa.me masih memiliki "08" di depan URL agar diganti ke "628" untuk WhatsApp
        $text = preg_replace_callback(
            '/href="https:\/\/wa\.me\/(08[0-9]{7,13})"/',
            function($matches) {
                return 'href="https://wa.me/628' . substr($matches[1], 2) . '"';
            },
            $text
        );

        return nl2br($text);
    }

    public static function make(Order $order, ?int $detailLimit = null, ?string $fallbackProductImageUrl = null): array
    {
        $fallbackProductImageUrl ??= asset('images/beranda.bg.jpeg');
        $details = self::details($order, $fallbackProductImageUrl);
        $visibleDetails = $detailLimit ? $details->take($detailLimit)->values() : $details;
        $remainingDetailsCount = max($details->count() - $visibleDetails->count(), 0);
        $hasShipment = $order->sudahDikirim();
        $hasPickupSchedule = $order->punyaJadwalAmbil();

        return [
            'id' => $order->id,
            'domId' => 'customer-order-'.$order->id,
            'displayId' => $order->midtrans_order_id ?: '#'.$order->id,
            'createdAtLabel' => self::formatDate($order->created_at),
            'customerName' => $order->nama_pemesan,
            'phone' => $order->no_hp,
            'address' => $order->alamat,
            'metodePenerimaanLabel' => $order->metode_penerimaan_label,
            'isAmbilDiTempat' => $order->isAmbilDiTempat(),
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
            'pickup' => [
                'available' => $hasPickupSchedule,
                'tanggalAmbilLabel' => self::formatDate($order->tanggal_ambil).' WIB',
                'hasTanggalAmbil' => filled($order->tanggal_ambil),
                'catatanAdmin' => self::autoLinkText($order->catatan_admin),
                'hasCatatanAdmin' => filled($order->catatan_admin),
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
