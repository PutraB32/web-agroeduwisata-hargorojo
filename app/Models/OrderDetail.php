<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function getDetailSubtotalAttribute(): float
    {
        return (float) $this->harga_satuan * (int) $this->jumlah;
    }

    public function getFormattedHargaSatuanAttribute(): string
    {
        return 'Rp'.number_format((float) $this->harga_satuan, 0, ',', '.');
    }

    public function getFormattedDetailSubtotalAttribute(): string
    {
        return 'Rp'.number_format($this->detail_subtotal, 0, ',', '.');
    }

    public function getProdukImageUrlAttribute(): string
    {
        return $this->produk?->gambar_url ?? asset('images/beranda.bg.jpeg');
    }
}
