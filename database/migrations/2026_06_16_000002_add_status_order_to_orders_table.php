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
        if (! Schema::hasTable('orders') || Schema::hasColumn('orders', 'status_order')) {
            return;
        }

        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status_order', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])
                ->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration syncs older local databases with the current orders schema.
    }
};
