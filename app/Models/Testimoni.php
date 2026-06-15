<?php

namespace App\Models;

use App\Models\Concerns\ResolvesMediaUrl;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use ResolvesMediaUrl;

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

    public function getAvatarUrlAttribute(): string
    {
        return 'https://ui-avatars.com/api/?name='.urlencode((string) $this->nama).'&background=random';
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->foto, 'testimoni', $this->avatar_url);
    }
}
