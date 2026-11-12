<main class="container" style="align-items: center; justify-content: center; min-height: calc(100vh - 160px);">
  <div style="width: 100%; max-width: 480px;">

    <div style="margin-bottom: 20px; text-align: center;">
      <div class="eyebrow">Mulai atur keuangan</div>
      <h1 style="margin-top: 6px;">Buat Akun Baru</h1>
    </div>

    <form class="card card-lavender form-card"
          style="max-width: 100%;"
          wire:submit="register">

      <div class="form-grid">

        <div class="full">
          <label class="label" for="name">Nama Lengkap</label>
          <input class="input" id="name" type="text"
                 wire:model="name" required>
          @error('name')
            <p role="alert" style="color:var(--danger);font-size:13px;margin:6px 0 0">{{ $message }}</p>
          @enderror
        </div>

        <div class="full">
          <label class="label" for="email">Email</label>
          <input class="input" id="email" type="email"
                 wire:model="email" required>
          @error('email')
            <p role="alert" style="color:var(--danger);font-size:13px;margin:6px 0 0">{{ $message }}</p>
          @enderror
        </div>

        <div class="full">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" type="password"
                 wire:model="password" required>
          @error('password')
            <p role="alert" style="color:var(--danger);font-size:13px;margin:6px 0 0">{{ $message }}</p>
          @enderror
        </div>

        <div class="full">
          <label class="label" for="password_confirmation">Konfirmasi Password</label>
          <input class="input" id="password_confirmation" type="password"
                 wire:model="password_confirmation" required>
        </div>

      </div>

      <div class="form-actions" style="margin-top: 28px; justify-content: space-between; align-items: center;">
        <span style="font-size: 13px; color: var(--muted);">
          Sudah punya akun?
          <a href="{{ route('login') }}" style="font-weight: 700; color: var(--maroon); text-decoration: underline;">Masuk</a>
        </span>

        <button class="btn" type="submit" wire:loading.attr="disabled">
          <span wire:loading.remove>Daftar Akun</span>
          <span wire:loading>Memproses...</span>
        </button>
      </div>

    </form>
  </div>
</main>
