<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class TransaksiIndex extends Component
{
    use WithPagination;

    public $filter = 'semua';
    public $search = '';

    // Reset ke halaman 1 setiap kali filter atau search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setFilter($tipe)
    {
        $this->filter = $tipe;
        $this->resetPage();
    }

    public function hapus($id)
    {
        $transaksi = Transaksi::where('user_id', Auth::id())->findOrFail($id);
        $transaksi->delete();

        session()->flash('success', 'Transaksi berhasil dihapus!');
    }

    public function render()
    {
        $query = Transaksi::where('user_id', Auth::id())
            ->when($this->filter !== 'semua', function ($q) {
                $q->where('tipe', $this->filter);
            })
            ->when($this->search !== '', function ($q) {
                $q->where('deskripsi', 'like', '%' . $this->search . '%');
            })
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc');

        $totalTransaksi = Transaksi::where('user_id', Auth::id())->count();
        $transaksis = $query->paginate(7);

        return view('transaksi-index', [
            'transaksis' => $transaksis,
            'totalTransaksi' => $totalTransaksi,
        ]);
    }
}