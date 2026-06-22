<?php

namespace App\Http\Controllers;

use App\Models\DataStatistik;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $stats = DataStatistik::find(1);
        return view('home', [
            'total_siswa' => $stats->paud_siswa + $stats->sd_siswa + $stats->smp_siswa,
            'total_guru' => $stats->paud_guru + $stats->sd_guru + $stats->smp_guru,
            'paud_siswa' => $stats->paud_siswa,
            'paud_guru' => $stats->paud_guru,
            'sd_siswa' => $stats->sd_siswa,
            'sd_guru' => $stats->sd_guru,
            'smp_siswa' => $stats->smp_siswa,
            'smp_guru' => $stats->smp_guru,
            'stats' => $stats
        ]);
    }

    public function profil()
    {
        $stats = DataStatistik::find(1);
        return view('profil', compact('stats'));
    }

    public function akademik()
    {
        $stats = DataStatistik::find(1);
        return view('akademik', compact('stats'));
    }

    public function galeri()
    {
        $galleries = Gallery::all();
        return view('galeri', compact('galleries'));
    }

    public function pendaftaran()
    {
        $stats = DataStatistik::find(1);
        return view('pendaftaran', compact('stats'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function paud()
    {
        $stats = DataStatistik::find(1);
        $gallery = Gallery::where('unit', 'paud')->get();
        $ekskul = Gallery::where('unit', 'paud_ekskul')->get();
        return view('units.paud', [
            'siswa' => $stats->paud_siswa,
            'guru' => $stats->paud_guru,
            'photo' => $stats->paud_photo,
            'gallery' => $gallery,
            'ekskul' => $ekskul,
            'stats' => $stats
        ]);
    }

    public function sd()
    {
        $stats = DataStatistik::find(1);
        $gallery = Gallery::where('unit', 'sd')->get();
        $ekskul = Gallery::where('unit', 'sd_ekskul')->get();
        return view('units.sd', [
            'siswa' => $stats->sd_siswa,
            'guru' => $stats->sd_guru,
            'photo' => $stats->sd_photo,
            'gallery' => $gallery,
            'ekskul' => $ekskul,
            'stats' => $stats
        ]);
    }

    public function smp()
    {
        $stats = DataStatistik::find(1);
        $gallery = Gallery::where('unit', 'smp')->get();
        $ekskul = Gallery::where('unit', 'smp_ekskul')->get();
        return view('units.smp', [
            'siswa' => $stats->smp_siswa,
            'guru' => $stats->smp_guru,
            'photo' => $stats->smp_photo,
            'gallery' => $gallery,
            'ekskul' => $ekskul,
            'stats' => $stats
        ]);
    }
}
