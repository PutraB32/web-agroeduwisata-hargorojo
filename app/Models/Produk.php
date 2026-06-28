<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use ResolvesMediaUrl;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'satuan',
        'manfaat',
        'gambar',
        'produk_unggulan',
        'stok',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'produk_id');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'produk_id');
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->gambar, 'produk');
    }

    public function getHargaRupiahAttribute(): string
    {
        return 'Rp'.number_format((float) $this->harga, 0, ',', '.');
    }
}
