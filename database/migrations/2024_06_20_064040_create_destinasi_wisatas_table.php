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
        Schema::create('destinasi_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lokasi');
            $table->string('fasilitas');
            $table->string('tarif_masuk');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->string('image');
            $table->float('rating_average')->default(0); // Kolom untuk rata-rata rating
            $table->unsignedInteger('rating_total')->default(0); // Kolom untuk total rating
            $table->unsignedInteger('rating_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisatas');
    }
};
