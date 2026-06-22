<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataStatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('data_statistik')->insert([
            'id' => 1,
            'paud_siswa' => 120,
            'paud_guru' => 15,
            'sd_siswa' => 300,
            'sd_guru' => 25,
            'smp_siswa' => 150,
            'smp_guru' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
