<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public const METODE_MIDTRANS = 'midtrans';
    public const METODE_AMBIL_DI_TEMPAT = 'ambil_di_tempat';
    public const METODE_COD_BAYAR_DI_TEMPAT = 'cod_bayar_di_tempat';
    public const METODE_COD = self::METODE_COD_BAYAR_DI_TEMPAT;

    public const METODE_OFFLINE = [
        self::METODE_AMBIL_DI_TEMPAT,
        self::METODE_COD_BAYAR_DI_TEMPAT,
    ];

    public const STATUS_PENGIRIMAN_BELUM_DIKIRIM = 'belum_dikirim';
    public const STATUS_PENGIRIMAN_DIKIRIM = 'dikirim';

    protected $fillable = [
        'user_id',
        'nama_pemesan',
        'no_hp',
        'alamat',
        'metode_penerimaan',
        'total',
        'status_order',
        'kurir',
        'nomor_resi',
        'status_pengiriman',
        'tanggal_dikirim',
        'admin_pengiriman_id',
        'payment_status',
        'payment_type',
        'midtrans_order_id',
        'midtrans_transaction_id',
        'midtrans_snap_token',
        'midtrans_redirect_url',
        'paid_at',
        'expired_at',
        'canceled_at',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'paid_at' => 'datetime',
        'expired_at' => 'datetime',
        'canceled_at' => 'datetime',
        'tanggal_dikirim' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function adminPengiriman()
    {
        return $this->belongsTo(User::class, 'admin_pengiriman_id');
    }

    public function isOfflinePayment(): bool
    {
        return blank($this->midtrans_order_id)
            && in_array($this->metode_penerimaan, self::METODE_OFFLINE, true);
    }

    public function getMetodePenerimaanLabelAttribute(): string
    {
        return match ($this->metode_penerimaan) {
            self::METODE_AMBIL_DI_TEMPAT => 'Ambil di tempat',
            self::METODE_COD_BAYAR_DI_TEMPAT => 'COD / Bayar di tempat',
            self::METODE_MIDTRANS => 'Midtrans',
            default => 'COD / Bayar di tempat',
        };
    }

    public function getMetodePengirimanLabelAttribute(): string
    {
        return $this->metode_penerimaan_label;
    }

    public function getPaymentTypeLabelAttribute(): string
    {
        return match ($this->payment_type) {
            self::METODE_AMBIL_DI_TEMPAT => 'Ambil di tempat',
            self::METODE_COD_BAYAR_DI_TEMPAT, 'cod' => 'COD / Bayar di tempat',
            null, '' => $this->metode_penerimaan_label,
            default => ucfirst(str_replace('_', ' ', $this->payment_type)),
        };
    }

    public function getStatusPengirimanLabelAttribute(): string
    {
        return match ($this->status_pengiriman) {
            self::STATUS_PENGIRIMAN_DIKIRIM => 'Dikirim',
            default => 'Belum dikirim',
        };
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp'.number_format((float) $this->total, 0, ',', '.');
    }

    public function getProdukSubtotalAttribute(): float
    {
        if ($this->relationLoaded('orderDetails')) {
            return (float) $this->orderDetails->sum('detail_subtotal');
        }

        return (float) $this->orderDetails()
            ->selectRaw('COALESCE(SUM(harga_satuan * jumlah), 0) as subtotal')
            ->value('subtotal');
    }

    public function getFormattedProdukSubtotalAttribute(): string
    {
        return 'Rp'.number_format($this->produk_subtotal, 0, ',', '.');
    }

    public function getStatusOrderLabelAttribute(): string
    {
        return match ($this->status_order ?? 'pending') {
            'pending' => 'Menunggu Proses',
            'diproses' => 'Diproses',
            'dikirim' => 'Dikirim',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan',
            default => ucfirst((string) $this->status_order),
        };
    }

    public function getStatusOrderBadgeClassAttribute(): string
    {
        return match ($this->status_order ?? 'pending') {
            'diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
            'dikirim' => 'bg-sky-100 text-sky-800 border-sky-200',
            'selesai' => 'bg-green-100 text-green-800 border-green-200',
            'dibatalkan' => 'bg-red-100 text-red-800 border-red-200',
            default => 'bg-yellow-100 text-yellow-800 border-yellow-200',
        };
    }

    public function getPaymentStatusLabelAttribute(): string
    {
        if ($this->isOfflinePayment() && ($this->payment_status ?? 'pending') === 'pending') {
            return $this->payment_type_label;
        }

        return $this->payment_status_badge_label;
    }

    public function getPaymentStatusBadgeLabelAttribute(): string
    {
        return match ($this->payment_status ?? 'pending') {
            'paid' => 'Dibayar',
            'pending' => 'Menunggu Pembayaran',
            default => ucfirst((string) $this->payment_status),
        };
    }

    public function getPaymentStatusBadgeClassAttribute(): string
    {
        return match ($this->payment_status ?? 'pending') {
            'paid' => 'bg-green-100 text-green-800 border-green-200',
            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            default => 'bg-red-100 text-red-800 border-red-200',
        };
    }

    public function getBolehInputPengirimanAttribute(): bool
    {
        return $this->payment_status === 'paid' || $this->isOfflinePayment();
    }

    public function getPunyaResiAttribute(): bool
    {
        return $this->sudahDikirim();
    }

    public function sudahDikirim(): bool
    {
        return filled($this->kurir) && filled($this->nomor_resi);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
