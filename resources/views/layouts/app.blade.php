<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title>@yield('title', "Sekolah Islam Imam Syafi'i – Parungpanjang, Bogor")</title>
    <meta name="title" content="@yield('title', "Sekolah Islam Imam Syafi'i – Parungpanjang, Bogor")">
    <meta name="description" content="@yield('meta_description', 'Website Resmi Sekolah Islam Imam Syafi\'i. Menyediakan pendidikan PAUD, SD, dan SMP berkualitas dengan nilai-nilai Islam di Parungpanjang, Bogor.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Sekolah Islam, PAUD, SD Islam, SMP Islam, Sekolah Parungpanjang, Pendidikan Islam Bogor, Imam Syafi\'i')">
    <meta name="author" content="Sekolah Islam Imam Syafi'i">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', "Sekolah Islam Imam Syafi'i – Parungpanjang, Bogor")">
    <meta property="og:description" content="@yield('meta_description', 'Website Resmi Sekolah Islam Imam Syafi\'i. Menyediakan pendidikan PAUD, SD, dan SMP berkualitas dengan nilai-nilai Islam di Parungpanjang, Bogor.')">
    <meta property="og:image" content="{{ asset('images/SekolahImamSyafi\'i.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', "Sekolah Islam Imam Syafi'i – Parungpanjang, Bogor")">
    <meta property="twitter:description" content="@yield('meta_description', 'Website Resmi Sekolah Islam Imam Syafi\'i. Menyediakan pendidikan PAUD, SD, dan SMP berkualitas dengan nilai-nilai Islam di Parungpanjang, Bogor.')">
    <meta property="twitter:image" content="{{ asset('images/SekolahImamSyafi\'i.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Structured Data / JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "School",
      "name": "Sekolah Islam Imam Syafi'i",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/SekolahImamSyafi\'i.png') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Raya Dago, RT.004/RW.001 Desa Kabasiran",
        "addressLocality": "Parungpanjang",
        "addressRegion": "Bogor",
        "postalCode": "16360",
        "addressCountry": "ID"
      },
      "telephone": "+{{ $stats->sosmed_wa ?? '628123456789' }}",
      "sameAs": [
        "{{ $stats->sosmed_fb ?? 'https://www.facebook.com/Tazhimussunnah/' }}",
        "{{ $stats->sosmed_ig ?? 'https://www.instagram.com/info_imamsyafii/' }}",
        "{{ $stats->sosmed_yt ?? 'https://www.youtube.com/c/TazhimusSunnah/videos' }}"
      ]
    }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=3.1">
    <!-- Swiper.js for premium sliders -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>

<!-- ===== HEADER ===== -->
<header>
  <div class="nav-inner">
    <a class="nav-brand" href="{{ route('home') }}" style="cursor:pointer">
      <div class="nav-logo-placeholder">
        <img src="{{ asset('images/SekolahImamSyafi\'i.png') }}" alt="Logo" onerror="this.style.display='none'; this.parentElement.textContent='IS'">
      </div>
      <div class="nav-brand-text">
        <h1>Sekolah Islam Imam Syafi'i</h1>
        <p>Parungpanjang, Bogor</p>
      </div>
    </a>
    <nav id="main-nav">
      <a href="{{ route('home') }}" id="nav-beranda" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('profil') }}" id="nav-profil" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
      <a href="{{ route('akademik') }}" id="nav-akademik" class="{{ request()->routeIs('akademik') ? 'active' : '' }}">Akademik</a>
      <a href="{{ route('galeri') }}" id="nav-galeri" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
      <a href="{{ route('pendaftaran') }}" id="nav-pendaftaran" class="{{ request()->routeIs('pendaftaran') ? 'active' : '' }}">Pendaftaran</a>
      <a href="{{ route('kontak') }}" id="nav-kontak" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
    </nav>
    <div style="display: flex; align-items: center; gap: 10px;">
      <a href="https://wa.me/{{ $stats->sosmed_wa ?? '628123456789' }}" target="_blank" class="btn-cta">Hubungi Kami</a>
      <button id="theme-toggle" class="theme-toggle" aria-label="Toggle Dark Mode" style="background: var(--gray-100); border: 1px solid var(--gray-200); border-radius: 50%; width: 40px; height: 40px; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; color: var(--navy);">
        <span class="icon-light">☀️</span>
        <span class="icon-dark" style="display: none;">🌙</span>
      </button>
    </div>
    <button class="hamburger" onclick="toggleMobileNav()">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

@yield('content')

