<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function edit($id)
    {
        $transaksi = Transaksi::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('edit-transaksi', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::where('user_id', auth()->id())
            ->findOrFail($id);

        $validated = $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ]);

        $transaksi->update($validated);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::where('user_id', auth()->id())
            ->findOrFail($id);

        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}