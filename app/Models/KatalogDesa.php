<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class KatalogDesa extends Model
{
    use ResolvesMediaUrl;

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

    public function getGambarUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->gambar, 'katalog');
    }

    public function getExternalUrlAttribute(): ?string
    {
        return filled($this->Url) ? $this->Url : null;
    }

    public function getKategoriLabelAttribute(): string
    {
        return $this->kategoriKatalog->nama_kategori ?? 'Informasi Desa';
    }

    public function getKategoriIconClassAttribute(): string
    {
        return match ($this->kategori_label) {
            'Pengumuman' => 'fa-solid fa-bullhorn',
            'Artikel & Berita' => 'fa-regular fa-newspaper',
            'Perpustakaan' => 'fa-regular fa-file-lines',
            default => 'fa-regular fa-image',
        };
    }
}
