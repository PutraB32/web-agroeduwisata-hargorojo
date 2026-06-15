<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use RuntimeException;

class MidtransService
{
    public function setup(): void
    {
        if (blank(config('midtrans.server_key'))) {
            throw new RuntimeException('Konfigurasi MIDTRANS_SERVER_KEY belum diisi.');
        }

        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = (bool) config('midtrans.is_production');
        Config::$isSanitized = (bool) config('midtrans.is_sanitized');
        Config::$is3ds = (bool) config('midtrans.is_3ds');

        if (config('midtrans.proxy') && defined('CURLOPT_PROXY')) {
            Config::$curlOptions[CURLOPT_PROXY] = config('midtrans.proxy');
        }
    }

    public function createSnapTransaction(array $payload): array
    {
        $this->setup();

        $transaction = Snap::createTransaction($payload);

        return [
            'token' => $transaction->token ?? null,
            'redirect_url' => $transaction->redirect_url ?? null,
        ];
    }

    public function isValidSignature($orderId, $statusCode, $grossAmount, $signatureKey): bool
    {
        $serverKey = (string) config('midtrans.server_key');
        $expectedSignature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

        return hash_equals($expectedSignature, (string) $signatureKey);
    }
}
