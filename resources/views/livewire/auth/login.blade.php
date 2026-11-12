<main class="container" style="align-items: center; justify-content: center; min-height: calc(100vh - 160px);">
  <div style="width: 100%; max-width: 480px;">
    <div style="margin-bottom: 20px; text-align: center;">
      <div class="eyebrow">Selamat datang kembali</div>
      <h1 style="margin-top: 6px;">Masuk ke Cuanis</h1>
    </div>

    <form class="card card-pink form-card" style="max-width: 100%;" wire:submit="login">
      <div class="form-grid">
        <div class="full">
          <label class="label" for="email">Email</label>
          <input class="input" id="email" type="email" wire:model="email" autocomplete="email" required>
          @error('email') <p role="alert" style="color:var(--danger);font-size:13px;margin:6px 0 0">{{ $message }}</p> @enderror
        </div>
        <div class="full">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" type="password" wire:model="password" autocomplete="current-password" required>
          @error('password') <p role="alert" style="color:var(--danger);font-size:13px;margin:6px 0 0">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="form-actions" style="margin-top: 24px; justify-content: space-between; align-items: center;">
        <span style="font-size: 13px; color: var(--muted);">Belum punya akun? <a href="{{ Route::has('register') ? route('register') : '#' }}" style="font-weight: 700; color: var(--maroon); text-decoration: underline;">Daftar</a></span>
        <button class="btn" type="submit" wire:loading.attr="disabled">Masuk</button>
      </div>
    </form>
  </div>
</main>
