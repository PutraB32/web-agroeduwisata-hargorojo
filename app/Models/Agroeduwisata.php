<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agroeduwisata extends Model
{
    protected $table = 'agroeduwisata';

    protected $fillable = [
        'kategori',
        'judul',
        'deskripsi',
        'gambar'
    ];
}
