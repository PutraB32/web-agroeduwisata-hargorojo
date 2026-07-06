<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\View\Presenters\CustomerOrderPresenter;
use App\View\Presenters\CustomerProfilePresenter;
use App\View\Presenters\EcommercePagePresenter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class EcommerceController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $produks = Produk::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%")
                        ->orWhere('manfaat', 'like', "%{$search}%")
                        ->orWhere('satuan', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get()
            ->map(function (Produk $produk) {
                $produk->image_url = $produk->gambar_url;

                return $produk;
            });

        $produkUnggulan = $produks->where('produk_unggulan', true);

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
        $page['customerActions'] = $this->customerActions($checkoutCustomer, $request);

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

    private function customerActions(?User $customer, Request $request): ?array
    {
        if (! $customer) {
            return null;
        }

        $latestOrders = $customer->orders()
            ->with('orderDetails.produk')
            ->latest('updated_at')
            ->take(5)
            ->get();

        $newOrderId = (int) $request->session()->get('navbar_new_order_id', 0);
        $targetOrder = $newOrderId > 0
            ? $latestOrders->firstWhere('id', $newOrderId)
            : $latestOrders->first();

        return [
            'ordersUrl' => route('ecommerce').'#produk-katalog',
            'notificationTargetOrderDomId' => $targetOrder ? 'customer-order-'.$targetOrder->id : null,
            'profileName' => $customer->name,
            'profileLabel' => $this->profileLabel($customer->name),
            'profileEmail' => $customer->email,
            'profilePhoneLabel' => $customer->no_hp ?: 'Belum diisi',
            'profileAddressLabel' => $customer->alamat ?: 'Belum diisi',
            'profilePhotoUrl' => CustomerProfilePresenter::photoUrl($customer),
            'totalOrders' => $customer->orders()->count(),
            'notificationCount' => $latestOrders->count(),
            'notificationOrders' => CustomerOrderPresenter::collection($latestOrders, 2),
            'orders' => CustomerOrderPresenter::collection($latestOrders),
        ];
    }

    private function profileLabel(string $name): string
    {
        $label = strtolower((string) preg_replace('/\s+/', '_', trim($name)));

        return $label !== '' ? $label : 'customer';
    }

    public function checkOrderUpdates()
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'unauthorized'], 401);
        }

        $customer = Auth::user();
        
        // Ambil timestamp update_at terbaru dari semua pesanan customer
        $updates = $customer->orders()
            ->latest('updated_at')
            ->pluck('updated_at', 'id')
            ->map(fn($date) => $date->timestamp)
            ->toArray();

        return response()->json([
            'orderUpdates' => $updates
        ]);
    }
}
