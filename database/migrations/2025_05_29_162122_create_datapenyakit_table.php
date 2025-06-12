<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_penyakit', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Tanggal laporan
            $table->string('nama_penyakit');
            $table->integer('jumlah')->default(0);
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('bayi')->default(0);
            $table->integer('balita')->default(0);
            $table->integer('anak')->default(0);
            $table->integer('remaja')->default(0);
            $table->integer('dewasa')->default(0);
            $table->integer('lansia')->default(0);
            $table->string('nama_puskesmas');
            $table->string('kecamatan')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penyakit');
    }
}
