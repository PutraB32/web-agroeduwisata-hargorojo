<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_order' => 'required|in:diproses,dikirim,selesai,dibatalkan',
        ]);

        $order = Order::findOrFail($id);

        if (! $order->isOfflinePayment() && $order->payment_status !== 'paid') {
            return redirect()->back()->withErrors([
                'status_order' => 'Menunggu konfirmasi pembayaran online sebelum pesanan bisa diproses.',
            ]);
        }

        if ($validated['status_order'] === 'dikirim' && ! $order->sudahDikirim()) {
            return redirect()->back()->withErrors([
                'status_order' => 'Isi kurir dan nomor resi transaksi sebelum mengubah status menjadi dikirim.',
            ]);
        }

        $data = [
            'status_order' => $validated['status_order'],
        ];

        if ($order->isOfflinePayment() && $validated['status_order'] === 'selesai' && $order->payment_status !== 'paid') {
            $data['payment_status'] = 'paid';
            $data['paid_at'] = $order->paid_at ?? now();
        }

        if ($order->isOfflinePayment() && $validated['status_order'] === 'dibatalkan' && $order->payment_status !== 'paid') {
            $data['payment_status'] = 'cancel';
            $data['canceled_at'] = $order->canceled_at ?? now();
        }

        $order->update($data);

        return redirect()->back()
            ->with('order_success', 'Status pesanan berhasil diperbarui!');
    }

    public function updatePengiriman(Request $request, $id)
    {
        $validated = $request->validate([
            'kurir' => ['required', 'string', 'max:100', 'regex:/\S/'],
            'nomor_resi' => ['required', 'string', 'max:100', 'regex:/\S/'],
        ], [
            'kurir.required' => 'Nama kurir wajib diisi.',
            'kurir.regex' => 'Nama kurir wajib diisi.',
            'nomor_resi.required' => 'Nomor resi wajib diisi.',
            'nomor_resi.regex' => 'Nomor resi wajib diisi.',
        ]);

        $order = Order::findOrFail($id);

        if (! $order->isOfflinePayment() && $order->payment_status !== 'paid') {
            return redirect()->back()->withErrors([
                'pengiriman' => 'Menunggu konfirmasi pembayaran online sebelum resi bisa diinput.',
            ]);
        }

        if ($order->status_order === 'dibatalkan') {
            return redirect()->back()->withErrors([
                'pengiriman' => 'Pesanan yang sudah dibatalkan tidak bisa diberi resi.',
            ]);
        }

        $order->update([
            'kurir' => trim($validated['kurir']),
            'nomor_resi' => trim($validated['nomor_resi']),
            'status_pengiriman' => Order::STATUS_PENGIRIMAN_DIKIRIM,
            'tanggal_dikirim' => $order->tanggal_dikirim ?? now(),
            'admin_pengiriman_id' => Auth::id(),
        ]);

        if (! in_array($order->status_order, ['selesai', 'dibatalkan'], true)) {
            $order->update([
                'status_order' => 'dikirim',
            ]);
        }

        return redirect()->back()
            ->with('order_success', 'Kurir dan nomor resi transaksi berhasil disimpan.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Hapus detail order terlebih dahulu
        if ($order->orderDetails()->exists()) {
            $order->orderDetails()->delete();
        }

        // Hapus order
        $order->delete();

        return redirect()->back()
            ->with('order_success', 'Data pesanan berhasil dihapus!');
    }
}
