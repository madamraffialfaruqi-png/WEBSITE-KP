<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatistik extends Model
{
    use HasFactory;

    protected $table = 'data_statistik';

    protected $fillable = [
        'paud_siswa',
        'paud_guru',
        'sd_siswa',
        'sd_guru',
        'smp_siswa',
        'smp_guru',
        'hero_photo',
        'paud_photo',
        'sd_photo',
        'smp_photo',
        'paud_photo_2',
        'sd_photo_2',
        'smp_photo_2',
        'kegiatan_1',
        'kegiatan_2',
        'kegiatan_3',
        'kegiatan_4',
        'kegiatan_5',
        'sosmed_wa',
        'sosmed_ig',
        'sosmed_yt',
        'sosmed_fb',
        'sosmed_ig_label',
        'sosmed_yt_label',
        'sosmed_fb_label',
        'sosmed_tt',
        'sosmed_tt_label',
        // New columns
        'tahun_ajaran',
        'paud_academic_desc',
        'sd_academic_desc',
        'smp_academic_desc',
        'paud_academic_advantages',
        'sd_academic_advantages',
        'smp_academic_advantages',
        'paud_academic_subjects',
        'sd_academic_subjects',
        'smp_academic_subjects',
        'paud_vision',
        'paud_mission',
        'sd_vision',
        'sd_mission',
        'smp_vision',
        'smp_mission',
        'school_profile_desc',
        'school_vision',
        'school_mission',
        'school_tujuan',
    ];

    protected $casts = [
        'paud_academic_subjects' => 'array',
        'sd_academic_subjects' => 'array',
        'smp_academic_subjects' => 'array',
    ];
}
