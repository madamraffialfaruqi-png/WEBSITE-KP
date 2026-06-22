<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->string('sosmed_wa')->nullable()->after('kegiatan_5');
            $table->string('sosmed_ig')->nullable()->after('sosmed_wa');
            $table->string('sosmed_yt')->nullable()->after('sosmed_ig');
            $table->string('sosmed_fb')->nullable()->after('sosmed_yt');
            $table->string('sosmed_ig_label')->nullable()->after('sosmed_fb');
            $table->string('sosmed_yt_label')->nullable()->after('sosmed_ig_label');
            $table->string('sosmed_fb_label')->nullable()->after('sosmed_yt_label');
        });
    }

    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn([
                'sosmed_wa', 'sosmed_ig', 'sosmed_yt', 'sosmed_fb',
                'sosmed_ig_label', 'sosmed_yt_label', 'sosmed_fb_label',
            ]);
        });
    }
};
