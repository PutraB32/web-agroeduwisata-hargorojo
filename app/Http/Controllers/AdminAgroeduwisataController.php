<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agroeduwisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminAgroeduwisataController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:agroeduwisata,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = [
            'parent_id' => $validated['parent_id'] ?? null,
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ];
        $data['user_id'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $imageName = Str::uuid().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images/agroeduwisata'), $imageName);
            $data['gambar'] = $imageName;
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
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
            if ($agro->gambar && file_exists(public_path('images/agroeduwisata/' . $agro->gambar))) {
                unlink(public_path('images/agroeduwisata/' . $agro->gambar));
            }
            $imageName = Str::uuid().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images/agroeduwisata'), $imageName);
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
