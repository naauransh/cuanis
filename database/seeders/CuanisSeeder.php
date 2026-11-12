<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CuanisSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Demo (Naura)
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'user1',
                'password' => Hash::make('user123'),
            ]
        );

        // 2. Data Kategori Keuangan Default
        $kategori = [
            ['nama' => 'Gaji / Pemasukan Utama', 'tipe' => 'pemasukan'],
            ['nama' => 'Makanan & Minuman', 'tipe' => 'pengeluaran'],
            ['nama' => 'Transportasi', 'tipe' => 'pengeluaran'],
            ['nama' => 'Belanja & Skincare', 'tipe' => 'pengeluaran'],
            ['nama' => 'Tabungan & Investasi', 'tipe' => 'pemasukan'],
        ];

        // Jika nanti tabel Kategori sudah ada, bisa langsung looping di sini:
        // foreach ($kategori as $kat) {
        //     \App\Models\Kategori::create(array_merge($kat, ['user_id' => $user->id]));
        // }
    }
}
