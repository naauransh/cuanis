<main class="container">
    @if (session()->has('success'))
    <div
        style="background: #d1fae5; color: #065f46; border: 1.5px solid #065f46; padding: 12px 16px; border-radius: 14px; margin-bottom: 18px; font-weight: 500;">
        {{ session('success') }}
    </div>
    @endif

    <div class="page-head">
        <div>
            <div class="eyebrow">{{ $totalKategori }} kategori</div>
            <h1>Kategori</h1>
        </div>
        <button wire:click="{{ $showForm ? '$set(\'showForm\', false)' : 'bukaFormTambah' }}"
            class="btn {{ $showForm ? 'btn-light' : '' }}" type="button">
            {{ $showForm ? 'Tutup form' : 'Tambah kategori' }}
        </button>
    </div>

    @if ($showForm)
    <section class="card" style="margin-bottom: 24px;">
        <h2 style="margin-bottom: 14px;">{{ $editId ? 'Edit Kategori' : 'Tambah Kategori Baru' }}</h2>
        <form wire:submit="simpan" style="display: grid; gap: 14px;">
            <div>
                <label style="display:block; font-weight: 500; margin-bottom: 6px;">Nama Kategori</label>
                <input wire:model="nama" class="input" type="text" placeholder="Contoh: Makan, Transport, Gaji..."
                    required style="width: 100%;">
                @error('nama') <small style="color: #b91c1c;">{{ $message }}</small> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">Tipe</label>
                    <select wire:model="tipe" class="input" style="width: 100%;">
                        <option value="pengeluaran">Pengeluaran</option>
                        <option value="pemasukan">Pemasukan</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">Warna Ikon</label>
                    <select wire:model="warna" class="input" style="width: 100%;">
                        <option value="bg-peach">Peach</option>
                        <option value="bg-lavender">Lavender</option>
                        <option value="bg-pink">Pink</option>
                        <option value="bg-yellow">Kuning</option>
                        <option value="bg-mint">Mint</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 6px;">
                <button wire:click="$set('showForm', false)" class="btn btn-light btn-sm" type="button">Batal</button>
                <button class="btn btn-sm" type="submit">{{ $editId ? 'Simpan Perubahan' : 'Simpan Kategori' }}</button>
            </div>
        </form>
    </section>
    @endif

    <section class="cat-section">
        <h2>Pengeluaran <small>{{ $pengeluaran->count() }} kategori</small></h2>
        <div class="cat-grid">
            @forelse ($pengeluaran as $item)
            <article class="card cat" wire:key="kat-{{ $item->id }}">
                <div class="cat-top">
                    <span class="avatar {{ $item->warna }}">{{ strtoupper(substr($item->nama, 0, 1)) }}</span>
                    <div>
                        <b>{{ $item->nama }}</b>
                        <small>
                            Pengeluaran
                            @if ($item->budget)
                            · Budget Rp{{ number_format($item->budget->batas, 0, ',', '.') }}
                            @endif
                        </small>
                    </div>
                </div>
                <div class="cat-actions">
                    <button wire:click="edit({{ $item->id }})" class="btn btn-light btn-sm" type="button">Edit</button>
                    <button wire:click="hapus({{ $item->id }})" wire:confirm="Hapus kategori '{{ $item->nama }}'?"
                        class="btn btn-danger btn-sm" type="button">Hapus</button>
                </div>
            </article>
            @empty
            <article class="card cat">
                <div class="cat-top">
                    <div><b>Belum ada kategori pengeluaran</b><small>Klik "Tambah kategori" di kanan atas.</small></div>
                </div>
            </article>
            @endforelse
        </div>
    </section>

    <section class="cat-section">
        <h2>Pemasukan <small>{{ $pemasukan->count() }} kategori</small></h2>
        <div class="cat-grid">
            @forelse ($pemasukan as $item)
            <article class="card cat" wire:key="kat-{{ $item->id }}">
                <div class="cat-top">
                    <span class="avatar {{ $item->warna }}">{{ strtoupper(substr($item->nama, 0, 1)) }}</span>
                    <div>
                        <b>{{ $item->nama }}</b>
                        <small>Pemasukan</small>
                    </div>
                </div>
                <div class="cat-actions">
                    <button wire:click="edit({{ $item->id }})" class="btn btn-light btn-sm" type="button">Edit</button>
                    <button wire:click="hapus({{ $item->id }})" wire:confirm="Hapus kategori '{{ $item->nama }}'?"
                        class="btn btn-danger btn-sm" type="button">Hapus</button>
                </div>
            </article>
            @empty
            <article class="card cat">
                <div class="cat-top">
                    <div><b>Belum ada kategori pemasukan</b><small>Klik "Tambah kategori" di kanan atas.</small></div>
                </div>
            </article>
            @endforelse
        </div>
    </section>
</main>
