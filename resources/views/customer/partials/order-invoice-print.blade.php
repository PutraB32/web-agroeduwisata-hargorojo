@php
    $invoiceId ??= 'customer-invoice-'.$order['id'];
    $logoUrl = asset('images/assets foto/logo hargorojo.png');
@endphp

<div id="{{ $invoiceId }}" class="customer-invoice-print" data-invoice-title="Invoice {{ $order['displayId'] }}">
    <article class="customer-invoice-print__sheet">
        <header class="customer-invoice-print__header">
            <div class="customer-invoice-print__brand">
                <img src="{{ $logoUrl }}" alt="Logo Desa Wisata Hargorojo" class="customer-invoice-print__logo">
                <div>
                    <p class="customer-invoice-print__eyebrow">Desa Wisata Hargorojo</p>
                    <h1>Invoice Pesanan</h1>
                    <p>Belanja Produk Desa Hargorojo</p>
                </div>
            </div>
            <div class="customer-invoice-print__meta">
                <strong>{{ $order['displayId'] }}</strong>
                <span>{{ $order['createdAtLabel'] }}</span>
                <span>{{ $order['statusOrderLabel'] }}</span>
            </div>
        </header>

        <section class="customer-invoice-print__summary customer-invoice-print__avoid-break">
            <div>
                <span>Penerima</span>
                <strong>{{ $order['customerName'] }}</strong>
            </div>
            <div>
                <span>No. HP</span>
                <strong>{{ $order['phone'] ?: '-' }}</strong>
            </div>
            <div class="customer-invoice-print__wide">
                <span>Alamat</span>
                <strong>{{ $order['address'] ?: '-' }}</strong>
            </div>
            <div>
                <span>Metode</span>
                <strong>{{ $order['metodePenerimaanLabel'] }}</strong>
            </div>
            <div>
                <span>Pembayaran</span>
                <strong>{{ $order['paymentStatusLabel'] }}</strong>
            </div>
        </section>

        @if($order['isAmbilDiTempat'] && $order['pickup']['available'])
            <section class="customer-invoice-print__avoid-break" style="margin-top: 1rem; padding: 0.75rem; border: 1px solid #d97706; border-radius: 8px; background-color: #fffbeb;">
                <strong style="color: #92400e;">Jadwal Pengambilan: {{ $order['pickup']['tanggalAmbilLabel'] }}</strong>
                @if($order['pickup']['hasCatatanAdmin'])
                    <p style="margin-top: 0.25rem; font-size: 0.85rem; color: #78350f;"><strong>Pesan Admin:</strong> {!! $order['pickup']['catatanAdmin'] !!}</p>
                @endif
            </section>
        @elseif(!$order['isAmbilDiTempat'] && $order['shipment']['available'])
            <section class="customer-invoice-print__avoid-break" style="margin-top: 1rem; padding: 0.75rem; border: 1px solid #0284c7; border-radius: 8px; background-color: #f0f9ff;">
                <strong style="color: #0369a1;">Pengiriman: {{ $order['shipment']['kurir'] }} - Resi: {{ $order['shipment']['nomorResi'] }}</strong>
                @if($order['shipment']['hasTanggalDikirim'])
                    <p style="margin-top: 0.25rem; font-size: 0.85rem; color: #0369a1;">Dikirim pada: {{ $order['shipment']['tanggalDikirimLabel'] }}</p>
                @endif
            </section>
        @endif

        <section class="customer-invoice-print__avoid-break">
            <h2>Detail Produk</h2>
            <table class="customer-invoice-print__table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order['details'] as $detail)
                        <tr>
                            <td>
                                <div class="customer-invoice-print__product">
                                    <img src="{{ $detail['imageUrl'] }}" alt="{{ $detail['name'] }}" onerror="this.style.display='none';">
                                    <span>{{ $detail['name'] }}</span>
                                </div>
                            </td>
                            <td>{{ $detail['quantity'] }}</td>
                            <td>{{ $detail['formattedUnitPrice'] }}</td>
                            <td>{{ $detail['formattedSubtotal'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Tidak ada detail produk.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total Pembayaran</td>
                        <td>{{ $order['formattedTotal'] }}</td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <section class="customer-invoice-print__shipment customer-invoice-print__avoid-break">
            <div>
                <span>Status Pengiriman</span>
                @if($order['shipment']['available'])
                    <strong>Dikirim via {{ $order['shipment']['kurir'] }}</strong>
                    <p>No. Resi: {{ $order['shipment']['nomorResi'] }}</p>
                    @if($order['shipment']['hasTanggalDikirim'])
                        <p>Tanggal dikirim: {{ $order['shipment']['tanggalDikirimLabel'] }}</p>
                    @endif
                @else
                    <strong>Menunggu pengiriman</strong>
                @endif
            </div>
        </section>

        <footer class="customer-invoice-print__footer">
            <span>Dicetak pada {{ now()->format('d/m/Y H:i') }}</span>
            <span>Terima kasih telah berbelanja produk Desa Hargorojo.</span>
        </footer>
    </article>
</div>