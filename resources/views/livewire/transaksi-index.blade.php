<main class="container">
    {{-- Notifikasi Sukses --}}
    @if (session()->has('success'))
        <div style="background: #d1fae5; color: #065f46; border: 1.5px solid #065f46; padding: 12px 16px; border-radius: 14px; margin-bottom: 18px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <div class="page-head">
        <div>
            <div class="eyebrow">{{ $totalTransaksi }} transaksi</div>
            <h1>Transaksi</h1>
        </div>
        <a class="btn" href="{{ route('transaksi.create') }}">Tambah transaksi</a>
    </div>

    <section class="card">
        {{-- Toolbar Filter & Search Realtime --}}
        <div class="toolbar" role="search">
            <button 
                wire:click="setFilter('semua')" 
                class="btn btn-sm {{ $filter === 'semua' ? '' : 'btn-light' }}" 
                type="button">
                Semua
            </button>
            <button 
                wire:click="setFilter('pemasukan')" 
                class="btn btn-sm {{ $filter === 'pemasukan' ? '' : 'btn-light' }}" 
                type="button">
                Pemasukan
            </button>
            <button 
                wire:click="setFilter('pengeluaran')" 
                class="btn btn-sm {{ $filter === 'pengeluaran' ? '' : 'btn-light' }}" 
                type="button">
                Pengeluaran
            </button>

            <input 
                wire:model.live.debounce.300ms="search" 
                class="input" 
                type="search" 
                aria-label="Cari catatan" 
                placeholder="Cari catatan...">
        </div>

        {{-- Daftar Transaksi --}}
        @php
            $avatarColors = ['bg-peach', 'bg-lavender', 'bg-pink', 'bg-mint', 'bg-yellow'];
        @endphp

        <ul class="tx-list">
            @forelse ($transaksis as $index => $transaksi)
                @php
                    $inisial = strtoupper(substr($transaksi->deskripsi, 0, 1));
                    $warna = $transaksi->tipe === 'pemasukan' 
                        ? 'bg-mint' 
                        : $avatarColors[$index % count($avatarColors)];
                @endphp

                <li class="tx" wire:key="tx-{{ $transaksi->id }}">
                    <span class="avatar {{ $warna }}">{{ $inisial }}</span>
                    
                    <div class="tx-info">
                        <b>{{ $transaksi->deskripsi }}</b>
                        <small>
                            {{ \Carbon\Carbon::parse($transaksi->tanggal)->translatedFormat('d M Y') }} 
                            · {{ ucfirst($transaksi->tipe) }}
                        </small>
                    </div>

                    <span class="amount {{ $transaksi->tipe === 'pemasukan' ? 'in' : '' }}">
                        {{ $transaksi->tipe === 'pemasukan' ? '+' : '-' }} 
                        Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                    </span>

                    <div class="tx-actions">
                        <a class="btn btn-light btn-sm" href="{{ route('transaksi.edit', $transaksi->id) }}">
                            Edit
                        </a>
                        <button 
                            wire:click="hapus({{ $transaksi->id }})"
                            wire:confirm="Yakin ingin menghapus transaksi '{{ $transaksi->deskripsi }}'?"
                            class="btn btn-danger btn-sm" 
                            type="button">
                            Hapus
                        </button>
                    </div>
                </li>
            @empty
                <li class="tx" style="justify-content: center; padding: 32px 16px; text-align: center;">
                    <div class="tx-info">
                        <b>Tidak ada transaksi ditemukan</b>
                        <small>Coba ubah filter/kata kunci pencarian atau klik "Tambah transaksi".</small>
                    </div>
                </li>
            @endforelse
        </ul>

        {{-- Pagination sesuai desain pager --}}
        @if ($transaksis->total() > 0)
            <div class="pager">
                <span>
                    Menampilkan {{ $transaksis->count() }} dari {{ $transaksis->total() }}
                </span>
                <span class="tx-actions">
                    @if ($transaksis->onFirstPage())
                        <button class="btn btn-light btn-sm" type="button" disabled style="opacity: 0.5; cursor: not-allowed;">
                            Sebelumnya
                        </button>
                    @else
                        <button wire:click="previousPage" class="btn btn-light btn-sm" type="button">
                            Sebelumnya
                        </button>
                    @endif

                    @if ($transaksis->hasMorePages())
                        <button wire:click="nextPage" class="btn btn-sm" type="button">
                            Berikutnya
                        </button>
                    @else
                        <button class="btn btn-light btn-sm" type="button" disabled style="opacity: 0.5; cursor: not-allowed;">
                            Berikutnya
                        </button>
                    @endif
                </span>
            </div>
        @endif
    </section>
</main>