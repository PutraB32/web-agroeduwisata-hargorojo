<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class EcommerceController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::all()
            ->map(function (Produk $produk) {
                $produk->image_url = $produk->gambar_url;

                return $produk;
            });

        $produkUnggulan = $produks->where('is_unggulan', true);

        $cartItems = $this->prepareCartItems($request->session()->get('cart', []));
        $cartCount = $cartItems->sum('quantity');
        $cartSubtotal = $cartItems->sum('subtotal');
        $cartSubtotalFormatted = $this->rupiah($cartSubtotal);
        $activeCustomer = Auth::check() && Auth::user()->role === 'customer';
        $checkoutCustomer = $activeCustomer ? Auth::user() : null;

        return view('pages.e-commerce', compact(
            'produks',
            'produkUnggulan',
            'cartItems',
            'cartCount',
            'cartSubtotal',
            'cartSubtotalFormatted',
            'activeCustomer',
            'checkoutCustomer'
        ));
    }

    private function prepareCartItems(array $cart): Collection
    {
        return collect($cart)->map(function (array $item) {
            $quantity = (int) ($item['quantity'] ?? 0);
            $harga = (float) ($item['harga'] ?? 0);

            return [
                'id' => $item['id'] ?? '',
                'nama' => $item['nama'] ?? 'Produk',
                'harga' => $harga,
                'harga_formatted' => $this->rupiah($harga),
                'quantity' => $quantity,
                'subtotal' => $harga * $quantity,
                'subtotal_formatted' => $this->rupiah($harga * $quantity),
            ];
        });
    }

    private function rupiah(float|int $value): string
    {
        return 'Rp'.number_format((float) $value, 0, ',', '.');
    }
}
