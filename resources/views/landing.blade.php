<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dompet manis untuk uang yang rapi · Cuanis</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=DM+Sans:wght@400;500;700&family=Caveat:wght@600&display=swap" rel="stylesheet">
  <!-- Asset CSS eksternal Laravel -->
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <!-- Opsional Tailwind CDN -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  @livewireStyles
</head>

<body>
  <header class="site-header">
    <div class="topbar">
      <nav class="nav eyebrow" aria-label="Menu utama">
        <a href="#fitur">Fitur</a>
        <a href="#cara-kerja">Cara kerja</a>
      </nav>
      <a class="logo" href="{{ url('/') }}">cuanis</a>
      <div class="hero-cta" style="gap:16px">
        <a class="eyebrow" href="{{ route('login') }}">Masuk</a>
        <a class="btn" href="{{ route('register') }}">Daftar gratis</a>
      </div>
    </div>
  </header>

  <section class="hero">
    <div class="hero-text">
      <div class="eyebrow">(Catat uang, tanpa pusing)</div>
      <h1>Dompet manis untuk uang yang rapi</h1>
      <p>Catat pemasukan dan pengeluaran, atur budget tiap kategori, dan lihat ke mana uangmu pergi.</p>
      <div class="hero-cta">
        <a class="btn" href="{{ route('register') }}">Mulai gratis</a>
        <span class="hand">gratis selamanya!</span>
      </div>
    </div>
    <div class="hero-art">
      <div class="card mini-card">
        <div class="eyebrow">Pengeluaran 6 bulan</div>
        <div class="mini-bars">
          <div style="height:70px;background:var(--lavender)"></div>
          <div style="height:110px;background:var(--red)"></div>
          <div style="height:90px;background:var(--lavender)"></div>
          <div style="height:130px;background:var(--red)"></div>
          <div style="height:60px;background:var(--lavender)"></div>
          <div style="height:100px;background:var(--red)"></div>
        </div><strong>Rp5.230.000</strong>
      </div>
      <span class="sticker" style="top:24px;right:20px;background:var(--peach);transform:rotate(-8deg)">hemat 12%!</span>
      <span class="dot" style="bottom:30px;left:20px;width:44px;height:44px;background:var(--red)"></span>
      <span class="dot" style="top:80px;left:10px;width:28px;height:28px;background:var(--lavender)"></span>
    </div>
  </section>

  <section class="section-red" id="fitur">
    <div class="ticket">
      <div class="section-title">
        <div class="eyebrow">Fitur utama</div>
        <h2>Semua yang kamu butuh</h2>
      </div>
      <div class="features">
        <article class="feature">
          <div class="avatar bg-pink"></div>
          <h3>Catat transaksi</h3>
          <p>Tambah, ubah, dan hapus pemasukan serta pengeluaran dalam hitungan detik.</p>
        </article>
        <article class="feature">
          <div class="avatar bg-lavender"></div>
          <h3>Budget per kategori</h3>
          <p>Atur batas bulanan dan lihat sisa budget lewat progress bar.</p>
        </article>
        <article class="feature">
          <div class="avatar bg-peach"></div>
          <h3>Grafik bulanan</h3>
          <p>Bandingkan pemasukan dan pengeluaran dengan grafik batang.</p>
        </article>
        <article class="feature">
          <div class="avatar bg-pink"></div>
          <h3>Target tabungan</h3>
          <p>Pasang target, lalu pantau progres tabunganmu.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section-stripe" id="cara-kerja">
    <div class="panel">
      <div class="eyebrow">Cara kerja</div>
      <h2 style="font-size:48px;margin-top:8px">Tiga langkah saja</h2>
      <div class="steps">
        <div class="step bg-peach" style="transform:rotate(-4deg)"><b>1</b><span class="eyebrow">Daftar akun</span></div>
        <div class="step step-dark" style="transform:rotate(3deg)"><b>2</b><span class="eyebrow">Catat uangmu</span></div>
        <div class="step bg-pink" style="transform:rotate(-2deg)"><b>3</b><span class="eyebrow">Pantau grafik</span></div>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="cta">
      <h2>Mulai atur uangmu hari ini</h2>
      <p>Gratis, tanpa kartu kredit.</p>
      <a class="btn" href="{{ route('register') }}">Daftar gratis</a>
    </div>
  </section>

  <footer class="site-footer">© 2026 Cuanis</footer>

  @livewireScripts
</body>

</html>