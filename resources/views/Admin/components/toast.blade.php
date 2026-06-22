@php
    $adminToastMessages = [];

    foreach ([
        ['success', 'success'],
        ['order_success', 'success'],
        ['status', 'success'],
        ['error', 'error'],
    ] as [$key, $type]) {
        if (session($key)) {
            $adminToastMessages[] = [
                'type' => $type,
                'message' => session($key),
            ];
        }
    }

    if ($errors->any()) {
        foreach ($errors->all() as $message) {
            $adminToastMessages[] = [
                'type' => 'error',
                'message' => $message,
            ];
        }
    }
@endphp

<div class="admin-toast-region" data-admin-toast-region aria-live="polite" aria-atomic="true"></div>
<script type="application/json" data-admin-toast-payload>{!! json_encode($adminToastMessages, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}</script>