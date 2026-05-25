<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Agroeduwisata;
use App\Models\Produk;
use App\Models\KatalogDesa;

class BerandaController extends Controller  
{
    public function index(Request $request)
    {
          // Fetch 4 Menu Utama dari Agroeduwisata
        $agroeduwisata = Agroeduwisata::whereNull('parent_id')
            ->take(4)
            ->get();

        // Fetch 4 Produk Unggulan
        $produkUnggulan = Produk::where('is_unggulan', true)
            ->take(4)
            ->get();

        // Fetch top testimonies
        $testimonis = Testimoni::orderByDesc('rating')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $semuaKatalog = KatalogDesa::with('kategoriKatalog')
            ->latest()
            ->get()
            ->groupBy(function($item) {
                return $item->kategoriKatalog->nama_kategori ?? 'Lainnya';
            });

        $pengumuman = $semuaKatalog->get('Pengumuman', collect());

        $artikelBerita = $semuaKatalog->get('Artikel & Berita', collect());

        $perpustakaan = $semuaKatalog->get('Perpustakaan', collect());

        $galeri = $semuaKatalog->get('Galeri', collect());

        return view('pages.beranda', compact(
            'agroeduwisata',
            'produkUnggulan',
            'testimonis',
            'pengumuman',
            'artikelBerita',
            'perpustakaan',
            'galeri'
        ));
    }

    public function storeTestimoni(Request $request)
    {
        $request->validate([
            'produk_id' => 'nullable|exists:produk,id',
            'nama' => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {

            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('images/testimoni'),
                $imageName
            );

            $data['foto'] = $imageName;
        }

        Testimoni::create($data);

        return redirect()->back()->with(
            'success_testimoni',
            'Terima kasih! Ulasan Anda berhasil kami simpan.'
        );
    }
}
