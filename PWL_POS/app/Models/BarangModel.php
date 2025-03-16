<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    protected $table = 'm_barang';       // Pastikan nama tabel benar
    protected $primaryKey = 'barang_id'; // Sesuaikan dengan tabel
    public $timestamps = false;          // Jika tidak pakai created_at & updated_at

    protected $fillable = [
        'barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
}
