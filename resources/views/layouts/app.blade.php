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
                @php
                    $menu = [
                        'Dashboard' => 'dashboard',
                        'Transaksi' => 'transaksi',
                        'Budget' => 'budget',
                        'Kategori' => 'kategori',
                    ];
                @endphp
                @foreach ($menu as $label => $path)
                    <a href="{{ url('/' . $path) }}"
                        @if (request()->is($path . '*')) aria-current="page" @endif>{{ $label }}</a>
                @endforeach

                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" title="Keluar"
                        style="background: none; border: none; cursor: pointer; font: inherit; color: inherit; padding: 0; text-transform: uppercase;">
                        <svg style="width: 12px; height: 12px; vertical-align: middle; margin-right: 2px;"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        Keluar
                    </button>
                </form>
            </nav>

            <a class="logo" href="{{ url('/dashboard') }}" style="
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

            <span class="avatar-user"
                aria-label="Akun {{ auth()->user()->name }}">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
        </div>
    </header>

    {{ $slot ?? '' }}

    @yield('content')

    @livewireScripts
</body>

</html>