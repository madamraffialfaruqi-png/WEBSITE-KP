@extends('layouts.app')

@section('content')
<div class="page active" id="page-beranda">

  <!-- Hero -->
  <section class="hero">
    <div class="hero-inner">
      <div>
        <div class="hero-tag">Penerimaan Siswa Baru {{ $stats->tahun_ajaran ?? '2025/2026' }}</div>
        <h2>Mencetak Generasi <span>Berakhlak Mulia</span> & Berilmu</h2>
        <p>Sekolah Islam Imam Syafi'i menyelenggarakan pendidikan PAUD, SD, dan SMP berdasarkan Al-Qur'an dan Sunnah di Parungpanjang, Bogor.</p>
        <div class="hero-btns">
          <a class="btn-primary" href="{{ route('akademik') }}">Lihat Program</a>
          <a class="btn-outline" href="{{ route('profil') }}">Tentang Kami</a>
        </div>
      </div>
      <div class="hero-stats-card" style="box-shadow: var(--shadow-lg); border: none; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
        <div class="hero-photo-slot" style="position: relative; overflow: hidden; border: none; background: var(--gray-800); border-radius: var(--radius);">
          @if($stats->hero_photo)
            <img src="{{ asset('storage/' . $stats->hero_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/school.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;">
            <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(0,0,0,0.5); color: white; padding: 4px 10px; border-radius: 50px; font-size: 10px;">Gedung Sekolah</div>
          @endif
        </div>
        <div class="stats-grid">
          <div class="stat-card" style="background: rgba(255,255,255,0.15);">
            <div class="stat-num" id="stat-total-siswa">{{ number_format($total_siswa, 0, ',', '.') }}</div>
            <div class="stat-label">Total Siswa</div>
          </div>
          <div class="stat-card" style="background: rgba(255,255,255,0.15);">
            <div class="stat-num" id="stat-total-guru">{{ number_format($total_guru, 0, ',', '.') }}</div>
            <div class="stat-label">Tenaga Pengajar</div>
          </div>
          <div class="stat-card" style="background: rgba(255,255,255,0.15);">
            <div class="stat-num">3</div>
            <div class="stat-label">Unit Pendidikan</div>
          </div>
          <div class="stat-card" style="background: rgba(255,255,255,0.15);">
            <div class="stat-num">2012</div>
            <div class="stat-label">Tahun Berdiri</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Notice: cara input angka -->
  <div class="section-sm" style="padding-top: 40px; padding-bottom: 0;">
    <div class="container">
      <div class="notice-box" style="background: var(--white); border: 1px solid var(--gray-200); border-left: 5px solid var(--gold); border-radius: var(--radius); display: flex; align-items: center; gap: 20px; padding: 20px; box-shadow: var(--shadow);">

        <div>
            <h4 style="color: var(--navy); margin-bottom: 4px;">Pendidikan Berbasis Sunnah</h4>
            <p style="font-size: 14px; color: var(--gray-600); margin: 0;">Membentuk aqidah yang lurus dan akhlak yang mulia sesuai pemahaman generasi salafus shalih.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Unit Cards -->
  <section class="section" style="padding-top: 60px;">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Lembaga Pendidikan</div>
        <h2>Jenjang Pendidikan Kami</h2>
        <p>Membina dari usia dini hingga jenjang menengah pertama dengan kurikulum integratif</p>
      </div>
      <div class="units-grid">

        <!-- PAUD -->
        <div class="unit-card animate-up">
          <div class="unit-card-photo" style="border: none; background: var(--gray-100);">
            <div class="slot-badge">PAUD</div>
            @if($stats->paud_photo)
              <img src="{{ asset('storage/' . $stats->paud_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <img src="{{ asset('images/placeholders/paud1.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
          </div>
          <div class="unit-card-body">
            <div class="unit-card-logo">
              <img src="{{ asset('images/PAUD.png') }}" alt="PAUD" onerror="this.style.display='none';this.parentElement.textContent='PA'">
            </div>
            <h4>PAUD</h4>
            <p>Pendidikan anak usia dini dengan pembiasaan adab Islami, hafalan doa harian, dan stimulasi tumbuh kembang optimal.</p>
            <div class="unit-mini-stats">
              <div class="unit-mini-stat">
                <div class="num" id="num-paud-siswa">{{ number_format($paud_siswa, 0, ',', '.') }}</div>
                <div class="lbl">Siswa</div>
              </div>
              <div class="unit-mini-stat">
                <div class="num" id="num-paud-guru">{{ number_format($paud_guru, 0, ',', '.') }}</div>
                <div class="lbl">Guru</div>
              </div>
            </div>
            <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
              <a href="{{ route('paud') }}" class="unit-card-link" style="text-decoration:none; color: var(--blue-highlight); font-weight: 700;">Selengkapnya →</a>
            </div>
          </div>
        </div>

        <!-- SD -->
        <div class="unit-card animate-up">
          <div class="unit-card-photo" style="border: none; background: var(--gray-100);">
            <div class="slot-badge">SD</div>
            @if($stats->sd_photo)
              <img src="{{ asset('storage/' . $stats->sd_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <img src="{{ asset('images/placeholders/reading.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
          </div>
          <div class="unit-card-body">
            <div class="unit-card-logo">
              <img src="{{ asset('images/SD.png') }}" alt="SD" onerror="this.style.display='none';this.parentElement.textContent='SD'">
            </div>
            <h4>SD Islam</h4>
            <p>Kurikulum integratif yang menekankan literasi, numerasi, dan ilmu syar'i untuk membentuk karakter islami sejak dini.</p>
            <div class="unit-mini-stats">
              <div class="unit-mini-stat">
                <div class="num" id="num-sd-siswa">{{ number_format($sd_siswa, 0, ',', '.') }}</div>
                <div class="lbl">Siswa</div>
              </div>
              <div class="unit-mini-stat">
                <div class="num" id="num-sd-guru">{{ number_format($sd_guru, 0, ',', '.') }}</div>
                <div class="lbl">Guru</div>
              </div>
            </div>
            <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
              <a href="{{ route('sd') }}" class="unit-card-link" style="text-decoration:none; color: var(--blue-highlight); font-weight: 700;">Selengkapnya →</a>
            </div>
          </div>
        </div>

        <!-- SMP -->
        <div class="unit-card animate-up">
          <div class="unit-card-photo" style="border: none; background: var(--gray-100);">
            <div class="slot-badge">SMP</div>
            @if($stats->smp_photo)
              <img src="{{ asset('storage/' . $stats->smp_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <img src="{{ asset('images/placeholders/paud3.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
          </div>
          <div class="unit-card-body">
            <div class="unit-card-logo">
              <img src="{{ asset('images/SMP.png') }}" alt="SMP" onerror="this.style.display='none';this.parentElement.textContent='SM'">
            </div>
            <h4>SMP Islam</h4>
            <p>Mempersiapkan kemandirian siswa dengan penguasaan bahasa Arab, Inggris, dan karakter islami yang kuat.</p>
            <div class="unit-mini-stats">
              <div class="unit-mini-stat">
                <div class="num" id="num-smp-siswa">{{ number_format($smp_siswa, 0, ',', '.') }}</div>
                <div class="lbl">Siswa</div>
              </div>
              <div class="unit-mini-stat">
                <div class="num" id="num-smp-guru">{{ number_format($smp_guru, 0, ',', '.') }}</div>
                <div class="lbl">Guru</div>
              </div>
            </div>
            <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
              <a href="{{ route('smp') }}" class="unit-card-link" style="text-decoration:none; color: var(--blue-highlight); font-weight: 700;">Selengkapnya →</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="section-sm" style="background: var(--navy); color: var(--white); background-image: linear-gradient(rgba(12,26,50,0.8), rgba(12,26,50,0.8)), url('{{ $stats->hero_photo ? asset("storage/" . $stats->hero_photo) : asset("images/placeholders/school.png") }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container" style="display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap; position: relative; z-index: 1;">
      <div>
        <h3 style="font-family:var(--font-display);font-size:28px;margin-bottom:8px;">Bergabung Bersama Kami</h3>
        <p style="color:rgba(255,255,255,0.7);font-size:16px;">Penerimaan siswa baru tahun ajaran {{ $stats->tahun_ajaran ?? '2025/2026' }} sedang dibuka untuk semua jenjang.</p>
      </div>
      <a href="https://ppdbsekolahislamimamsyafii.sch.id/ppdb/" target="_blank" class="btn-primary" style="white-space:nowrap; padding: 16px 32px; font-size: 16px; box-shadow: 0 4px 15px rgba(245,158,11,0.4);">Daftar Online (PPDB)</a>
    </div>
  </section>

  <!-- Foto Kegiatan Unggulan -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Kegiatan</div>
        <h2>Sekilas Kehidupan Sekolah</h2>
        <p>Suasana belajar, ibadah, dan kegiatan siswa di Sekolah Islam Imam Syafi'i</p>
      </div>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);grid-template-rows:auto auto;gap:16px;">
        <!-- Foto 1 (Besar/Tall) -->
        <div class="photo-slot" style="grid-column:1;grid-row:1/3;aspect-ratio:2/3; overflow: hidden; border: none;">
          @if($stats->kegiatan_1)
            <img src="{{ asset('storage/' . $stats->kegiatan_1) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/school.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            <div style="position: absolute; color: var(--gray-400); font-size: 12px;">Foto Kegiatan 1</div>
          @endif
        </div>

        <!-- Foto 2 -->
        <div class="photo-slot" style="aspect-ratio:16/9; overflow: hidden; border: none;">
          @if($stats->kegiatan_2)
            <img src="{{ asset('storage/' . $stats->kegiatan_2) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/praying.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
          @endif
        </div>

        <!-- Foto 3 -->
        <div class="photo-slot" style="aspect-ratio:16/9; overflow: hidden; border: none;">
          @if($stats->kegiatan_3)
            <img src="{{ asset('storage/' . $stats->kegiatan_3) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/reading.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
          @endif
        </div>

        <!-- Foto 4 -->
        <div class="photo-slot" style="aspect-ratio:16/9; overflow: hidden; border: none;">
          @if($stats->kegiatan_4)
            <img src="{{ asset('storage/' . $stats->kegiatan_4) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/paud1.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
          @endif
        </div>

        <!-- Foto 5 -->
        <div class="photo-slot" style="aspect-ratio:16/9; overflow: hidden; border: none;">
          @if($stats->kegiatan_5)
            <img src="{{ asset('storage/' . $stats->kegiatan_5) }}" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('images/placeholders/paud2.png') }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
          @endif
        </div>
      </div>
      <div style="text-align:center;margin-top:40px;">
        <a class="btn-primary" style="background:var(--navy);color:var(--white); padding: 14px 40px;" href="{{ route('galeri') }}">Lihat Semua Galeri</a>
      </div>
    </div>
  </section>

</div>
@endsection
