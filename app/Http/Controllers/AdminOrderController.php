<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:50'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        // Hapus detail pesanan terlebih dahulu (jika tidak ada cascade delete di DB)
        $order->orderDetails()->delete();
        $order->delete();

        return redirect()->back()->with('success', 'Data pesanan berhasil dihapus!');
    }
}
