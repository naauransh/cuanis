@extends('layouts.app')

@section('title', 'Edit Budget & Target')

@section('content')
<div class="page-head">
  <div>
    <div class="eyebrow">Pengaturan keuangan</div>
    <h1 style="margin-top:6px">Edit Budget & Target</h1>
  </div>
</div>

<form class="card card-pink form-card" action="#" method="POST" style="max-width: 100%;">
  @csrf
  @method('PUT')
  <h2 style="margin-bottom: 20px;">Batas Budget Per Kategori</h2>
  <div class="form-grid" style="margin-bottom: 32px;">
    <div>
      <label class="label" for="budget-makan">Budget Makan (Rp)</label>
      <input class="input" id="budget-makan" name="budget_makan" inputmode="numeric" value="1500000" required>
    </div>
    <div>
      <label class="label" for="budget-transport">Budget Transport (Rp)</label>
      <input class="input" id="budget-transport" name="budget_transport" inputmode="numeric" value="600000" required>
    </div>
    <div>
      <label class="label" for="budget-hiburan">Budget Hiburan (Rp)</label>
      <input class="input" id="budget-hiburan" name="budget_hiburan" inputmode="numeric" value="300000" required>
    </div>
    <div>
      <label class="label" for="budget-belanja">Budget Belanja (Rp)</label>
      <input class="input" id="budget-belanja" name="budget_belanja" inputmode="numeric" value="800000" required>
    </div>
  </div>

  <hr style="border: 0; border-top: 2px dashed var(--line); margin: 24px 0;">

  <h2 style="margin-bottom: 20px;">Target Tabungan</h2>
  <div class="form-grid">
    <div class="full">
      <label class="label" for="nama-target">Nama Target / Impian</label>
      <input class="input" id="nama-target" name="nama_target" value="Laptop baru" required>
    </div>
    <div>
      <label class="label" for="terkumpul">Sudah Terkumpul (Rp)</label>
      <input class="input" id="terkumpul" name="terkumpul" inputmode="numeric" value="3200000" required>
    </div>
    <div>
      <label class="label" for="target-total">Total Target (Rp)</label>
      <input class="input" id="target-total" name="target_total" inputmode="numeric" value="8000000" required>
    </div>
  </div>

  <div class="form-actions" style="margin-top: 32px;">
    <a class="btn btn-light" href="{{ route('budget.index') }}">Batal</a>
    <button class="btn" type="submit">Simpan Perubahan</button>
  </div>
</form>
@endsection