<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

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

        if ($this->isMysql() && Schema::hasColumn('users', 'role')) {
            DB::statement("ALTER TABLE `users` MODIFY `role` VARCHAR(30) NULL DEFAULT 'customer'");
            DB::table('users')
                ->whereNull('role')
                ->orWhere('role', '')
                ->update(['role' => 'customer']);
            DB::statement("ALTER TABLE `users` MODIFY `role` VARCHAR(30) NOT NULL DEFAULT 'customer'");
        }
    }

    public function down(): void
    {
        //
    }

    private function isMysql(): bool
    {
        return in_array(Schema::getConnection()->getDriverName(), ['mysql', 'mariadb'], true);
    }
};
