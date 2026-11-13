<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Masuk · Cuanis</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=DM+Sans:wght@400;500;700&family=Caveat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
<script src="https://cdn.tailwindcss.com"></script>
@livewireStyles
</head>
<body>
<header class="site-header">
  <div class="topbar">
    <nav class="nav eyebrow" aria-label="Menu utama">
      <a href="{{ url('/') }}">Beranda</a>
      <a href="{{ route('register') }}">Daftar Akun</a>
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
      <div class="eyebrow">Selamat datang kembali</div>
      <h1 style="margin-top: 6px;">Masuk ke Cuanis</h1>
    </div>

    @if (session()->has('error'))
      <div style="padding: 12px; background: #f8d7da; color: #721c24; border-radius: 8px; margin-bottom: 20px; font-size: 14px; text-align: center;">
        {{ session('error') }}
      </div>
    @endif

    <form class="card card-pink form-card" style="max-width: 100%;" wire:submit.prevent="login">
      <div class="form-grid">
        <div class="full">
          <label class="label" for="email">Email</label>
          <input class="input" id="email" wire:model="email" type="email" required>
          @error('email') <span style="color: crimson; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div class="full">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" wire:model="password" type="password" required>
          @error('password') <span style="color: crimson; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div class="full">
          <label style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--muted); cursor: pointer;">
            <input type="checkbox" wire:model="remember">
            Ingat saya
          </label>
        </div>
      </div>

      <div class="form-actions" style="margin-top: 24px; justify-content: space-between; align-items: center;">
        <span style="font-size: 13px; color: var(--muted);">
          Belum punya akun?
          <a href="{{ route('register') }}" style="font-weight: 700; color: var(--maroon); text-decoration: underline;">Daftar</a>
        </span>
        <button class="btn" type="submit">Masuk</button>
      </div>
    </form>
  </div>
</main>

<footer class="site-footer" style="text-align: center;">
  © 2026 Cuanis · Dompet manis untuk uang yang rapi
</footer>

@livewireScripts
</body>
</html>