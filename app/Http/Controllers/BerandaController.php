<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class BerandaController extends Controller  
{
    public function index(Request $request)
    {
        // Fetch top 3 testimonies (prioritize high rating, then latest)
        $testimonis = Testimoni::orderByDesc('rating')->orderByDesc('created_at')->take(3)->get();
        return view('pages.beranda', compact('testimonis'));
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
