<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('orders')) {
            return;
        }

        Schema::table('orders', function (Blueprint $table) {
            if (! Schema::hasColumn('orders', 'metode_penerimaan')) {
                $table->string('metode_penerimaan')->default('cod_bayar_di_tempat');
            }

            if (! Schema::hasColumn('orders', 'kurir')) {
                $table->string('kurir')->nullable();
            }

            if (! Schema::hasColumn('orders', 'nomor_resi')) {
                $table->string('nomor_resi')->nullable();
            }

            if (! Schema::hasColumn('orders', 'status_pengiriman')) {
                $table->enum('status_pengiriman', ['belum_dikirim', 'dikirim'])->default('belum_dikirim');
            }

            if (! Schema::hasColumn('orders', 'tanggal_dikirim')) {
                $table->timestamp('tanggal_dikirim')->nullable();
            }

            if (! Schema::hasColumn('orders', 'admin_pengiriman_id')) {
                $table->foreignId('admin_pengiriman_id')->nullable()->constrained('users')->nullOnDelete();
            }

            if (! Schema::hasColumn('orders', 'payment_status')) {
                $table->enum('payment_status', ['pending', 'paid', 'expired', 'cancel', 'failed', 'refund'])->default('pending');
            }

            if (! Schema::hasColumn('orders', 'payment_type')) {
                $table->string('payment_type')->nullable();
            }

            if (! Schema::hasColumn('orders', 'midtrans_order_id')) {
                $table->string('midtrans_order_id')->nullable()->unique();
            }

            if (! Schema::hasColumn('orders', 'midtrans_transaction_id')) {
                $table->string('midtrans_transaction_id')->nullable();
            }

            if (! Schema::hasColumn('orders', 'midtrans_snap_token')) {
                $table->string('midtrans_snap_token')->nullable();
            }

            if (! Schema::hasColumn('orders', 'midtrans_redirect_url')) {
                $table->string('midtrans_redirect_url')->nullable();
            }

            if (! Schema::hasColumn('orders', 'paid_at')) {
                $table->timestamp('paid_at')->nullable();
            }

            if (! Schema::hasColumn('orders', 'expired_at')) {
                $table->timestamp('expired_at')->nullable();
            }

            if (! Schema::hasColumn('orders', 'canceled_at')) {
                $table->timestamp('canceled_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration only syncs older local databases with columns that
        // already exist in the base orders migration, so rollback is a no-op.
    }
};
