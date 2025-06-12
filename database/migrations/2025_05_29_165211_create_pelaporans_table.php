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
            $table->text('gejala'); // Menyimpan gabungan checkbox (implode)
            $table->text('keterangan')->nullable();
            $table->enum('status', ['belum_diproses', 'diproses'])->default('belum_diproses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelaporans');
    }
};
