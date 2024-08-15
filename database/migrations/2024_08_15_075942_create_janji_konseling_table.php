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
        Schema::create('janji_konseling', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_jadwalkonselor');
            $table->unsignedInteger('id_konselor');
            $table->string('nama_konselor', 50);
            $table->string('hari', 15);
            $table->time('jam');
            $table->unsignedInteger('id_pasien');
            $table->string('status_janji', 15);
            $table->date('tgl_janji_konseling');
            $table->timestamps();

            $table->foreign('id_jadwalkonselor')->references('id')->on('jadwal_konselor')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_konseling');
    }
};