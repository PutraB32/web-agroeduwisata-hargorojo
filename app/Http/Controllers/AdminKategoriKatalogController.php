<?php

namespace App\Http\Controllers;

use App\Models\KategoriKatalog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminKategoriKatalogController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_katalogs,nama_kategori',
        ]);

        KategoriKatalog::create($data);

        return redirect()->back()->with('success', 'Kategori katalog berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriKatalog::findOrFail($id);

        $data = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kategori_katalogs', 'nama_kategori')->ignore($kategori->id),
            ],
        ]);

        $kategori->update($data);

        return redirect()->back()->with('success', 'Kategori katalog berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriKatalog::findOrFail($id);

        if ($kategori->katalogDesas()->exists()) {
            return redirect()->back()->withErrors([
                'kategori' => 'Kategori tidak dapat dihapus karena masih digunakan oleh data katalog.',
            ]);
        }

        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori katalog berhasil dihapus!');
    }
}
