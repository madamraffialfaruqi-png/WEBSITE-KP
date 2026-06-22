<?php

namespace App\Http\Controllers;

use App\Models\DataStatistik;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $stats = DataStatistik::find(1);
        $userRole = auth()->user()->role;

        // If not yayasan, only load galleries for the specific unit
        if ($userRole === 'yayasan') {
            $galleries = Gallery::all()->groupBy('unit');
        } else {
            $galleries = Gallery::where('unit', $userRole)->get()->groupBy('unit');
        }

        return view('admin.dashboard', compact('stats', 'galleries'));
    }

    public function updateStats(Request $request)
    {
        $userRole = auth()->user()->role;

        $rules = [
            'tahun_ajaran' => 'nullable|string|max:50',
            'paud_siswa' => 'required|integer|min:0',
            'paud_guru'  => 'required|integer|min:0',
            'sd_siswa'   => 'required|integer|min:0',
            'sd_guru'    => 'required|integer|min:0',
            'smp_siswa'  => 'required|integer|min:0',
            'smp_guru'   => 'required|integer|min:0',
            'hero_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'paud_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'sd_photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'smp_photo'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'paud_photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'sd_photo_2'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'smp_photo_2'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kegiatan_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kegiatan_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kegiatan_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kegiatan_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kegiatan_5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'paud_academic_desc' => 'nullable|string',
            'sd_academic_desc'   => 'nullable|string',
            'smp_academic_desc'  => 'nullable|string',
            'paud_academic_advantages' => 'nullable|string',
            'sd_academic_advantages'   => 'nullable|string',
            'smp_academic_advantages'  => 'nullable|string',
            'paud_vision'        => 'nullable|string',
            'paud_mission'       => 'nullable|string',
            'sd_vision'          => 'nullable|string',
            'sd_mission'         => 'nullable|string',
            'smp_vision'         => 'nullable|string',
            'smp_mission'        => 'nullable|string',
            'school_profile_desc' => 'nullable|string',
            'school_vision'       => 'nullable|string',
            'school_mission'      => 'nullable|string',
            'school_tujuan'       => 'nullable|string',
            'paud_subjects'      => 'nullable|array',
            'sd_subjects'        => 'nullable|array',
            'smp_subjects'       => 'nullable|array',
        ];

        // If not yayasan, only validate and keep fields starting with the user's role
        if ($userRole !== 'yayasan') {
            $filteredRules = [];
            foreach ($rules as $key => $rule) {
                if (str_starts_with($key, $userRole . '_')) {
                    $filteredRules[$key] = $rule;
                }
            }
            $rules = $filteredRules;
        }

        $request->validate($rules);

        $stats = DataStatistik::find(1);

        $photoFields = [
            'hero_photo', 'paud_photo', 'sd_photo', 'smp_photo',
            'paud_photo_2', 'sd_photo_2', 'smp_photo_2',
            'kegiatan_1', 'kegiatan_2', 'kegiatan_3', 'kegiatan_4', 'kegiatan_5'
        ];

        // Filter photo fields by role
        if ($userRole !== 'yayasan') {
            $photoFields = array_filter($photoFields, function($field) use ($userRole) {
                return str_starts_with($field, $userRole . '_');
            });
        }

        $data = $request->only(array_keys($rules));

        // Process subjects for allowed roles
        $allowedKeys = ($userRole === 'yayasan') ? ['paud', 'sd', 'smp'] : [$userRole];
        foreach ($allowedKeys as $key) {
            if ($request->has($key . '_subjects') || $userRole === 'yayasan') {
                $subjectsInput = $request->input($key . '_subjects', []);
                $subjects = [];
                foreach ($subjectsInput as $sub) {
                    if (!empty($sub['name'])) {
                        $subjects[] = [
                            'icon' => $sub['icon'] ?? '📖',
                            'name' => $sub['name'],
                            'type' => $sub['type'] ?? 'Umum',
                        ];
                    }
                }
                $data[$key . '_academic_subjects'] = $subjects;
            }
        }

        // Handle photo uploads
        foreach ($photoFields as $photo) {
            if ($request->hasFile($photo)) {
                if ($stats->$photo) {
                    Storage::disk('public')->delete($stats->$photo);
                }
                $path = $request->file($photo)->store('photos', 'public');
                $data[$photo] = $path;
            }
        }

        $stats->update($data);

        return redirect()->back()->with('success', 'Statistik dan konten berhasil diperbarui!');
    }

    public function updateSosmed(Request $request)
    {
        if (auth()->user()->role !== 'yayasan') {
            return redirect()->back()->with('error', 'Hanya Admin Yayasan yang dapat memperbarui media sosial!');
        }

        $request->validate([
            'sosmed_wa'       => 'nullable|string|max:255',
            'sosmed_ig'       => 'nullable|url|max:255',
            'sosmed_yt'       => 'nullable|url|max:255',
            'sosmed_fb'       => 'nullable|url|max:255',
            'sosmed_tt'       => 'nullable|url|max:255',
            'sosmed_ig_label' => 'nullable|string|max:100',
            'sosmed_yt_label' => 'nullable|string|max:100',
            'sosmed_fb_label' => 'nullable|string|max:100',
            'sosmed_tt_label' => 'nullable|string|max:100',
        ]);

        $stats = DataStatistik::find(1);
        $stats->update([
            'sosmed_wa'       => $request->sosmed_wa,
            'sosmed_ig'       => $request->sosmed_ig,
            'sosmed_yt'       => $request->sosmed_yt,
            'sosmed_fb'       => $request->sosmed_fb,
            'sosmed_tt'       => $request->sosmed_tt,
            'sosmed_ig_label' => $request->sosmed_ig_label,
            'sosmed_yt_label' => $request->sosmed_yt_label,
            'sosmed_fb_label' => $request->sosmed_fb_label,
            'sosmed_tt_label' => $request->sosmed_tt_label,
        ]);

        return redirect()->back()->with('success', 'Link Media Sosial berhasil diperbarui!');
    }

    public function uploadGallery(Request $request)
    {
        $userRole = auth()->user()->role;

        $request->validate([
            'unit'  => 'required|string',
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
            'title' => 'nullable|string|max:255'
        ]);

        if ($userRole !== 'yayasan' && $request->unit !== $userRole) {
            return redirect()->back()->with('error', 'Anda hanya dapat mengunggah galeri untuk jenjang Anda sendiri!');
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('gallery/' . $request->unit, 'public');
            Gallery::create([
                'unit'  => $request->unit,
                'path'  => $path,
                'title' => $request->title
            ]);
        }

        return redirect()->back()->with('success', 'Media Galeri (Foto/Video) berhasil ditambahkan!');
    }

    public function deleteGallery($id)
    {
        $photo = Gallery::findOrFail($id);
        $userRole = auth()->user()->role;

        if ($userRole !== 'yayasan' && $photo->unit !== $userRole) {
            return redirect()->back()->with('error', 'Anda hanya dapat menghapus galeri dari jenjang Anda sendiri!');
        }

        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return redirect()->back()->with('success', 'Media Galeri berhasil dihapus!');
    }
}
