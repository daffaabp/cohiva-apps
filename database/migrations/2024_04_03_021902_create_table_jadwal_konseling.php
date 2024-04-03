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
            $table->id();
            $table->foreignId('id_konselor');
            $table->string('hari', length:10);
            $table->time('jam', precision: 0);
            $table->string('status', length:10);
            $table->timestamps();
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
