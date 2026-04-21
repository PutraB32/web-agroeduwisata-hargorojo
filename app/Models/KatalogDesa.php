<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KatalogDesa extends Model
{
    protected $table = 'katalog_desa';

    protected $fillable = [
        'kategori',
        'judul',
        'deskripsi',
        'gambar',
        'url'
    ];
}
