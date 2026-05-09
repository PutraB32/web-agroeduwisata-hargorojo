<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // ... Biarkan function index(), add(), remove(), update() tetap sama seperti kodemu sebelumnya ...
    
    // Proses Checkout ke Database & Redirect WA
    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        // BEST PRACTICE: Gunakan Database Transaction agar data aman jika terjadi error di tengah jalan
        DB::beginTransaction();
        
        try {
            $totalHarga = 0;
            foreach($cart as $item) {
                $totalHarga += $item['harga'] * $item['quantity'];
            }

            // 1. Simpan ke tabel orders
            $order = Order::create([
                'nama_pemesan' => $request->nama,
                'no_hp' => $request->no_telepon,
                'alamat' => $request->alamat,
                'total' => $totalHarga,
                'status' => 'Pending'
            ]);

            // 2. Simpan rincian ke tabel order_details, Rangkai teks WA, dan KURANGI STOK
            $pesanBarang = "";
            foreach($cart as $item) {
                $subtotal = $item['harga'] * $item['quantity'];
                
                OrderDetail::create([
                    'order_id' => $order->id,
                    'produk_id' => $item['id'],
                    'jumlah' => $item['quantity'],
                    'harga_satuan' => $item['harga']
                ]);

                // PENGURANGAN STOK OTOMATIS
                $produk = Produk::findOrFail($item['id']);
                
                // Validasi tambahan jika ternyata stok habis sebelum checkout selesai
                if ($produk->stok < $item['quantity']) {
                    throw new \Exception("Mohon maaf, stok produk {$produk->nama} tidak mencukupi (Sisa: {$produk->stok}).");
                }
                
                $produk->decrement('stok', $item['quantity']);

                $pesanBarang .= "- " . $item['nama'] . " (" . $item['quantity'] . "x) = Rp" . number_format($subtotal,0,',','.') . "\n";
            }

            // Jika semua lancar, simpan permanen ke database
            DB::commit();

            // 3. Hapus session keranjang
            session()->forget('cart');

            // 4. Generate Link WhatsApp
            $nomorWA = env('WA_ADMIN', '6281234567890'); 
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

        } catch (\Exception $e) {
            // Jika ada error (misal stok kurang), batalkan semua simpanan ke DB (Rollback)
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}