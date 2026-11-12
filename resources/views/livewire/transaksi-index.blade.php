<div>
    <h1>Daftar Transaksi</h1>

    <a href="{{ route('transaksi.create') }}">Tambah Transaksi</a>

    @forelse ($transaksis as $transaksi)
        <div>
            <p>{{ $transaksi->deskripsi }}</p>
            <p>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</p>
            <p>{{ ucfirst($transaksi->tipe) }}</p>
            <p>{{ $transaksi->tanggal }}</p>
        </div>
    @empty
        <p>Belum ada transaksi.</p>
    @endforelse
</div>