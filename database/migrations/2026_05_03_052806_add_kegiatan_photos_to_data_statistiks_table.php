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
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->string('kegiatan_1')->nullable();
            $table->string('kegiatan_2')->nullable();
            $table->string('kegiatan_3')->nullable();
            $table->string('kegiatan_4')->nullable();
            $table->string('kegiatan_5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn(['kegiatan_1', 'kegiatan_2', 'kegiatan_3', 'kegiatan_4', 'kegiatan_5']);
        });
    }
};
