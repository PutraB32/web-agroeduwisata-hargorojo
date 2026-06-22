<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\ManagesStoredImages;
use App\Models\Testimoni;

class AdminTestimoniController extends Controller
{
    use ManagesStoredImages;

    private const IMAGE_DIRECTORY = 'testimoni';

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'isi_testimoni' => 'required|string|max:2000',
            'rating' => 'nullable|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->storePublicImage($request->file('foto'), self::IMAGE_DIRECTORY);
        }

        Testimoni::create($data);
        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'isi_testimoni' => 'required|string|max:2000',
            'rating' => 'nullable|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        unset($data['foto']);

        if ($request->hasFile('foto')) {
            $this->deletePublicImage($testimoni->foto, self::IMAGE_DIRECTORY);
            $data['foto'] = $this->storePublicImage($request->file('foto'), self::IMAGE_DIRECTORY);
        }

        $testimoni->update($data);
        return redirect()->back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $this->deletePublicImage($testimoni->foto, self::IMAGE_DIRECTORY);
        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
