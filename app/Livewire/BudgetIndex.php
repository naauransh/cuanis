<?php

namespace App\Livewire;

use App\Models\Budget;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class BudgetIndex extends Component
{
    public $showForm = false;
    public $editId = null;
    public $nama = '';
    public $kategori_id = '';
    public $batas = '';
    public $terpakai = 0;
    public $warna = 'var(--peach)';
    public $is_target = false;

    public function bukaFormTambah($isTarget = false)
    {
        $this->reset(['editId', 'nama', 'kategori_id', 'batas']);
        $this->terpakai = 0;
        $this->warna = $isTarget ? 'var(--lavender)' : 'var(--peach)';
        $this->is_target = $isTarget;
        $this->showForm = true;
    }

    public function edit($id)
    {
        $budget = Budget::where('user_id', Auth::id())->findOrFail($id);
        $this->editId = $budget->id;
        $this->nama = $budget->nama;
        $this->kategori_id = $budget->kategori_id ?? '';
        $this->batas = (int) $budget->batas;
        $this->terpakai = (int) $budget->terpakai;
        $this->warna = $budget->warna;
        $this->is_target = (bool) $budget->is_target;
        $this->showForm = true;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'batas' => 'required|numeric|min:1',
            'terpakai' => 'nullable|numeric|min:0',
            'warna' => 'required|string',
        ]);

        $terpakaiOtomatis = $this->terpakai ?: 0;
        if (!$this->is_target && $terpakaiOtomatis == 0) {
            $terpakaiOtomatis = Transaksi::where('user_id', Auth::id())
                ->where('tipe', 'pengeluaran')
                ->where('deskripsi', 'like', '%' . $this->nama . '%')
                ->sum('jumlah');
        }

        $data = [
            'user_id' => Auth::id(),
            'kategori_id' => $this->kategori_id ?: null,
            'nama' => $this->nama,
            'batas' => $this->batas,
            'terpakai' => $terpakaiOtomatis,
            'warna' => $this->warna,
            'is_target' => $this->is_target,
        ];

        if ($this->editId) {
            Budget::where('user_id', Auth::id())->findOrFail($this->editId)->update($data);
            session()->flash('success', 'Budget berhasil diperbarui!');
        } else {
            Budget::create($data);
            session()->flash('success', 'Budget baru berhasil ditambahkan!');
        }

        $this->reset(['showForm', 'editId', 'nama', 'kategori_id', 'batas', 'terpakai']);
    }

    public function hapus($id)
    {
        Budget::where('user_id', Auth::id())->findOrFail($id)->delete();
        session()->flash('success', 'Budget berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.budget-index', [
            'budgets' => Budget::where('user_id', Auth::id())->where('is_target', false)->get(),
            'targets' => Budget::where('user_id', Auth::id())->where('is_target', true)->get(),
            'kategoris' => Kategori::where('user_id', Auth::id())->where('tipe', 'pengeluaran')->get(),
        ]);
    }
}