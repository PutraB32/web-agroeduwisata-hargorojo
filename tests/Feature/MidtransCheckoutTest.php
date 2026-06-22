<?php

use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use App\Services\MidtransService;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;
use Mockery\MockInterface;


function makeProduk(array $attributes = []): Produk
{
    return Produk::create(array_merge([
        'nama' => 'Gula Kelapa Premium',
        'deskripsi' => 'Produk gula kelapa Hargorojo.',
        'harga' => 10000,
        'satuan' => 'pcs',
        'manfaat' => 'Manis alami',
        'stok' => 10,
        'is_unggulan' => false,
    ], $attributes));
}

function fakeView(string $content): ViewContract
{
    return new class($content) implements ViewContract, \Stringable
    {
        public function __construct(private string $content, private array $data = [])
        {
        }

        public function render()
        {
            return $this->content;
        }

        public function name()
        {
            return 'fake-view';
        }

        public function with($key, $value = null)
        {
            if (is_array($key)) {
                $this->data = array_merge($this->data, $key);

                return $this;
            }

            $this->data[$key] = $value;

            return $this;
        }

        public function getData()
        {
            return $this->data;
        }

        public function __toString(): string
        {
            return $this->render();
        }
    };
}

it('guest bisa melihat ecommerce tapi tidak bisa checkout', function () {
    View::shouldReceive('share')->zeroOrMoreTimes();
    View::shouldReceive('make')
        ->once()
        ->with('pages.e-commerce', \Mockery::on(function (array $data) {
            return isset($data['produks'], $data['cartItems']);
        }), [])
        ->andReturn(fakeView('Belanja Produk Desa'));

    $this->get(route('ecommerce'))->assertOk()->assertSee('Belanja Produk Desa');

    $this->post(route('checkout.process'), [
        'nama' => 'Budi',
        'no_telepon' => '08123456789',
        'alamat' => 'Purworejo',
    ])->assertRedirect(route('customer.login'));

    $this->assertDatabaseCount('orders', 0);
});

it('customer bisa register login dan add to cart', function () {
    $produk = makeProduk();

    $this->post(route('customer.register.post'), [
        'name' => 'Siti Customer',
        'email' => 'siti@example.com',
        'password' => 'Password1',
        'password_confirmation' => 'Password1',
    ])->assertRedirect(route('ecommerce'));

    $this->assertAuthenticated();
    expect(auth()->user()->role)->toBe('customer');

    $this->post(route('customer.logout'))->assertRedirect(route('ecommerce'));

    $this->post(route('customer.login.post'), [
        'email' => 'siti@example.com',
        'password' => 'Password1',
    ])->assertRedirect(route('ecommerce'));

    $this->post(route('cart.add'), [
        'produk_id' => $produk->id,
        'quantity' => 2,
    ])->assertRedirect();

    expect(session('cart')[$produk->id]['quantity'])->toBe(2);
});

it('checkout ajax cod menyimpan metode penerimaan dan mengembalikan redirect Midtrans', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $produk = makeProduk(['harga' => 15000, 'stok' => 5]);

    $this->mock(MidtransService::class, function (MockInterface $mock) {
        $mock->shouldReceive('createSnapTransaction')
            ->once()
            ->with(\Mockery::on(function (array $payload) {
                return $payload['transaction_details']['gross_amount'] === 30000
                    && str_starts_with($payload['transaction_details']['order_id'], 'HARGOROJO-')
                    && ! isset($payload['enabled_payments'])
                    && count($payload['item_details']) === 1;
            }))
            ->andReturn([
                'token' => 'snap-token',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token',
            ]);
    });

    $response = $this->actingAs($customer)
        ->withSession([
            'cart' => [
                $produk->id => [
                    'id' => $produk->id,
                    'nama' => $produk->nama,
                    'harga' => (float) $produk->harga,
                    'quantity' => 2,
                ],
            ],
        ])
        ->postJson(route('checkout.process'), [
            'nama' => 'Siti Customer',
            'no_telepon' => '08123456789',
            'alamat' => 'Desa Hargorojo',
            'metode_penerimaan' => Order::METODE_COD_BAYAR_DI_TEMPAT,
        ])
        ->assertOk()
        ->assertJson([
            'message' => 'Transaksi berhasil dibuat. Silakan lanjutkan pembayaran di Midtrans.',
            'snap_token' => 'snap-token',
            'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token',
        ])
        ->assertSessionMissing('cart');

    expect(str_starts_with($response->json('midtrans_order_id'), 'HARGOROJO-'))->toBeTrue();

    $order = Order::first();

    expect($order)
        ->user_id->toBe($customer->id)
        ->total->toBe('30000.00')
        ->metode_penerimaan->toBe(Order::METODE_COD_BAYAR_DI_TEMPAT)
        ->status_order->toBe('pending')
        ->payment_status->toBe('pending')
        ->payment_type->toBeNull()
        ->midtrans_snap_token->toBe('snap-token')
        ->midtrans_redirect_url->toBe('https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token');

    $this->assertDatabaseHas('order_details', [
        'order_id' => $order->id,
        'produk_id' => $produk->id,
        'jumlah' => 2,
    ]);

    expect($produk->fresh()->stok)->toBe(3);
});

