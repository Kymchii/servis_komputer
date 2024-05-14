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
        Schema::create('keluhan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_keluhan')->unique();
            $table->text('nama_keluhan');
            $table->integer('ongkos');
            $table->unsignedBigInteger('id_komputer');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_komputer')->references('id_komputer')->on('komputer');
            $table->foreign('id_customer')->references('id_customer')->on('customers');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhan');
    }
};
