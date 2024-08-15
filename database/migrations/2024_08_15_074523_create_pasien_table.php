<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->string('nama_pasien', 30);
            $table->text('alamat_pasien')->nullable();
            $table->string('notelpon_pasien', 15)->nullable();
            $table->unsignedBigInteger('id_user');
            $table->enum('jk_pasien', ['L', 'P']);
            $table->string('usia', 5)->nullable();
            $table->string('berat_badan', 10)->nullable();
            $table->string('tinggi_badan', 10)->nullable();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};