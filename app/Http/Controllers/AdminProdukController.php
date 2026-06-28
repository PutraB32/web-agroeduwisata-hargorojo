<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\ManagesStoredImages;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class AdminProdukController extends Controller
{
    use ManagesStoredImages;

    private const IMAGE_DIRECTORY = 'produk';

    public function store(Request $request)
    {
        if (! $request->exists('satuan')) {
            $request->merge(['satuan' => 'pcs']);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:30',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:5000',
            'manfaat' => 'nullable|string|max:5000',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagePath = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);

        Produk::create([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'manfaat' => $validated['manfaat'] ?? null,
            'produk_unggulan' => $request->has('produk_unggulan') ? true : false,
            'gambar' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        if (! $request->exists('satuan')) {
            $request->merge(['satuan' => $produk->satuan ?? 'pcs']);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:30',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:5000',
            'manfaat' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagePath = $produk->gambar;

        if ($request->hasFile('gambar')) {
            $this->deletePublicImage($produk->gambar, self::IMAGE_DIRECTORY);
            $imagePath = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);
        }

        $produk->update([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'manfaat' => $validated['manfaat'] ?? null,
            'produk_unggulan' => $request->has('produk_unggulan') ? true : false,
            'gambar' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $this->deletePublicImage($produk->gambar, self::IMAGE_DIRECTORY);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
