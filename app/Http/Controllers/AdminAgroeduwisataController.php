<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agroeduwisata;

class AdminAgroeduwisataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/agroeduwisata'), $imageName);
            $data['gambar'] = $imageName;
        }

        Agroeduwisata::create($data);
        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $agro = Agroeduwisata::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($agro->gambar && file_exists(public_path('images/agroeduwisata/' . $agro->gambar))) {
                unlink(public_path('images/agroeduwisata/' . $agro->gambar));
            }
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/agroeduwisata'), $imageName);
            $data['gambar'] = $imageName;
        }

        $agro->update($data);
        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agro = Agroeduwisata::findOrFail($id);
        
        if ($agro->gambar && file_exists(public_path('images/agroeduwisata/' . $agro->gambar))) {
            unlink(public_path('images/agroeduwisata/' . $agro->gambar));
        }

        $agro->delete();
        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil dihapus!');
    }
}
