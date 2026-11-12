@extends('layouts.app')

@section('title', 'Budget')

@section('content')
<div class="page-head">
  <div>
    <div class="eyebrow">Batas bulanan</div>
    <h1>Budget</h1>
  </div>
  <a class="btn" href="#">Atur budget</a>
</div>

<div class="budgets">
  <article class="card budget is-warn" style="--accent:var(--peach)">
    <div class="budget-head">
      <h2>Makan</h2>
      <a class="btn btn-light btn-sm" href="#">Ubah</a>
    </div>
    <div class="budget-info">Rp1.350.000 dari Rp1.500.000</div>
    <div class="progress" role="progressbar" aria-label="Pemakaian budget Makan" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span style="--p:90%"></span></div>
    <div class="budget-foot"><span>90%</span><span>Sisa Rp150.000</span></div>
  </article>

  <article class="card budget is-ok" style="--accent:var(--lavender)">
    <div class="budget-head">
      <h2>Transport</h2>
      <a class="btn btn-light btn-sm" href="#">Ubah</a>
    </div>
    <div class="budget-info">Rp420.000 dari Rp600.000</div>
    <div class="progress" role="progressbar" aria-label="Pemakaian budget Transport" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span style="--p:70%"></span></div>
    <div class="budget-foot"><span>70%</span><span>Sisa Rp180.000</span></div>
  </article>

  <article class="card budget is-over" style="--accent:var(--pink)">
    <div class="budget-head">
      <h2>Hiburan</h2>
      <a class="btn btn-light btn-sm" href="#">Ubah</a>
    </div>
    <div class="budget-info">Rp380.000 dari Rp300.000</div>
    <div class="progress" role="progressbar" aria-label="Pemakaian budget Hiburan" aria-valuenow="127" aria-valuemin="0" aria-valuemax="100"><span style="--p:100%"></span></div>
    <div class="budget-foot"><span>127%</span><span>Lewat Rp80.000</span></div>
  </article>

  <article class="card budget is-ok" style="--accent:var(--yellow)">
    <div class="budget-head">
      <h2>Belanja</h2>
      <a class="btn btn-light btn-sm" href="#">Ubah</a>
    </div>
    <div class="budget-info">Rp580.000 dari Rp800.000</div>
    <div class="progress" role="progressbar" aria-label="Pemakaian budget Belanja" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"><span style="--p:72%"></span></div>
    <div class="budget-foot"><span>72%</span><span>Sisa Rp220.000</span></div>
  </article>
</div>

<section class="card card-lavender">
  <div class="eyebrow">Target tabungan</div>
  <div style="display:flex;justify-content:space-between;margin:10px 0;gap:12px;flex-wrap:wrap">
    <b>Laptop baru</b><span>Rp3.200.000 dari Rp8.000.000</span>
  </div>
  <div class="progress" role="progressbar" aria-label="Target tabungan laptop" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
    <span style="--p:40%;background:var(--maroon)"></span>
  </div>
  <div style="font-size:13px;margin-top:8px">40% tercapai</div>
</section>
@endsection