it('checkout ambil di tempat tetap diarahkan ke Midtrans', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $produk = makeProduk(['harga' => 12000, 'stok' => 3]);

    $this->mock(MidtransService::class, function (MockInterface $mock) {
        $mock->shouldReceive('createSnapTransaction')
            ->once()
            ->andReturn([
                'token' => 'snap-token-ambil',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-ambil',
            ]);
    });

    $this->actingAs($customer)
        ->withSession([
            'cart' => [
                $produk->id => [
                    'id' => $produk->id,
                    'nama' => $produk->nama,
                    'harga' => (float) $produk->harga,
                    'quantity' => 1,
                ],
            ],
        ])
        ->postJson(route('checkout.process'), [
            'nama' => 'Siti Customer',
            'no_telepon' => '08123456789',
            'alamat' => 'Desa Hargorojo',
            'metode_penerimaan' => Order::METODE_AMBIL_DI_TEMPAT,
        ])
        ->assertOk()
        ->assertJson([
            'message' => 'Transaksi berhasil dibuat. Silakan lanjutkan pembayaran di Midtrans.',
            'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-ambil',
        ]);

    $order = Order::first();

    expect($order)
        ->total->toBe('12000.00')
        ->metode_penerimaan->toBe(Order::METODE_AMBIL_DI_TEMPAT)
        ->payment_type->toBeNull()
        ->midtrans_snap_token->toBe('snap-token-ambil');
});

it('callback Midtrans valid mengubah status pembayaran menjadi paid', function () {
    config(['midtrans.server_key' => 'server-key']);

    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_MIDTRANS,
        'total' => 35000,
        'status_order' => 'pending',
        'payment_status' => 'pending',
        'midtrans_order_id' => 'HARGOROJO-1-123456',
    ]);

    $grossAmount = '35000.00';
    $signature = hash('sha512', $order->midtrans_order_id.'200'.$grossAmount.'server-key');

    $this->postJson(route('payment.midtrans.notification'), [
        'order_id' => $order->midtrans_order_id,
        'status_code' => '200',
        'gross_amount' => $grossAmount,
        'signature_key' => $signature,
        'transaction_status' => 'settlement',
        'payment_type' => 'qris',
        'transaction_id' => 'trx-123',
    ])->assertOk()->assertJson([
        'message' => 'Notifikasi Midtrans diproses.',
    ]);

    $order->refresh();

    expect($order)
        ->payment_status->toBe('paid')
        ->status_order->toBe('diproses')
        ->payment_type->toBe('qris')
        ->midtrans_transaction_id->toBe('trx-123');

    expect($order->paid_at)->not->toBeNull();
});

it('callback Midtrans menyimpan payment type sesuai metode yang dipilih user', function () {
    config(['midtrans.server_key' => 'server-key']);

    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_COD_BAYAR_DI_TEMPAT,
        'total' => 45000,
        'status_order' => 'pending',
        'payment_status' => 'pending',
        'midtrans_order_id' => 'HARGOROJO-2-123456',
    ]);

    $grossAmount = '45000.00';
    $signature = hash('sha512', $order->midtrans_order_id.'200'.$grossAmount.'server-key');

    $this->postJson(route('payment.midtrans.notification'), [
        'order_id' => $order->midtrans_order_id,
        'status_code' => '200',
        'gross_amount' => $grossAmount,
        'signature_key' => $signature,
        'transaction_status' => 'settlement',
        'payment_type' => 'bank_transfer',
        'transaction_id' => 'trx-va-123',
    ])->assertOk();

    expect($order->fresh())
        ->payment_status->toBe('paid')
        ->payment_type->toBe('bank_transfer')
        ->midtrans_transaction_id->toBe('trx-va-123');
});

