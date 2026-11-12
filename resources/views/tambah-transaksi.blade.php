<div class="container">

    <div class="page-head">
        <div>
            <div class="eyebrow">Pencatatan</div>
            <h1>Tambah Transaksi</h1>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="save" class="card card-pink form-card">

        <div class="form-grid">

            <div>
                <label class="label">Tipe Transaksi</label>
                <select class="input" wire:model="tipe">
                    <option value="pengeluaran">Pengeluaran</option>
                    <option value="pemasukan">Pemasukan</option>
                </select>
                @error('tipe')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="label">Nominal (Rp)</label>
                <input
                    class="input"
                    type="number"
                    wire:model="jumlah"
                    placeholder="Contoh: 25000"
                >
                @error('jumlah')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="label">Tanggal</label>
                <input
                    class="input"
                    type="date"
                    wire:model="tanggal"
                >
                @error('tanggal')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="full">
                <label class="label">Catatan / Deskripsi</label>
                <input
                    class="input"
                    type="text"
                    wire:model="deskripsi"
                    placeholder="Contoh: Makan siang"
                >
                @error('deskripsi')
                    <small>{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="form-actions">
            <a class="btn btn-light" href="{{ route('transaksi.index') }}">
                Batal
            </a>

            <button class="btn" type="submit">
                Simpan transaksi
            </button>
        </div>

    </form>
</div>