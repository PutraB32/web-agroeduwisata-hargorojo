<?php

namespace App\View\Presenters;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class EcommercePagePresenter
{
    public static function make(
        Collection $products,
        Collection $featuredProducts,
        Collection $cartItems,
        ?User $checkoutCustomer,
    ): array {
        $fallbackImage = asset('images/beranda.bg.jpeg');
        $productCards = self::productCards($products, $fallbackImage);

        return [
            'assets' => [
                'heroImage' => asset('images/assets foto/hero section-ecommerce.png'),
                'ctaImage' => asset('images/assets foto/CTA_ecommerceee.png'),
                'faqImage' => asset('images/assets foto/alur_pemesanan_FAQ.png'),
                'fallbackImage' => $fallbackImage,
            ],
            'midtrans' => [
                'clientKey' => config('midtrans.client_key'),
                'snapScriptUrl' => config('midtrans.is_production')
                    ? 'https://app.midtrans.com/snap/snap.js'
                    : 'https://app.sandbox.midtrans.com/snap/snap.js',
            ],
            'products' => $productCards,
            'featuredProducts' => $productCards
                ->whereIn('id', $featuredProducts->pluck('id')->all())
                ->values(),
            'cartConfig' => [
                'csrfToken' => csrf_token(),
                'routes' => [
                    'add' => route('cart.add'),
                    'update' => route('cart.update'),
                    'remove' => route('cart.remove'),
                    'checkout' => route('checkout.process'),
                ],
                'checkoutForm' => [
                    'nama' => old('nama', $checkoutCustomer?->name ?? ''),
                    'no_telepon' => old('no_telepon', $checkoutCustomer?->no_hp ?? ''),
                    'alamat' => old('alamat', $checkoutCustomer?->alamat ?? ''),
                    'metode_penerimaan' => old('metode_penerimaan', 'cod_bayar_di_tempat'),
                ],
                'cart' => self::cartItemsForJavascript($cartItems, $fallbackImage),
            ],
            'faqItems' => self::faqItems(asset('images/assets foto/alur_pemesanan_FAQ.png')),
        ];
    }

    private static function productCards(Collection $products, string $fallbackImage): Collection
    {
        return $products->map(function (Produk $product) use ($fallbackImage) {
            $imageUrl = $product->image_url ?? $product->gambar_url ?? $fallbackImage;
            $description = trim((string) ($product->deskripsi ?: $product->manfaat));

            return [
                'id' => (int) $product->id,
                'name' => $product->nama,
                'descriptionExcerpt' => Str::limit($description ?: 'Produk lokal pilihan Desa Hargorojo.', 80),
                'featuredDescriptionExcerpt' => Str::limit($description ?: 'Produk lokal pilihan Desa Hargorojo.', 70),
                'price' => (float) $product->harga,
                'priceFormatted' => self::rupiah($product->harga),
                'unit' => $product->satuan ?: 'pcs',
                'stock' => (int) $product->stok,
                'imageUrl' => $imageUrl,
                'isFeatured' => (bool) $product->is_unggulan,
                'cartPayload' => [
                    'id' => (int) $product->id,
                    'nama' => $product->nama,
                    'harga' => (float) $product->harga,
                    'satuan' => $product->satuan ?: 'pcs',
                    'gambar' => $imageUrl,
                ],
            ];
        })->values();
    }

    private static function cartItemsForJavascript(Collection $cartItems, string $fallbackImage): array
    {
        return $cartItems->values()->map(fn ($item) => [
            'id' => (int) $item['id'],
            'nama' => $item['nama'],
            'harga' => (float) $item['harga'],
            'satuan' => $item['satuan'] ?? 'pcs',
            'gambar' => $item['image_url'] ?? $fallbackImage,
            'qty' => (int) $item['quantity'],
        ])->all();
    }

    private static function faqItems(string $faqImage): array
    {
        return [
            [
                'question' => 'Bagaimana cara melakukan pemesanan?',
                'answer' => 'Pilih produk, masukkan ke keranjang, isi data pengiriman, lalu lanjutkan pembayaran melalui Midtrans.',
                'image' => $faqImage,
            ],
            [
                'question' => 'Berapa minimal pemesanan untuk pembelian grosir?',
                'answer' => 'Minimal pemesanan grosir dapat disesuaikan dengan jenis produk yang dipilih. Silakan hubungi admin untuk informasi lebih lanjut.',
            ],
            [
                'question' => 'Apakah produk dibuat langsung oleh masyarakat Desa Hargorojo?',
                'answer' => 'Ya. Produk yang kami tawarkan merupakan hasil olahan dan kerajinan masyarakat Desa Hargorojo.',
            ],
            [
                'question' => 'Apakah produk dapat dikirim ke luar daerah?',
                'answer' => 'Ya. Kami melayani pengiriman ke berbagai wilayah Indonesia menggunakan jasa ekspedisi terpercaya.',
            ],
        ];
    }

    private static function rupiah(mixed $value): string
    {
        return 'Rp'.number_format((float) $value, 0, ',', '.');
    }
}
