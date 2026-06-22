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
            $table->string('paud_photo_2')->nullable();
            $table->string('sd_photo_2')->nullable();
            $table->string('smp_photo_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn(['paud_photo_2', 'sd_photo_2', 'smp_photo_2']);
        });
    }
};
