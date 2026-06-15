<?php

namespace App\Http\Controllers;

use App\Models\Agroeduwisata;
use App\Models\KatalogDesa;
use App\Models\Produk;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class AgroeduwisataController extends Controller
{
    public function index(Request $request)
    {
        $menusUtama = Agroeduwisata::whereNull('parent_id')
            ->with('children')
            ->get();

        $produkUnggulan = Produk::where('is_unggulan', true)
            ->take(4)
            ->get();

        $katalog = KatalogDesa::whereHas('kategoriKatalog', function ($query) {
            $query->where('nama_kategori', 'Artikel & Berita');
        })
            ->latest()
            ->take(3)
            ->get();

        $testimoni = Testimoni::whereNull('produk_id')
            ->orderByDesc('rating')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view(
            'pages.agroeduwisata',
            compact(
                'menusUtama',
                'produkUnggulan',
                'katalog',
                'testimoni'
            )
        );
    }
}