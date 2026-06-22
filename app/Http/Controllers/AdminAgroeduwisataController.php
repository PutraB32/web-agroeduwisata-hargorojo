<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\ManagesStoredImages;
use App\Models\Agroeduwisata;
use Illuminate\Support\Facades\Auth;

class AdminAgroeduwisataController extends Controller
{
    use ManagesStoredImages;

    private const IMAGE_DIRECTORY = 'agroeduwisata';

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:agroeduwisata,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'parent_id' => $validated['parent_id'] ?? null,
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);
        }

        Agroeduwisata::create($data);
        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:agroeduwisata,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $agro = Agroeduwisata::findOrFail($id);

        if ((string) ($validated['parent_id'] ?? '') === (string) $agro->id) {
            return redirect()->back()->withErrors([
                'parent_id' => 'Data agroeduwisata tidak dapat menjadi parent untuk dirinya sendiri.',
            ]);
        }

        $data = [
            'parent_id' => $validated['parent_id'] ?? null,
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ];

        if ($request->hasFile('gambar')) {
            $this->deletePublicImage($agro->gambar, self::IMAGE_DIRECTORY);
            $data['gambar'] = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);
        }

        $agro->update($data);
        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agro = Agroeduwisata::findOrFail($id);

        $this->deletePublicImage($agro->gambar, self::IMAGE_DIRECTORY);
        $agro->delete();

        return redirect()->back()->with('success', 'Data Agroeduwisata berhasil dihapus!');
    }
}
