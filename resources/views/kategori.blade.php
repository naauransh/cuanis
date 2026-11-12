@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="page-head">
  <div>
    <div class="eyebrow">6 kategori</div>
    <h1>Kategori</h1>
  </div>
  <a class="btn" href="#">Tambah kategori</a>
</div>

<section class="cat-section">
  <h2>Pengeluaran<small>4 kategori</small></h2>
  <div class="cat-grid">
    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-peach">M</span>
        <div><b>Makan</b><small>12 transaksi · Budget Rp1.500.000</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>

    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-lavender">T</span>
        <div><b>Transport</b><small>8 transaksi · Budget Rp600.000</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>

    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-pink">H</span>
        <div><b>Hiburan</b><small>4 transaksi · Budget Rp300.000</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>

    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-yellow">B</span>
        <div><b>Belanja</b><small>3 transaksi · Budget Rp800.000</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>
  </div>
</section>

<section class="cat-section">
  <h2>Pemasukan<small>2 kategori</small></h2>
  <div class="cat-grid">
    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-mint">G</span>
        <div><b>Gaji</b><small>1 transaksi</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>

    <article class="card cat">
      <div class="cat-top">
        <span class="avatar bg-lavender">F</span>
        <div><b>Freelance</b><small>1 transaksi</small></div>
      </div>
      <div class="cat-actions">
        <a class="btn btn-light btn-sm" href="#">Edit</a>
        <button class="btn btn-danger btn-sm" type="button">Hapus</button>
      </div>
    </article>
  </div>
</section>
@endsection