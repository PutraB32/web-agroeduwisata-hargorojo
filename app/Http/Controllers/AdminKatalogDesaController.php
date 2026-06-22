<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\ManagesStoredImages;
use App\Models\KatalogDesa;
use Illuminate\Support\Facades\Auth;

class AdminKatalogDesaController extends Controller
{
    use ManagesStoredImages;

    private const IMAGE_DIRECTORY = 'katalog';

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $data = [
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'Url' => $validated['url'] ?? null,
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);
        }

        KatalogDesa::create($data);
        return redirect()->back()->with('success', 'Katalog Desa berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate($this->rules());

        $katalog = KatalogDesa::findOrFail($id);
        $data = [
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'Url' => $validated['url'] ?? null,
        ];

        if ($request->hasFile('gambar')) {
            $this->deletePublicImage($katalog->gambar, self::IMAGE_DIRECTORY);
            $data['gambar'] = $this->storePublicImage($request->file('gambar'), self::IMAGE_DIRECTORY);
        }

        $katalog->update($data);
        return redirect()->back()->with('success', 'Katalog Desa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $katalog = KatalogDesa::findOrFail($id);

        $this->deletePublicImage($katalog->gambar, self::IMAGE_DIRECTORY);
        $katalog->delete();

        return redirect()->back()->with('success', 'Katalog Desa berhasil dihapus!');
    }

    private function rules(): array
    {
        return [
            'kategori_id' => 'required|exists:kategori_katalogs,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'url' => [
                'nullable',
                'url',
                'max:2048',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    $scheme = strtolower((string) parse_url((string) $value, PHP_URL_SCHEME));

                    if (! in_array($scheme, ['http', 'https'], true)) {
                        $fail('URL hanya boleh menggunakan http atau https.');
                    }
                },
            ],
        ];
    }
}
