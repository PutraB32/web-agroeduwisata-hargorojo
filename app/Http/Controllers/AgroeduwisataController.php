<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agroeduwisata; 
use App\Models\Produk;
use App\Models\KatalogDesa;

class AgroeduwisataController extends Controller
{
    public function index(Request $request)
    {
        $fasilitas = Agroeduwisata::where('kategori', 'Fasilitas')->get();
        $unggulan = Produk::where('is_unggulan', true)->take(4)->get();
        $katalog = KatalogDesa::where('kategori', 'Berita')->latest()->take(3)->get();

        return view('pages.agroeduwisata', compact('fasilitas', 'unggulan', 'katalog'));
    }   
}