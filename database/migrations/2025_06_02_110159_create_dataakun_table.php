<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataakunTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dataakun', function (Blueprint $table) {
            $table->id(); // id (bigint, auto increment)
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('role');
            $table->date('tanggal_dibuat');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dataakun');
    }
}
