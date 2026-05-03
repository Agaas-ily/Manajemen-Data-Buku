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
    Schema::create('bukus', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('pengarang');
        $table->string('cover')->nullable(); // Langsung tambahkan kolom cover di sini
        
        // Tambahkan relasi jika diperlukan
        $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
        $table->foreignId('penerbit_id')->constrained('penerbits')->onDelete('cascade');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
