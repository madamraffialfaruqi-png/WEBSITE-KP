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
        Schema::create('data_statistik', function (Blueprint $table) {
            $table->id();
            $table->integer('paud_siswa')->default(0);
            $table->integer('paud_guru')->default(0);
            $table->integer('sd_siswa')->default(0);
            $table->integer('sd_guru')->default(0);
            $table->integer('smp_siswa')->default(0);
            $table->integer('smp_guru')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_statistik');
    }
};
