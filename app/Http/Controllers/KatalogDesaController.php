<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatalogDesa;

class KatalogDesaController extends Controller
{
    public function index(Request $request)
    {
        $semuaKatalog = KatalogDesa::with('kategoriKatalog')->latest()->get()->groupBy(function($item) {
            return $item->kategoriKatalog->nama_kategori ?? 'Lainnya';
        });

        $pengumuman = $semuaKatalog->get('Pengumuman', collect());
        $artikelBerita = $semuaKatalog->get('Artikel & Berita', collect());
        $perpustakaan = $semuaKatalog->get('Perpustakaan', collect());
        $galeri = $semuaKatalog->get('Galeri', collect());

        return view('pages.katalogdesa', compact('pengumuman', 'artikelBerita', 'perpustakaan', 'galeri'));
    }
}
