<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Str;

class AdminTestimoniController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'isi_testimoni' => 'required|string|max:2000',
            'rating' => 'nullable|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = Str::uuid().'.'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('images/testimoni'), $imageName);
            $data['foto'] = $imageName;
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        unset($data['foto']);

        if ($request->hasFile('foto')) {
            if ($testimoni->foto && file_exists(public_path('images/testimoni/' . $testimoni->foto))) {
                unlink(public_path('images/testimoni/' . $testimoni->foto));
            }
            $imageName = Str::uuid().'.'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('images/testimoni'), $imageName);
            $data['foto'] = $imageName;
        }

        $testimoni->update($data);
        return redirect()->back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        
        if ($testimoni->foto && file_exists(public_path('images/testimoni/' . $testimoni->foto))) {
            unlink(public_path('images/testimoni/' . $testimoni->foto));
        }

        $testimoni->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
