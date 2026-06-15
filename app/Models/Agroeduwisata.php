<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Agroeduwisata extends Model
{
    use ResolvesMediaUrl;

    protected $table = 'agroeduwisata';

    protected $fillable = [
        'parent_id',
        'user_id',
        'judul',
        'deskripsi',
        'gambar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function children()
    {
        return $this->hasMany(Agroeduwisata::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Agroeduwisata::class, 'parent_id');
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->gambar, 'agroeduwisata');
    }
}
