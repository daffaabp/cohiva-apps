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
        Schema::create('jadwal_konselor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_konselor');
            $table->string('hari', 10);
            $table->time('jam');
            $table->string('status', 10);
            $table->timestamps();

            $table->foreign('id_konselor')->references('id_konselor')->on('konselor')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_konselor');
    }
};