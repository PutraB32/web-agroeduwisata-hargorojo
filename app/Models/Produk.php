<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'manfaat',
        'gambar',
        'is_unggulan',
        'stok'
    ];
}
