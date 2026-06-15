<?php

namespace App\Http\Controllers;

use App\Models\KatalogDesa;
use Illuminate\Http\Request;

class KatalogDesaController extends Controller
{
    public function index(Request $request)
    {
        $pengumuman = KatalogDesa::with('kategoriKatalog')
            ->whereHas('kategoriKatalog', function ($query) {
                $query->where('nama_kategori', 'Pengumuman');
            })
            ->latest()
            ->take(4)
            ->get();

        $artikelBerita = KatalogDesa::with('kategoriKatalog')
            ->whereHas('kategoriKatalog', function ($query) {
                $query->where('nama_kategori', 'Artikel & Berita');
            })
            ->latest()
            ->take(6)
            ->get();

        $perpustakaan = KatalogDesa::with('kategoriKatalog')
            ->whereHas('kategoriKatalog', function ($query) {
                $query->where('nama_kategori', 'Perpustakaan');
            })
            ->latest()
            ->take(6)
            ->get();

        $galeri = KatalogDesa::with('kategoriKatalog')
            ->whereHas('kategoriKatalog', function ($query) {
                $query->where('nama_kategori', 'Galeri');
            })
            ->latest()
            ->take(8)
            ->get();

        $beritaUtama = KatalogDesa::with('kategoriKatalog')
    ->whereHas('kategoriKatalog', function ($query) {
        $query->where('nama_kategori', 'Artikel & Berita');
    })
    ->latest()
    ->first();

        $sidebarBerita = KatalogDesa::with('kategoriKatalog')
            ->whereHas('kategoriKatalog', function ($query) {
                $query->where('nama_kategori', 'Artikel & Berita');
            })
            ->latest()
            ->skip(1)
            ->take(3)
            ->get();

        return view('pages.katalogdesa', compact(
            'beritaUtama',
            'sidebarBerita',
            'pengumuman',
            'artikelBerita',
            'perpustakaan',
            'galeri'
        ));
    }
}