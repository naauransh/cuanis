<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class TransaksiIndex extends Component
{
    public $filter = 'semua';
    public $search = '';

    public function render()
    {
        $transaksis = Transaksi::where('user_id', Auth::id())
            ->when($this->filter !== 'semua', function ($query) {
                $query->where('tipe', $this->filter);
            })
            ->when($this->search !== '', function ($query) {
                $query->where('deskripsi', 'like', '%' . $this->search . '%');
            })
            ->latest('tanggal')
            ->get();

        return view('transaksi-index', [
            'transaksis' => $transaksis,
        ]);
    }
}