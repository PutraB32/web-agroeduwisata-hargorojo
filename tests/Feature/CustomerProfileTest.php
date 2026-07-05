<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

it('customer login menyimpan notifikasi sambutan untuk popup toast', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'welcome.customer@example.com',
        'password' => Hash::make('Password1'),
    ]);

    $this->post(route('customer.login.post'), [
        'email' => $customer->email,
        'password' => 'Password1',
    ])->assertRedirect(route('ecommerce'))
        ->assertSessionHas('toast_message', 'Selamat datang, '.$customer->name.'!');

    $this->assertAuthenticatedAs($customer);
});

it('customer logout menyimpan notifikasi penutupan akun untuk popup toast', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'logout.customer@example.com',
    ]);

    $this->actingAs($customer)
        ->post(route('customer.logout'))
        ->assertRedirect(route('ecommerce'))
        ->assertSessionHas('toast_message', 'Berhasil keluar. Terima kasih telah berbelanja bersama kami.');

    $this->assertGuest();
});

it('customer bisa memperbarui nama email nomor hp dan alamat profil dari pop up', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'customer@example.com',
    ]);

    $this->actingAs($customer)
        ->from(route('ecommerce'))
        ->put(route('customer.profile.update'), [
            'name' => 'Nico Geser Baru',
            'email' => 'nico.baru@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Desa Hargorojo, Purworejo',
        ])
        ->assertRedirect(route('ecommerce'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('users', [
        'id' => $customer->id,
        'name' => 'Nico Geser Baru',
        'email' => 'nico.baru@example.com',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo, Purworejo',
    ]);
});

it('customer bisa menambahkan foto profil opsional dari pop up', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'foto.customer@example.com',
    ]);

    Storage::fake('public');
    $smallPng = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/p9sAAAAASUVORK5CYII=');

    $this->actingAs($customer)
        ->from(route('ecommerce'))
        ->put(route('customer.profile.update'), [
            'name' => 'Customer Foto',
            'email' => 'customer.foto.baru@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Desa Hargorojo',
            'foto' => UploadedFile::fake()->createWithContent('profil.png', $smallPng),
        ])
        ->assertRedirect(route('ecommerce'))
        ->assertSessionHas('success');

    $customer->refresh();

    expect($customer->foto)->not->toBeNull();
    expect(Storage::disk('public')->exists('customer/'.$customer->foto))->toBeTrue();
});

it('validasi foto profil memakai pesan bahasa indonesia', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'validasi.foto@example.com',
    ]);

    $this->actingAs($customer)
        ->from(route('ecommerce'))
        ->put(route('customer.profile.update'), [
            'name' => $customer->name,
            'email' => $customer->email,
            'no_hp' => '08123456789',
            'alamat' => 'Desa Hargorojo',
            'foto' => UploadedFile::fake()->createWithContent('profil.txt', 'bukan gambar'),
        ])
        ->assertSessionHasErrors([
            'foto' => 'Foto profil harus berupa file JPG, JPEG, PNG, GIF, atau WEBP.',
        ]);
});

it('data nomor hp dan alamat dari register tersimpan untuk pop up profil customer', function () {
    $this->post(route('customer.register.post'), [
        'name' => 'Siti Customer',
        'email' => 'siti.profile@example.com',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo RT 01 RW 02',
        'password' => 'Password1',
        'password_confirmation' => 'Password1',
    ])->assertRedirect(route('ecommerce'));

    $this->assertDatabaseHas('users', [
        'email' => 'siti.profile@example.com',
        'role' => 'customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo RT 01 RW 02',
    ]);
});
