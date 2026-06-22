@extends('layouts.app')

@section('content')
<div class="page active" id="page-program-paud">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><a href="{{ route('akademik') }}">Program</a><span class="sep">›</span><span class="current">PAUD</span></div></div>
  <div class="program-hero">
    <div class="program-hero-inner container">
      <div>
        <div class="program-badge">Unit PAUD</div>
        <h1>Pendidikan Anak Usia Dini Islam</h1>
        <p>Membangun fondasi karakter and kecintaan belajar anak usia 3–6 tahun melalui pendekatan bermain islami yang menyenangkan and terarah.</p>
        <div class="program-stats-row">
          <div class="ps-item"><div class="ps-num" id="ph-paud-siswa">{{ number_format($siswa, 0, ',', '.') }}</div><div class="ps-lbl">Siswa</div></div>
          <div class="ps-item"><div class="ps-num" id="ph-paud-guru">{{ number_format($guru, 0, ',', '.') }}</div><div class="ps-lbl">Guru</div></div>
          <div class="ps-item"><div class="ps-num">3–6</div><div class="ps-lbl">Usia (tahun)</div></div>
        </div>
        <div style="margin-top:24px;display:flex;gap:12px;flex-wrap:wrap;">
          <a href="https://ppdbsekolahislamimamsyafii.sch.id/ppdb/" target="_blank" class="btn-primary">Daftar Sekarang</a>
        </div>
      </div>
      <div class="program-photo-slot" style="position: relative; overflow: hidden; border: none; background: var(--navy); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
        <div class="swiper paud-hero-swiper" style="width: 100%; height: 100%;">
          <div class="swiper-wrapper">
            <!-- User Uploaded Photos -->
            @foreach($gallery as $item)
              <div class="swiper-slide">
                @php
                  $extension = pathinfo($item->path, PATHINFO_EXTENSION);
                  $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
                @endphp
                @if($isVideo)
                  <video src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;" autoplay muted loop playsinline></video>
                @else
                  <img src="{{ asset('storage/' . $item->path) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @endif
                <div class="slide-overlay">
                  <span>{{ $item->title ?? 'Kegiatan PAUD' }}</span>
                </div>
              </div>
            @endforeach
            
            <!-- Placeholder Photos (as requested) -->
            <div class="swiper-slide">
              <img src="{{ asset('images/placeholders/paud1.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
              <div class="slide-overlay"><span>Bermain Bersama</span></div>
            </div>
            <div class="swiper-slide">
              <img src="{{ asset('images/placeholders/paud2.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
              <div class="slide-overlay"><span>Belajar Adab</span></div>
            </div>
            <div class="swiper-slide">
              <img src="{{ asset('images/placeholders/paud3.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
              <div class="slide-overlay"><span>Lingkungan Nyaman</span></div>
            </div>
          </div>
          <!-- Swiper Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="container">
      <div class="program-content-grid">
        <div>
          <h2 class="program-title">
            Tentang Program PAUD
            <span></span>
          </h2>
          <p class="program-desc">Program PAUD Sekolah Islam Imam Syafi'i dirancang untuk memberikan stimulasi tumbuh kembang optimal kepada anak usia dini dalam suasana islami yang hangat dan menyenangkan. Kami percaya bahwa pendidikan terbaik dimulai sejak dini dengan menanamkan kecintaan pada ilmu dan akhlak mulia.</p>

          <div class="visi-misi-unit-box">
            <div class="visi-misi-grid">
              <div class="visi-misi-col">
                <h4 class="visi-misi-title">Visi PAUD</h4>
                <p class="visi-misi-text">"{{ $stats->paud_vision ?? 'Belum diatur' }}"</p>
              </div>
              <div class="visi-misi-col divider">
                <h4 class="visi-misi-title">Misi PAUD</h4>
                <ul class="visi-misi-list">
                  @if(!empty($stats->paud_mission))
                    @foreach(explode("\n", str_replace("\r", "", $stats->paud_mission)) as $misi)
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

          <div class="features-grid">
            <div class="feature-item program-feature-card gold-border">
                <h4>Kurikulum Islami</h4>
                <p>Pengenalan dasar-dasar agama dan hafalan doa harian.</p>
            </div>
            <div class="feature-item program-feature-card navy-border">
                <h4>Metode Bermain</h4>
                <p>Belajar sambil bermain yang merangsang kreativitas anak.</p>
            </div>
          </div>

          <h3 class="program-gallery-title">Galeri Kegiatan</h3>
          <div class="detail-photo-row">
            @foreach($gallery as $item)
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
              </div>
            @endforeach
          </div>

          <h3 class="program-gallery-title" style="margin-top: 40px;">Kegiatan Ekstrakurikuler</h3>
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

                <div style="font-weight:600;color:var(--gold);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Ekstrakurikuler PAUD</div>
                <div style="font-size:11px;color:var(--gray-400)">Belum ada media ekstrakurikuler</div>
              </div>
            @endforelse
          </div>
        </div>
        <div class="program-info-sidebar" style="position: sticky; top: 100px;">
          <h4>Ringkasan Informasi</h4>
          <div class="ppdb-row program-info-row"><span class="lbl">Jenjang</span><span class="val">Kelompok A & B</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Usia</span><span class="val">3–6 Tahun</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Hari Belajar</span><span class="val">Senin – Jumat</span></div>
          <div class="ppdb-row program-info-row"><span class="lbl">Jam</span><span class="val">07.30 – 11.00 WIB</span></div>
          <a href="https://wa.me/{{ $stats->sosmed_wa ?? '628123456789' }}" target="_blank" class="ppdb-wa-btn" style="margin-top:24px; display: block; text-align: center; background: #25D366; color: white; padding: 14px; border-radius: 10px; text-decoration: none; font-weight: 700; transition: opacity 0.2s;">Tanya Info via WhatsApp</a>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  .slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: white;
    padding: 20px;
    font-size: 14px;
    font-weight: 500;
  }
  .paud-hero-swiper .swiper-pagination-bullet-active {
    background: var(--gold) !important;
  }
  .paud-hero-swiper .swiper-button-next, .paud-hero-swiper .swiper-button-prev {
    color: var(--white);
    background: rgba(12, 26, 50, 0.4);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    backdrop-filter: blur(4px);
  }
  .paud-hero-swiper .swiper-button-next::after, .paud-hero-swiper .swiper-button-prev::after {
    font-size: 18px;
    font-weight: bold;
  }
</style>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.paud-hero-swiper', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
    });
  });
</script>
@endpush
@endsection
