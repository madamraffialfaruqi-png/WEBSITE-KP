@extends('layouts.app')

@section('content')
@php
    $photos = [];
    $videos = [];
    foreach($galleries as $g) {
        $extension = pathinfo($g->path, PATHINFO_EXTENSION);
        $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
        if ($isVideo) {
            $videos[] = $g;
        } else {
            $photos[] = $g;
        }
    }
@endphp

<div class="page active" id="page-galeri">
  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="sep">›</span>
      <span class="current">Galeri Kegiatan</span>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Dokumentasi</div>
        <h2>Galeri Kegiatan</h2>
        <p>Dokumentasi berbagai kegiatan akademik, islami, dan ekstrakurikuler Sekolah Islam Imam Syafi'i</p>
      </div>

      <!-- ===== PHOTO GALLERY SECTION ===== -->
      <div class="gallery-section-header">
        <h3 class="section-title">Galeri Foto</h3>
      </div>

      <div class="swiper-slider-wrapper" id="photo-slider-wrapper">
        <!-- Prev Button -->
        <button class="gallery-nav-btn gallery-prev photo-prev" aria-label="Sebelumnya">&#8592;</button>

        <!-- Swiper -->
        <div class="swiper photo-swiper">
          <div class="swiper-wrapper">
            @forelse($photos as $p)
              <div class="swiper-slide">
                <div class="galeri-item-card">
                  <img src="{{ asset('storage/' . $p->path) }}" alt="{{ $p->title ?? 'Galeri Foto' }}" loading="lazy">
                  @if($p->title)
                    <div class="galeri-item-overlay">
                      <span>{{ $p->title }}</span>
                    </div>
                  @endif
                </div>
              </div>
            @empty
              <div class="swiper-slide swiper-slide-empty">
                <p class="empty-gallery-msg">Belum ada foto galeri.</p>
              </div>
            @endforelse
          </div>
          <div class="swiper-pagination photo-pagination"></div>
        </div>

        <!-- Next Button -->
        <button class="gallery-nav-btn gallery-next photo-next" aria-label="Selanjutnya">&#8594;</button>
      </div>

      <!-- ===== VIDEO GALLERY SECTION ===== -->
      <div class="gallery-section-header" style="margin-top: 72px;">
        <h3 class="section-title">Galeri Video</h3>
      </div>

      <div class="swiper-slider-wrapper" id="video-slider-wrapper">
        <!-- Prev Button -->
        <button class="gallery-nav-btn gallery-prev video-prev" aria-label="Sebelumnya">&#8592;</button>

        <!-- Swiper -->
        <div class="swiper video-swiper">
          <div class="swiper-wrapper">
            @forelse($videos as $v)
              <div class="swiper-slide">
                <div class="galeri-item-card">
                  <video src="{{ asset('storage/' . $v->path) }}" controls preload="metadata"></video>
                  @if($v->title)
                    <div class="galeri-item-overlay" style="pointer-events: none; z-index: 5;">
                      <span>{{ $v->title }}</span>
                    </div>
                  @endif
                </div>
              </div>
            @empty
              <div class="swiper-slide swiper-slide-empty">
                <p class="empty-gallery-msg">Belum ada video galeri.</p>
              </div>
            @endforelse
          </div>
          <div class="swiper-pagination video-pagination"></div>
        </div>

        <!-- Next Button -->
        <button class="gallery-nav-btn gallery-next video-next" aria-label="Selanjutnya">&#8594;</button>
      </div>

      <!-- ===== VERTICAL GRID: ALL DOCUMENTATION ===== -->
      <div class="gallery-section-header" style="margin-top: 80px;">
        <h3 class="section-title">Semua Dokumentasi</h3>
      </div>

      <div class="galeri-grid-vertical">
        @forelse($galleries as $g)
          @php
            $extension = pathinfo($g->path, PATHINFO_EXTENSION);
            $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov']);
          @endphp
          <div class="galeri-grid-card">
            <div class="card-media-wrapper">
              @if($isVideo)
                <video src="{{ asset('storage/' . $g->path) }}" controls preload="metadata"></video>
                <div class="video-play-indicator">▶</div>
              @else
                <img src="{{ asset('storage/' . $g->path) }}" alt="{{ $g->title ?? 'Dokumentasi' }}" loading="lazy">
              @endif
            </div>
            <div class="card-info">
              <h4>{{ $g->title ?? 'Dokumentasi ' . strtoupper($g->unit) }}</h4>
              <span class="card-badge">{{ strtoupper($g->unit) }}</span>
            </div>
          </div>
        @empty
          <p style="grid-column: span 3; text-align: center; color: var(--gray-600); padding: 40px; font-style: italic;">Belum ada dokumentasi galeri.</p>
        @endforelse
      </div>

    </div>
  </section>
