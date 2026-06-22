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
            $table->text('school_profile_desc')->nullable();
            $table->text('school_vision')->nullable();
            $table->text('school_mission')->nullable();
            $table->text('school_tujuan')->nullable();
        });

        // Seed default values into existing row with ID 1
        \Illuminate\Support\Facades\DB::table('data_statistik')->where('id', 1)->update([
            'school_profile_desc' => "Sekolah Islam Imam Syafi’i Parungpanjang adalah sebuah Sekolah Islam yang berupaya menerapkan Kurikulum Nasional dan Kurikulum keislaman berbasis Pesantren yang dipadukan secara sistematis sehingga terbentuk Generasi Islam yang cinta tanah air, bangga sebagai Bangsa Indonesia, memahami agama dengan baik dan benar, berkarakter, berakhlaq mulia. berkualitas, berprestasi, bermanfaat bagi agama, masyarakat, bangsa dan negara.\n\nSekolah Islam Imam Syafi’i Parungpanjang berdiri sejak Tahun Pelajaran 2013/2014 dengan menyelenggarakan Program Pembelajaran dari Jenjang Pendidikan PAUD, SD, dan SMP.\n\nSekolah Islam Imam Syafi’i Parungpanjang beralamat di Jalan Raya Dago, RT.004/RW.001, Desa Kabasiran, Kecamatan Parungpanjang, Kabupaten Bogor. Terletak di lokasi yang sangat strategis, di lingkungan perumahan yang telah berkembang dan akan terus berkembang serta berpotensi menjadi Kota Mandiri di Wilayah Parungpanjang.",
            'school_vision' => "Terbentuk generasi Islam yang cerdas, terampil, beriman, bertaqwa, dan berahklaq mulia berdasarkan Al-Qur’an dan As-Sunnah dengan pemahaman Salafus Shalih Ahlus Sunnah Wal Jama’ah.",
            'school_mission' => "Menumbuhkembangkan minat dan bakat siswa sesuai dengan potensi dan kompetensinya sehingga memiliki kecerdasan dan keterampilan hidup yang memadahi.\nMenanamkan aqidah, ibadah, akhlaq yang mulia berdasarkan Al-Qur’an dan As-Sunnah dengan pemahaman Salafus Shalih Ahlus Sunnah Wal Jama’ah.\nMenjadikan Sekolah Islam Imam Syafi’i Parungpanjang sebagai sekolah unggulan dalam pengembangan sistem pendidikan yang integral.",
            'school_tujuan' => "Memiliki kekuatan aqidah yang shahihah, ibadah yang benar dan akhlaqul karimah.\nMemiliki kemampuan menghafal Al-Qur’an untuk Tingkat SD = 3 (tiga) Juz, dan SMP = 2 (dua) Juz.\nMemiliki kemampuan dasar-dasar dalam bahasa Arab dan bahasa Inggris secara aktif.\nMemiliki prestasi di bidang akademis dan non akademis.\nMemiliki kemampuan beradaptasi secara positif di tengah masyarakat.\nMemiliki kemampuan menempuh pendidikan ke jenjang yang lebih tinggi."
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn(['school_profile_desc', 'school_vision', 'school_mission', 'school_tujuan']);
        });
    }
};
