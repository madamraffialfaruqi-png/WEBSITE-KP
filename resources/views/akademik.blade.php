@extends('layouts.app')

@section('content')
<div class="page active" id="page-akademik">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><span class="current">Akademik</span></div></div>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Kurikulum & Program</div>
        <h2>Program Akademik</h2>
        <p>Kurikulum nasional dipadukan dengan ilmu syar'i untuk membentuk generasi yang seimbang dunia and akhirat</p>
      </div>
      <div class="kurikulum-grid">
        <div class="kurikulum-nav">
          <button class="kurikulum-nav-item active" onclick="switchKurikulum(this,'kpaud')">
            <div class="kni-icon">
              <img src="{{ asset('images/PAUD.png') }}" alt="PAUD Logo" style="width: 24px; height: 24px; object-fit: contain;">
            </div>
            <div class="kni-text"><div class="kni-name">PAUD</div><div class="kni-sub">Usia Dini</div></div>
          </button>
          <button class="kurikulum-nav-item" onclick="switchKurikulum(this,'ksd')">
            <div class="kni-icon">
              <img src="{{ asset('images/SD.png') }}" alt="SD Logo" style="width: 24px; height: 24px; object-fit: contain;">
            </div>
            <div class="kni-text"><div class="kni-name">SD Islam</div><div class="kni-sub">Kelas 1–6</div></div>
          </button>
          <button class="kurikulum-nav-item" onclick="switchKurikulum(this,'ksmp')">
            <div class="kni-icon">
              <img src="{{ asset('images/SMP.png') }}" alt="SMP Logo" style="width: 24px; height: 24px; object-fit: contain;">
            </div>
            <div class="kni-text"><div class="kni-name">SMP Islam</div><div class="kni-sub">Kelas 7–9</div></div>
          </button>
        </div>

        <div>
          <!-- PAUD -->
          <div class="kurikulum-detail active" id="kpaud">
            <div class="kurikulum-detail-header">
              <div class="kdh-level">Pendidikan Anak Usia Dini</div>
              <div class="kdh-title">Program PAUD</div>
              <div class="kdh-desc">{{ $stats->paud_academic_desc ?? 'Belum diatur' }}</div>
            </div>
            <div class="detail-photo-row">
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->paud_photo)
                  <img src="{{ asset('storage/' . $stats->paud_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto Kegiatan PAUD</div>
                @endif
              </div>
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->paud_photo_2)
                  <img src="{{ asset('storage/' . $stats->paud_photo_2) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto Ruang PAUD</div>
                @endif
              </div>
            </div>
            <div class="mapel-grid">
              @if(!empty($stats->paud_academic_subjects))
                @foreach($stats->paud_academic_subjects as $subject)
                  <div class="mapel-item">
                    <div class="mapel-icon">{{ $subject['icon'] ?? '' }}</div>
                    <div>
                      <div class="mapel-name">{{ $subject['name'] }}</div>
                      <div class="mapel-type">{{ $subject['type'] ?? 'Umum' }}</div>
                    </div>
                  </div>
                @endforeach
              @else
                <p style="grid-column: span 2; text-align: center; color: var(--gray-400); font-style: italic; padding: 20px;">Belum ada mata pelajaran.</p>
              @endif
            </div>
            <div style="background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius);padding:20px;">
              <h4 style="font-family:var(--font-display);color:var(--navy);margin-bottom:12px;">Keunggulan Program</h4>
              <ul style="list-style:none;display:flex;flex-direction:column;gap:8px;">
                @if(!empty($stats->paud_academic_advantages))
                  @foreach(explode("\n", str_replace("\r", "", $stats->paud_academic_advantages)) as $adv)
                    @if(!empty(trim($adv)))
                      <li style="font-size:14px;color:var(--gray-600);display:flex;gap:8px;">
                        <span style="color:var(--blue-highlight);">✓</span>
                        {{ trim($adv) }}
                      </li>
                    @endif
                  @endforeach
                @else
                  <li style="font-size:14px;color:var(--gray-400);font-style:italic;">Belum ada keunggulan program.</li>
                @endif
              </ul>
            </div>
          </div>

          <!-- SD -->
          <div class="kurikulum-detail" id="ksd">
            <div class="kurikulum-detail-header">
              <div class="kdh-level">Sekolah Dasar Islam</div>
              <div class="kdh-title">Program SD Islam</div>
              <div class="kdh-desc">{{ $stats->sd_academic_desc ?? 'Belum diatur' }}</div>
            </div>
            <div class="detail-photo-row">
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->sd_photo)
                  <img src="{{ asset('storage/' . $stats->sd_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto KBM SD</div>
                @endif
              </div>
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->sd_photo_2)
                  <img src="{{ asset('storage/' . $stats->sd_photo_2) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto Tahfidz SD</div>
                @endif
              </div>
            </div>
            <div class="mapel-grid">
              @if(!empty($stats->sd_academic_subjects))
                @foreach($stats->sd_academic_subjects as $subject)
                  <div class="mapel-item">
                    <div class="mapel-icon">{{ $subject['icon'] ?? '' }}</div>
                    <div>
                      <div class="mapel-name">{{ $subject['name'] }}</div>
                      <div class="mapel-type">{{ $subject['type'] ?? 'Umum' }}</div>
                    </div>
                  </div>
                @endforeach
              @else
                <p style="grid-column: span 2; text-align: center; color: var(--gray-400); font-style: italic; padding: 20px;">Belum ada mata pelajaran.</p>
              @endif
            </div>
            <div style="background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius);padding:20px;">
              <h4 style="font-family:var(--font-display);color:var(--navy);margin-bottom:12px;">Keunggulan Program</h4>
              <ul style="list-style:none;display:flex;flex-direction:column;gap:8px;">
                @if(!empty($stats->sd_academic_advantages))
                  @foreach(explode("\n", str_replace("\r", "", $stats->sd_academic_advantages)) as $adv)
                    @if(!empty(trim($adv)))
                      <li style="font-size:14px;color:var(--gray-600);display:flex;gap:8px;">
                        <span style="color:var(--blue-highlight);">✓</span>
                        {{ trim($adv) }}
                      </li>
                    @endif
                  @endforeach
                @else
                  <li style="font-size:14px;color:var(--gray-400);font-style:italic;">Belum ada keunggulan program.</li>
                @endif
              </ul>
            </div>
          </div>

          <!-- SMP -->
          <div class="kurikulum-detail" id="ksmp">
            <div class="kurikulum-detail-header">
              <div class="kdh-level">Sekolah Menengah Pertama Islam</div>
              <div class="kdh-title">Program SMP Islam</div>
              <div class="kdh-desc">{{ $stats->smp_academic_desc ?? 'Belum diatur' }}</div>
            </div>
            <div class="detail-photo-row">
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->smp_photo)
                  <img src="{{ asset('storage/' . $stats->smp_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto KBM SMP</div>
                @endif
              </div>
              <div class="detail-photo-slot" style="overflow: hidden; border: none; padding: 0;">
                @if($stats->smp_photo_2)
                  <img src="{{ asset('storage/' . $stats->smp_photo_2) }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <div style="font-size:24px">—</div>
                  <div style="font-weight:600;color:var(--blue-highlight);font-size:11px;text-transform:uppercase;letter-spacing:0.08em">Foto Ekskul SMP</div>
                @endif
              </div>
            </div>
            <div class="mapel-grid">
              @if(!empty($stats->smp_academic_subjects))
                @foreach($stats->smp_academic_subjects as $subject)
                  <div class="mapel-item">
                    <div class="mapel-icon">{{ $subject['icon'] ?? '' }}</div>
                    <div>
                      <div class="mapel-name">{{ $subject['name'] }}</div>
                      <div class="mapel-type">{{ $subject['type'] ?? 'Umum' }}</div>
                    </div>
                  </div>
                @endforeach
              @else
                <p style="grid-column: span 2; text-align: center; color: var(--gray-400); font-style: italic; padding: 20px;">Belum ada mata pelajaran.</p>
              @endif
            </div>
            <div style="background:var(--white);border:1px solid var(--gray-200);border-radius:var(--radius);padding:20px;">
              <h4 style="font-family:var(--font-display);color:var(--navy);margin-bottom:12px;">Keunggulan Program</h4>
              <ul style="list-style:none;display:flex;flex-direction:column;gap:8px;">
                @if(!empty($stats->smp_academic_advantages))
                  @foreach(explode("\n", str_replace("\r", "", $stats->smp_academic_advantages)) as $adv)
                    @if(!empty(trim($adv)))
                      <li style="font-size:14px;color:var(--gray-600);display:flex;gap:8px;">
                        <span style="color:var(--blue-highlight);">✓</span>
                        {{ trim($adv) }}
                      </li>
                    @endif
                  @endforeach
                @else
                  <li style="font-size:14px;color:var(--gray-400);font-style:italic;">Belum ada keunggulan program.</li>
                @endif
              </ul>
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
function switchKurikulum(btn, id) {
  document.querySelectorAll('.kurikulum-nav-item').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.kurikulum-detail').forEach(d => d.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById(id).classList.add('active');
}
</script>
@endpush
