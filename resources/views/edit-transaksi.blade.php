@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')

    <div class="container">

        <div class="page-head">
            <div>
                <div class="eyebrow">Pencatatan</div>
                <h1>Edit Transaksi</h1>
            </div>
        </div>

        <form class="card card-pink form-card" action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-grid">

                <div>
                    <label class="label" for="tipe">Tipe</label>
                    <select class="input" id="tipe" name="tipe">
                        <option value="pengeluaran" {{ old('tipe', $transaksi->tipe) == 'pengeluaran' ? 'selected' : '' }}>
                            Pengeluaran
                        </option>

                        <option value="pemasukan" {{ old('tipe', $transaksi->tipe) == 'pemasukan' ? 'selected' : '' }}>
                            Pemasukan
                        </option>
                    </select>
                    @error('tipe')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="label" for="jumlah">Nominal (Rp)</label>
                    <input class="input" id="jumlah" name="jumlah" type="number"
                        value="{{ old('jumlah', $transaksi->jumlah) }}">
                    @error('jumlah')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="label" for="tanggal">Tanggal</label>
                    <input class="input" id="tanggal" name="tanggal" type="date"
                        value="{{ old('tanggal', $transaksi->tanggal) }}">
                    @error('tanggal')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="full">
                    <label class="label" for="deskripsi">Catatan</label>
                    <input class="input" id="deskripsi" name="deskripsi" type="text"
                        value="{{ old('deskripsi', $transaksi->deskripsi) }}">
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
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

@endsection
