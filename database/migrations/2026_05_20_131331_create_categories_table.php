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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Kategori Adı (Örn: Otonom Sürüş Sensörleri)
            $table->string('slug')->unique(); // URL dostu isim (örn: otonom-surus-sensorleri)
            $table->text('description')->nullable(); // Kategori açıklaması
            $table->boolean('is_active')->default(true); // Kategoriyi aktif/pasif yapma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
