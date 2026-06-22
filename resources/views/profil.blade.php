@extends('layouts.app')

@section('content')
<div class="page active" id="page-profil">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><span class="current">Profil Sekolah</span></div></div>

  <!-- Tentang Kami -->
  <section class="section">
    <div class="container">
      <div class="about-grid">
        <div class="about-photo">
          <div class="main-slot" style="overflow: hidden; border: none; aspect-ratio: 4/5;">
            @if($stats->hero_photo)
              <img src="{{ asset('storage/' . $stats->hero_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; width: 100%;">
                <div style="font-weight:600;color:var(--blue-highlight);font-size:12px;letter-spacing:0.1em;text-transform:uppercase">Foto Gedung Sekolah</div>
                <div style="font-size:12px;color:var(--gray-400)">Tampak depan / lingkungan kampus</div>
              </div>
            @endif
          </div>
        </div>
        <div class="about-content" style="padding-bottom:40px;">
          <div class="about-eyebrow">Profil Sekolah</div>
          <h2>Sekolah Islam Imam Syafi'i</h2>
          <div class="profile-about-text">
            @if(!empty($stats->school_profile_desc))
              @foreach(explode("\n", str_replace("\r", "", $stats->school_profile_desc)) as $para)
                @if(!empty(trim($para)))
                  <p style="margin-bottom: 16px;">{{ trim($para) }}</p>
                @endif
              @endforeach
            @else
              <p>Deskripsi Profil Sekolah belum diatur.</p>
            @endif
          </div>

          <div class="vm-tabs" style="margin-top: 32px;">
            <button class="vm-tab active" onclick="switchTab(this, 'visi')">Visi</button>
            <button class="vm-tab" onclick="switchTab(this, 'misi')">Misi</button>
            <button class="vm-tab" onclick="switchTab(this, 'tujuan')">Tujuan</button>
          </div>

          <div class="vm-content active" id="tab-visi">
            <div class="vm-text">
              <strong class="profile-vm-label">VISI</strong>
              {{ $stats->school_vision ?? 'Belum diatur' }}
            </div>
          </div>

          <div class="vm-content" id="tab-misi">
            <div class="vm-list-wrapper">
              <strong class="profile-vm-label" style="margin-bottom: 12px;">MISI</strong>
              <ul class="vm-list" style="border: none; padding: 0;">
                @if(!empty($stats->school_mission))
                  @foreach(explode("\n", str_replace("\r", "", $stats->school_mission)) as $misi)
                    @if(!empty(trim($misi)))
                      <li>{{ trim($misi) }}</li>
                    @endif
                  @endforeach
                @else
                  <li style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
                @endif
              </ul>
            </div>
          </div>

          <div class="vm-content" id="tab-tujuan">
            <div class="vm-list-wrapper">
              <strong class="profile-vm-label" style="margin-bottom: 12px;">TUJUAN</strong>
              <ul class="vm-list" style="border: none; padding: 0;">
                @if(!empty($stats->school_tujuan))
                  @foreach(explode("\n", str_replace("\r", "", $stats->school_tujuan)) as $tujuan)
                    @if(!empty(trim($tujuan)))
                      <li>{{ trim($tujuan) }}</li>
                    @endif
                  @endforeach
                @else
                  <li style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Visi Misi Jenjang -->
  <section class="section profile-units-section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Visi & Misi Unit</div>
        <h2>Visi & Misi Setiap Jenjang</h2>
        <p>Arah dan tujuan pendidikan yang spesifik disesuaikan dengan tumbuh kembang anak didik pada setiap unit sekolah.</p>
      </div>
      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; margin-top: 40px;">
        <!-- PAUD -->
        <div class="profile-unit-card">
          <div class="profile-unit-badge">Unit PAUD</div>
          <h3 class="profile-unit-title">PAUD Islam</h3>
          <div style="margin-bottom: 20px; flex: 1;">
            <h4 class="profile-unit-subtitle">Visi</h4>
            <p class="profile-unit-text">"{{ $stats->paud_vision ?? 'Belum diatur' }}"</p>
          </div>
          <div class="profile-unit-divider">
            <h4 class="profile-unit-subtitle">Misi</h4>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px;">
              @if(!empty($stats->paud_mission))
                @foreach(explode("\n", str_replace("\r", "", $stats->paud_mission)) as $misi)
                  @if(!empty(trim($misi)))
                    <li class="profile-unit-li">
                      <span style="color: var(--blue-highlight); font-weight: bold;">•</span>
                      <span>{{ trim($misi) }}</span>
                    </li>
                  @endif
                @endforeach
              @else
                <li class="profile-unit-li" style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
              @endif
            </ul>
          </div>
        </div>

        <!-- SD -->
        <div class="profile-unit-card">
          <div class="profile-unit-badge">Unit SD Islam</div>
          <h3 class="profile-unit-title">SD Islam</h3>
          <div style="margin-bottom: 20px; flex: 1;">
            <h4 class="profile-unit-subtitle">Visi</h4>
            <p class="profile-unit-text">"{{ $stats->sd_vision ?? 'Belum diatur' }}"</p>
          </div>
          <div class="profile-unit-divider">
            <h4 class="profile-unit-subtitle">Misi</h4>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px;">
              @if(!empty($stats->sd_mission))
                @foreach(explode("\n", str_replace("\r", "", $stats->sd_mission)) as $misi)
                  @if(!empty(trim($misi)))
                    <li class="profile-unit-li">
                      <span style="color: var(--blue-highlight); font-weight: bold;">•</span>
                      <span>{{ trim($misi) }}</span>
                    </li>
                  @endif
                @endforeach
              @else
                <li class="profile-unit-li" style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
              @endif
            </ul>
          </div>
        </div>

        <!-- SMP -->
        <div class="profile-unit-card">
          <div class="profile-unit-badge">Unit SMP Islam</div>
          <h3 class="profile-unit-title">SMP Islam</h3>
          <div style="margin-bottom: 20px; flex: 1;">
            <h4 class="profile-unit-subtitle">Visi</h4>
            <p class="profile-unit-text">"{{ $stats->smp_vision ?? 'Belum diatur' }}"</p>
          </div>
          <div class="profile-unit-divider">
            <h4 class="profile-unit-subtitle">Misi</h4>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px;">
              @if(!empty($stats->smp_mission))
                @foreach(explode("\n", str_replace("\r", "", $stats->smp_mission)) as $misi)
                  @if(!empty(trim($misi)))
                    <li class="profile-unit-li">
                      <span style="color: var(--blue-highlight); font-weight: bold;">•</span>
                      <span>{{ trim($misi) }}</span>
                    </li>
                  @endif
                @endforeach
              @else
                <li class="profile-unit-li" style="color: var(--gray-400); font-style: italic;">Belum diatur</li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sejarah -->
  <section class="section profile-history-section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Sejarah</div>
        <h2>Perjalanan Kami</h2>
      </div>
      <div style="max-width:720px;margin:0 auto;position:relative;">
        <div class="history-timeline-line"></div>
        <div style="display:flex;flex-direction:column;gap:28px;">
          <div style="display:flex;gap:24px;align-items:flex-start;">
            <div class="history-year">2012</div>
            <div class="history-card">
              <h4 class="history-card-title">Pendirian Yayasan</h4>
              <p class="history-card-desc">Yayasan Ta'zhimus Sunnah didirikan dan mulai merintis unit PAUD sebagai langkah awal.</p>
            </div>
          </div>
          <div style="display:flex;gap:24px;align-items:flex-start;">
            <div class="history-year">2015</div>
            <div class="history-card">
              <h4 class="history-card-title">Pembukaan SD Islam</h4>
              <p class="history-card-desc">Unit Sekolah Dasar Islam resmi dibuka, melanjutkan pembinaan siswa dari jenjang PAUD.</p>
            </div>
          </div>
          <div style="display:flex;gap:24px;align-items:flex-start;">
            <div class="history-year">2019</div>
            <div class="history-card">
              <h4 class="history-card-title">Pembukaan SMP Islam</h4>
              <p class="history-card-desc">Jenjang Sekolah Menengah Pertama dibuka untuk memenuhi kebutuhan lulusan SD Islam.</p>
            </div>
          </div>
          <div style="display:flex;gap:24px;align-items:flex-start;">
            <div class="history-year active">Kini</div>
            <div class="history-card active">
              <h4 class="history-card-title" style="color: var(--blue-highlight);">Terus Berkembang</h4>
              <p class="history-card-desc" style="color: rgba(255,255,255,0.7);">Tiga unit pendidikan beroperasi penuh, terus meningkatkan kualitas pengajaran dan fasilitas.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




</div>
@endsection

@push('scripts')
<script>
function switchTab(btn, tabId) {
  btn.closest('.about-content').querySelectorAll('.vm-tab').forEach(t => t.classList.remove('active'));
  btn.closest('.about-content').querySelectorAll('.vm-content').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('tab-' + tabId).classList.add('active');
}
</script>
@endpush
