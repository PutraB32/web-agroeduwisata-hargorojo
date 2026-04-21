<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable = [
        'nama',
        'isi_testimoni',
        'rating',
        'foto'
    ];
}
