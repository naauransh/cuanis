@php
$user = auth()->user();
@endphp

<div style="min-height: 100vh; font-family: 'DM Sans', sans-serif; background-color: #fcf8ef; background-image: linear-gradient(#f5dfe3 1px, transparent 1px), linear-gradient(90deg, #f5dfe3 1px, transparent 1px); background-size: 36px 36px; color: #831536;">




    <!-- CONTENT -->
    <div style="max-width: 1240px; margin: 45px auto; padding: 0 25px;">

        <div style="margin-bottom: 30px;">
            <p style="font-size: 13px; font-weight: 800; letter-spacing: 1.5px; margin-bottom: 5px;">
                AKUN SAYA
            </p>

            <h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 400; margin: 0;">
                Profil Pengguna
            </h1>
        </div>


        @if(session('success'))
        <div style="background: #e4f7e9; color: #26733c; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div style="background: #ffe8e8; color: #b42318; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            @foreach($errors->all() as $error)
            <p style="margin: 4px 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif


        <div style="display: grid; grid-template-columns: minmax(260px, 350px) minmax(0, 1fr); gap: 25px; align-items: start;">

            <!-- PROFILE LEFT -->
            <div style="background: #ffd0df; border: 2px solid #831536; border-radius: 24px; padding: 30px 25px; text-align: center;">

                <div style="width: 125px; height: 125px; background: #c2c0ff; border: 3px solid #831536; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; font-family: 'Playfair Display', serif; font-size: 48px; color: #831536;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <h2 style="font-family: 'Playfair Display', serif; font-size: 27px; font-weight: 500; margin: 0 0 5px;">
                    {{ $user->name }}
                </h2>

                <p style="font-size: 13px; color: #986276; margin-bottom: 20px;">
                    {{ $user->email }}
                </p>

                <span style="display: inline-block; background: #fff8ef; border: 1px solid #831536; padding: 7px 17px; border-radius: 20px; font-size: 11px; font-weight: 800; letter-spacing: 1px;">
                    ✦ MEMBER CUANIS
                </span>

                <div style="margin-top: 25px; border-top: 1px dashed #d99aaf; padding-top: 20px; text-align: left;">

                    <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 17px; font-size: 13px;">
                        <span style="color: #986276;">Status akun</span>
                        <span style="font-weight: 700;">Aktif</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 17px; font-size: 13px;">
                        <span style="color: #986276;">Bergabung sejak</span>
                        <span style="font-weight: 700;">
                            {{ $user->created_at ? $user->created_at->translatedFormat('F Y') : '-' }}
                        </span>
                    </div>

                    <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 17px; font-size: 13px;">
                        <span style="color: #986276;">Tipe akun</span>
                        <span style="font-weight: 700;">Personal</span>
                    </div>

                </div>

            </div>


            <!-- RIGHT CONTENT -->
            <div style="display: flex; flex-direction: column; gap: 22px; min-width: 0;">

                <!-- PERSONAL DATA -->
                <div style="background: white; border: 2px solid #831536; border-radius: 22px; padding: 28px;">

                    <div style="margin-bottom: 25px;">
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 29px; font-weight: 400; margin: 0;">
                            Informasi Pribadi
                        </h2>

                        <p style="font-size: 13px; color: #986276; margin-top: 8px;">
                            Perbarui informasi pribadi akun Cuanis kamu.
                        </p>
                    </div>

                    <form wire:submit="saveProfile">


                        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px;">

                            <div style="display: flex; flex-direction: column; gap: 9px;">
                                <label for="nama" style="font-size: 12px; font-weight: 800; letter-spacing: 0.7px;">
                                    NAMA LENGKAP
                                </label>

                                <input
                                    type="text"
                                    id="nama"
                                    name="name"
                                    wire:model="name"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536; outline: none;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 9px;">
                                <label for="username" style="font-size: 12px; font-weight: 800; letter-spacing: 0.7px;">
                                    USERNAME
                                </label>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    wire:model="username"
                                    value="{{ old('username', $user->username ?? '') }}"
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536; outline: none;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 9px;">
                                <label for="email" style="font-size: 12px; font-weight: 800; letter-spacing: 0.7px;">
                                    EMAIL
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    wire:model="email"
                                    value="{{ $user->email }}"
                                    disabled
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #f9f1ed; font-family: inherit; font-size: 14px; color: #986276; cursor: not-allowed;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 9px;">
                                <label for="telepon" style="font-size: 12px; font-weight: 800; letter-spacing: 0.7px;">
                                    NOMOR TELEPON
                                </label>

                                <input
                                    type="tel"
                                    id="telepon"
                                    name="no_whatsapp"
                                    wire:model="no_whatsapp"
                                    value="{{ old('no_whatsapp', $user->no_whatsapp ?? '') }}"
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536; outline: none;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 9px; grid-column: span 2;">
                                <label for="alamat" style="font-size: 12px; font-weight: 800; letter-spacing: 0.7px;">
                                    ALAMAT
                                </label>

                                <input
                                    type="text"
                                    id="alamat"
                                    name="alamat"
                                    wire:model="alamat"
                                    value="{{ old('alamat', $user->alamat ?? '') }}"
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536; outline: none;">
                            </div>

                        </div>

                        <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 23px;">

                            <button
                                type="reset"
                                style="background: white; color: #831536; border: 1.5px solid #831536; border-radius: 10px; padding: 13px 23px; font-weight: 800; cursor: pointer;">
                                BATAL
                            </button>

                            <button
                                type="submit"
                                style="background: #831536; color: white; border: 1.5px solid #831536; border-radius: 10px; padding: 13px 25px; font-weight: 800; cursor: pointer;">
                                SIMPAN PERUBAHAN
                            </button>

                        </div>

                    </form>

                </div>


                <!-- PASSWORD -->
                <div style="background: #f6b9a2; border: 2px solid #831536; border-radius: 22px; padding: 25px 28px;">

                    <h2 style="font-family: 'Playfair Display', serif; font-size: 27px; font-weight: 400; margin: 0 0 8px;">
                        Keamanan Akun
                    </h2>

                    <p style="font-size: 13px; color: #85445a; margin-bottom: 17px;">
                        Lindungi akun Cuanis kamu dengan password yang kuat dan tidak mudah ditebak.
                    </p>


                    <form wire:submit="changePassword">
                        @if (session('password_success'))
                        <div style="background: #e4f7e9; color: #26733c; padding: 15px; border-radius: 10px;">
                            {{ session('password_success') }}
                        </div>
                        @endif

                        @csrf
                        @method('PUT')

                        <div style="display: flex; flex-direction: column; gap: 15px;">

                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="current_password" style="font-size: 12px; font-weight: 800;">
                                    PASSWORD SAAT INI
                                </label>

                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    wire:model="current_password"
                                    required
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="password" style="font-size: 12px; font-weight: 800;">
                                    PASSWORD BARU
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    wire:model="password"
                                    required
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536;">
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="password_confirmation" style="font-size: 12px; font-weight: 800;">
                                    KONFIRMASI PASSWORD BARU
                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    wire:model="password_confirmation"
                                    required
                                    style="width: 100%; box-sizing: border-box; padding: 13px 15px; border: 1.5px solid #e8b8c8; border-radius: 10px; background: #fffaf6; font-family: inherit; font-size: 14px; color: #831536;">
                            </div>

                        </div>

                        <div style="display: flex; justify-content: flex-end; margin-top: 23px;">
                            <button
                                type="submit"
                                style="background: #831536; color: white; border: none; border-radius: 10px; padding: 12px 22px; font-weight: 800; cursor: pointer;">
                                🔒 UBAH PASSWORD
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>