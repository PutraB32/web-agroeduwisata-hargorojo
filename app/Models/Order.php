<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'nama_pemesan',
        'no_hp',
        'alamat',
        'total',
        'detail_pesanan'
    ];

    protected $casts = [
        'detail_pesanan' => 'array'
    ];
}
