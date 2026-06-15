<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

it('guest diarahkan ke login customer saat membuka profil customer', function () {
    $this->get(route('customer.profile'))
        ->assertRedirect(route('customer.login'));
});

it('customer bisa membuka halaman profil dengan ringkasan order', function () {
    $customer = User::factory()->create(['role' => 'customer']);

    Order::create([
        'user_id' => $customer->id,
        'nama_pemesan' => $customer->name,
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'total' => 125000,
        'status_order' => 'selesai',
        'payment_status' => 'paid',
    ]);

    View::shouldReceive('share')->zeroOrMoreTimes();
    View::shouldReceive('make')
        ->once()
        ->with('customer.profile', \Mockery::on(function (array $data) use ($customer) {
            return $data['customer']->is($customer)
                && $data['orders']->count() === 1
                && $data['totalOrders'] === 1
                && $data['totalBelanja'] === 125000.0;
        }), [])
        ->andReturn(new class implements ViewContract, \Stringable
        {
            public function render()
            {
                return 'PROFILE_OK';
            }

            public function name()
            {
                return 'customer.profile';
            }

            public function with($key, $value = null)
            {
                return $this;
            }

            public function getData()
            {
                return [];
            }

            public function __toString(): string
            {
                return $this->render();
            }
        });

    $this->actingAs($customer)
        ->get(route('customer.profile'))
        ->assertOk()
        ->assertSee('PROFILE_OK');
});

it('customer bisa memperbarui nama email nomor hp dan alamat profil', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'customer@example.com',
    ]);

    $this->actingAs($customer)
        ->put(route('customer.profile.update'), [
            'name' => 'Nico Geser Baru',
            'email' => 'nico.baru@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Desa Hargorojo, Purworejo',
        ])
        ->assertRedirect(route('customer.profile'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('users', [
        'id' => $customer->id,
        'name' => 'Nico Geser Baru',
        'email' => 'nico.baru@example.com',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo, Purworejo',
    ]);
});

it('customer bisa menambahkan foto profil opsional', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'foto.customer@example.com',
    ]);

    Storage::fake('public');
    $smallPng = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/p9sAAAAASUVORK5CYII=');

    $this->actingAs($customer)
        ->put(route('customer.profile.update'), [
            'name' => 'Customer Foto',
            'email' => 'customer.foto.baru@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Desa Hargorojo',
            'foto' => UploadedFile::fake()->createWithContent('profil.png', $smallPng),
        ])
        ->assertRedirect(route('customer.profile'))
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

it('data nomor hp dan alamat dari register masuk ke profil customer', function () {
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
