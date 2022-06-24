<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barang_keluars";
    protected $fillable = [
        'kode_barang_id', 'nama_peminta', 'status_peminta', 'jumlah_keluar', 'keterangan', 'operator_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang_id', 'kode_barang');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}