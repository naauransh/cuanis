<div>
    <main class="container">

        <div class="page-head">
            <div>
                <div class="eyebrow">{{ $transaksis->count() }} transaksi</div>
                <h1>Transaksi</h1>
            </div>

            <a class="btn" href="{{ route('transaksi.create') }}">
                Tambah transaksi
            </a>
        </div>

        <section class="card">

            <div class="toolbar" role="search">

                <button class="btn btn-sm {{ $filter === 'semua' ? '' : 'btn-light' }}" type="button"
                    wire:click="$set('filter', 'semua')">
                    Semua
                </button>

                <button class="btn btn-sm {{ $filter === 'pemasukan' ? '' : 'btn-light' }}" type="button"
                    wire:click="$set('filter', 'pemasukan')">
                    Pemasukan
                </button>

                <button class="btn btn-sm {{ $filter === 'pengeluaran' ? '' : 'btn-light' }}" type="button"
                    wire:click="$set('filter', 'pengeluaran')">
                    Pengeluaran
                </button>

                <input class="input" type="search" placeholder="Cari catatan..." aria-label="Cari catatan"
                    wire:model.live.debounce.400ms="search">
            </div>

            <ul class="tx-list">

                @forelse ($transaksis as $transaksi)
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

                        <div class="tx-actions">

                            <a class="btn btn-light btn-sm" href="{{ route('transaksi.edit', $transaksi->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </li>

                @empty

                    <li class="tx">
                        Tidak ada transaksi yang ditemukan.
                    </li>
                @endforelse

            </ul>

            <div class="pager">
                <span>Menampilkan {{ $transaksis->count() }} transaksi</span>
            </div>

        </section>

    </main>
</div>
