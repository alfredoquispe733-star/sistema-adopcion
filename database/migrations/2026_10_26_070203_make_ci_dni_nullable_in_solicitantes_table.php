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
        Schema::table('solicitantes', function (Blueprint $table) {
            // Drop the NOT NULL constraint first, then make nullable
            // The unique constraint already exists, so we don't add it again
            $table->string('ci_dni', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitantes', function (Blueprint $table) {
            // Restore NOT NULL constraint
            $table->string('ci_dni', 20)->nullable(false)->change();
        });
    }
};
