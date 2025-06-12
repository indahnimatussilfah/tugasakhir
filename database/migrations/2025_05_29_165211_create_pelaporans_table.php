<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('user_id')->constrained(table: 'users', indexName:'pelaporan_users_id')->onDelete('cascade');
            $table->text('gejala'); // Menyimpan gabungan checkbox (implode)
            $table->text('keterangan')->nullable();
            $table->enum('status', ['belum_diproses', 'sedang_diproses' , 'sudah_diproses'])->default('belum_diproses');
            $table->text('jawaban')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelaporans');
    }
};
