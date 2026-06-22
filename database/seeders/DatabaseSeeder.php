<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin Yayasan',
                'username' => 'adminyayasan',
                'email' => 'yayasan@sekolah.sch.id',
                'password' => bcrypt('adminyayasan123'),
                'role' => 'yayasan',
            ],
            [
                'name' => 'Admin PAUD',
                'username' => 'adminpaud',
                'email' => 'paud@sekolah.sch.id',
                'password' => bcrypt('adminpaud123'),
                'role' => 'paud',
            ],
            [
                'name' => 'Admin SD',
                'username' => 'adminsd',
                'email' => 'sd@sekolah.sch.id',
                'password' => bcrypt('adminsd123'),
                'role' => 'sd',
            ],
            [
                'name' => 'Admin SMP',
                'username' => 'adminsmp',
                'email' => 'smp@sekolah.sch.id',
                'password' => bcrypt('adminsmp123'),
                'role' => 'smp',
            ],
        ];

        foreach ($admins as $admin) {
            \App\Models\User::updateOrCreate(
                ['username' => $admin['username']],
                $admin
            );
        }

        $this->call(DataStatistikSeeder::class);
    }
}
