@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="page-head">
  <div>
    <div class="eyebrow">Manajemen</div>
    <h1>Edit Kategori</h1>
  </div>
</div>

<form class="card card-pink form-card" action="#" method="POST">
  @csrf
  @method('PUT')
  <div class="form-grid">
    <div>
      <label class="label" for="nama">Nama kategori</label>
      <input class="input" id="nama" name="nama" value="Makan" required>
    </div>
    <div>
      <label class="label" for="tipe">Tipe</label>
      <select class="input" id="tipe" name="tipe">
        <option selected>Pengeluaran</option>
        <option>Pemasukan</option>
      </select>
    </div>
    <div class="full">
      <label class="label" for="budget">Budget bulanan (Rp)</label>
      <input class="input" id="budget" name="budget" inputmode="numeric" value="1500000">
    </div>
    <div class="full">
      <span class="label" id="lbl-warna">Warna</span>
      <div class="swatches" role="radiogroup" aria-labelledby="lbl-warna">
        <label class="swatch"><input type="radio" name="warna" value="bg-peach" aria-label="Warna bg-peach" checked><span class="bg-peach"></span></label>
        <label class="swatch"><input type="radio" name="warna" value="bg-lavender" aria-label="Warna bg-lavender"><span class="bg-lavender"></span></label>
        <label class="swatch"><input type="radio" name="warna" value="bg-pink" aria-label="Warna bg-pink"><span class="bg-pink"></span></label>
        <label class="swatch"><input type="radio" name="warna" value="bg-mint" aria-label="Warna bg-mint"><span class="bg-mint"></span></label>
        <label class="swatch"><input type="radio" name="warna" value="bg-yellow" aria-label="Warna bg-yellow"><span class="bg-yellow"></span></label>
      </div>
    </div>
  </div>
  <div class="form-actions">
    <a class="btn btn-light" href="{{ route('kategori.index') }}">Batal</a>
    <button class="btn" type="submit">Simpan Perubahan</button>
  </div>
</form>
@endsection