<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            // Academic descriptions
            $table->text('paud_academic_desc')->nullable();
            $table->text('sd_academic_desc')->nullable();
            $table->text('smp_academic_desc')->nullable();

            // Academic advantages
            $table->text('paud_academic_advantages')->nullable();
            $table->text('sd_academic_advantages')->nullable();
            $table->text('smp_academic_advantages')->nullable();

            // Academic subjects (stored as JSON)
            $table->longText('paud_academic_subjects')->nullable();
            $table->longText('sd_academic_subjects')->nullable();
            $table->longText('smp_academic_subjects')->nullable();

            // Vision & Mission
            $table->text('paud_vision')->nullable();
            $table->text('paud_mission')->nullable();
            $table->text('sd_vision')->nullable();
            $table->text('sd_mission')->nullable();
            $table->text('smp_vision')->nullable();
            $table->text('smp_mission')->nullable();
        });

        // Seed default values into the existing row with ID 1
        $paud_subjects = [
            ['icon' => '📿', 'name' => 'Aqidah & Akhlak', 'type' => 'Islami'],
            ['icon' => '📖', 'name' => 'Hafalan Doa Harian', 'type' => 'Islami'],
            ['icon' => '🔤', 'name' => 'Literasi Dasar', 'type' => 'Umum'],
            ['icon' => '🎨', 'name' => 'Seni & Kreativitas', 'type' => 'Umum'],
            ['icon' => '🏃', 'name' => 'Motorik & Fisik', 'type' => 'Perkembangan'],
            ['icon' => '🤝', 'name' => 'Sosial Emosional', 'type' => 'Perkembangan']
        ];

        $sd_subjects = [
            ['icon' => '📿', 'name' => 'Aqidah & Akhlak', 'type' => 'Islami'],
            ['icon' => '📖', 'name' => 'Al-Qur\'an & Tahfidz', 'type' => 'Islami'],
            ['icon' => '🕌', 'name' => 'Fiqih Ibadah', 'type' => 'Islami'],
            ['icon' => '🔢', 'name' => 'Matematika', 'type' => 'Umum'],
            ['icon' => '🌏', 'name' => 'IPA & IPS', 'type' => 'Umum'],
            ['icon' => '🗣️', 'name' => 'Bhs. Arab & Inggris', 'type' => 'Bahasa']
        ];

        $smp_subjects = [
            ['icon' => '📿', 'name' => 'Aqidah & Tauhid', 'type' => 'Islami'],
            ['icon' => '📖', 'name' => 'Tahfidz & Tajwid', 'type' => 'Islami'],
            ['icon' => '🕌', 'name' => 'Fiqih & Hadits', 'type' => 'Islami'],
            ['icon' => '🔬', 'name' => 'IPA Terpadu', 'type' => 'Umum'],
            ['icon' => '📐', 'name' => 'Matematika', 'type' => 'Umum'],
            ['icon' => '🗣️', 'name' => 'Bhs. Arab & Inggris', 'type' => 'Bahasa']
        ];

        DB::table('data_statistik')->where('id', 1)->update([
            'paud_academic_desc' => 'Membangun fondasi karakter, motorik, and kecintaan belajar pada anak usia 3–6 tahun melalui pendekatan bermain islami.',
            'paud_academic_advantages' => "Pembiasaan adab islami setiap hari\nPembelajaran melalui bermain yang menyenangkan\nRasio guru-siswa yang ideal\nLaporan perkembangan berkala ke orang tua",
            'paud_academic_subjects' => json_encode($paud_subjects),

            'sd_academic_desc' => 'Kurikulum integratif Kemendikbud dipadukan dengan pendidikan agama mendalam untuk siswa kelas 1–6.',
            'sd_academic_advantages' => "Hafalan Al-Qur'an minimal 1 juz di kelas 6\nPenguasaan bahasa Arab dasar\nUjian Nasional and penilaian internal terintegrasi\nKegiatan pesantren kilat berkala",
            'sd_academic_subjects' => json_encode($sd_subjects),

            'smp_academic_desc' => 'Mempersiapkan siswa menjadi pribadi mandiri, berilmu, and siap melanjutkan ke jenjang yang lebih tinggi.',
            'smp_academic_advantages' => "Target hafalan Al-Qur'an 3–5 juz saat lulus\nKemampuan percakapan bahasa Arab aktif\nProgram mentoring and bimbingan karakter rutin\nPersiapan UNBK and ujian pesantren",
            'smp_academic_subjects' => json_encode($smp_subjects),

            'paud_vision' => 'Mewujudkan anak usia dini yang berakhlaq mulia, cerdas, kreatif, dan mandiri berlandaskan Al-Qur\'an dan As-Sunnah.',
            'paud_mission' => "Menanamkan kecintaan pada Allah dan Rasul-Nya sejak dini.\nMembiasakan adab-adab islami dalam kehidupan sehari-hari.\nMenyelenggarakan kegiatan bermain yang merangsang tumbuh kembang motorik dan kognitif.",

            'sd_vision' => 'Terbentuknya generasi Robbani yang bertauhid lurus, berakhlaq karimah, cerdas, dan berprestasi.',
            'sd_mission' => "Menanamkan aqidah Islamiyah yang bersih dari syirik dan khurafat.\nMembiasakan ibadah sesuai petunjuk Rasulullah SAW.\nMenyelenggarakan pendidikan dasar yang mengintegrasikan kurikulum nasional dan syar'i.",

            'smp_vision' => 'Melahirkan kader dakwah yang berilmu, mandiri, beraqidah lurus, dan siap menghadapi tantangan zaman.',
            'smp_mission' => "Mendidik siswa untuk mencintai ilmu syar'i dan ilmu umum secara seimbang.\nMembekali siswa dengan bahasa Arab aktif sebagai kunci memahami agama.\nMelatih kemandirian dan kepemimpinan melalui pembiasaan kehidupan islami."
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_statistik', function (Blueprint $table) {
            $table->dropColumn([
                'paud_academic_desc', 'sd_academic_desc', 'smp_academic_desc',
                'paud_academic_advantages', 'sd_academic_advantages', 'smp_academic_advantages',
                'paud_academic_subjects', 'sd_academic_subjects', 'smp_academic_subjects',
                'paud_vision', 'paud_mission', 'sd_vision', 'sd_mission', 'smp_vision', 'smp_mission'
            ]);
        });
    }
};
