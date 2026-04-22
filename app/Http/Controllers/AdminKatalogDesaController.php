<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatalogDesa;

class AdminKatalogDesaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'url' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/katalog'), $imageName);
            $data['gambar'] = $imageName;
        }

        KatalogDesa::create($data);
        return redirect()->back()->with('success', 'Katalog Desa berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'url' => 'nullable|string',
        ]);

        $katalog = KatalogDesa::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($katalog->gambar && file_exists(public_path('images/katalog/' . $katalog->gambar))) {
                unlink(public_path('images/katalog/' . $katalog->gambar));
            }
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/katalog'), $imageName);
            $data['gambar'] = $imageName;
        }

        $katalog->update($data);
        return redirect()->back()->with('success', 'Katalog Desa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $katalog = KatalogDesa::findOrFail($id);
        
        if ($katalog->gambar && file_exists(public_path('images/katalog/' . $katalog->gambar))) {
            unlink(public_path('images/katalog/' . $katalog->gambar));
        }

        $katalog->delete();
        return redirect()->back()->with('success', 'Katalog Desa berhasil dihapus!');
    }
}
