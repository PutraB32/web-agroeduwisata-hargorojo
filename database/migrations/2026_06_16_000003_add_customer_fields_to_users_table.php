<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp', 20)->nullable();
            }

            if (! Schema::hasColumn('users', 'alamat')) {
                $table->text('alamat')->nullable();
            }

            if (! Schema::hasColumn('users', 'foto')) {
                $table->string('foto')->nullable();
            }

            if (! Schema::hasColumn('users', 'role')) {
                $table->string('role', 30)->default('customer');
            }
        });
    }

    public function down(): void
    {
        //
    }
};
