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
        // Ambil 4 Menu Utama sebagai kartu utama di tampilan depan
        $menusUtama = Agroeduwisata::where('kategori', 'Menu Utama')->get();
        
        // Ambil semua (yang bukan Menu Utama) dan kelompokkan berdasarkan nama kategorinya
        $tahapan = Agroeduwisata::where('kategori', '!=', 'Menu Utama')->get()->groupBy('kategori');

        $unggulan = Produk::where('is_unggulan', true)->take(4)->get();
        $katalog = KatalogDesa::where('kategori', 'Berita')->latest()->take(3)->get();

        return view('pages.agroeduwisata', compact('menusUtama', 'tahapan', 'unggulan', 'katalog'));
    }   
}