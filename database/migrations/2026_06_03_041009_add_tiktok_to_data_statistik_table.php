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
            $table->string('sosmed_tt')->nullable()->after('sosmed_fb_label');
            $table->string('sosmed_tt_label')->nullable()->after('sosmed_tt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn(['sosmed_tt', 'sosmed_tt_label']);
        });
    }
};
