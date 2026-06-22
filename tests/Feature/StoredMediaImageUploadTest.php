<?php

use App\Models\Agroeduwisata;
use App\Models\KatalogDesa;
use App\Models\KategoriKatalog;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function storedMediaAdminUser(): User
{
    return User::factory()->create(['role' => 'admin']);
}

function storedMediaImage(string $name = 'gambar.png'): UploadedFile
{
    $png = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/p9sAAAAASUVORK5CYII=';

    return UploadedFile::fake()->createWithContent($name, base64_decode($png));
}

it('menyimpan, mengganti, dan menghapus gambar agroeduwisata di storage public', function () {
    Storage::fake('public');

    $this->actingAs(storedMediaAdminUser())
        ->post(route('admin.agro.store'), [
            'judul' => 'Edukasi Penderesan Nira',
            'deskripsi' => 'Konten agroeduwisata Desa Hargorojo.',
            'gambar' => storedMediaImage('agro.png'),
        ])
        ->assertRedirect();

    $agro = Agroeduwisata::firstOrFail();

    expect($agro->gambar)->toStartWith('agroeduwisata/');
    Storage::disk('public')->assertExists($agro->gambar);

    $oldPath = $agro->gambar;

    $this->actingAs(storedMediaAdminUser())
        ->put(route('admin.agro.update', $agro->id), [
            'judul' => 'Edukasi Penderesan Nira Baru',
            'deskripsi' => 'Konten diperbarui.',
            'gambar' => storedMediaImage('agro-baru.png'),
        ])
        ->assertRedirect();

    $agro->refresh();

    expect($agro->gambar)->toStartWith('agroeduwisata/');
    expect($agro->gambar)->not->toBe($oldPath);
    Storage::disk('public')->assertMissing($oldPath);
    Storage::disk('public')->assertExists($agro->gambar);

    $newPath = $agro->gambar;

    $this->actingAs(storedMediaAdminUser())
        ->delete(route('admin.agro.destroy', $agro->id))
        ->assertRedirect();

    expect(Agroeduwisata::find($agro->id))->toBeNull();
    Storage::disk('public')->assertMissing($newPath);
});

it('menyimpan, mengganti, dan menghapus gambar katalog desa di storage public', function () {
    Storage::fake('public');

    $kategori = KategoriKatalog::create(['nama_kategori' => 'Artikel & Berita']);

    $this->actingAs(storedMediaAdminUser())
        ->post(route('admin.katalog.store'), [
            'kategori_id' => $kategori->id,
            'judul' => 'Berita Desa Hargorojo',
            'deskripsi' => 'Informasi kegiatan desa.',
            'gambar' => storedMediaImage('katalog.png'),
        ])
        ->assertRedirect();

    $katalog = KatalogDesa::firstOrFail();

    expect($katalog->gambar)->toStartWith('katalog/');
    Storage::disk('public')->assertExists($katalog->gambar);

    $oldPath = $katalog->gambar;

    $this->actingAs(storedMediaAdminUser())
        ->put(route('admin.katalog.update', $katalog->id), [
            'kategori_id' => $kategori->id,
            'judul' => 'Berita Desa Hargorojo Baru',
            'deskripsi' => 'Informasi kegiatan desa diperbarui.',
            'gambar' => storedMediaImage('katalog-baru.png'),
        ])
        ->assertRedirect();

    $katalog->refresh();

    expect($katalog->gambar)->toStartWith('katalog/');
    expect($katalog->gambar)->not->toBe($oldPath);
    Storage::disk('public')->assertMissing($oldPath);
    Storage::disk('public')->assertExists($katalog->gambar);

    $newPath = $katalog->gambar;

    $this->actingAs(storedMediaAdminUser())
        ->delete(route('admin.katalog.destroy', $katalog->id))
        ->assertRedirect();

    expect(KatalogDesa::find($katalog->id))->toBeNull();
    Storage::disk('public')->assertMissing($newPath);
});

it('menyimpan, mengganti, dan menghapus foto testimoni admin di storage public', function () {
    Storage::fake('public');

    $this->actingAs(storedMediaAdminUser())
        ->post(route('admin.testimoni.store'), [
            'nama' => 'Putra Bhato',
            'isi_testimoni' => 'Pengalaman berkunjung sangat menyenangkan.',
            'rating' => 5,
            'foto' => storedMediaImage('testimoni.png'),
        ])
        ->assertRedirect();

    $testimoni = Testimoni::firstOrFail();

    expect($testimoni->foto)->toStartWith('testimoni/');
    Storage::disk('public')->assertExists($testimoni->foto);

    $oldPath = $testimoni->foto;

    $this->actingAs(storedMediaAdminUser())
        ->put(route('admin.testimoni.update', $testimoni->id), [
            'nama' => 'Putra Bhato',
            'isi_testimoni' => 'Ulasan diperbarui.',
            'rating' => 4,
            'foto' => storedMediaImage('testimoni-baru.png'),
        ])
        ->assertRedirect();

    $testimoni->refresh();

    expect($testimoni->foto)->toStartWith('testimoni/');
    expect($testimoni->foto)->not->toBe($oldPath);
    Storage::disk('public')->assertMissing($oldPath);
    Storage::disk('public')->assertExists($testimoni->foto);

    $newPath = $testimoni->foto;

    $this->actingAs(storedMediaAdminUser())
        ->delete(route('admin.testimoni.destroy', $testimoni->id))
        ->assertRedirect();

    expect(Testimoni::find($testimoni->id))->toBeNull();
    Storage::disk('public')->assertMissing($newPath);
});

it('menyimpan foto testimoni publik beranda di storage public', function () {
    Storage::fake('public');

    $this->post(route('public.testimoni.store'), [
        'nama' => 'Pengunjung Desa',
        'isi_testimoni' => 'Produk lokalnya menarik dan pelayanannya baik.',
        'rating' => 5,
        'foto' => storedMediaImage('testimoni-publik.png'),
    ])
    ->assertRedirect()
    ->assertSessionHas('success_testimoni');

    $testimoni = Testimoni::firstOrFail();

    expect($testimoni->foto)->toStartWith('testimoni/');
    Storage::disk('public')->assertExists($testimoni->foto);
});
