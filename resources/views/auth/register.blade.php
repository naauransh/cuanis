<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar · Cuanis</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=DM+Sans:wght@400;500;700&family=Caveat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="site-header">
  <div class="topbar">
    <nav class="nav eyebrow" aria-label="Menu utama">
      <a href="{{ url('/') }}">Beranda</a>
      <a href="{{ route('login') }}">Masuk</a>
    </nav>
    <a class="logo" href="{{ url('/') }}" style="
        font-family: 'Instrument Serif', Georgia, serif;
        font-size: 38px;
        font-weight: 400;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #6B0F2B;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        text-shadow: 2px 2px 0px #FFFDF7;
        line-height: 1;
        transition: transform 0.15s ease;
    " onmouseover="this.style.transform='scale(1.05)';"
       onmouseout="this.style.transform='scale(1)';">
        CUANIS<span style="font-family: 'Caveat', cursive; font-size: 26px; color: #BE123C; transform: rotate(-12deg); display: inline-block; margin-top: -8px;">✦</span>
    </a>
    <span class="avatar-user" aria-label="Akun Sari">S</span>
  </div>
</header>

<main class="container" style="align-items: center; justify-content: center; min-height: calc(100vh - 160px);">
  <div style="width: 100%; max-width: 480px;">
    <div style="margin-bottom: 20px; text-align: center;">
      <div class="eyebrow">Mulai atur keuangan</div>
      <h1 style="margin-top: 6px;">Buat Akun Baru</h1>
    </div>

    <form class="card card-lavender form-card" style="max-width: 100%;" action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-grid">
        <div class="full">
          <label class="label" for="nama">Nama Lengkap</label>
          <input class="input" id="nama" name="name" required>
        </div>
        <div class="full">
          <label class="label" for="email">Email</label>
          <input class="input" id="email" name="email" type="email" required>
        </div>
        <div class="full">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" name="password" type="password" required>
        </div>
        <div class="full">
          <label class="label" for="password_confirmation">Konfirmasi Password</label>
          <input class="input" id="password_confirmation" name="password_confirmation" type="password" required>
        </div>
      </div>

      <div class="form-actions" style="margin-top: 28px; justify-content: space-between; align-items: center;">
        <span style="font-size: 13px; color: var(--muted);">Sudah punya akun? <a href="{{ route('login') }}" style="font-weight: 700; color: var(--maroon); text-decoration: underline;">Masuk</a></span>
        <button class="btn" type="submit">Daftar Akun</button>
      </div>
    </form>
  </div>
</main>

<footer class="site-footer" style="text-align: center;">
  © 2026 Cuanis · Dompet manis untuk uang yang rapi
</footer>
</body>
</html>