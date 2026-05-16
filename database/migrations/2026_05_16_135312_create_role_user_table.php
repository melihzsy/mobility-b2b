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
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // [cite: 691, 692, 693]
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // [cite: 694, 695, 696]
            $table->timestamps();
            $table->unique(['user_id', 'role_id']); // Bir kullanıcıya aynı rol iki kez atanamaz [cite: 700, 706]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
