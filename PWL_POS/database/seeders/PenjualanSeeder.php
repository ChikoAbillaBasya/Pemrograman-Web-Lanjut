<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Andi',
                'penjualan_kode' => 'P001',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'P002',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Citra',
                'penjualan_kode' => 'P003',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Dewi',
                'penjualan_kode' => 'P004',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Eka',
                'penjualan_kode' => 'P005',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Fajar',
                'penjualan_kode' => 'P006',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Gina',
                'penjualan_kode' => 'P007',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Hadi',
                'penjualan_kode' => 'P008',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Indah',
                'penjualan_kode' => 'P009',
                'tanggal_penjualan' => now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'P010',
                'tanggal_penjualan' => now(),
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}