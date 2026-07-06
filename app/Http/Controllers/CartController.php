<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Produk;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function __construct(private MidtransService $midtransService)
    {
    }

    public function index()
    {
        return redirect()->route('ecommerce');
    }

    public function add(Request $request)
    {
        if ($redirect = $this->redirectIfNotCustomer($request)) {
            return $redirect;
        }

        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer|exists:produk,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $produk = Produk::findOrFail($validated['produk_id']);

        if ($produk->stok < $validated['quantity']) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => "Stok produk {$produk->nama} tidak mencukupi.",
                ], 422);
            }

            return redirect()->back()->with('error', "Stok produk {$produk->nama} tidak mencukupi.");
        }

        $cart = session()->get('cart', []);
        $cartItem = $cart[$produk->id] ?? [
            'id' => $produk->id,
            'nama' => $produk->nama,
            'harga' => (float) $produk->harga,
            'quantity' => 0,
        ];

        $newQuantity = $cartItem['quantity'] + $validated['quantity'];

        if ($newQuantity > $produk->stok) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => "Stok produk {$produk->nama} tidak mencukupi.",
                ], 422);
            }

            return redirect()->back()->with('error', "Stok produk {$produk->nama} tidak mencukupi.");
        }

        $cartItem['quantity'] = $newQuantity;
        $cart[$produk->id] = $cartItem;
        session()->put('cart', $cart);

        $message = isset($cart[$produk->id]) && $cart[$produk->id]['quantity'] > $validated['quantity']
            ? "Jumlah {$produk->nama} berhasil ditambah ke keranjang."
            : "{$produk->nama} berhasil ditambahkan ke keranjang.";

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'cart' => $this->cartItemsForJson($cart),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    public function remove(Request $request)
    {
        if ($redirect = $this->redirectIfNotCustomer($request)) {
            return $redirect;
        }

        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        unset($cart[$validated['produk_id']]);
        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Produk berhasil dihapus dari keranjang.',
                'cart' => $this->cartItemsForJson($cart),
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function update(Request $request)
    {
        if ($redirect = $this->redirectIfNotCustomer($request)) {
            return $redirect;
        }

        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer|exists:produk,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $produk = Produk::findOrFail($validated['produk_id']);

        if ($produk->stok < $validated['quantity']) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => "Stok produk {$produk->nama} tidak mencukupi.",
                ], 422);
            }

            return redirect()->back()->with('error', "Stok produk {$produk->nama} tidak mencukupi.");
        }

        $cart = session()->get('cart', []);

        if (!isset($cart[$produk->id])) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Produk tidak ditemukan di keranjang.',
                ], 422);
            }

            return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $cart[$produk->id]['nama'] = $produk->nama;
        $cart[$produk->id]['harga'] = (float) $produk->harga;
        $cart[$produk->id]['quantity'] = $validated['quantity'];
        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Keranjang berhasil diperbarui.',
                'cart' => $this->cartItemsForJson($cart),
            ]);
        }

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui.');
    }

    // Simpan metode penerimaan, lalu arahkan customer ke pembayaran Midtrans.
    public function checkout(Request $request)
    {
        if ($redirect = $this->redirectIfNotCustomer($request)) {
            return $redirect;
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'alamat' => 'required|string|max:1000',
            'metode_penerimaan' => 'required|in:ambil_di_tempat,cod_bayar_di_tempat',
        ]);

        $cart = session()->get('cart', []);
        if (count($cart) == 0) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Keranjang belanja Anda kosong.',
                ], 422);
            }

            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        try {
            [$order, $payload] = DB::transaction(function () use ($request, $cart) {
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'nama_pemesan' => $request->nama,
                    'no_hp' => $request->no_telepon,
                    'alamat' => $request->alamat,
                    'metode_penerimaan' => $request->metode_penerimaan,
                    'total' => 0,
                    'status_order' => 'pending',
                    'payment_status' => 'pending',
                    'payment_type' => null,
                ]);

                $totalHarga = 0;
                $itemDetails = [];

                foreach ($cart as $item) {
                    $produk = Produk::whereKey($item['id'] ?? null)->lockForUpdate()->firstOrFail();
                    $quantity = (int) ($item['quantity'] ?? 0);

                    if ($quantity < 1 || $quantity > 99) {
                        throw new \RuntimeException('Jumlah produk di keranjang tidak valid.');
                    }

                    if ($produk->stok < $quantity) {
                        throw new \RuntimeException("Mohon maaf, stok produk {$produk->nama} tidak mencukupi (Sisa: {$produk->stok}).");
                    }

                    $hargaSatuan = (float) $produk->harga;
                    $subtotal = $hargaSatuan * $quantity;

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'produk_id' => $produk->id,
                        'jumlah' => $quantity,
                        'harga_satuan' => $hargaSatuan,
                    ]);

                    $produk->decrement('stok', $quantity);

                    $totalHarga += $subtotal;
                    $itemDetails[] = [
                        'id' => 'produk-'.$produk->id,
                        'price' => (int) round($hargaSatuan),
                        'quantity' => $quantity,
                        'name' => Str::limit($produk->nama, 45, ''),
                    ];
                }

                $midtransOrderId = 'HARGOROJO-'.$order->id.'-'.now()->timestamp;

                $order->update([
                    'total' => $totalHarga,
                    'midtrans_order_id' => $midtransOrderId,
                ]);

                $profileOrdersUrl = route('ecommerce').'#produk-katalog';

                $payload = [
                    'transaction_details' => [
                        'order_id' => $midtransOrderId,
                        'gross_amount' => (int) round($totalHarga),
                    ],
                    'item_details' => $itemDetails,
                    'customer_details' => [
                        'first_name' => $request->nama,
                        'email' => Auth::user()->email,
                        'phone' => $request->no_telepon,
                        'shipping_address' => [
                            'first_name' => $request->nama,
                            'phone' => $request->no_telepon,
                            'address' => $request->alamat,
                        ],
                    ],
                    'callbacks' => [
                        'finish' => $profileOrdersUrl,
                    ],
                ];

                return [$order, $payload];
            });

            $snap = $this->midtransService->createSnapTransaction($payload);

            $profileOrdersUrl = route('ecommerce').'#produk-katalog';

            if (empty($snap['redirect_url'])) {
                throw new \RuntimeException('Redirect pembayaran Midtrans tidak tersedia.');
            }

            $order->update([
                'midtrans_snap_token' => $snap['token'] ?? null,
                'midtrans_redirect_url' => $snap['redirect_url'],
            ]);

            session()->forget('cart');
            session()->flash('navbar_new_order_id', $order->id);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Transaksi berhasil dibuat. Silakan lanjutkan pembayaran di Midtrans.',
                    'snap_token' => $snap['token'] ?? null,
                    'redirect_url' => $snap['redirect_url'],
                    'order_id' => $order->id,
                    'midtrans_order_id' => $order->midtrans_order_id,
                    'ecommerce_url' => route('ecommerce'),
                    'profile_orders_url' => $profileOrdersUrl,
                ]);
            }

            return redirect()->away($snap['redirect_url']);
        } catch (\Throwable $e) {
            if (isset($order) && $order->exists) {
                $order->update([
                    'status_order' => 'dibatalkan',
                    'canceled_at' => now(),
                ]);
            }

            $message = $e instanceof \RuntimeException
                ? $e->getMessage()
                : 'Checkout gagal diproses. Silakan coba lagi.';

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $message,
                ], 422);
            }

            return redirect()->back()->with('error', $message);
        }
    }

    private function normalizeProductInput(Request $request): void
    {
        $request->merge([
            'produk_id' => $request->input('produk_id', $request->input('id')),
            'quantity' => $request->input('quantity', $request->input('qty', 1)),
        ]);
    }

    private function redirectIfNotCustomer(Request $request)
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Silakan login sebagai customer sebelum berbelanja.',
                    'redirect_url' => route('customer.login'),
                ], 401);
            }

            $request->session()->put('url.intended', url()->previous() ?: route('ecommerce'));

            return redirect()->route('customer.login')
                ->with('error', 'Silakan login sebagai customer sebelum berbelanja.');
        }

        if (Auth::user()->role !== 'customer') {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Gunakan akun customer untuk berbelanja di e-commerce.',
                    'redirect_url' => route('ecommerce'),
                ], 403);
            }

            return redirect()->route('ecommerce')
                ->with('error', 'Gunakan akun customer untuk berbelanja di e-commerce.');
        }

        return null;
    }

    private function cartItemsForJson(array $cart): array
    {
        $productIds = collect($cart)
            ->pluck('id')
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();
        $products = Produk::whereIn('id', $productIds)->get()->keyBy('id');

        return collect($cart)
            ->map(function (array $item) use ($products) {
                $id = (int) ($item['id'] ?? 0);
                $produk = $products->get($id);

                return [
                    'id' => $id,
                    'nama' => $produk?->nama ?? $item['nama'] ?? 'Produk',
                    'harga' => (float) ($produk?->harga ?? $item['harga'] ?? 0),
                    'satuan' => $produk?->satuan ?? 'pcs',
                    'gambar' => $produk?->gambar_url ?? asset('images/beranda.bg.jpeg'),
                    'qty' => (int) ($item['quantity'] ?? 0),
                ];
            })
            ->values()
            ->all();
    }
}
