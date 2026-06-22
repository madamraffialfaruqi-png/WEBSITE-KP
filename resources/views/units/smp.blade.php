@extends('layouts.app')

@section('content')
<div class="page active" id="page-program-smp">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><a href="{{ route('akademik') }}">Program</a><span class="sep">›</span><span class="current">SMP Islam</span></div></div>
  <div class="program-hero">
    <div class="program-hero-inner container">
      <div>
        <div class="program-badge">Unit SMP Islam</div>
        <h1>Sekolah Menengah Pertama Islam</h1>
        <p>Mempersiapkan generasi penerus yang cerdas, mandiri, and berpegang teguh pada Al-Qur'an and Sunnah, siap melanjutkan ke jenjang lebih tinggi.</p>
        <div class="program-stats-row">
          <div class="ps-item"><div class="ps-num" id="ph-smp-siswa">{{ number_format($siswa, 0, ',', '.') }}</div><div class="ps-lbl">Siswa</div></div>
          <div class="ps-item"><div class="ps-num" id="ph-smp-guru">{{ number_format($guru, 0, ',', '.') }}</div><div class="ps-lbl">Guru</div></div>
          <div class="ps-item"><div class="ps-num">3</div><div class="ps-lbl">Tingkat Kelas</div></div>
        </div>
        <div style="margin-top:24px;display:flex;gap:12px;flex-wrap:wrap;">
          <a href="https://ppdbsekolahislamimamsyafii.sch.id/ppdb/" target="_blank" class="btn-primary">Daftar Sekarang</a>
        </div>
      </div>
      <div class="program-photo-slot" style="position: relative; overflow: hidden; border: none; background: var(--navy);">
        @if($photo)
          <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
        @else
          <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; width: 100%; border: 2px dashed rgba(245,158,11,0.4); border-radius: var(--radius);">

            <div style="font-weight:600;color:rgba(245,158,11,0.8);font-size:12px;letter-spacing:0.1em;text-transform:uppercase">Foto Kegiatan SMP</div>
            <div style="font-size:12px">Ganti dengan foto asli kegiatan SMP</div>
          </div>
        @endif
      </div>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="program-content-grid">
        <div>
          <h2 class="program-title">Tentang SMP Islam Imam Syafi'i</h2>
          <p class="program-desc">SMP Islam Imam Syafi'i hadir untuk melanjutkan pembinaan siswa dari jenjang SD. Di sini, siswa dibekali dengan ilmu agama yang lebih mendalam, penguasaan bahasa Arab aktif, and persiapan akademik yang matang untuk melanjutkan pendidikan ke jenjang yang lebih tinggi.</p>

          <div class="visi-misi-unit-box">
            <div class="visi-misi-grid">
              <div class="visi-misi-col">
                <h4 class="visi-misi-title">Visi SMP Islam</h4>
                <p class="visi-misi-text">"{{ $stats->smp_vision ?? 'Belum diatur' }}"</p>
              </div>
              <div class="visi-misi-col divider">
                <h4 class="visi-misi-title">Misi SMP Islam</h4>
                <ul class="visi-misi-list">
                  @if(!empty($stats->smp_mission))
                    @foreach(explode("\n", str_replace("\r", "", $stats->smp_mission)) as $misi)
                      @if(!empty(trim($misi)))
                        <li class="visi-misi-item">
                          <span class="visi-misi-bullet">•</span>
                          <span>{{ trim($misi) }}</span>
                        </li>
                      @endif
                    @endforeach
                  @else
                    <li class="visi-misi-item" style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
                  @endif
                </ul>
              </div>
            </div>
          </div>

          <h2 class="program-title" style="margin-top: 40px;">Galeri Kegiatan</h2>
          <div class="detail-photo-row">
            @forelse($gallery as $item)
              @php
                $extension = pathinfo($item->path, PATHINFO_EXTENSION);
                $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
              @endphp
              <div class="detail-photo-slot program-gallery-slot">
                @if($isVideo)
                  <video src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;" controls></video>
                @else
                  <img src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @endif
                @if($item->title)
                  <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.5); color: white; padding: 4px 8px; font-size: 11px; z-index: 5; pointer-events: none;">{{ $item->title }}</div>
                @endif
              </div>
            @empty
              <div class="detail-photo-slot program-gallery-slot" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;">

                <div style="font-weight:600;color:var(--gold);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Kegiatan SMP</div>
                <div style="font-size:11px;color:var(--gray-400)">Belum ada media galeri</div>
              </div>
            @endforelse
          </div>

          <h2 class="program-title" style="margin-top: 40px;">Kegiatan Ekstrakurikuler</h2>
          <div class="detail-photo-row">
            @forelse($ekskul as $item)
              @php
                $extension = pathinfo($item->path, PATHINFO_EXTENSION);
                $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
              @endphp
              <div class="detail-photo-slot program-gallery-slot">
                @if($isVideo)
                  <video src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;" controls></video>
                @else
                  <img src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                @endif
                @if($item->title)
                  <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.5); color: white; padding: 4px 8px; font-size: 11px; z-index: 5; pointer-events: none;">{{ $item->title }}</div>
                @endif
              </div>
            @empty
              <div class="detail-photo-slot program-gallery-slot" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; grid-column: span 2; width: 100%; aspect-ratio: 16/5;">

                <div style="font-weight:600;color:var(--gold);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Ekstrakurikuler SMP</div>
                <div style="font-size:11px;color:var(--gray-400)">Belum ada media ekstrakurikuler</div>
              </div>
            @endforelse
          </div>
        </div>
        <div class="program-info-sidebar">
          <h4>Informasi SMP</h4>
          <div class="ppdb-row program-info-row"><span class="lbl">Kelas</span><span class="val">7 – 9</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Usia Masuk</span><span class="val">12–13 Tahun</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Hari Belajar</span><span class="val">Senin – Jumat</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Jam</span><span class="val">07.00 – 15.30 WIB</span></div>
          <a href="https://wa.me/{{ $stats->sosmed_wa ?? '628123456789' }}" target="_blank" class="ppdb-wa-btn" style="margin-top:16px;">Tanya Info SMP</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