<!-- ===== FOOTER (shared) ===== -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <h3>Sekolah Islam Imam Syafi'i</h3>
      <p>Jl. Raya Dago, RT.004/RW.001 Desa Kabasiran, Kec. Parungpanjang, Kab. Bogor, Jawa Barat.</p>
      @php
        $show_fb = $stats->sosmed_fb ?? 'https://www.facebook.com/Tazhimussunnah/';
        $show_ig = $stats->sosmed_ig ?? 'https://www.instagram.com/info_imamsyafii/';
        $show_yt = $stats->sosmed_yt ?? 'https://www.youtube.com/c/TazhimusSunnah/videos';
        $show_wa = $stats->sosmed_wa ?? '628123456789';
        $show_tt = $stats->sosmed_tt ?? null;

        $active_count = 0;
        if ($show_fb) $active_count++;
        if ($show_ig) $active_count++;
        if ($show_yt) $active_count++;
        if ($show_wa) $active_count++;
        if ($show_tt) $active_count++;
      @endphp
      <div class="footer-social {{ $active_count >= 5 ? 'has-5-items' : '' }}">
        <!-- Facebook -->
        @if($show_fb)
        <a href="{{ $show_fb }}" target="_blank" title="Facebook" aria-label="Facebook">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        @endif
        <!-- Instagram -->
        @if($show_ig)
        <a href="{{ $show_ig }}" target="_blank" title="Instagram" aria-label="Instagram">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        @endif
        <!-- YouTube -->
        @if($show_yt)
        <a href="{{ $show_yt }}" target="_blank" title="YouTube" aria-label="YouTube">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
        </a>
        @endif
        <!-- WhatsApp -->
        @if($show_wa)
        <a href="https://wa.me/{{ $show_wa }}" target="_blank" title="WhatsApp" aria-label="WhatsApp">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        @endif
        <!-- TikTok -->
        @if($show_tt)
        <a href="{{ $show_tt }}" target="_blank" title="TikTok" aria-label="TikTok">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .8.11V9.4a6.27 6.27 0 0 0-3.66.18A6.33 6.33 0 0 0 2 15.63a6.34 6.34 0 0 0 10.94 4.43 6.26 6.26 0 0 0 1.88-4.43V7.82a8.23 8.23 0 0 0 4.77 1.53V6.69z"/></svg>
        </a>
        @endif
      </div>
    </div>
    <div class="footer-col">
      <h4>Jenjang</h4>
      <ul>
        <li><a href="{{ route('paud') }}">PAUD</a></li>
        <li><a href="{{ route('sd') }}">SD Islam</a></li>
        <li><a href="{{ route('smp') }}">SMP Islam</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Informasi</h4>
      <ul>
        <li><a href="{{ route('profil') }}">Profil Sekolah</a></li>
        <li><a href="{{ route('akademik') }}">Akademik</a></li>
        <li><a href="{{ route('galeri') }}">Galeri</a></li>
        <li><a href="{{ route('pendaftaran') }}">Pendaftaran</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Kontak</h4>
      <ul>
        <li><a href="https://wa.me/{{ $stats->sosmed_wa ?? '628123456789' }}">{{ $stats->sosmed_wa ? '0' . substr($stats->sosmed_wa, 2) : '0812-3456-789' }}</a></li>
        <li><a href="{{ route('kontak') }}">Lihat Peta</a></li>
        <li><a href="mailto:info@imamsyafii.sch.id">Email Kami</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Yayasan Ta'zhimus Sunnah. All Rights Reserved.</span>
    <span>Sekolah Islam Imam Syafi'i – Parungpanjang, Bogor</span>
    <div style="margin-top: 10px;">
        <a href="{{ route('admin.index') }}" style="color: rgba(255,255,255,0.3); font-size: 11px; text-decoration: none;">Admin Panel</a>
    </div>
  </div>
</footer>

<!-- Swiper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
// ===== MOBILE NAV =====
function toggleMobileNav() {
  const nav = document.getElementById('main-nav');
  if (nav.style.display === 'flex') { nav.style.display = ''; } 
  else { 
    nav.style.display = 'flex'; nav.style.flexDirection = 'column'; nav.style.position = 'absolute'; nav.style.top = '72px'; nav.style.left = '0'; nav.style.right = '0'; 
    nav.style.background = document.body.classList.contains('dark-mode') ? '#1f2937' : '#fff'; 
    nav.style.padding = '16px'; nav.style.boxShadow = '0 8px 24px rgba(0,0,0,0.12)'; nav.style.zIndex = '998'; 
  }
}

// ===== THEME TOGGLE =====
const themeToggleBtn = document.getElementById('theme-toggle');
if (themeToggleBtn) {
    const iconLight = themeToggleBtn.querySelector('.icon-light');
    const iconDark = themeToggleBtn.querySelector('.icon-dark');

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.body.classList.add('dark-mode');
        iconLight.style.display = 'none';
        iconDark.style.display = 'block';
    }

    themeToggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            iconLight.style.display = 'none';
            iconDark.style.display = 'block';
        } else {
            localStorage.setItem('theme', 'light');
            iconLight.style.display = 'block';
            iconDark.style.display = 'none';
        }
    });
}

</script>

@stack('scripts')

</body>
</html>
