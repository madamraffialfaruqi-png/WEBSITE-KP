@extends('layouts.app')

@section('content')
<div class="page active" id="page-pendaftaran">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><span class="current">Pendaftaran</span></div></div>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">PPDB {{ $stats->tahun_ajaran ?? '2025/2026' }}</div>
        <h2>Penerimaan Peserta Didik Baru</h2>
        <p>Informasi lengkap pendaftaran siswa baru tahun ajaran {{ $stats->tahun_ajaran ?? '2025/2026' }}</p>
      </div>
      <div class="ppdb-grid">
        <div class="ppdb-steps">
          <h3 style="font-family:var(--font-display);font-size:22px;color:var(--navy);margin-bottom:28px;">Alur Pendaftaran</h3>
          <div class="ppdb-step">
            <div class="ppdb-step-num">1</div>
            <div class="ppdb-step-body">
              <h4>Buka Website PPDB</h4>
              <p>Klik tombol pendaftaran untuk menuju sistem PPDB online resmi kami.</p>
            </div>
          </div>
          <div class="ppdb-step">
            <div class="ppdb-step-num">2</div>
            <div class="ppdb-step-body">
              <h4>Isi Formulir Pendaftaran</h4>
              <p>Lengkapi formulir pendaftaran online dengan data yang valid. Sertakan dokumen yang diperlukan secara digital.</p>
            </div>
          </div>
          <div class="ppdb-step">
            <div class="ppdb-step-num">3</div>
            <div class="ppdb-step-body">
              <h4>Wawancara & Tes</h4>
              <p>Calon siswa and orang tua mengikuti sesi wawancara and tes seleksi sesuai jadwal yang ditentukan oleh sistem.</p>
            </div>
          </div>
          <div class="ppdb-step">
            <div class="ppdb-step-num">4</div>
            <div class="ppdb-step-body">
              <h4>Pengumuman & Registrasi</h4>
              <p>Pengumuman hasil seleksi dapat dilihat di dashboard PPDB and dilanjutkan dengan daftar ulang.</p>
            </div>
          </div>
          <div class="ppdb-step">
            <div class="ppdb-step-num">5</div>
            <div class="ppdb-step-body">
              <h4>Orientasi Siswa Baru</h4>
              <p>Siswa yang diterima mengikuti masa orientasi sebelum tahun ajaran baru dimulai.</p>
            </div>
          </div>

          <h3 style="font-family:var(--font-display);font-size:20px;color:var(--navy);margin:36px 0 16px;">Dokumen yang Diperlukan</h3>
          <ul class="vm-list unit-card" style="border-radius:var(--radius);padding:16px;">
            <li>Akta kelahiran asli dan fotokopi</li>
            <li>Kartu Keluarga (KK)</li>
            <li>Foto terbaru ukuran 3×4 (4 lembar)</li>
            <li>Rapor terakhir (untuk SD & SMP)</li>
            <li>Ijazah / SKHUN (untuk masuk SMP)</li>
            <li>Surat keterangan sehat dari dokter</li>
          </ul>
        </div>

        <div>
          <div class="ppdb-info-card unit-card" style="padding: 24px;">
            <h3 style="font-family: var(--font-display); color: var(--navy); margin-bottom: 20px;">Info Pendaftaran</h3>
            <div class="ppdb-row" style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100);"><span class="lbl" style="color: var(--gray-600); font-size: 14px;">Status PPDB</span><span class="val" style="font-weight: 600; color: var(--green);">Dibuka Online</span></div>
            <div class="ppdb-row" style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100);"><span class="lbl" style="color: var(--gray-600); font-size: 14px;">Tahun Ajaran</span><span class="val" style="font-weight: 600;">{{ $stats->tahun_ajaran ?? '2025 / 2026' }}</span></div>
            <div class="ppdb-row" style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100);"><span class="lbl" style="color: var(--gray-600); font-size: 14px;">Unit Tersedia</span><span class="val" style="font-weight: 600;">PAUD, SD, SMP</span></div>
            <div class="ppdb-row" style="display: flex; justify-content: space-between; padding: 12px 0;"><span class="lbl" style="color: var(--gray-600); font-size: 14px;">Sistem</span><span class="val" style="font-weight: 600;">PPDB Online</span></div>
            
            <div style="margin-top: 24px;">
                <a href="https://ppdbsekolahislamimamsyafii.sch.id/ppdb/" target="_blank" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 14px; text-decoration: none; font-size: 16px; border: none; cursor: pointer; background: #c6f00c !important; color: #091e15 !important; font-weight: 700; border-radius: var(--radius);">
                  Daftar Online Sekarang
                </a>
            </div>
          </div>

          <div class="unit-card" style="margin-top:24px;padding:24px;">
            <h4 style="font-family:var(--font-display);color:var(--navy);margin-bottom:16px;">Lokasi Sekolah</h4>
            <div class="map-slot" style="border-radius: var(--radius); overflow: hidden; border: 1px solid var(--gray-200);">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.320904613902!2d106.56662091006723!3d-6.351275372533055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e2542ff4a1ed%3A0x3b22f670cab98054!2sSekolah%20Islam%20Imam%20Syafii!5e0!3m2!1sid!2sid!4v1776224359089!5m2!1sid!2sid" width="100%" height="240" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p style="font-size:13px;color:var(--gray-600);margin-top:12px; line-height: 1.5;">Jl. Raya Dago, RT.004/RW.001 Desa Kabasiran, Kec. Parungpanjang, Kab. Bogor, Jawa Barat</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
