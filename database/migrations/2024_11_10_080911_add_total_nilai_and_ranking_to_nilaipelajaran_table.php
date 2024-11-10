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
        Schema::table('nilaipelajaran', function (Blueprint $table) {
            $table->integer('total_nilai')->nullable(); // Kolom untuk total nilai
            $table->integer('ranking')->nullable(); // Kolom untuk peringkat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilaipelajaran', function (Blueprint $table) {
            $table->dropColumn(['total_nilai', 'ranking']);
        });
    }
};
