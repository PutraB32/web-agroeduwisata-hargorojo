<?php

namespace App\Http\Controllers;

use App\Models\KatalogDesa;
use App\Models\KategoriKatalog;
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

        $statistikKatalog = $this->statistikKatalog();

        return view('pages.katalogdesa', compact(
            'beritaUtama',
            'sidebarBerita',
            'pengumuman',
            'artikelBerita',
            'perpustakaan',
            'galeri',
            'statistikKatalog'
        ));
    }

    private function statistikKatalog(): array
    {
        $kategoriCounts = KategoriKatalog::query()
            ->withCount('katalogDesas')
            ->whereIn('nama_kategori', [
                'Pengumuman',
                'Artikel & Berita',
                'Perpustakaan',
                'Galeri',
            ])
            ->get()
            ->pluck('katalog_desas_count', 'nama_kategori');

        return [
            [
                'kategori' => 'Pengumuman',
                'label' => 'Pengumuman',
                'description' => 'Informasi terbaru desa',
                'icon' => 'fa-solid fa-bullhorn',
                'color' => '#D97706',
                'delayClass' => 'stat-card-delay-1',
                'count' => (int) $kategoriCounts->get('Pengumuman', 0),
            ],
            [
                'kategori' => 'Artikel & Berita',
                'label' => 'Artikel & Berita',
                'description' => 'Cerita dan kegiatan desa',
                'icon' => 'fa-regular fa-newspaper',
                'color' => '#2563EB',
                'delayClass' => 'stat-card-delay-2',
                'count' => (int) $kategoriCounts->get('Artikel & Berita', 0),
            ],
            [
                'kategori' => 'Perpustakaan',
                'label' => 'Perpustakaan Desa',
                'description' => 'Arsip & buku desa',
                'icon' => 'fa-regular fa-file-lines',
                'color' => '#7C3AED',
                'delayClass' => 'stat-card-delay-3',
                'count' => (int) $kategoriCounts->get('Perpustakaan', 0),
            ],
            [
                'kategori' => 'Galeri',
                'label' => 'Galeri Desa',
                'description' => 'Momen kegiatan desa',
                'icon' => 'fa-regular fa-image',
                'color' => '#5B8F5B',
                'delayClass' => 'stat-card-delay-4',
                'count' => (int) $kategoriCounts->get('Galeri', 0),
            ],
        ];
    }
}