</div>

<style>
  /* ===== SECTION HEADER ===== */
  .gallery-section-header {
    margin-bottom: 24px;
    border-bottom: 2.5px solid var(--gray-100);
    padding-bottom: 12px;
  }
  .gallery-section-header .section-title {
    font-family: var(--font-display);
    color: var(--navy);
    font-size: 26px;
    font-weight: 700;
  }

  /* ===== SLIDER WRAPPER ===== */
  /* Outer wrapper gives room for the nav buttons on both sides */
  .swiper-slider-wrapper {
    position: relative;
    width: 100%;
    /* On desktop: add horizontal padding so buttons sit outside the swiper */
    padding: 0 56px;
    box-sizing: border-box;
  }

  /* Swiper itself — full width inside wrapper */
  .photo-swiper,
  .video-swiper {
    width: 100%;
    padding: 20px 0 52px !important;
    overflow: hidden !important;
  }

  /* ===== SLIDES ===== */
  .swiper-slide {
    height: auto;
    opacity: 0.55;
    transform: scale(0.82);
    transition: opacity 0.4s ease, transform 0.4s ease;
  }
  .swiper-slide-active {
    opacity: 1 !important;
    transform: scale(1) !important;
    z-index: 10;
  }
  .swiper-slide-empty {
    opacity: 1 !important;
    transform: none !important;
    width: 100% !important;
    text-align: center;
  }

  /* ===== NAV BUTTONS ===== */
  .gallery-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-60%); /* Slightly above center to account for pagination */
    z-index: 20;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: var(--navy);
    color: var(--white);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-weight: 700;
    font-size: 18px;
    line-height: 1;
    transition: background 0.25s, transform 0.25s, box-shadow 0.25s;
    box-shadow: 0 4px 16px rgba(12, 26, 50, 0.3);
    user-select: none;
    outline: none;
    flex-shrink: 0;
  }
  .gallery-nav-btn:hover {
    background: var(--gold);
    color: var(--navy);
    transform: translateY(-60%) scale(1.1);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
  }
  .gallery-nav-btn.swiper-button-disabled {
    opacity: 0.3;
    cursor: not-allowed;
    pointer-events: none;
  }

  /* Position nav buttons at the edges of the wrapper */
  .gallery-prev {
    left: 0;
  }
  .gallery-next {
    right: 0;
  }

  /* ===== CARD ===== */
  .galeri-item-card {
    border-radius: var(--radius);
    overflow: hidden;
    background: var(--white);
    border: 1.5px solid var(--gray-200);
    position: relative;
    aspect-ratio: 4/5;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
  }
  .galeri-item-card img,
  .galeri-item-card video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* Card overlay (title) */
  .galeri-item-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(12, 26, 50, 0.92));
    color: var(--white);
    padding: 24px 14px 14px;
    font-size: 13px;
    font-weight: 600;
    text-align: left;
  }
  .galeri-item-overlay span {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.4;
  }

  /* ===== PAGINATION ===== */
  .photo-pagination,
  .video-pagination {
    bottom: 0px !important;
  }
  .photo-pagination .swiper-pagination-bullet-active,
  .video-pagination .swiper-pagination-bullet-active {
    background: var(--navy) !important;
    width: 24px;
    border-radius: 6px;
    transition: width 0.2s ease;
  }

  .empty-gallery-msg {
    color: var(--gray-600);
    padding: 60px 20px;
    font-style: italic;
  }

  /* ===== VERTICAL GRID ===== */
  .galeri-grid-vertical {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 24px;
  }
  .galeri-grid-card {
    background: var(--white);
    border: 1.5px solid var(--gray-200);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
  }
  .galeri-grid-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
  }
  .card-media-wrapper {
    position: relative;
    aspect-ratio: 16/10;
    background: var(--gray-100);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .card-media-wrapper img,
  .card-media-wrapper video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .video-play-indicator {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0,0,0,0.55);
    color: white;
    border-radius: 50%;
    width: 26px;
    height: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    pointer-events: none;
    z-index: 10;
  }
  .card-info {
    padding: 14px 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
  }
  .card-info h4 {
    font-size: 14px;
    color: var(--navy);
    font-weight: 600;
    line-height: 1.4;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
  }
  .card-badge {
    align-self: flex-start;
    background: var(--gold-pale);
    color: var(--blue-highlight);
    border: 1px solid rgba(0, 171, 237, 0.2);
    font-size: 10px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 50px;
    letter-spacing: 0.05em;
  }

  /* ===== MOBILE RESPONSIVE ===== */
  @media (max-width: 768px) {
    /* On mobile, reduce side padding so buttons are inside at a reasonable distance */
    .swiper-slider-wrapper {
      padding: 0 44px;
    }

    .gallery-nav-btn {
      width: 38px;
      height: 38px;
      font-size: 16px;
    }

    .galeri-grid-vertical {
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }
  }

  @media (max-width: 480px) {
    .swiper-slider-wrapper {
      padding: 0 40px;
    }
    .gallery-nav-btn {
      width: 34px;
      height: 34px;
      font-size: 14px;
    }
    .galeri-grid-vertical {
      grid-template-columns: 1fr;
      gap: 14px;
    }
  }

  /* ===== DARK MODE ===== */
  body.dark-mode .gallery-section-header {
    border-color: #374151;
  }
  body.dark-mode .gallery-section-header .section-title {
    color: #f8fafc;
  }
  body.dark-mode .gallery-nav-btn {
    background: #1f2937;
    color: #f8fafc;
  }
  body.dark-mode .gallery-nav-btn:hover {
    background: var(--blue-highlight);
    color: #111827;
  }
  body.dark-mode .galeri-item-card,
  body.dark-mode .galeri-grid-card {
    background: #1f2937;
    border-color: #374151;
  }
  body.dark-mode .empty-gallery-msg {
    color: #cbd5e1;
  }
  body.dark-mode .photo-pagination .swiper-pagination-bullet-active,
  body.dark-mode .video-pagination .swiper-pagination-bullet-active {
    background: var(--blue-highlight) !important;
  }
  body.dark-mode .card-info h4 {
    color: #f8fafc;
  }
  body.dark-mode .card-badge {
    background: rgba(0, 171, 237, 0.1);
    color: var(--blue-highlight);
  }
</style>
@endsection

@push('scripts')
<script>
  // ========== PHOTO SWIPER ==========
  const photoSwiper = new Swiper('.photo-swiper', {
    effect: 'coverflow',
    centeredSlides: true,
    loop: false,
    slideToClickedSlide: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    slidesPerView: 1,
    spaceBetween: 24,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 120,
      modifier: 1,
      slideShadows: false,
    },
    grabCursor: true,
    navigation: {
      nextEl: '.photo-next',
      prevEl: '.photo-prev',
    },
    pagination: {
      el: '.photo-pagination',
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 28,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
      }
    }
  });

  // ========== VIDEO SWIPER ==========
  const videoSwiper = new Swiper('.video-swiper', {
    effect: 'coverflow',
    centeredSlides: true,
    loop: false,
    slideToClickedSlide: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    slidesPerView: 1,
    spaceBetween: 24,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 120,
      modifier: 1,
      slideShadows: false,
    },
    grabCursor: true,
    navigation: {
      nextEl: '.video-next',
      prevEl: '.video-prev',
    },
    pagination: {
      el: '.video-pagination',
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 28,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
      }
    }
  });
</script>
@endpush
