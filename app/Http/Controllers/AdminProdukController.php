<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class AdminProdukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/produk'), $imageName);
        }

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'is_unggulan' => $request->has('is_unggulan') ? true : false,
            'gambar' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $produk = Produk::findOrFail($id);
        
        $imageName = $produk->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && File::exists(public_path('images/produk/' . $produk->gambar))) {
                File::delete(public_path('images/produk/' . $produk->gambar));
            }
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/produk'), $imageName);
        }

        $produk->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'is_unggulan' => $request->has('is_unggulan') ? true : false,
            'gambar' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus gambar saat didelete
        if ($produk->gambar && File::exists(public_path('images/produk/' . $produk->gambar))) {
            File::delete(public_path('images/produk/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
