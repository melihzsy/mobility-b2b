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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Kategori ile ilişki
            
            $table->string('name'); // Parça/Ürün Adı
            $table->string('slug')->unique(); // URL
            $table->string('oem_number')->unique()->nullable(); // B2B için Orijinal Ekipman Numarası
            $table->text('description'); // Ürün teknik detayı
            
            $table->decimal('price', 10, 2); // B2B Toplu Alım Fiyatı
            $table->integer('stock_quantity')->default(0); // Depodaki stok miktarı
            $table->string('image')->nullable(); // Ürün fotoğrafı
            $table->boolean('is_active')->default(true); // Satışa açık/kapalı durumu
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
