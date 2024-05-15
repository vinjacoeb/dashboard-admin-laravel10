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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
             // fungsi string menambahkan kolom dengan tipe VARCHAR dan panjang 255 karakter
             $table->string('nama_kategori', 255);
             // fungsi text menambahkan kolom dengan tipe TEXT dengan default panjang 65536 karakter
             $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
