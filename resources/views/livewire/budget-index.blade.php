<main class="container">
    @if (session()->has('success'))
    <div
        style="background: #d1fae5; color: #065f46; border: 1.5px solid #065f46; padding: 12px 16px; border-radius: 14px; margin-bottom: 18px; font-weight: 500;">
        {{ session('success') }}
    </div>
    @endif

    <div class="page-head">
        <div>
            <div class="eyebrow">Batas bulanan</div>
            <h1>Budget</h1>
        </div>
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <button wire:click="bukaFormTambah(true)" class="btn {{ ($showForm && $is_target) ? '' : 'btn-light' }}"
                type="button">
                + Target tabungan
            </button>
            <button wire:click="bukaFormTambah(false)" class="btn {{ (!$showForm || !$is_target) ? '' : 'btn-light' }}"
                type="button">
                Atur budget
            </button>
        </div>
    </div>

    @if ($showForm)
    <section class="card" style="margin-bottom: 24px;">
        <h2 style="margin-bottom: 14px;">
            {{ $editId ? 'Ubah' : 'Tambah' }} {{ $is_target ? 'Target Tabungan' : 'Budget Bulanan' }}
        </h2>
        <form wire:submit="simpan" style="display: grid; gap: 14px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">
                        {{ $is_target ? 'Nama Target Tabungan' : 'Nama Pos Budget' }}
                    </label>
                    <input wire:model="nama" class="input" type="text"
                        placeholder="{{ $is_target ? 'Contoh: Laptop baru' : 'Contoh: Makan, Transport' }}" required
                        style="width: 100%;">
                    @error('nama') <small style="color: #b91c1c;">{{ $message }}</small> @enderror
                </div>

                @if (!$is_target)
                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">Hubungkan Kategori
                        (Opsional)</label>
                    <select wire:model="kategori_id" class="input" style="width: 100%;">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px;">
                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">
                        {{ $is_target ? 'Target Dana (Rp)' : 'Batas Budget (Rp)' }}
                    </label>
                    <input wire:model="batas" class="input" type="number" placeholder="1500000" required
                        style="width: 100%;">
                    @error('batas') <small style="color: #b91c1c;">{{ $message }}</small> @enderror
                </div>

                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">
                        {{ $is_target ? 'Terkumpul Saat Ini (Rp)' : 'Terpakai (Rp)' }}
                    </label>
                    <input wire:model="terpakai" class="input" type="number" placeholder="0" style="width: 100%;">
                </div>

                <div>
                    <label style="display:block; font-weight: 500; margin-bottom: 6px;">Warna Kartu</label>
                    <select wire:model="warna" class="input" style="width: 100%;">
                        <option value="var(--peach)">Peach</option>
                        <option value="var(--lavender)">Lavender</option>
                        <option value="var(--pink)">Pink</option>
                        <option value="var(--yellow)">Kuning</option>
                        <option value="var(--mint)">Mint</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 6px;">
                <button wire:click="$set('showForm', false)" class="btn btn-light btn-sm" type="button">Batal</button>
                <button class="btn btn-sm" type="submit">Simpan</button>
            </div>
        </form>
    </section>
    @endif

    <div class="budgets">
        @forelse ($budgets as $item)
        @php
        $persen = $item->batas > 0 ? round(($item->terpakai / $item->batas) * 100) : 0;
        $barWidth = min($persen, 100);
        $statusClass = $persen > 100 ? 'is-over' : ($persen >= 85 ? 'is-warn' : 'is-ok');
        $selisih = $item->batas - $item->terpakai;
        @endphp

        <article class="card budget {{ $statusClass }}" style="{{ '--accent:' . $item->warna }}"
            wire:key="budget-{{ $item->id }}">
            <div class="budget-head">
                <h2>{{ $item->nama }}</h2>
                <div style="display: flex; gap: 6px;">
                    <button wire:click="edit({{ $item->id }})" class="btn btn-light btn-sm" type="button">Ubah</button>
                    <button wire:click="hapus({{ $item->id }})" wire:confirm="Hapus budget '{{ $item->nama }}'?"
                        class="btn btn-danger btn-sm" type="button">Hapus</button>
                </div>
            </div>
            <div class="budget-info">
                Rp{{ number_format($item->terpakai, 0, ',', '.') }} dari
                Rp{{ number_format($item->batas, 0, ',', '.') }}
            </div>
            <div class="progress" role="progressbar" aria-label="Pemakaian budget {{ $item->nama }}"
                aria-valuenow="{{ $persen }}" aria-valuemin="0" aria-valuemax="100">
                <span style="{{ '--p:' . $barWidth . '%' }}"></span>
            </div>
            <div class="budget-foot">
                <span>{{ $persen }}%</span>
                @if ($selisih >= 0)
                <span>Sisa Rp{{ number_format($selisih, 0, ',', '.') }}</span>
                @else
                <span>Lewat Rp{{ number_format(abs($selisih), 0, ',', '.') }}</span>
                @endif
            </div>
        </article>
        @empty
        <article class="card budget is-ok" style="{{ '--accent:var(--peach); grid-column: 1 / -1;' }}">
            <div class="budget-head">
                <h2>Belum ada batas budget bulanan</h2>
            </div>
            <div class="budget-info">Klik tombol "Atur budget" di kanan atas untuk mulai membatasi pengeluaranmu.</div>
        </article>
        @endforelse
    </div>

    @forelse ($targets as $target)
    @php
    $persenTarget = $target->batas > 0 ? round(($target->terpakai / $target->batas) * 100) : 0;
    $barTarget = min($persenTarget, 100);
    @endphp
    <section class="card card-lavender" style="margin-bottom: 16px;" wire:key="target-{{ $target->id }}">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div class="eyebrow">Target tabungan</div>
            <div style="display: flex; gap: 6px;">
                <button wire:click="edit({{ $target->id }})" class="btn btn-light btn-sm" type="button">Ubah</button>
                <button wire:click="hapus({{ $target->id }})" wire:confirm="Hapus target '{{ $target->nama }}'?"
                    class="btn btn-danger btn-sm" type="button">Hapus</button>
            </div>
        </div>
        <div style="display:flex;justify-content:space-between;margin:10px 0;gap:12px;flex-wrap:wrap">
            <b>{{ $target->nama }}</b>
            <span>Rp{{ number_format($target->terpakai, 0, ',', '.') }} dari
                Rp{{ number_format($target->batas, 0, ',', '.') }}</span>
        </div>
        <div class="progress" role="progressbar" aria-label="Target tabungan {{ $target->nama }}"
            aria-valuenow="{{ $persenTarget }}" aria-valuemin="0" aria-valuemax="100">
            <span style="{{ '--p:' . $barTarget . '%; background:var(--maroon)' }}"></span>
        </div>
        <div style="font-size:13px;margin-top:8px">{{ $persenTarget }}% tercapai</div>
    </section>
    @empty
    <section class="card card-lavender">
        <div class="eyebrow">Target tabungan</div>
        <div style="margin:10px 0;"><b>Belum ada target tabungan</b> — klik "+ Target tabungan" untuk menambahkan impian
            tabunganmu.</div>
    </section>
    @endforelse
</main>
