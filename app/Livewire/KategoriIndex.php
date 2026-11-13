<?php

namespace App\Livewire;

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class KategoriIndex extends Component
{
    public $showForm = false;
    public $editId = null;
    public $nama = '';
    public $tipe = 'pengeluaran';
    public $warna = 'bg-peach';

    public function bukaFormTambah()
    {
        $this->reset(['editId', 'nama']);
        $this->tipe = 'pengeluaran';
        $this->warna = 'bg-peach';
        $this->showForm = true;
    }

    public function edit($id)
    {
        $kategori = Kategori::where('user_id', Auth::id())->findOrFail($id);
        $this->editId = $kategori->id;
        $this->nama = $kategori->nama;
        $this->tipe = $kategori->tipe;
        $this->warna = $kategori->warna;
        $this->showForm = true;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'warna' => 'required|string',
        ]);

        if ($this->editId) {
            $kategori = Kategori::where('user_id', Auth::id())->findOrFail($this->editId);
            $kategori->update([
                'nama' => $this->nama,
                'tipe' => $this->tipe,
                'warna' => $this->warna,
            ]);
            session()->flash('success', 'Kategori berhasil diperbarui!');
        } else {
            Kategori::create([
                'user_id' => Auth::id(),
                'nama' => $this->nama,
                'tipe' => $this->tipe,
                'warna' => $this->warna,
            ]);
            session()->flash('success', 'Kategori baru berhasil ditambahkan!');
        }

        $this->reset(['showForm', 'editId', 'nama']);
    }

    public function hapus($id)
    {
        $kategori = Kategori::where('user_id', Auth::id())->findOrFail($id);
        $kategori->delete();
        session()->flash('success', 'Kategori berhasil dihapus!');
    }

    public function render()
    {
        $kategoris = Kategori::with('budget')
            ->where('user_id', Auth::id())
            ->orderBy('nama')
            ->get();

        return view('livewire.kategori-index', [
            'totalKategori' => $kategoris->count(),
            'pengeluaran' => $kategoris->where('tipe', 'pengeluaran'),
            'pemasukan' => $kategoris->where('tipe', 'pemasukan'),
        ]);
    }
}