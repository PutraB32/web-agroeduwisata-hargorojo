<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatalogDesa;

class KatalogDesaController extends Controller
{
    public function index(Request $request)
    {
        $katalogBerita = KatalogDesa::where('kategori', 'Berita')->get();
        $katalogFoto = KatalogDesa::where('kategori', 'Foto')->get();
        $katalogUMKM = KatalogDesa::where('kategori', 'UMKM')->get();

        return view('pages.katalogdesa', compact('katalogBerita', 'katalogFoto', 'katalogUMKM'));
    }
}
