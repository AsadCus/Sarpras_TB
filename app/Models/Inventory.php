<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    protected $table = "inventori";
    protected $fillable = [
        'kode_barang_id','stock','jumlah_tersedia','jumlah_rusak','jumlah_pinjam'
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
}
