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
        Schema::create('konseling', function (Blueprint $table) {
            $table->increments('id_konseling');
            $table->date('tgl_konseling');
            $table->unsignedInteger('id_pasien');
            $table->unsignedInteger('id_konselor');
            $table->unsignedBigInteger('id_janjikonseling');
            $table->text('keterangan');
            $table->string('status_pasien', 30);
            $table->longText('keluhan');
            $table->string('penilaian', 255);
            $table->string('jenis_konseling', 255);
            $table->string('status_konseling', 255);

            $table->foreign('id_konselor')->references('id_konselor')->on('konselor')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling');
    }
};