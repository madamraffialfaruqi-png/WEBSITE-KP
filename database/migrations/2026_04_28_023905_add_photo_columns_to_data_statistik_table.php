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
            $table->string('hero_photo')->nullable();
            $table->string('paud_photo')->nullable();
            $table->string('sd_photo')->nullable();
            $table->string('smp_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn(['hero_photo', 'paud_photo', 'sd_photo', 'smp_photo']);
        });
    }
};
