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
        Schema::create('nilaipelajaran', function (Blueprint $table) {
            $table->id();
        $table->foreignId('siswa_id')->constrained()->onDelete('cascade'); // Relasi ke siswa
        $table->integer('ipa')->nullable(); // Kolom nilai IPA
        $table->integer('matematika')->nullable(); // Kolom nilai Matematika
        $table->integer('biologi')->nullable(); // Kolom nilai Biologi
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilaipelajaran');
    }
};
