<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable = [
        'barang_id','nama_peminjam','status_peminjam','nama_kelas','jumlah_pinjam','status','keterangan'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