it('callback paid tidak menimpa status order yang sudah diproses admin', function () {
    config(['midtrans.server_key' => 'server-key']);

    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_COD_BAYAR_DI_TEMPAT,
        'total' => 45000,
        'status_order' => 'dikirim',
        'payment_status' => 'pending',
        'midtrans_order_id' => 'HARGOROJO-3-123456',
    ]);

    $grossAmount = '45000.00';
    $signature = hash('sha512', $order->midtrans_order_id.'200'.$grossAmount.'server-key');

    $this->postJson(route('payment.midtrans.notification'), [
        'order_id' => $order->midtrans_order_id,
        'status_code' => '200',
        'gross_amount' => $grossAmount,
        'signature_key' => $signature,
        'transaction_status' => 'settlement',
        'payment_type' => 'qris',
        'transaction_id' => 'trx-keep-status',
    ])->assertOk();

    expect($order->fresh())
        ->payment_status->toBe('paid')
        ->status_order->toBe('dikirim')
        ->payment_type->toBe('qris');
});

it('admin tidak bisa memproses order yang pembayarannya masih pending', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_MIDTRANS,
        'total' => 35000,
        'status_order' => 'pending',
        'payment_status' => 'pending',
    ]);

    $this->actingAs($admin)
        ->from(route('admin.dashboard'))
        ->put(route('admin.order.update_status', $order->id), [
            'status_order' => 'diproses',
        ])
        ->assertRedirect(route('admin.dashboard'))
        ->assertSessionHasErrors('status_order');

    expect($order->fresh()->status_order)->toBe('pending');
});

it('admin hanya bisa update proses pesanan setelah pembayaran paid', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_MIDTRANS,
        'total' => 35000,
        'status_order' => 'pending',
        'payment_status' => 'pending',
    ]);

    $this->actingAs($admin)
        ->from(route('admin.dashboard'))
        ->put(route('admin.order.update_status', $order->id), [
            'status_order' => 'diproses',
        ])
        ->assertRedirect(route('admin.dashboard'))
        ->assertSessionHasErrors('status_order');

    expect($order->fresh()->status_order)->toBe('pending');

    $order->update([
        'payment_status' => 'paid',
    ]);

    $this->actingAs($admin)
        ->from(route('admin.dashboard'))
        ->put(route('admin.order.update_status', $order->id), [
            'status_order' => 'diproses',
        ])
        ->assertRedirect(route('admin.dashboard'))
        ->assertSessionHasNoErrors();

    expect($order->fresh()->status_order)->toBe('diproses');
});

it('admin bisa memproses order cod walaupun pembayaran masih pending', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $order = Order::create([
        'nama_pemesan' => 'Siti Customer',
        'no_hp' => '08123456789',
        'alamat' => 'Desa Hargorojo',
        'metode_penerimaan' => Order::METODE_COD_BAYAR_DI_TEMPAT,
        'payment_type' => Order::METODE_COD_BAYAR_DI_TEMPAT,
        'total' => 35000,
        'status_order' => 'pending',
        'payment_status' => 'pending',
    ]);

    $this->actingAs($admin)
        ->from(route('admin.dashboard'))
        ->put(route('admin.order.update_status', $order->id), [
            'status_order' => 'diproses',
        ])
        ->assertRedirect(route('admin.dashboard'))
        ->assertSessionHasNoErrors();

    expect($order->fresh())
        ->status_order->toBe('diproses')
        ->payment_status->toBe('pending');

    $this->actingAs($admin)
        ->from(route('admin.dashboard'))
        ->put(route('admin.order.update_status', $order->id), [
            'status_order' => 'selesai',
        ])
        ->assertRedirect(route('admin.dashboard'))
        ->assertSessionHasNoErrors();

    $order->refresh();

    expect($order)
        ->status_order->toBe('selesai')
        ->payment_status->toBe('paid');

    expect($order->paid_at)->not->toBeNull();
});
