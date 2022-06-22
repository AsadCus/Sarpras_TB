<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barang_keluars";
    protected $fillable = [
        'barang_id','kode_barang_id','jumlah_keluar','keterangan','nama_operator'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
