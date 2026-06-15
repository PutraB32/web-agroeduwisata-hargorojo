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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('metode_penerimaan')->default('cod_bayar_di_tempat');
            $table->decimal('total', 10, 2);
            $table->enum('status_order', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('pending');
            $table->string('kurir')->nullable();
            $table->string('nomor_resi')->nullable();
            $table->enum('status_pengiriman', ['belum_dikirim', 'dikirim'])->default('belum_dikirim');
            $table->timestamp('tanggal_dikirim')->nullable();
            $table->foreignId('admin_pengiriman_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('payment_status', ['pending', 'paid', 'expired', 'cancel', 'failed', 'refund'])->default('pending');
            $table->string('payment_type')->nullable();
            $table->string('midtrans_order_id')->nullable()->unique();
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('midtrans_snap_token')->nullable();
            $table->string('midtrans_redirect_url')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
