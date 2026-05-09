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
        // Ambil Menu Utama (parent_id is null) beserta tahapan anak-anaknya
        $menusUtama = Agroeduwisata::whereNull('parent_id')->with('children')->get();

        $unggulan = Produk::where('is_unggulan', true)->take(4)->get();
        $katalog = KatalogDesa::whereHas('kategoriKatalog', function($query) {
            $query->where('nama_kategori', 'Artikel & Berita');
        })->latest()->take(3)->get();

        return view('pages.agroeduwisata', compact('menusUtama', 'unggulan', 'katalog'));
    }   
}