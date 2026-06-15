<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\View\Presenters\EcommercePagePresenter;
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
        $page = EcommercePagePresenter::make(
            $produks,
            $produkUnggulan,
            $cartItems,
            $checkoutCustomer,
        );

        return view('pages.e-commerce', compact(
            'produks',
            'produkUnggulan',
            'cartItems',
            'cartCount',
            'cartSubtotal',
            'cartSubtotalFormatted',
            'activeCustomer',
            'checkoutCustomer',
            'page'
        ));
    }

    private function prepareCartItems(array $cart): Collection
    {
        $productIds = collect($cart)
            ->pluck('id')
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();
        $products = Produk::whereIn('id', $productIds)->get()->keyBy('id');

        return collect($cart)->map(function (array $item) use ($products) {
            $id = (int) ($item['id'] ?? 0);
            $produk = $products->get($id);
            $quantity = (int) ($item['quantity'] ?? 0);
            $harga = (float) ($produk?->harga ?? $item['harga'] ?? 0);
            $subtotal = $harga * $quantity;

            return [
                'id' => $id,
                'nama' => $produk?->nama ?? $item['nama'] ?? 'Produk',
                'harga' => $harga,
                'harga_formatted' => $this->rupiah($harga),
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'subtotal_formatted' => $this->rupiah($subtotal),
                'satuan' => $produk?->satuan ?? 'pcs',
                'stok' => (int) ($produk?->stok ?? 0),
                'image_url' => $produk?->gambar_url ?? asset('images/beranda.bg.jpeg'),
                'available' => $produk !== null,
            ];
        });
    }

    private function rupiah(float|int $value): string
    {
        return 'Rp'.number_format((float) $value, 0, ',', '.');
    }
}
