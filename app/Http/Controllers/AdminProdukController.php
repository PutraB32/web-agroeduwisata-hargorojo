<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminProdukController extends Controller
{
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = Str::uuid().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images/produk'), $imageName);
        }

        Produk::create([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'manfaat' => $validated['manfaat'] ?? null,
            'is_unggulan' => $request->has('is_unggulan') ? true : false,
            'gambar' => $imageName,
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        
        $imageName = $produk->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && File::exists(public_path('images/produk/' . $produk->gambar))) {
                File::delete(public_path('images/produk/' . $produk->gambar));
            }
            $imageName = Str::uuid().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images/produk'), $imageName);
        }

        $produk->update([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'satuan' => $validated['satuan'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'manfaat' => $validated['manfaat'] ?? null,
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
