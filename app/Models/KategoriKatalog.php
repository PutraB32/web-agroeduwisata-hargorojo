<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKatalog extends Model
{
    protected $table = 'kategori_katalogs';

    protected $fillable = [
        'nama_kategori'
    ];

    public function katalogDesas()
    {
        return $this->hasMany(KatalogDesa::class, 'kategori_id');
    }
}
