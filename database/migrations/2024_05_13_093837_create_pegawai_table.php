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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pegawai')->unique();
            $table->string('nama_pegawai');
            $table->text('alamat_pegawai');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status', ['aktif', 'non_aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
