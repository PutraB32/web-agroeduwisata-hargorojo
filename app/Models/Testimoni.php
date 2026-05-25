<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable = [
        'produk_id',
        'nama',
        'isi_testimoni',
        'rating',
        'foto'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
