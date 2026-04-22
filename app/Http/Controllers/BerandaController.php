<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class BerandaController extends Controller  
{
    public function index(Request $request)
    {
        // Fetch 4 Menu Utama dari Agroeduwisata
        $agroeduwisata = Agroeduwisata::where('kategori', 'Menu Utama')->take(4)->get();
        
        // Fetch 4 Produk Unggulan
        $produkUnggulan = Produk::where('is_unggulan', true)->take(4)->get();

        // Fetch top 3 testimonies (prioritize high rating, then latest)
        $testimonis = Testimoni::orderByDesc('rating')->orderByDesc('created_at')->take(3)->get();
        
        return view('pages.beranda', compact('agroeduwisata', 'produkUnggulan', 'testimonis'));
    }
 
    public function storeTestimoni(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/testimoni'), $imageName);
            $data['foto'] = $imageName;
        }

        Testimoni::create($data);
        
        return redirect()->back()->with('success_testimoni', 'Terima kasih! Ulasan Anda berhasil kami simpan.');
    }
}
