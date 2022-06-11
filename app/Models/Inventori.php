<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventori extends Model
{
    protected $table = "inventori";
    protected $fillable = [
        'barang_id','jumlah_tersedia','jumlah_rusak','jumlah_pinjam'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
