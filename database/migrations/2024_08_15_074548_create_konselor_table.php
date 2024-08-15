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
        Schema::create('konselor', function (Blueprint $table) {
            $table->increments('id_konselor');
            $table->string('nama_konselor', 50);
            $table->string('notelpon_konselor', 15)->nullable();
            $table->string('unit_kerja', 50)->nullable();
            $table->string('foto_konselor', 50)->nullable();
            $table->boolean('is_aktif');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konselor');
    }
};