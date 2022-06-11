<?php

namespace App\Models;

use App\Models\Inventori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $table = "barang";
    protected $fillable = [
        'nama_barang','jenis_barang','foto_barang'
    ];

    public function inventori()
    {
        return $this->hasOne(Inventori::class);
    }
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}
