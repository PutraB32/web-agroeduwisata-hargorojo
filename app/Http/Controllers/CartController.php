<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return redirect()->route('ecommerce');
    }

    public function add(Request $request)
    {
        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer|exists:produk,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $produk = Produk::findOrFail($validated['produk_id']);

        if ($produk->stok < $validated['quantity']) {
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
            return redirect()->back()->with('error', "Stok produk {$produk->nama} tidak mencukupi.");
        }

        $cartItem['quantity'] = $newQuantity;
        $cart[$produk->id] = $cartItem;
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil dimasukkan ke keranjang.');
    }

    public function remove(Request $request)
    {
        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        unset($cart[$validated['produk_id']]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function update(Request $request)
    {
        $this->normalizeProductInput($request);

        $validated = $request->validate([
            'produk_id' => 'required|integer|exists:produk,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $produk = Produk::findOrFail($validated['produk_id']);

        if ($produk->stok < $validated['quantity']) {
            return redirect()->back()->with('error', "Stok produk {$produk->nama} tidak mencukupi.");
        }

        $cart = session()->get('cart', []);

        if (! isset($cart[$produk->id])) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $cart[$produk->id]['nama'] = $produk->nama;
        $cart[$produk->id]['harga'] = (float) $produk->harga;
        $cart[$produk->id]['quantity'] = $validated['quantity'];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui.');
    }

    // Proses Checkout ke Database & Redirect WA
    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'alamat' => 'required|string|max:1000'
        ]);

        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        try {
            [$order, $totalHarga, $pesanBarang] = DB::transaction(function () use ($request, $cart) {
                $order = Order::create([
                    'nama_pemesan' => $request->nama,
                    'no_hp' => $request->no_telepon,
                    'alamat' => $request->alamat,
                    'total' => 0,
                    'status' => 'Pending'
                ]);

                $totalHarga = 0;
                $pesanBarang = "";

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
                        'harga_satuan' => $hargaSatuan
                    ]);

                    $produk->decrement('stok', $quantity);

                    $totalHarga += $subtotal;
                    $pesanBarang .= "- " . $produk->nama . " (" . $quantity . "x) = Rp" . number_format($subtotal, 0, ',', '.') . "\n";
                }

                $order->update(['total' => $totalHarga]);

                return [$order, $totalHarga, $pesanBarang];
            });

            // 3. Hapus session keranjang
            session()->forget('cart');

            // 4. Generate Link WhatsApp
            $nomorWA = config('services.whatsapp.admin_number', '6281234567890');
            $teksWA = "Halo Admin Desa Hargorojo, saya ingin memesan barang:\n\n";
            $teksWA .= "*Nomor Pesanan:* #" . $order->id . "\n";
            $teksWA .= "*Nama:* " . $order->nama_pemesan . "\n";
            $teksWA .= "*Alamat:* " . $order->alamat . "\n\n";
            $teksWA .= "*Rincian Pesanan:*\n" . $pesanBarang . "\n";
            $teksWA .= "*Total Pembayaran:* Rp " . number_format($totalHarga, 0, ',', '.') . "\n\n";
            $teksWA .= "Mohon info selanjutnya untuk proses pembayaran. Terima kasih.";

            $urlWA = "https://wa.me/" . $nomorWA . "?text=" . urlencode($teksWA);

            // Redirect user ke WhatsApp
            return redirect()->away($urlWA);

        } catch (\Throwable $e) {
            $message = $e instanceof \RuntimeException
                ? $e->getMessage()
                : 'Checkout gagal diproses. Silakan coba lagi.';

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
}
