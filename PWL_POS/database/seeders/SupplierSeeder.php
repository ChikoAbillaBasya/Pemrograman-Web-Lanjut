<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SPL001', 'supplier_nama' => 'PT Sentosa Abadi', 'supplier_kontak' => '08124567890', 'supplier_alamat' => 'Jl. Sudirman No. 12, Kel. Kebon Melati, Kec. Tanah Abang, Jakarta Pusat, 10230'],
            ['supplier_id' => 2, 'supplier_kode' => 'SPL002', 'supplier_nama' => 'CV Makmur Sejahtera', 'supplier_kontak' => '08993485712', 'supplier_alamat' => 'Jl. Asia Afrika No. 45, Kel. Braga, Kec. Sumur Bandung, Bandung, 40111'],
            ['supplier_id' => 3, 'supplier_kode' => 'SPL003', 'supplier_nama' => 'UD Berkah Mulia', 'supplier_kontak' => '08772123456', 'supplier_alamat' => 'Jl. Pemuda No. 99, Kel. Tambaksari, Kec. Tambaksari, Surabaya, 60136'],
            ['supplier_id' => 4, 'supplier_kode' => 'SPL004', 'supplier_nama' => 'PT Cahaya Terang', 'supplier_kontak' => '08213456789', 'supplier_alamat' => 'Jl. Gajahmada No. 17, Kel. Sekayu, Kec. Semarang Tengah, Semarang, 50132'],
            ['supplier_id' => 5, 'supplier_kode' => 'SPL005', 'supplier_nama' => 'CV Sukses Bersama', 'supplier_kontak' => '08314567890', 'supplier_alamat' => 'Jl. Gatot Subroto No. 56, Kel. Sei Rengas, Kec. Medan Kota, Medan, 20212'],
            ['supplier_id' => 6, 'supplier_kode' => 'SPL006', 'supplier_nama' => 'UD Jaya Sentosa', 'supplier_kontak' => '08567891234', 'supplier_alamat' => 'Jl. Malioboro No. 1, Kel. Sosromenduran, Kec. Gedongtengen, Yogyakarta, 55271'],
            ['supplier_id' => 7, 'supplier_kode' => 'SPL007', 'supplier_nama' => 'PT Bintang Timur', 'supplier_kontak' => '08123459876', 'supplier_alamat' => 'Jl. Sultan Hasanuddin No. 30, Kel. Pattunuang, Kec. Wajo, Makassar, 90174'],
            ['supplier_id' => 8, 'supplier_kode' => 'SPL008', 'supplier_nama' => 'CV Prima Mandiri', 'supplier_kontak' => '08976543210', 'supplier_alamat' => 'Jl. Teuku Umar No. 88, Kel. Dauh Puri, Kec. Denpasar Barat, Denpasar, 80111'],
            ['supplier_id' => 9, 'supplier_kode' => 'SPL009', 'supplier_nama' => 'UD Sumber Rezeki', 'supplier_kontak' => '08765432109', 'supplier_alamat' => 'Jl. Sudirman No. 25, Kel. 24 Ilir, Kec. Bukit Kecil, Palembang, 30132'],
            ['supplier_id' => 10, 'supplier_kode' => 'SPL010', 'supplier_nama' => 'PT Nusantara Jaya', 'supplier_kontak' => '08543210987', 'supplier_alamat' => 'Jl. Jenderal Sudirman No. 5, Kel. Klandasan Ulu, Kec. Balikpapan Kota, Balikpapan, 76112'],
        ];
        DB::table('m_supplier')->insert($data);
    }
}