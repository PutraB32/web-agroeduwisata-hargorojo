<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agroeduwisata; 
use App\Models\Produk;
use App\Models\KatalogDesa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgroeduwisataController extends Controller
{
    public function index(Request $request)
    {
        $fallbackAgroImage = asset('images/beranda.bg.jpeg');

        // Ambil Menu Utama (parent_id is null) beserta tahapan anak-anaknya
        $menusUtama = Agroeduwisata::whereNull('parent_id')
            ->with('children')
            ->get()
            ->map(function (Agroeduwisata $menu, int $index) use ($fallbackAgroImage) {
                $menu->setAttribute('display_image_url', $this->agroImageUrl($menu->gambar, $fallbackAgroImage));
                $menu->setAttribute('steps_count', $menu->children->count());
                $menu->setAttribute('theme_label', str_pad($index + 1, 2, '0', STR_PAD_LEFT));
                $menu->setAttribute('layout_dense_class', $index % 2 === 1 ? 'lg:grid-flow-col-dense' : '');
                $menu->setAttribute('image_order_class', $index % 2 === 1 ? 'lg:col-start-2' : '');
                $menu->setAttribute('content_order_class', $index % 2 === 1 ? 'lg:col-start-1' : '');

                $menu->setRelation('children', $menu->children->map(function (Agroeduwisata $child, int $stepIndex) {
                    $child->setAttribute('display_image_url', $this->optionalAgroImageUrl($child->gambar));
                    $child->setAttribute('step_label', str_pad($stepIndex + 1, 2, '0', STR_PAD_LEFT));

                    return $child;
                }));

                return $menu;
            });

        $heroMenu = $menusUtama->first(fn ($menu) => ! empty($menu->gambar));
        $heroImage = $heroMenu?->display_image_url ?: asset('images/assets foto/hero section.png');
        $galleryMenus = $menusUtama->filter(fn ($menu) => ! empty($menu->gambar))->take(3)->values();
        $fallbackGalleryImages = collect([
            asset('images/agroeduwisata/1776929702.jpg'),
            asset('images/agroeduwisata/1776929712.jpg'),
            asset('images/agroeduwisata/1776929726.jpg'),
        ]);
        $unggulan = Produk::where('is_unggulan', true)
            ->take(4)
            ->get()
            ->map(function (Produk $produk) use ($fallbackAgroImage) {
                $produk->setAttribute('display_image_url', $this->productImageUrl($produk->gambar, $fallbackAgroImage));
                $produk->setAttribute('short_description', Str::limit($produk->deskripsi, 92));
                $produk->setAttribute('formatted_price', 'Rp'.number_format($produk->harga, 0, ',', '.'));

                return $produk;
            });

        $katalog = KatalogDesa::whereHas('kategoriKatalog', function($query) {
            $query->where('nama_kategori', 'Artikel & Berita');
        })
            ->latest()
            ->take(3)
            ->get()
            ->map(function (KatalogDesa $artikel) use ($fallbackAgroImage) {
                $artikel->setAttribute('display_image_url', $this->katalogImageUrl($artikel->gambar, $fallbackAgroImage));
                $artikel->setAttribute('display_url', $artikel->Url ?: route('katalog'));
                $artikel->setAttribute('short_description', Str::limit($artikel->deskripsi, 118));

                return $artikel;
            });

        return view('pages.agroeduwisata', compact(
            'menusUtama',
            'unggulan',
            'katalog',
            'heroImage',
            'galleryMenus',
            'fallbackGalleryImages'
        ));
    }

    private function agroImageUrl(?string $image, string $fallback): string
    {
        return $image ? asset('images/agroeduwisata/'.$image) : $fallback;
    }

    private function optionalAgroImageUrl(?string $image): ?string
    {
        return $image ? asset('images/agroeduwisata/'.$image) : null;
    }

    private function productImageUrl(?string $image, string $fallback): string
    {
        return $image ? asset('images/produk/'.$image) : $fallback;
    }

    private function katalogImageUrl(?string $image, string $fallback): string
    {
        if (! $image) {
            return $fallback;
        }

        if (Storage::disk('public')->exists('katalog/'.$image)) {
            return asset('storage/katalog/'.$image);
        }

        if (file_exists(public_path('images/katalog/'.$image))) {
            return asset('images/katalog/'.$image);
        }

        return asset('images/'.$image);
    }
}
