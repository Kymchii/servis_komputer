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
        Schema::create('komputer', function (Blueprint $table) {
            $table->unsignedBigInteger('id_komputer')->unique();
            $table->enum('merk', ['asus', 'acer', 'del', 'lain']);
            $table->text('kelengkapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komputer');
    }
};
