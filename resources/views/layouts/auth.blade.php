<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'Cuanis' }} · Cuanis</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=DM+Sans:wght@400;500;700&family=Caveat:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @livewireStyles
</head>

<body>
    <header class="site-header">
        <div class="topbar">
            <nav class="nav eyebrow" aria-label="Menu utama">
                <a href="{{ url('/') }}">Beranda</a>

                @if (request()->routeIs('register'))
                    <a href="{{ route('login') }}">Masuk</a>
                @else
                    <a href="{{ route('register') }}">Daftar Akun</a>
                @endif
            </nav>
            <a class="logo" href="{{ url('/') }}">cuanis</a>
        </div>
    </header>

    {{ $slot }}

    <footer class="site-footer" style="text-align: center;">
        © 2026 Cuanis · Dompet manis untuk uang yang rapi
    </footer>
    @livewireScripts
</body>

</html>
