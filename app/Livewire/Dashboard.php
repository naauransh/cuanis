<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

#[Layout('layouts.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public $periode = 'harian';

    public function render()
    {
        $userId = Auth::id();
        $sekarang = Carbon::now();

        // RINGKASAN BULAN INI
        $transaksiBulanIni = Transaksi::where('user_id', $userId)
            ->whereBetween('tanggal', [
                $sekarang->copy()->startOfMonth()->toDateString(),
                $sekarang->copy()->endOfMonth()->toDateString(),
            ])
            ->get();

        $pemasukan = $transaksiBulanIni
            ->where('tipe', 'pemasukan')->sum('jumlah');

        $pengeluaran = $transaksiBulanIni
            ->where('tipe', 'pengeluaran')->sum('jumlah');

        $saldo = $pemasukan - $pengeluaran;

        // MENENTUKAN PERIODE GRAFIK
        if ($this->periode === 'harian') {

            $tanggalMulai = $sekarang->copy()->startOfDay();
            $tanggalAkhir = $sekarang->copy()->endOfDay();

            $tanggalGrafik = collect([$sekarang->copy()]);

        } elseif ($this->periode === 'mingguan') {

            $tanggalMulai = $sekarang->copy()->startOfWeek();
            $tanggalAkhir = $sekarang->copy()->endOfWeek();

            $tanggalGrafik = collect(range(0, 6))->map(
                fn ($hari) => $tanggalMulai->copy()->addDays($hari)
            );

        } else {

            // GRAFIK 12 BULAN DALAM TAHUN INI
            $tanggalMulai = $sekarang->copy()->startOfYear();
            $tanggalAkhir = $sekarang->copy()->endOfYear();

            $tanggalGrafik = collect(range(1, 12))->map(
                fn ($bulan) => Carbon::create(
                    $sekarang->year,
                    $bulan,
                    1
                )
            );
        }

        // MENGAMBIL DATA TRANSAKSI UNTUK GRAFIK
        $dataGrafik = Transaksi::where('user_id', $userId)
            ->whereBetween('tanggal', [
                $tanggalMulai->toDateString(),
                $tanggalAkhir->toDateString(),
            ])
            ->get();

        $laporan = $tanggalGrafik->map(function ($tanggal) use ($dataGrafik) {

            $transaksiTanggal = $dataGrafik->filter(function ($item) use ($tanggal) {

                $tanggalTransaksi = Carbon::parse($item->tanggal);

                if ($this->periode === 'bulanan') {
                    return $tanggalTransaksi->format('Y-m') === $tanggal->format('Y-m');
                }

                return $tanggalTransaksi->format('Y-m-d') === $tanggal->format('Y-m-d');
            });

            return [
                'label' => $this->periode === 'harian'
                    ? 'Hari ini'
                    : ($this->periode === 'mingguan'
                        ? ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'][$tanggal->dayOfWeek]
                        : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'][$tanggal->month - 1]),

                'pemasukan' => $transaksiTanggal
                    ->where('tipe', 'pemasukan')->sum('jumlah'),

                'pengeluaran' => $transaksiTanggal
                    ->where('tipe', 'pengeluaran')->sum('jumlah'),
            ];
        });

        $maxGrafik = max(
            1,
            (float) $laporan->max(fn ($item) => max(
                $item['pemasukan'],
                $item['pengeluaran']
            ))
        );

        // TRANSAKSI TERBARU
        $terbaru = Transaksi::where('user_id', $userId)
            ->latest('tanggal')
            ->latest('id')
            ->take(5)
            ->get();

        return view('livewire.dashboard', [
            'nama' => Auth::user()->name,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo' => $saldo,
            'laporan' => $laporan,
            'maxGrafik' => $maxGrafik,
            'terbaru' => $terbaru,
            'bulan' => $sekarang->translatedFormat('F Y'),
        ]);
    }
}
