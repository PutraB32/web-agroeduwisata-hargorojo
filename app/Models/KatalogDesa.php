<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KatalogDesa extends Model
{
    protected $table = 'katalog_desa';

    protected $fillable = [
        'kategori_id',
        'user_id',
        'judul',
        'deskripsi',
        'gambar',
        'Url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategoriKatalog()
    {
        return $this->belongsTo(KategoriKatalog::class, 'kategori_id');
    }
}
