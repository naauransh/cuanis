<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Tambah Transaksi')]
class TransaksiCreate extends Component
{
    public $deskripsi = '';
    public $jumlah = '';
    public $tipe = 'pengeluaran';
    public $tanggal = '';

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    protected $rules = [
        'deskripsi' => 'required|string|max:255',
        'jumlah' => 'required|numeric|min:1',
        'tipe' => 'required|in:pemasukan,pengeluaran',
        'tanggal' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        Transaksi::create([
            'user_id' => Auth::id(),
            'deskripsi' => $this->deskripsi,
            'jumlah' => $this->jumlah,
            'tipe' => $this->tipe,
            'tanggal' => $this->tanggal,
        ]);

        session()->flash('success', 'Transaksi berhasil disimpan!');

        return redirect()->route('transaksi.index');
    }

    public function render()
    {
        return view('tambah-transaksi');
    }
}