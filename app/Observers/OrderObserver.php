<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        // Jika status order berubah menjadi dibatalkan
        if ($order->isDirty('status_order') && $order->status_order === 'dibatalkan') {
            $this->restoreStock($order);
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        // Jika order dihapus tapi statusnya belum dibatalkan sebelumnya
        if ($order->status_order !== 'dibatalkan') {
            $this->restoreStock($order);
        }
    }

    /**
     * Mengembalikan stok produk.
     */
    private function restoreStock(Order $order): void
    {
        foreach ($order->orderDetails as $detail) {
            $produk = $detail->produk;
            if ($produk) {
                // Kembalikan stok sesuai jumlah pesanan
                $produk->increment('stok', $detail->jumlah);
            }
        }
    }
}
