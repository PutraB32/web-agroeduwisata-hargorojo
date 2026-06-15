<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class MidtransNotificationController extends Controller
{
    public function __invoke(Request $request, MidtransService $midtransService)
    {
        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $signatureKey = $request->input('signature_key');

        if (! $midtransService->isValidSignature($orderId, $statusCode, $grossAmount, $signatureKey)) {
            return response()->json([
                'message' => 'Signature Midtrans tidak valid.',
            ], 403);
        }

        $order = Order::where('midtrans_order_id', $orderId)->first();

        if (! $order) {
            return response()->json([
                'message' => 'Order tidak ditemukan.',
            ], 404);
        }

        $transactionStatus = $request->input('transaction_status');
        $fraudStatus = $request->input('fraud_status');
        $paymentStatus = $this->mapPaymentStatus($transactionStatus, $fraudStatus);

        $data = [
            'payment_status' => $paymentStatus,
            'payment_type' => $request->input('payment_type') ?: $order->payment_type,
            'midtrans_transaction_id' => $request->input('transaction_id'),
        ];

        if ($paymentStatus === 'paid') {
            $data['paid_at'] = $order->paid_at ?? now();

            if ($order->status_order === 'pending') {
                $data['status_order'] = 'diproses';
            }
        }

        if ($paymentStatus === 'expired') {
            $data['status_order'] = 'dibatalkan';
            $data['expired_at'] = $order->expired_at ?? now();
        }

        if (in_array($paymentStatus, ['cancel', 'failed', 'refund'], true)) {
            $data['status_order'] = 'dibatalkan';
            $data['canceled_at'] = $order->canceled_at ?? now();
        }

        $order->update($data);

        return response()->json([
            'message' => 'Notifikasi Midtrans diproses.',
        ]);
    }

    private function mapPaymentStatus(?string $transactionStatus, ?string $fraudStatus): string
    {
        if ($transactionStatus === 'capture' && $fraudStatus !== 'challenge') {
            return 'paid';
        }

        return match ($transactionStatus) {
            'settlement' => 'paid',
            'pending' => 'pending',
            'deny', 'failure' => 'failed',
            'expire' => 'expired',
            'cancel' => 'cancel',
            'refund', 'partial_refund' => 'refund',
            default => 'pending',
        };
    }
}
