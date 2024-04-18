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
        Schema::table('janji_konseling', function($table){
            $table->string('nama_konselor', 50)->after('id_jadwalkonselor');
            $table->string('hari', 15)->after('nama_konselor');
            $table->time('jam')->after('hari');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('janji_konseling', function($table){
            $table->dropColumn('nama_konselor');
            $table->dropColumn('hari');
            $table->dropColumn('jam');
        });
    }
};
