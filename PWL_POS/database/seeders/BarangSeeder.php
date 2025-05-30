<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           [
            'barang_id' => 1,
            'kategori_id' => 1,
            'barang_kode' => 'B001',
            'barang_nama' => 'Kopi Hitam',
            'harga_beli' => 5000,
            'harga_jual' => 7000,
           ],
           [
            'barang_id' => 2,
            'kategori_id' => 1,
            'barang_kode' => 'B002',
            'barang_nama' => 'Teh Botol',
            'harga_beli' => 3000,
            'harga_jual' => 5000,
           ],
           [
            'barang_id' => 3,
            'kategori_id' => 2,
            'barang_kode' => 'B003',
            'barang_nama' => 'Shampoo',
            'harga_beli' => 15000,
            'harga_jual' => 20000,
           ],
           [
            'barang_id' => 4,
            'kategori_id' => 2,
            'barang_kode' => 'B004',
            'barang_nama' => 'Sabun Mandi',
            'harga_beli' => 5000,
            'harga_jual' => 8000,
           ],
           [
            'barang_id' => 5,
            'kategori_id' => 3,
            'barang_kode' => 'B005',
            'barang_nama' => 'Pembersih Lantai',
            'harga_beli' => 10000,
            'harga_jual' => 15000,
           ],
           [
            'barang_id' => 6,
            'kategori_id' => 3,
            'barang_kode' => 'B006',
            'barang_nama' => 'Detergen',
            'harga_beli' => 8000,
            'harga_jual' => 12000,
           ],
           [
            'barang_id' => 7,
            'kategori_id' => 4,
            'barang_kode' => 'B007',
            'barang_nama' => 'Popok Bayi',
            'harga_beli' => 30000,
            'harga_jual' => 35000,
           ],
           [
            'barang_id' => 8,
            'kategori_id' => 4,
            'barang_kode' => 'B008',
            'barang_nama' => 'Susu Formula',
            'harga_beli' => 50000,
            'harga_jual' => 55000,
           ],
           [
            'barang_id' => 9,
            'kategori_id' => 5,
            'barang_kode' => 'B009',
            'barang_nama' => 'Kipas Angin',
            'harga_beli' => 200000,
            'harga_jual' => 250000,
           ],
           [
            'barang_id' => 10,
            'kategori_id' => 5,
            'barang_kode' => 'B010',
            'barang_nama' => 'Rice Cooker',
            'harga_beli' => 300000,
            'harga_jual' => 350000,
           ]
            ];
            DB::table('m_barang')->insert($data);
    }
}