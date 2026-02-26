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
        Schema::create('post_user', function (Blueprint $table) {
        $table->id();
        
        // Hangi Kullanıcı? (Users tablosuna bağlar, kullanıcı silinirse bu kayıt da silinir)
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        
        // Hangi Yazı? (Posts tablosuna bağlar, yazı silinirse bu kayıt da silinir)
        $table->foreignId('post_id')->constrained()->cascadeOnDelete();
        
        // Okunma Tarihi (Ne zaman okudu?)
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user');
    }
};
