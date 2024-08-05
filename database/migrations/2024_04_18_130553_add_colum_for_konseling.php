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
        Schema::table('konseling', function($table){
            $table->longText('keluhan');
            $table->string('penilaian', 10);
            $table->string('jenis_konseling');
            $table->string('status_konseling');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konseling', function($table){
            $table->dropColumn('keluhan');
            $table->dropColumn('penilaian');
            $table->dropColumn('jenis_konseling');
            $table->dropColumn('status_konseling');
        });
    }
};
