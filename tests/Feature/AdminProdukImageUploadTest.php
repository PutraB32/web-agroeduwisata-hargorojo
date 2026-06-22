<?php

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function adminProdukUser(): User
{
    return User::factory()->create(['role' => 'admin']);
}

function fakeProdukImage(string $name = 'produk.png'): UploadedFile
{
    $png = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/p9sAAAAASUVORK5CYII=';

    return UploadedFile::fake()->createWithContent($name, base64_decode($png));
}

function validProdukPayload(array $overrides = []): array
{
    return array_merge([
        'nama' => 'Kopi Rempah Gula Kelapa',
        'harga' => 35000,
        'satuan' => 'pcs',
        'stok' => 12,
        'deskripsi' => 'Produk lokal Desa Hargorojo.',
        'manfaat' => 'Minuman rempah alami.',
    ], $overrides);
}

it('menyimpan gambar produk baru ke storage public produk', function () {
    Storage::fake('public');

    $this->actingAs(adminProdukUser())
        ->post(route('admin.produk.store'), validProdukPayload([
            'gambar' => fakeProdukImage('produk-baru.png'),
        ]))
        ->assertRedirect();

    $produk = Produk::firstOrFail();

    expect($produk->gambar)->toStartWith('produk/');
    Storage::disk('public')->assertExists($produk->gambar);
});

it('mempertahankan gambar lama saat update tanpa upload gambar baru', function () {
    Storage::fake('public');
    Storage::disk('public')->put('produk/lama.jpg', 'gambar lama');

    $produk = Produk::create(validProdukPayload([
        'gambar' => 'produk/lama.jpg',
        'user_id' => adminProdukUser()->id,
    ]));

    $this->actingAs(adminProdukUser())
        ->put(route('admin.produk.update', $produk->id), validProdukPayload([
            'nama' => 'Nama Produk Diperbarui',
        ]))
        ->assertRedirect();

    expect($produk->fresh()->gambar)->toBe('produk/lama.jpg');
    Storage::disk('public')->assertExists('produk/lama.jpg');
});

it('menghapus gambar storage lama saat update dengan gambar baru', function () {
    Storage::fake('public');
    Storage::disk('public')->put('produk/lama.jpg', 'gambar lama');

    $produk = Produk::create(validProdukPayload([
        'gambar' => 'produk/lama.jpg',
        'user_id' => adminProdukUser()->id,
    ]));

    $this->actingAs(adminProdukUser())
        ->put(route('admin.produk.update', $produk->id), validProdukPayload([
            'gambar' => fakeProdukImage('baru.webp'),
        ]))
        ->assertRedirect();

    $produk->refresh();

    expect($produk->gambar)->toStartWith('produk/');
    expect($produk->gambar)->not->toBe('produk/lama.jpg');
    Storage::disk('public')->assertMissing('produk/lama.jpg');
    Storage::disk('public')->assertExists($produk->gambar);
});

it('menghapus gambar storage saat produk dihapus', function () {
    Storage::fake('public');
    Storage::disk('public')->put('produk/hapus.jpg', 'gambar hapus');

    $produk = Produk::create(validProdukPayload([
        'gambar' => 'produk/hapus.jpg',
        'user_id' => adminProdukUser()->id,
    ]));

    $this->actingAs(adminProdukUser())
        ->delete(route('admin.produk.destroy', $produk->id))
        ->assertRedirect();

    expect(Produk::find($produk->id))->toBeNull();
    Storage::disk('public')->assertMissing('produk/hapus.jpg');
});