<div>
    <main class="container">

        <div class="page-head">
            <div>
                <div class="eyebrow">Halo, {{ $nama }}</div>
                <h1>Laporan Keuanganmu</h1>
            </div>

            <a class="btn" href="{{ route('transaksi.create') }}">
                Tambah transaksi
            </a>
        </div>

        <div class="stats">
            <div class="stat bg-pink">
                <span class="eyebrow">Pemasukan</span>
                <strong>Rp{{ number_format($pemasukan, 0, ',', '.') }}</strong>
            </div>

            <div class="stat bg-peach">
                <span class="eyebrow">Pengeluaran</span>
                <strong>Rp{{ number_format($pengeluaran, 0, ',', '.') }}</strong>
            </div>

            <div class="stat bg-lavender">
                <span class="eyebrow">Saldo</span>
                <strong>Rp{{ number_format($saldo, 0, ',', '.') }}</strong>
            </div>
        </div>

        <div class="row">

            <section class="card grow-2">

                <div class="chart-head">
                    <h2>Laporan Transaksi</h2>

                    <div class="legend">
                        <span><i class="in"></i>Pemasukan</span>
                        <span><i class="out"></i>Pengeluaran</span>
                    </div>
                </div>

                <div class="toolbar">
                    <button type="button" wire:click="$set('periode', 'harian')"
                        class="btn btn-sm {{ $periode === 'harian' ? '' : 'btn-light' }}">
                        Harian
                    </button>

                    <button type="button" wire:click="$set('periode', 'mingguan')"
                        class="btn btn-sm {{ $periode === 'mingguan' ? '' : 'btn-light' }}">
                        Mingguan
                    </button>

                    <button type="button" wire:click="$set('periode', 'bulanan')"
                        class="btn btn-sm {{ $periode === 'bulanan' ? '' : 'btn-light' }}">
                        Bulanan
                    </button>
                </div>

                <div class="chart-scroll">
                    <div class="chart">

                        @foreach ($laporan as $item)
                            <div class="chart-group">

                                <div class="bar-wrap">
                                    <span>
                                        @if ($item['pemasukan'] > 0)
                                            {{ number_format($item['pemasukan'] / 1000000, 2, ',', '.') }}
                                        @endif
                                    </span>

                                    <div class="chart-bar bar-income"
                                        style="height: {{ $item['pemasukan'] > 0 ? max(3, ($item['pemasukan'] / $maxGrafik) * 180) : 0 }}px">
                                    </div>
                                </div>

                                <div class="bar-wrap">
                                    <span>
                                        @if ($item['pengeluaran'] > 0)
                                            {{ number_format($item['pengeluaran'] / 1000000, 2, ',', '.') }}
                                        @endif
                                    </span>

                                    <div class="chart-bar bar-expense"
                                        style="height: {{ $item['pengeluaran'] > 0 ? max(3, ($item['pengeluaran'] / $maxGrafik) * 180) : 0 }}px">
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="chart-labels">
                        @foreach ($laporan as $item)
                            <span>{{ $item['label'] }}</span>
                        @endforeach
                    </div>
                </div>

                <small class="muted">
                    Nominal dalam juta rupiah. Geser grafik ke samping untuk melihat tanggal lainnya.
                </small>

            </section>

            <section class="card grow-1">

                <h2 style="margin-bottom: 8px">Terbaru</h2>

                <ul class="tx-list">

                    @forelse ($terbaru as $transaksi)
                        <li class="tx">

                            <span class="avatar bg-peach">
                                {{ strtoupper(substr($transaksi->deskripsi, 0, 1)) }}
                            </span>

                            <div class="tx-info">
                                <b>{{ $transaksi->deskripsi }}</b>

                                <small>
                                    {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}
                                </small>
                            </div>

                            @if ($transaksi->tipe === 'pemasukan')
                                <span class="amount in">
                                    + Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                </span>
                            @else
                                <span class="amount">
                                    - Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                </span>
                            @endif

                        </li>

                    @empty
                        <li class="tx">
                            Belum ada transaksi.
                        </li>
                    @endforelse

                </ul>

            </section>

        </div>

    </main>
</div>
