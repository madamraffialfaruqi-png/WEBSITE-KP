@extends('layouts.app')

@section('content')
<div class="page active" id="page-kontak">
  <div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Beranda</a><span class="sep">›</span><span class="current">Kontak</span></div></div>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div class="eyebrow">Hubungi Kami</div>
        <h2>Kontak &amp; Lokasi</h2>
        <p>Kami siap menjawab pertanyaan Anda seputar pendidikan dan pendaftaran</p>
      </div>
      <div class="kontak-grid">
        <div>
          <!-- Alamat -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-loc">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            </div>
            <div>
              <h4>Alamat</h4>
              <p>Jl. Raya Dago, RT.004/RW.001 Desa Kabasiran,<br>Kec. Parungpanjang, Kab. Bogor, Jawa Barat.</p>
            </div>
          </div>
          <!-- WhatsApp -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-wa">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </div>
            <div>
              <h4>WhatsApp</h4>
              <p><a href="https://wa.me/{{ $stats->sosmed_wa ?? '628123456789' }}">{{ $stats->sosmed_wa ? '0' . substr($stats->sosmed_wa, 2) : '0812-3456-789' }}</a></p>
            </div>
          </div>
          <!-- Instagram -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-ig">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </div>
            <div>
              <h4>Instagram</h4>
              <p><a href="{{ $stats->sosmed_ig ?? 'https://www.instagram.com/info_imamsyafii/' }}" target="_blank">{{ $stats->sosmed_ig_label ?? '@info_imamsyafii' }}</a></p>
            </div>
          </div>
          <!-- YouTube -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-yt">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </div>
            <div>
              <h4>YouTube</h4>
              <p><a href="{{ $stats->sosmed_yt ?? 'https://www.youtube.com/c/TazhimusSunnah/videos' }}" target="_blank">{{ $stats->sosmed_yt_label ?? "Ta'zhimus Sunnah" }}</a></p>
            </div>
          </div>
          <!-- Facebook -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-fb">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </div>
            <div>
              <h4>Facebook</h4>
              <p><a href="{{ $stats->sosmed_fb ?? 'https://www.facebook.com/Tazhimussunnah/' }}" target="_blank">{{ $stats->sosmed_fb_label ?? 'Tazhimussunnah' }}</a></p>
            </div>
          </div>
          <!-- Jam Operasional -->
          <div class="kontak-info-item">
            <div class="kontak-icon kontak-icon-jam">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            </div>
            <div>
              <h4>Jam Operasional</h4>
              <p>Senin – Jumat: 07.00 – 15.00 WIB<br>Sabtu: 07.00 – 12.00 WIB</p>
            </div>
          </div>
        </div>
        <div>
          <div class="map-slot">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.320904613902!2d106.56662091006723!3d-6.351275372533055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e2542ff4a1ed%3A0x3b22f670cab98054!2sSekolah%20Islam%20Imam%20Syafii!5e0!3m2!1sid!2sid!4v1776224359089!5m2!1sid!2sid" height="320" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="kontak-form-card">
            <h4>Kirim Pesan Langsung</h4>
            <div style="display:flex;flex-direction:column;gap:12px;">
              <input type="text" id="contact-name" placeholder="Nama Anda">
              <input type="text" id="contact-wa" placeholder="Nomor WhatsApp">
              <textarea id="contact-msg" placeholder="Pesan Anda..." rows="4"></textarea>
              <button onclick="sendWAMessage()" class="ppdb-wa-btn" style="margin-top:0; width:100%; border:none; cursor:pointer;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="margin-right:8px;"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Kirim via WhatsApp
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  /* Colored icon backgrounds per platform */
  .kontak-icon {
    width: 44px; height: 44px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    color: #fff;
  }
  .kontak-icon-loc { background: #e84545; }
  .kontak-icon-wa  { background: #25d366; }
  .kontak-icon-ig  { background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
  .kontak-icon-yt  { background: #ff0000; }
  .kontak-icon-fb  { background: #1877f2; }
  .kontak-icon-jam { background: var(--navy); }

  /* Form card */
  .kontak-form-card {
    margin-top: 20px;
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 24px;
  }
  .kontak-form-card h4 {
    font-family: var(--font-display);
    color: var(--navy);
    margin-bottom: 14px;
    font-size: 18px;
  }
  .kontak-form-card input,
  .kontak-form-card textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid var(--gray-200);
    border-radius: 8px;
    font-size: 14px;
    font-family: var(--font-body);
    outline: none;
    background: var(--white);
    color: var(--navy);
    transition: border-color 0.2s;
  }
  .kontak-form-card input:focus,
  .kontak-form-card textarea:focus { border-color: var(--navy); }
  .kontak-form-card textarea { resize: vertical; }

  /* Dark mode overrides for kontak page */
  body.dark-mode .kontak-icon-jam { background: #374151; }
  body.dark-mode .kontak-info-item h4 { color: #f1f5f9; }
  body.dark-mode .kontak-info-item p  { color: #cbd5e1; }
  body.dark-mode .kontak-info-item a  { color: #67e8f9; }
  body.dark-mode .kontak-form-card {
    background: #1f2937;
    border-color: #374151;
  }
  body.dark-mode .kontak-form-card h4 { color: #f1f5f9; }
  body.dark-mode .kontak-form-card input,
  body.dark-mode .kontak-form-card textarea {
    background: #111827;
    border-color: #374151;
    color: #f1f5f9;
  }
  body.dark-mode .kontak-form-card input::placeholder,
  body.dark-mode .kontak-form-card textarea::placeholder { color: #64748b; }
  body.dark-mode .kontak-form-card input:focus,
  body.dark-mode .kontak-form-card textarea:focus { border-color: #fbbf24; }
</style>
@endsection

@push('scripts')
<script>
function sendWAMessage() {
  const nama = document.getElementById('contact-name').value || 'Tamu';
  const pesan = document.getElementById('contact-msg').value || 'Assalamualaikum';
  const text = encodeURIComponent('Assalamualaikum, nama saya ' + nama + '.\n\n' + pesan);
  window.open('https://wa.me/{{ $stats->sosmed_wa ?? "628123456789" }}?text=' + text, '_blank');
  return false;
}
</script>
@endpush
