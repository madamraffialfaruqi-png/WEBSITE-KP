@extends('layouts.app')

@section('title', 'Admin Dashboard - Sekolah Islam Imam Syafi\'i')

@section('content')
<div class="page active" id="page-admin">
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <a href="{{ route('home') }}">Beranda</a>
            <span class="sep">›</span>
            <span class="current">Admin Dashboard</span>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="section-head" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px;">
                <div>
                    <div class="eyebrow">Control Panel</div>
                    <h2>Manajemen Konten Website</h2>
                    <p>Kelola statistik, foto utama, galeri kegiatan, dan link media sosial.</p>
                </div>
                <div class="user-profile-bar" style="background: var(--gray-100); padding: 16px 20px; border-radius: 12px; border: 1px solid var(--gray-200); display: flex; align-items: center; gap: 16px; min-width: 280px; justify-content: space-between; transition: all 0.2s;">
                    <div>
                        <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em; color: var(--gray-500); font-weight: bold;">Login Sebagai</div>
                        <div class="profile-name" style="font-weight: 700; color: var(--navy); font-size: 15px;">{{ auth()->user()->name }}</div>
                        <div style="font-size: 12px; color: var(--gold); font-weight: 600; text-transform: uppercase;">Admin {{ strtoupper(auth()->user()->role) }}</div>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn-cta" style="background: #ef4444; border-color: #ef4444; padding: 8px 16px; font-size: 13px; color: white; border-radius: 8px; cursor: pointer; border: none; font-weight: 600;">Keluar</button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="notice-box" style="background: var(--green-light); border-color: var(--green); color: var(--green); margin-bottom: 32px;">
                    <div class="ni">✓</div>
                    <p><strong>Berhasil:</strong> {{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="notice-box" style="background: #fee2e2; border-color: #ef4444; color: #b91c1c; margin-bottom: 32px;">
                    <div class="ni">!</div>
                    <p><strong>Kesalahan:</strong> Silakan periksa kembali inputan Anda.</p>
                    <ul style="margin-left: 20px; font-size: 13px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TABS -->
            <div class="vm-tabs" style="margin-bottom: 32px;">
                <button class="vm-tab active" onclick="switchAdminTab(this, 'tab-stats')">Statistik &amp; Foto Utama</button>
                @if(auth()->user()->role === 'yayasan')
                    <button class="vm-tab" onclick="switchAdminTab(this, 'tab-sosmed')">Media Sosial</button>
                @endif
                <button class="vm-tab" onclick="switchAdminTab(this, 'tab-gallery')">Galeri Kegiatan Unit</button>
            </div>

            <!-- ===== TAB: STATS & HERO ===== -->
            <div id="tab-stats" class="admin-tab-content active">
                <form action="{{ route('admin.update-stats') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(auth()->user()->role === 'yayasan')
                    <!-- Pengaturan Global Yayasan -->
                    <div class="unit-card" style="padding: 24px; margin-bottom: 32px; border-left: 4px solid var(--gold);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            Pengaturan PPDB & Foto Hero Utama
                        </h3>
                        <div class="modal-field" style="margin-bottom: 24px;">
                            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Tahun Ajaran PPDB</label>
                            <input type="text" name="tahun_ajaran" value="{{ $stats->tahun_ajaran ?? '2025 / 2026' }}" class="admin-input" placeholder="Cth: 2025 / 2026" style="width: 100%; max-width: 300px; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px;">
                        </div>
                        <div style="display: flex; gap: 24px; align-items: center;">
                            <div style="width: 120px; height: 90px; background: var(--gray-100); border-radius: 8px; overflow: hidden; border: 1px solid var(--gray-200); display: flex; align-items: center; justify-content: center;">
                                @if($stats->hero_photo)
                                    <img src="{{ asset('storage/' . $stats->hero_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <span style="font-size: 24px; color: var(--gray-400);">—</span>
                                @endif
                            </div>
                            <div style="flex: 1;">
                                <input type="file" name="hero_photo" class="admin-input" style="width: 100%; padding: 10px; border: 1.5px dashed var(--gray-200); border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="admin-grid" style="display: grid; grid-template-columns: repeat({{ auth()->user()->role === 'yayasan' ? 3 : 1 }}, 1fr); gap: 24px;">
                        @foreach(['paud' => 'PAUD', 'sd' => 'SD Islam', 'smp' => 'SMP Islam'] as $key => $label)
                            @if(auth()->user()->role === 'yayasan' || auth()->user()->role === $key)
                            <div class="unit-card" style="padding: 24px;">
                                <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 20px;">{{ $label }}</h3>
                                <div style="margin-bottom: 20px;">
                                    <div style="width: 100%; aspect-ratio: 16/9; background: var(--gray-100); border-radius: 8px; overflow: hidden; margin-bottom: 12px; border: 1px solid var(--gray-200); display: flex; align-items: center; justify-content: center;">
                                        @php $field = $key.'_photo'; @endphp
                                        @if($stats->$field)
                                            <img src="{{ asset('storage/' . $stats->$field) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <span style="font-size: 24px; color: var(--gray-400);">—</span>
                                        @endif
                                    </div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Ganti Foto Utama Unit</label>
                                    <input type="file" name="{{ $key }}_photo" style="font-size: 11px; width: 100%;">
                                </div>
                                <div class="modal-field" style="margin-bottom: 16px;">
                                    <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Siswa</label>
                                    <input type="number" name="{{ $key }}_siswa" value="{{ $stats->{$key.'_siswa'} }}" class="admin-input" style="width: 100%; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px;">
                                </div>
                                <div class="modal-field">
                                    <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Guru</label>
                                    <input type="number" name="{{ $key }}_guru" value="{{ $stats->{$key.'_guru'} }}" class="admin-input" style="width: 100%; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px;">
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    @if(auth()->user()->role === 'yayasan')
                    <!-- Sekilas Kehidupan Sekolah -->
                    <div class="unit-card" style="padding: 32px; margin-top: 32px; border-top: 4px solid var(--navy);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                            Sekilas Kehidupan Sekolah (Halaman Depan)
                        </h3>
                        <p style="font-size: 14px; color: var(--gray-600); margin-bottom: 24px;">Pilih 5 foto untuk ditampilkan di bagian grid galeri halaman depan.</p>
                        <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px;">
                            @for($i = 1; $i <= 5; $i++)
                            <div style="background: var(--gray-50); padding: 12px; border-radius: 12px; border: 1px solid var(--gray-200);">
                                <div style="width: 100%; aspect-ratio: {{ $i == 1 ? '2/3' : '16/9' }}; background: var(--gray-200); border-radius: 8px; overflow: hidden; margin-bottom: 12px; display: flex; align-items: center; justify-content: center;">
                                    @php $fieldName = 'kegiatan_'.$i; @endphp
                                    @if($stats->$fieldName)
                                        <img src="{{ asset('storage/' . $stats->$fieldName) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <span style="font-size: 20px; color: var(--gray-400);">—</span>
                                    @endif
                                </div>
                                <label style="display: block; font-size: 11px; font-weight: 700; color: var(--navy); margin-bottom: 4px;">Foto {{ $i }}</label>
                                <input type="file" name="kegiatan_{{ $i }}" style="font-size: 10px; width: 100%;">
                            </div>
                            @endfor
                        </div>
                    </div>
                    @endif

                    <!-- Foto Halaman Akademik -->
                    <div class="unit-card" style="padding: 32px; margin-top: 32px; border-top: 4px solid var(--gold);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                            Foto Tambahan Halaman Akademik
                        </h3>
                        <p style="font-size: 14px; color: var(--gray-600); margin-bottom: 24px;">Upload foto ke-2 untuk bagian kurikulum di halaman akademik setiap unit.</p>
                        <div style="display: grid; grid-template-columns: repeat({{ auth()->user()->role === 'yayasan' ? 3 : 1 }}, 1fr); gap: 24px;">
                            @foreach(['paud' => 'PAUD', 'sd' => 'SD Islam', 'smp' => 'SMP Islam'] as $key => $label)
                                @if(auth()->user()->role === 'yayasan' || auth()->user()->role === $key)
                                <div style="background: var(--gray-50); padding: 16px; border-radius: 12px; border: 1px solid var(--gray-200);">
                                    <div style="width: 100%; aspect-ratio: 16/9; background: var(--gray-200); border-radius: 8px; overflow: hidden; margin-bottom: 12px; display: flex; align-items: center; justify-content: center;">
                                        @php $field2 = $key.'_photo_2'; @endphp
                                        @if($stats->$field2)
                                            <img src="{{ asset('storage/' . $stats->$field2) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <span style="font-size: 24px; color: var(--gray-400);">—</span>
                                        @endif
                                    </div>
                                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--navy); margin-bottom: 6px;">Foto 2 {{ $label }}</label>
                                    <input type="file" name="{{ $key }}_photo_2" style="font-size: 11px; width: 100%;">
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Visi & Misi Unit -->
                    <div class="unit-card" style="padding: 32px; margin-top: 32px; border-top: 4px solid var(--navy);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                            Visi &amp; Misi Unit Sekolah
                        </h3>
                        <p style="font-size: 14px; color: var(--gray-600); margin-bottom: 24px;">Kelola visi dan misi masing-masing jenjang (PAUD, SD, SMP) untuk ditampilkan di halaman profil.</p>
                        <div style="display: grid; grid-template-columns: repeat({{ auth()->user()->role === 'yayasan' ? 3 : 1 }}, 1fr); gap: 24px;">
                            @foreach(['paud' => 'PAUD', 'sd' => 'SD Islam', 'smp' => 'SMP Islam'] as $key => $label)
                                @if(auth()->user()->role === 'yayasan' || auth()->user()->role === $key)
                                <div style="background: var(--gray-50); padding: 16px; border-radius: 12px; border: 1px solid var(--gray-200);">
                                    <h4 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 12px; font-weight: 600;">Visi &amp; Misi {{ $label }}</h4>
                                    <div class="modal-field" style="margin-bottom: 12px;">
                                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Visi</label>
                                        <textarea name="{{ $key }}_vision" class="admin-input" style="width: 100%; height: 80px; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->{$key.'_vision'} }}</textarea>
                                    </div>
                                    <div class="modal-field">
                                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Misi <span style="font-weight: normal; color: var(--gray-400);">(Pisahkan per baris)</span></label>
                                        <textarea name="{{ $key }}_mission" class="admin-input" style="width: 100%; height: 120px; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->{$key.'_mission'} }}</textarea>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Program & Kurikulum Akademik -->
                    <div class="unit-card" style="padding: 32px; margin-top: 32px; border-top: 4px solid var(--gold);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                            Program Akademik &amp; Kurikulum
                        </h3>
                        <p style="font-size: 14px; color: var(--gray-600); margin-bottom: 24px;">Kelola deskripsi program, keunggulan, dan mata pelajaran yang ditampilkan di halaman akademik.</p>
                        <div style="display: grid; grid-template-columns: repeat({{ auth()->user()->role === 'yayasan' ? 3 : 1 }}, 1fr); gap: 24px;">
                            @foreach(['paud' => 'PAUD', 'sd' => 'SD Islam', 'smp' => 'SMP Islam'] as $key => $label)
                                @if(auth()->user()->role === 'yayasan' || auth()->user()->role === $key)
                                <div style="background: var(--gray-50); padding: 16px; border-radius: 12px; border: 1px solid var(--gray-200); display: flex; flex-direction: column;">
                                    <h4 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 12px; font-weight: 600;">Akademik {{ $label }}</h4>
                                    <div class="modal-field" style="margin-bottom: 12px;">
                                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Deskripsi Program</label>
                                        <textarea name="{{ $key }}_academic_desc" class="admin-input" style="width: 100%; height: 80px; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->{$key.'_academic_desc'} }}</textarea>
                                    </div>
                                    <div class="modal-field" style="margin-bottom: 16px;">
                                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 6px;">Keunggulan <span style="font-weight: normal; color: var(--gray-400);">(Pisahkan per baris)</span></label>
                                        <textarea name="{{ $key }}_academic_advantages" class="admin-input" style="width: 100%; height: 100px; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->{$key.'_academic_advantages'} }}</textarea>
                                    </div>
                                    <div class="modal-field" style="flex: 1;">
                                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Mata Pelajaran</label>
                                        <div id="subjects-container-{{ $key }}">
                                            @if(!empty($stats->{$key.'_academic_subjects'}))
                                                @foreach($stats->{$key.'_academic_subjects'} as $index => $subject)
                                                    <div class="subject-item-row" style="display: flex; gap: 8px; margin-bottom: 8px; align-items: center;">
                                                        <input type="text" name="{{ $key }}_subjects[{{ $index }}][icon]" value="{{ $subject['icon'] ?? '' }}" placeholder="Ikon" class="admin-input" style="width: 48px; text-align: center; padding: 8px 0; border: 1.5px solid var(--gray-200); border-radius: 8px;">
                                                        <input type="text" name="{{ $key }}_subjects[{{ $index }}][name]" value="{{ $subject['name'] }}" placeholder="Nama Mapel" class="admin-input" style="flex: 2; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px;" required>
                                                        <select name="{{ $key }}_subjects[{{ $index }}][type]" class="admin-input" style="flex: 1; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; background: white;">
                                                            <option value="Islami" {{ ($subject['type'] ?? '') == 'Islami' ? 'selected' : '' }}>Islami</option>
                                                            <option value="Umum" {{ ($subject['type'] ?? '') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                                            <option value="Perkembangan" {{ ($subject['type'] ?? '') == 'Perkembangan' ? 'selected' : '' }}>Perkembangan</option>
                                                            <option value="Bahasa" {{ ($subject['type'] ?? '') == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                                                        </select>
                                                        <button type="button" onclick="this.parentElement.remove()" style="background: #ef4444; color: white; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; font-size: 13px;">✕</button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" onclick="addSubjectRow('{{ $key }}')" style="background: var(--navy); color: white; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer; font-size: 12px; font-weight: 600; width: 100%; margin-top: 8px;">+ Tambah Mapel</button>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    @if(auth()->user()->role === 'yayasan')
                    <!-- Profil Utama Sekolah -->
                    <div class="unit-card" style="padding: 32px; margin-top: 32px; border-top: 4px solid var(--navy);">
                        <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                            Profil Utama Sekolah (Halaman Profil)
                        </h3>
                        <p style="font-size: 14px; color: var(--gray-600); margin-bottom: 24px;">Kelola deskripsi profil, visi, misi, dan tujuan utama sekolah untuk halaman Profil.</p>
                        
                        <div class="modal-field" style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Deskripsi Profil Sekolah <span style="font-weight: normal; color: var(--gray-400);">(Pisahkan paragraf dengan baris baru)</span></label>
                            <textarea name="school_profile_desc" class="admin-input" style="width: 100%; height: 150px; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->school_profile_desc }}</textarea>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                            <div class="modal-field">
                                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Visi Sekolah</label>
                                <textarea name="school_vision" class="admin-input" style="width: 100%; height: 150px; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->school_vision }}</textarea>
                            </div>
                            <div class="modal-field">
                                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Misi Sekolah <span style="font-weight: normal; color: var(--gray-400);">(Pisahkan per baris)</span></label>
                                <textarea name="school_mission" class="admin-input" style="width: 100%; height: 150px; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->school_mission }}</textarea>
                            </div>
                            <div class="modal-field">
                                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--gray-600); margin-bottom: 8px;">Tujuan Sekolah <span style="font-weight: normal; color: var(--gray-400);">(Pisahkan per baris)</span></label>
                                <textarea name="school_tujuan" class="admin-input" style="width: 100%; height: 150px; padding: 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; font-family: var(--font-body); font-size: 13px; resize: vertical;">{{ $stats->school_tujuan }}</textarea>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div style="margin-top: 40px; text-align: center;">
                        <button type="submit" class="btn-primary" style="padding: 16px 48px; border: none; cursor: pointer; font-size: 16px;">Simpan Semua Statistik, Program &amp; Visi Misi</button>
                    </div>
                </form>
            </div>

            <!-- ===== TAB: MEDIA SOSIAL ===== -->
            <div id="tab-sosmed" class="admin-tab-content" style="display: none;">
                <form action="{{ route('admin.update-sosmed') }}" method="POST">
                    @csrf

                    <div class="sosmed-edit-grid">

                        <!-- WhatsApp -->
                        <div class="sosmed-card">
                            <div class="sosmed-card-header" style="background: linear-gradient(135deg, #25d366, #1ebe5d);">
                                <div class="sosmed-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </div>
                                <div class="sosmed-card-title">WhatsApp</div>
                            </div>
                            <div class="sosmed-card-body">
                                <div class="sosmed-preview-row">
                                    <span class="sosmed-preview-label">Link Saat Ini:</span>
                                    @if($stats->sosmed_wa)
                                        <a href="https://wa.me/{{ $stats->sosmed_wa }}" target="_blank" class="sosmed-preview-link">wa.me/{{ $stats->sosmed_wa }}</a>
                                    @else
                                        <span class="sosmed-preview-empty">Belum diset</span>
                                    @endif
                                </div>
                                <div class="sosmed-field">
                                    <label>Nomor WhatsApp <span class="sosmed-hint">(hanya angka, cth: 628123456789)</span></label>
                                    <input type="text"
                                           name="sosmed_wa"
                                           value="{{ $stats->sosmed_wa }}"
                                           placeholder="628123456789"
                                           class="sosmed-input">
                                    <p class="sosmed-note">Masukkan nomor dengan kode negara tanpa tanda +, spasi, atau tanda hubung.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div class="sosmed-card">
                            <div class="sosmed-card-header" style="background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);">
                                <div class="sosmed-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                                <div class="sosmed-card-title">Instagram</div>
                            </div>
                            <div class="sosmed-card-body">
                                <div class="sosmed-preview-row">
                                    <span class="sosmed-preview-label">Link Saat Ini:</span>
                                    @if($stats->sosmed_ig)
                                        <a href="{{ $stats->sosmed_ig }}" target="_blank" class="sosmed-preview-link">{{ $stats->sosmed_ig }}</a>
                                    @else
                                        <span class="sosmed-preview-empty">Belum diset</span>
                                    @endif
                                </div>
                                <div class="sosmed-field">
                                    <label>URL Instagram</label>
                                    <input type="url"
                                           name="sosmed_ig"
                                           value="{{ $stats->sosmed_ig }}"
                                           placeholder="https://www.instagram.com/info_imamsyafii/"
                                           class="sosmed-input">
                                </div>
                                <div class="sosmed-field">
                                    <label>Username / Label Instagram <span class="sosmed-hint">(tampil di halaman Kontak)</span></label>
                                    <input type="text"
                                           name="sosmed_ig_label"
                                           value="{{ $stats->sosmed_ig_label }}"
                                           placeholder="@info_imamsyafii"
                                           class="sosmed-input">
                                </div>
                            </div>
                        </div>

                        <!-- YouTube -->
                        <div class="sosmed-card">
                            <div class="sosmed-card-header" style="background: linear-gradient(135deg, #ff0000, #cc0000);">
                                <div class="sosmed-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </div>
                                <div class="sosmed-card-title">YouTube</div>
                            </div>
                            <div class="sosmed-card-body">
                                <div class="sosmed-preview-row">
                                    <span class="sosmed-preview-label">Link Saat Ini:</span>
                                    @if($stats->sosmed_yt)
                                        <a href="{{ $stats->sosmed_yt }}" target="_blank" class="sosmed-preview-link">{{ $stats->sosmed_yt }}</a>
                                    @else
                                        <span class="sosmed-preview-empty">Belum diset</span>
                                    @endif
                                </div>
                                <div class="sosmed-field">
                                    <label>URL Channel YouTube</label>
                                    <input type="url"
                                           name="sosmed_yt"
                                           value="{{ $stats->sosmed_yt }}"
                                           placeholder="https://www.youtube.com/c/TazhimusSunnah/videos"
                                           class="sosmed-input">
                                </div>
                                <div class="sosmed-field">
                                    <label>Nama Channel <span class="sosmed-hint">(tampil di halaman Kontak)</span></label>
                                    <input type="text"
                                           name="sosmed_yt_label"
                                           value="{{ $stats->sosmed_yt_label }}"
                                           placeholder="Ta'zhimus Sunnah"
                                           class="sosmed-input">
                                </div>
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div class="sosmed-card">
                            <div class="sosmed-card-header" style="background: linear-gradient(135deg, #1877f2, #0d5fc9);">
                                <div class="sosmed-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </div>
                                <div class="sosmed-card-title">Facebook</div>
                            </div>
                            <div class="sosmed-card-body">
                                <div class="sosmed-preview-row">
                                    <span class="sosmed-preview-label">Link Saat Ini:</span>
                                    @if($stats->sosmed_fb)
                                        <a href="{{ $stats->sosmed_fb }}" target="_blank" class="sosmed-preview-link">{{ $stats->sosmed_fb }}</a>
                                    @else
                                        <span class="sosmed-preview-empty">Belum diset</span>
                                    @endif
                                </div>
                                <div class="sosmed-field">
                                    <label>URL Halaman Facebook</label>
                                    <input type="url"
                                           name="sosmed_fb"
                                           value="{{ $stats->sosmed_fb }}"
                                           placeholder="https://www.facebook.com/Tazhimussunnah/"
                                           class="sosmed-input">
                                </div>
                                <div class="sosmed-field">
                                    <label>Nama Halaman <span class="sosmed-hint">(tampil di halaman Kontak)</span></label>
                                    <input type="text"
                                           name="sosmed_fb_label"
                                           value="{{ $stats->sosmed_fb_label }}"
                                           placeholder="Tazhimussunnah"
                                           class="sosmed-input">
                                </div>
                            </div>
                        </div>

                        <!-- TikTok -->
                        <div class="sosmed-card">
                            <div class="sosmed-card-header" style="background: linear-gradient(135deg, #010101, #333333);">
                                <div class="sosmed-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .8.11V9.4a6.27 6.27 0 0 0-3.66.18A6.33 6.33 0 0 0 2 15.63a6.34 6.34 0 0 0 10.94 4.43 6.26 6.26 0 0 0 1.88-4.43V7.82a8.23 8.23 0 0 0 4.77 1.53V6.69z"/></svg>
                                </div>
                                <div class="sosmed-card-title">TikTok</div>
                            </div>
                            <div class="sosmed-card-body">
                                <div class="sosmed-preview-row">
                                    <span class="sosmed-preview-label">Link Saat Ini:</span>
                                    @if($stats->sosmed_tt)
                                        <a href="{{ $stats->sosmed_tt }}" target="_blank" class="sosmed-preview-link">{{ $stats->sosmed_tt }}</a>
                                    @else
                                        <span class="sosmed-preview-empty">Belum diset</span>
                                    @endif
                                </div>
                                <div class="sosmed-field">
                                    <label>URL TikTok</label>
                                    <input type="url"
                                           name="sosmed_tt"
                                           value="{{ $stats->sosmed_tt }}"
                                           placeholder="https://www.tiktok.com/@info_imamsyafii"
                                           class="sosmed-input">
                                </div>
                                <div class="sosmed-field">
                                    <label>Username / Label TikTok <span class="sosmed-hint">(tampil di halaman Kontak)</span></label>
                                    <input type="text"
                                           name="sosmed_tt_label"
                                           value="{{ $stats->sosmed_tt_label }}"
                                           placeholder="@info_imamsyafii"
                                           class="sosmed-input">
                                </div>
                            </div>
                        </div>

                    </div><!-- /sosmed-edit-grid -->

                    <div style="margin-top: 40px; text-align: center;">
                        <button type="submit" class="btn-primary" style="padding: 16px 48px; border: none; cursor: pointer; font-size: 16px;">
                            Simpan Semua Link Media Sosial
                        </button>
                    </div>
                </form>
            </div>

            <!-- ===== TAB: GALLERY ===== -->
            <div id="tab-gallery" class="admin-tab-content" style="display: none;">
                @foreach([
                    'paud' => 'PAUD (Kegiatan)', 
                    'paud_ekskul' => 'PAUD (Ekstrakurikuler)', 
                    'sd' => 'SD Islam (Kegiatan)', 
                    'sd_ekskul' => 'SD Islam (Ekstrakurikuler)', 
                    'smp' => 'SMP Islam (Kegiatan)', 
                    'smp_ekskul' => 'SMP Islam (Ekstrakurikuler)'
                ] as $key => $label)
                    @if(auth()->user()->role === 'yayasan' || str_starts_with($key, auth()->user()->role))
                    <div class="unit-card" style="padding: 32px; margin-bottom: 32px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 2px solid var(--gray-100); padding-bottom: 16px;">
                            <h3 style="font-family: var(--font-display); color: var(--navy); font-size: 24px;">Galeri Media (Foto / Video) {{ $label }}</h3>
                            <form action="{{ route('admin.upload-gallery') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 12px; align-items: center;">
                                @csrf
                                <input type="hidden" name="unit" value="{{ $key }}">
                                <input type="text" name="title" placeholder="Judul Media (opsional)" style="padding: 8px 12px; border: 1px solid var(--gray-200); border-radius: 6px; font-size: 13px;">
                                <input type="file" name="photo" accept="image/*,video/*" required style="font-size: 12px;">
                                <button type="submit" class="btn-primary" style="padding: 8px 16px; font-size: 13px; border: none; cursor: pointer;">Tambah Media</button>
                            </form>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
                            @if(isset($galleries[$key]))
                                @foreach($galleries[$key] as $item)
                                    @php
                                        $extension = pathinfo($item->path, PATHINFO_EXTENSION);
                                        $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
                                    @endphp
                                    <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 1; border: 1px solid var(--gray-200);">
                                        @if($isVideo)
                                            <video src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;" muted playsinline></video>
                                            <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.6); color: white; border-radius: 50%; width: 26px; height: 26px; display: flex; align-items: center; justify-content: center; font-size: 11px; pointer-events: none;">▶</div>
                                        @else
                                            <img src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @endif
                                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: white; padding: 8px; font-size: 11px; display: flex; justify-content: space-between; align-items: center;">
                                            <span style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->title ?? 'Tanpa Judul' }}</span>
                                            <form action="{{ route('admin.delete-gallery', $item->id) }}" method="POST" onsubmit="return confirm('Hapus media ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: #ef4444; color: white; border: none; border-radius: 4px; padding: 2px 6px; cursor: pointer; font-size: 10px;">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p style="grid-column: span 4; text-align: center; color: var(--gray-400); padding: 40px; font-style: italic;">Belum ada media galeri untuk unit ini.</p>
                            @endif
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
</div>

<script>
function switchAdminTab(btn, tabId) {
    document.querySelectorAll('.vm-tab').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.admin-tab-content').forEach(c => c.style.display = 'none');
    btn.classList.add('active');
    document.getElementById(tabId).style.display = 'block';
}

function addSubjectRow(unit) {
    const container = document.getElementById('subjects-container-' + unit);
    const index = container.children.length;
    const row = document.createElement('div');
    row.className = 'subject-item-row';
    row.style = 'display: flex; gap: 8px; margin-bottom: 8px; align-items: center;';
    row.innerHTML = `
        <input type="text" name="${unit}_subjects[${index}][icon]" placeholder="Ikon" class="admin-input" style="width: 48px; text-align: center; padding: 8px 0; border: 1.5px solid var(--gray-200); border-radius: 8px;">
        <input type="text" name="${unit}_subjects[${index}][name]" placeholder="Nama Mapel" class="admin-input" style="flex: 2; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px;" required>
        <select name="${unit}_subjects[${index}][type]" class="admin-input" style="flex: 1; padding: 8px 12px; border: 1.5px solid var(--gray-200); border-radius: 8px; background: white;">
            <option value="Islami">Islami</option>
            <option value="Umum">Umum</option>
            <option value="Perkembangan">Perkembangan</option>
            <option value="Bahasa">Bahasa</option>
        </select>
        <button type="button" onclick="this.parentElement.remove()" style="background: #ef4444; color: white; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; font-size: 13px;">✕</button>
    `;
    container.appendChild(row);
}
</script>

<style>
    .admin-input:focus { border-color: var(--gold) !important; box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1); }
    .vm-tab { font-family: var(--font-body); }

    /* ===== SOSMED EDIT GRID ===== */
    .sosmed-edit-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        margin-bottom: 8px;
    }

    .sosmed-card {
        border-radius: var(--radius-lg);
        border: 1.5px solid var(--gray-200);
        overflow: hidden;
        background: var(--white);
        box-shadow: var(--shadow);
        transition: box-shadow 0.2s;
    }
    .sosmed-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .sosmed-card-header {
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .sosmed-icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .sosmed-card-title {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
        color: #fff;
    }

    .sosmed-card-body {
        padding: 20px 24px;
    }

    .sosmed-preview-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        padding: 10px 14px;
        background: var(--gray-100);
        border-radius: 8px;
        font-size: 13px;
        flex-wrap: wrap;
    }
    .sosmed-preview-label {
        font-weight: 600;
        color: var(--gray-600);
        flex-shrink: 0;
    }
    .sosmed-preview-link {
        color: var(--navy);
        font-weight: 500;
        word-break: break-all;
        text-decoration: none;
    }
    .sosmed-preview-link:hover { text-decoration: underline; }
    .sosmed-preview-empty {
        color: var(--gray-400);
        font-style: italic;
    }

    .sosmed-field {
        margin-bottom: 16px;
    }
    .sosmed-field label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 8px;
    }
    .sosmed-hint {
        font-size: 11px;
        font-weight: 400;
        color: var(--gray-400);
    }
    .sosmed-input {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid var(--gray-200);
        border-radius: 8px;
        font-size: 14px;
        font-family: var(--font-body);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        background: var(--white);
        color: var(--navy);
    }
    .sosmed-input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.12);
    }
    .sosmed-note {
        font-size: 11px;
        color: var(--gray-400);
        margin-top: 6px;
    }

    @media (max-width: 768px) {
        .sosmed-edit-grid { grid-template-columns: 1fr; }
    }

    /* Dark mode for sosmed editor */
    body.dark-mode .sosmed-card {
        background: #1f2937;
        border-color: #374151;
    }
    body.dark-mode .sosmed-preview-row {
        background: #374151;
    }
    body.dark-mode .sosmed-preview-label { color: #94a3b8; }
    body.dark-mode .sosmed-preview-link { color: #67e8f9; }
    body.dark-mode .sosmed-field label { color: #f1f5f9; }
    body.dark-mode .sosmed-input {
        background: #111827;
        border-color: #374151;
        color: #f1f5f9;
    }
    body.dark-mode .sosmed-input:focus { border-color: #fbbf24; }
    body.dark-mode .sosmed-note { color: #64748b; }
    body.dark-mode .user-profile-bar {
        background: #1f2937 !important;
        border-color: #374151 !important;
    }
    body.dark-mode .user-profile-bar .profile-name {
        color: #f3f4f6 !important;
    }
</style>
@endsection
