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
            $table->id();
            $table->foreignId('id_jadwalkonselor')->references('id')->on('jadwal_konselor')->onUpdate('cascade');
            $table->Integer('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade');
            $table->string('status_janji', length:15);
            $table->timestamps();
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
